function addToCart(){
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const type = urlParams.get('type');
    const selectElement = document.getElementById('options');
    const quantity=document.getElementById('quantity').value;
    var selectedOption;

    if(selectElement){
        selectedOption = selectElement.value;
    }
    else{
        selectedOption='';
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
        success: function(response) {
            if(response){
                $('#addCart').text("Added to Cart");
            }
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
}
