document.addEventListener("DOMContentLoaded", function() {
    // Function to retrieve categories based on type
    function retrieveCategoriesByType(selectedType) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Configure it: GET-request for the PHP script with the selected type as a parameter
        xhr.open("GET", "menu.controller.php?action=getCategories&type=" + selectedType, true);

        // Set up the callback function to handle the response
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    try {
                        // Try parsing the JSON response
                        var categories = JSON.parse(xhr.responseText);

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
                } else {
                    console.error("Error with the request. Status code:", xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
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
