<?php

require_once 'helpers/session.helper.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carmel Dashboard</title>

    <base href="/">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="shortcut icon" href="template/images/favicon.png"/>
</head>

<body>
<div class="container-scroller">

    <!-- Navbar -->
    <?php include_once 'views/partials/dashboard/_navbar.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->

        <!-- Sidebar -->
        <?php include_once 'views/partials/dashboard/_sidebar.php'; ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" style="background-color: #DFE0DA;">
                <div class="row">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Discount </h4>
                                <form class="forms-sample" method="post" action="dashboard/discount?action=edit"
                                      enctype='multipart/form-data'>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Discount</label>
                                        <input type="text" class="form-control" id="coupon" name="coupon"
                                               placeholder="Discount" <?php
                                        echo 'value=' . $discount->getCoupon();
                                        ?>>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Type</label>
                                        <select class="form-control" id="type" name="type"
                                                onchange="enablecategory();handleDropdownChange(this.value);">
                                            <option value="">Select an option</option>
                                            <option value="breakfast" <?php echo $discount->getType() == 'breakfast' ? 'selected' : ''; ?>
                                            >breakfast
                                            </option>
                                            <option value="main" <?php echo $discount->getType() == 'main' ? 'selected' : ''; ?>
                                            >main
                                            </option>
                                            <option value="drinks" <?php echo $discount->getType() == 'drinks' ? 'selected' : ''; ?>
                                            >drinks
                                            </option>
                                            <option value="desserts" <?php echo $discount->getType() == 'desserts' ? 'selected' : ''; ?>
                                            >desserts
                                            </option>
                                            <option value="sides" <?php echo $discount->getType() == 'sides' ? 'selected' : ''; ?>
                                            >sides
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Category</label>
                                        <select class="form-control" id="category" name="category" disabled>
                                            <option value="">Select A Type First</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $discount->getStartDate(); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>

                                    <div class="form-message-div">
                                        <?php flash('formError') ?>
                                    </div>
                                    <div class="form-message-div">
                                        <?php flash('formSuccess') ?>
                                    </div>
                                    <input type="hidden" name='id' value=<?php echo $_GET['id']; ?>>
                                    <button type="submit" class="btn btn-primary mr-2" value="Upload File">Submit
                                    </button>
                                    <a href="dashboard/discount" class="btn btn-light">Cancel</a>
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
    </div>

    <script>
        function enablecategory() {

            let type = document.getElementById("type");
            let category = document.getElementById("category");

            if (type.value !== "") {
                category.disabled = false;
            } else {
                category.disabled = true;
                category.selectedIndex = 0;
            }
        }

        enablecategory();
        let type = document.getElementById('type');
        var event = new Event('change');
        type.dispatchEvent(event);

        function handleDropdownChange(selectedValue) {
            const category = document.getElementById('category');

            // Clear existing options before adding new ones
            category.innerHTML = '';

            // AJAX call to fetch.php if the selectedValue is not zero
            if (selectedValue !== "0") {
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
    </script>
    <script src="template/vendors/js/vendor.bundle.base.js"></script>
    <script src="template/js/off-canvas.js"></script>
    <script src="template/js/hoverable-collapse.js"></script>
    <script src="public/js/dashboard/dashboard.js"></script>

    <script src="template/js/settings.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="template/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="template/js/file-upload.js"></script>
    <script src="template/js/typeahead.js"></script>
    <script src="template/js/select2.js"></script>

    <script src="public/js/dashboard/imagePreview.js"></script>
</body>

</html>