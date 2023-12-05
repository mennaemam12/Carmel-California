<?php
@session_start();
include 'projectFolderName.php';
require_once 'helpers/session.helper.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carmel Dashboard</title>

    <base href="<?php echo $projectFolder;?>/">
    <!-- plugins:css -->
    <link rel="stylesheet" href="template/vendors/feather/feather.css">
    <link rel="stylesheet" href="template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="public/css/dashboard/styleAdmin.css">
    <link rel="stylesheet" href="public/css/dashboard/styles.css">
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="template/images/favicon.png" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> 
    <style>
       .checkbox-container {
    display: flex;
    margin-right: 20px;
}

.checkbox-group {
    display: flex;
    align-items: center;
    margin-right: 70px; /* Adjust spacing between groups */
}
.checkbox-group input[type="checkbox"] {
    margin: 5px; /* Add space between label and checkbox */
}


.button-container {
   display: block;
   margin: 20px;
   
}


    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- Navbar -->
        <?php include_once 'views/partials/dashboard/_navbar.php'; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <?php include_once 'views/partials/dashboard/_settings-panel.php'; ?>
            

            <!-- Sidebar -->
            <?php include_once 'views/partials/dashboard/_sidebar.php'; ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper" style="background-color: #DFE0DA;">
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Add Discount</h3>
                                    <p class="card-description">
                                        Add Discount To Products
                                    </p>
                                    <form class="forms-sample" method="post" action="dashboard/discount" enctype='multipart/form-data'>
                                        
                                        
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Type</label>
                                            <select class="form-control" id="type" name="type"onchange="enablecategory();handleDropdownChange(this.value)">
                                            <option value="">Select an option</option>
                                                <option value="breakfast">breakfast</option>
                                                <option value="main">main</option>
                                                <option value="drinks">drinks</option>
                                                <option value="desserts">desserts</option>
                                                <option value="sides">sides</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Category</label>
                                            <select class="form-control" id="category" name="category" disabled>
                                                <option value="">Select A Type First</option>    
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Percentage</label>
                                            <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Ex: 10 , 20">
                                        </div>
                                        <div class="checkbox-container">
                                            <div class="checkbox-group">
                                                <label for="offerCheckbox">Offer</label>
                                                <input type="checkbox" id="offerCheckbox"name="copoun">
                                            </div>
                                            <div class="checkbox-group">
                                                <label for="couponCheckbox">Coupon Code</label>
                                                <input type="checkbox" id="couponCheckbox"name="copoun">
                                                <!-- <button class="btn btn-primary mr-2" id="generateCodeBtn" style="display: none;">Generate Code</button> -->
                                            </div>
                                            <div class="button-container">
                                            <button class="btn btn-primary mr-2" id="generateCodeBtn" style="display: none;">Generate Code</button>
                                            <span id="copoun"></span>
                                        </div>
                                        </div>
                                       
                                        <div class="form-message-div">
                                            <?php flash('formError') ?>
                                        </div>
                                        <div class="form-message-div">
                                            <?php flash('formSuccess') ?>
                                        </div>
                                        <input type="hidden" id="startDate" name="start_date" value=""  >
                                        <input type="hidden" id="endDate" name="end_date" value=""  >
                                        <button type="submit" class="btn btn-primary mr-2" value="Upload File"  onclick="setStartDate() ;setEndDate()">Submit</button>
                                        <a href="dashboard" class="btn btn-light">Cancel</a>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    include 'views/partials/dashboard/_footer.php'
                    ?>
                </div>
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <script>
            function setStartDate() {
            // Get the current date
            var currentDate = new Date();

            // Format the date as 'd/m/Y'
            var formattedDate = currentDate.getDate() + '/' + (currentDate.getMonth() + 1) + '/' + currentDate.getFullYear();

            // Set the formatted date into the hidden input field
            document.getElementById('start_date').value = formattedDate;
            console.log(formattedDate)



        }
            function setEndDate() {
        // Get the current date
        var currentDate = new Date();

        // Calculate end date (start date + 30 days)
        var endDate = new Date(currentDate.getTime() + (30 * 24 * 60 * 60 * 1000)); // Adding 30 days in milliseconds

        // Format the end date as 'd/m/Y'
        var formattedEndDate = endDate.getDate() + '/' + (endDate.getMonth() + 1) + '/' + endDate.getFullYear();

        // Set the formatted end date into the hidden input field
        document.getElementById('end_date').value = formattedEndDate;

        console.log("End Date:", formattedEndDate);
    }

        // function setEndDate function after 30 days from startDate
        

            function enablecategory() {
            var type = document.getElementById("type");
            var category = document.getElementById("category");

            if (type.value !== "") {
                category.disabled = false;
            } else {
                category.disabled = true;
                category.selectedIndex = 0; // Reset the second dropdown to the default option
            }
        }
        enablecategory();


        
        function handleDropdownChange(selectedValue) {
            const category = document.getElementById('category');
            
            // Clear existing options before adding new ones
            category.innerHTML = '';

            // AJAX call to fetch.php if the selectedValue is not zero
            if(selectedValue !== "0"){
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'fetch.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Update category with the response
                        category.innerHTML = xhr.responseText;
                    }
                };
                // Send the selected value to fetch.php
                xhr.send(`type=${selectedValue}`);
            }
    
        }






        //checkbox 
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="copoun"]');
        const generateCodeBtn = document.getElementById('generateCodeBtn');
        const couponCheckbox = document.getElementById('couponCheckbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                checkboxes.forEach(cb => {
                    if (cb !== this) {
                        cb.checked = false; // Uncheck other checkboxes when one is checked
                    }
                });

                // Show/hide the button based on couponCheckbox being checked
                generateCodeBtn.style.display = couponCheckbox.checked ? 'inline-block' : 'none';
            });
        });


        function generateCode(event) {
            event.preventDefault(); 
            const type = document.getElementById('type');
            const category = document.getElementById('category');
            const percentage = document.getElementById('percentage');
            const copoun = document.getElementById('copoun'); // Reference to the element for displaying code
            
            const selectedType = type.value;
            const selectedCategory = category.value;
            const selectedPercentage = percentage.value;

            if (selectedCategory !== "" && selectedPercentage !== "") {
                const generatedCode = selectedCategory + selectedPercentage;
                copoun.textContent = "Generated Code: " + generatedCode; // Display the generated code next to the button
            } else {
                copoun.textContent = "Please select a category and provide a percentage.";
            }
            this.preventDefault();
        }
        // Button click event listener
        generateCodeBtn.addEventListener('click', generateCode);










        </script>
       

        <!-- plugins:js -->
        <script src="template/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="template/vendors/chart.js/Chart.min.js"></script>
        <script src="template/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="template/js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="template/js/off-canvas.js"></script>
        <script src="template/js/hoverable-collapse.js"></script>
        <script src="public/js/dashboard/dashboard.js"></script>

        <script src="template/js/settings.js"></script>
        <script src="template/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="template/js/dashboard.js"></script>
        <script src="template/js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
        <script src="template/js/file-upload.js"></script>
        <script src="template/js/typeahead.js"></script>
        <script src="template/js/select2.js"></script>

        <script src = "public/js/dashboard/imagePreview.js"></script>
</body>

</html>