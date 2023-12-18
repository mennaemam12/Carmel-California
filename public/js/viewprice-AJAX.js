
    function getSaladTotal(order) {
        // Use the $.ajax function
        $.ajax({
            url: "salad-order/viewTotal",
            method: "POST",
            contentType: 'application/json',
            data: JSON.stringify(order),
            success: function(response) {
            if (response) {
                try {
                    document.getElementById('total').innerHTML = parseInt(response);
                }catch (e) {
                    console.error("Error caught:", e);
                }
            }
},
            error: function(xhr, status, error) {
                // Handle errors
                console.error("Error with the request. Status code:", xhr.status);
            }
        });
    }