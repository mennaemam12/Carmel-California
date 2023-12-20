
    function getSaladTotal(order) {
        // Use the $.ajax function
        $.ajax({
            url: "salad-order/viewtotal",
            method: "POST",
            contentType: 'application/json',
            data: JSON.stringify(order),
            success: function(response) {
            if (!response.includes('error')) {
                try {
                    document.getElementById('total').innerHTML = parseInt(response);
                    document.getElementById('baseerror').innerHTML = "";
                }catch (e) {
                    console.error("Error caught:", e);
                }
            }
            else{
                document.getElementById('total').innerHTML = "0.00";
                document.getElementById('baseerror').innerHTML = "Choose a base first";
            }
},
            error: function(xhr, status, error) {
                // Handle errors
                console.error("Error with the request. Status code:", xhr.status);
            }
        });
    }