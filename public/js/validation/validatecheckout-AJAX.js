
    function validateForm(formData) {
        // Use the $.ajax function
        $.ajax({
            url: "checkout/placeorder",
            method: "POST",
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function(response) {
            if (response.includes("successful")) {
                try {
                    console.log("successful");
                }catch (e) {
                    console.error("Error caught:", e);
                }
            }
            else{
                document.getElementById('formerror').innerHTML = response;
            }
},
            error: function(xhr, status, error) {
                // Handle errors
                console.error("Error with the request. Status code:", xhr.status);
            }
        });
    }