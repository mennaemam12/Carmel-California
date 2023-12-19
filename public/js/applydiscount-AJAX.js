
    function applyDiscount(code) {
        // Use the $.ajax function
        $.ajax({
            url: "checkout/discount",
            method: "POST",
            
            data: {discountcode: code},
            success: function(response) {
            if (response>0) {
                try {
                    console.log("ajax response: " + response);
                    var total = document.getElementById('finaltotal').innerHTML;
                    document.getElementById('discountvalue').innerHTML = (parseInt(response)/100)*parseInt(total) + " LE";
                    document.getElementById('finaltotal').innerHTML = parseInt(total) - ((parseInt(response)/100)*parseInt(total)) +" LE";
                    document.getElementById('discountapplied').innerHTML = response + "% discount applied!";
                    document.getElementById('discountvalue').style.color('red');
                }catch (e) {
                    console.error("Error caught:", e);
                }
            }
            else{
                document.getElementById('discountapplied').innerHTML = "This discount doesn't exist or has expired.";
            }
},
            error: function(xhr, status, error) {
                // Handle errors
                console.error("Error with the request. Status code:", xhr.status);
            }
        });
    }