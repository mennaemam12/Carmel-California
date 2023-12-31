document.addEventListener("DOMContentLoaded", function() {
    // Function to retrieve categories based on type
    function retrieveCategoriesByType(selectedType) {
        // Use the $.ajax function
        $.ajax({
            url: "dashboard/menu?action=addoptions",
            method: "POST",
            data: {

                type: selectedType
            },
            success: function(response) {
                if(response){
                    console.log(response)
                    // Handle the successful response
                    try {
                        var categories = JSON.parse(response);

                        var categorySelect = document.getElementById("category");
                        categorySelect.innerHTML = "";

                        categories.forEach(category => {
                            var option = document.createElement("option");
                            option.value = category;
                            option.text = category;
                            categorySelect.appendChild(option);
                        });
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error("Error with the request. Status code:", xhr.status);
            }
        });
    }

    function enableDropdown() {
        var dropdown = document.getElementById("category");
        dropdown.disabled = false;
    }

    // Event listener for the "select type" change event
    var selectType = document.getElementById("itemtype");
    selectType.addEventListener("change", function() {
        enableDropdown();
        var selectedType = selectType.value;
        retrieveCategoriesByType(selectedType);
    });
});

