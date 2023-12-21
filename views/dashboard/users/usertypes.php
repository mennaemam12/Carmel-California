<?php
include 'projectFolderName.php';
require_once 'helpers/session.helper.php';
require_once 'models/User.php';
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
                <a href="dashboard/users?action=addtype" class="btn btn-primary mb-4">Add User Type</a>
                <div class="row">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">

                            <div class="viewItemsContainer">
                                <table>
                                    <thead>
                                    <tr class="heading">
                                        <th>ID</th>
                                        <th>Usertype Name</th>
                                    </tr>
                                    </thead>

                                    <tbody class="menuInfo">

                                    <?php

                                    foreach ($userTypes as $userType) {
                                        echo "<td>" . $userType->id . "</td>";
                                        echo "<td>" . $userType->name . "</td>";
                                        echo "<td>
                                            <a class='itemOptions' href='dashboard/users?action=edittype&id={$userType->id}'>
                                                <i class='fa-regular fa-pen-to-square'></i>
                                            </a>
                                            <a class='itemOptions' onclick='deleteUserType({$userType->id})'>
                                                <i class='fa-regular fa-trash-can'></i>
                                            </a>
                                            </td></tr>";

                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="form-message-div">
                        <?php flash('formError') ?>
                    </div>
                    <div class="form-message-div">
                        <?php flash('formSuccess') ?>
                    </div>
                    <?php
                    include 'views/partials/dashboard/_footer.php'
                    ?>
                </div>
            </div>
            <!-- page-body-wrapper ends -->
        </div>
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
        <script src="public/js/dashboard/dashboard.js"></script>
        <script src="public/js/dashboard/usertypeFunctions.js"></script>
</body>

</html>