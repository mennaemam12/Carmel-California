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

let quantityElements = document.querySelectorAll('#quantity');
let itemTotals = document.querySelectorAll('#item-total');
let totalField = document.getElementById('total-field');
let subTotalField = document.getElementById('subtotal-field');
let cartNav = document.getElementById('Items_count');

function incrementQuantity(index) {
    $.ajax({
        url: "cart?action=increment",
        method: "POST",
        data: {
            index: index
        },
        dataType: "json",
        success: function (response) {
            if (response.success) {
                quantityElements[index].value = response.quantity;
                itemTotals[index].innerHTML = response.itemTotal;
                totalField.innerHTML = response.total + "&nbsp;EGP";
                subTotalField.innerHTML = response.subtotal + "&nbsp;EGP"
                cartNav.innerHTML = response.cartQuantity;
            }
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}

function decrementQuantity(index) {
    $.ajax({
        url: "cart?action=decrement",
        method: "POST",
        data: {
            index: index
        },
        dataType: "json",
        success: function (response) {
            if (response.success) {
                quantityElements[index].value = response.quantity;
                itemTotals[index].innerHTML = response.itemTotal;
                totalField.innerHTML = response.total + "&nbsp;EGP";
                subTotalField.innerHTML = response.subtotal + "&nbsp;EGP"
                cartNav.innerHTML = response.cartQuantity;
            }
            else
                removeItem(index);
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.log(error);
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}

function removeItem(index) {

    let form = document.createElement('form');
    form.method = 'POST';
    form.action = 'cart?action=remove';
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





