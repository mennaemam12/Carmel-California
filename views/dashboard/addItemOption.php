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
                                    <h4 class="card-title">Add Option </h4>
                                    <p class="card-description">
                                        Add Product Option To Menu
                                    </p>
                                    <form class="forms-sample" method="post" action="dashboard/addoption" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label for="itemtype">Type</label>
                                            <select class="form-control" id="itemtype" name="itemtype">
                                            <option value="" selected disabled hidden>Choose Type</option>
                                                <option value="breakfast">Breakfast</option>
                                                <option value="main">Main</option>
                                                <option value="drinks">Drinks</option>
                                                <option value="desserts">Desserts</option>
                                                <option value="sides">Sides</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" id="category" name="category" disabled>
                                                <option value="" selected disabled hidden>Choose Category</option>
                                            </select>
                                        </div>
            
                                        <div class="form-group">
                                            <label>Product Image </label>
                                            <div id = "image-preview" class = "image-preview"></div>
                                            <input type="file" name="file" id="file" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" onchange="previewImage();">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="descriptions">Description</label>
                                            <textarea class="form-control" id="descriptions" name="descriptions" rows="4"></textarea>
                                        </div>
                                        <div class="form-message-div">
                                            <?php flash('formError') ?>
                                        </div>
                                        <div class="form-message-div">
                                            <?php flash('formSuccess') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2" value="Upload File">Submit</button>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- container-scroller -->
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
        <script src="public/js/dashboard/retrieveCategory_AJAX.js"></script>
</body>

</html>