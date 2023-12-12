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

    <base href="<?php echo $projectFolder; ?>/">
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
                                <h4 class="card-title">Add User Type </h4>
                                <p class="card-description"></p>
                                <form class="forms-sample" method="post" action="dashboard/users?action=addtype"
                                      enctype='multipart/form-data'>
                                    <div class="form-group">
                                        <label for="usertype-name">Name</label>
                                        <input type="text" class="form-control" id="usertype-name" name="usertype-name"
                                               required>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                    <div class="permissions">
                                        <div class="form-group">
                                            <label for="permissions">All Permissions</label>
                                            <select multiple class="form-control"
                                                    id="permissions" name="permissions">
                                                <?php for ($i = 8; $i < count($permissions); $i++) {
                                                    echo "<option value='" . $permissions[$i]->getID() . "'>" . $permissions[$i]->getDescription() . "</option>";
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="selectedPermissions">Selected Permissions</label>
                                            <select multiple class="form-control"
                                                    id="selectedPermissions" name="selectedPermissions">
                                                <?php for ($i = 0; $i < 8; $i++) {
                                                    echo "<option value='" . $permissions[$i]->getID() . "'>" . $permissions[$i]->getDescription() . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function () {
                                            // Handle double click on an option in the "All Permissions" select
                                            $('#permissions').on('click', 'option', function () {
                                                // Move the selected option to the "Selected Permissions" select
                                                $('#selectedPermissions').append($(this));
                                            });

                                            // Handle double click on an option in the "Selected Permissions" select
                                            $('#selectedPermissions').on('click', 'option', function () {
                                                // Move the selected option back to the "All Permissions" select
                                                $('#permissions').append($(this));
                                            });
                                        });
                                    </script>
                                    <div class="form-message-div">
                                        <?php flash('formError') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Add</button>
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
    <script src="public/js/dashboard/retrieveCategory-AJAX.js"></script>
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

    <script src="public/js/dashboard/imagePreview.js"></script>
</body>

</html>