function add() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const type = urlParams.get('type');
    const selectElement = document.getElementById('options');
    const quantity = document.getElementById('quantity').value;
    var selectedOption = '';

    if (selectElement) {
        selectedOption = selectElement.value;
    }

    $.ajax({
        url: "product/addToCart",
        method: "POST",
        data: {
            id: id,
            type: type,
            selectedOption: selectedOption,
            quantity: quantity
        },
        success: function (response) {
            console.log(response);
            if (response) {
                var currentItemCount = parseInt($("#Items_count").text(), 10);
                var newItemCount = currentItemCount + 1;

                $("#Items_count").text(newItemCount);
                $('#addCart').prop('disabled', true);
                $('#addCart').text("Added to Cart");

            }
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}

function incrementQuantity(index) {
    var quantityElements = document.querySelectorAll('#quantity');
    var quantity = parseInt(quantityElements[index].value);
    quantityElements[index].value = quantity + 1;

    $.ajax({
        url: "cart/increment",
        method: "POST",
        data: {
            index: index
        },
        success: function (response) {
            console.log(response);
            if (response) {
                location.reload()
            }

        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}

function decrementQuantity(index) {
    var quantityElements = document.querySelectorAll('#quantity');
    var quantity = parseInt(quantityElements[index].value);
    if (quantity != 1) {
        quantityElements[index].value = quantity - 1;

        $.ajax({
            url: "cart/decrement",
            method: "POST",
            data: {
                index: index
            },
            success: function (response) {
                console.log(response);
                if (response) {
                    location.reload()
                }
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error("Error with the request. Status code:", xhr.status);
            }
        });
    }
}

function removeItem(index) {
    let form = document.createElement('form');
    form.method = 'POST';
    form.action = 'cart/remove';
    document.body.appendChild(form);
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'i';
    input.value = index;
    form.appendChild(input);
    document.body.appendChild(form);
    let submit = document.createElement('input');
    submit.type = 'submit';
    submit.name = 'submit';
    submit.value = 'submit';
    form.appendChild(submit);
    submit.click();
}

// function removeItem(index) {
//     $.ajax({
//         url: "cart/remove",
//         method: "POST",
//         data: {
//             index: index
//         },
//         success: function (response) {
//             console.log(response);
//             if (response)
//                 location.reload()
//         },
//         error: function (xhr, status, error) {
//             // Handle errors
//             console.error("Error with the request. Status code:", xhr.status);
//         }
//     });
// }





