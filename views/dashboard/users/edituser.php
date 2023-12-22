<?php

require_once 'helpers/session.helper.php';
require_once 'models/Item.php';

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
                                <h4 class="card-title">Edit User </h4>
                                <p class="card-description">
                                    Edit User Type
                                </p>
                                <form class="forms-sample" method="post" action="dashboard/users?action=edituser"
                                      enctype='multipart/form-data'>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Full Name</label>
                                        <input disabled type="text" class="form-control" name="fullname" placeholder="Full Name"
                                               value='<?php echo $user->getFullName(); ?>'>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">User Email</label>
                                        <input disabled type="text" class="form-control" name="email"
                                               placeholder="Email" <?php
                                        echo 'value=' . $user->getEmail();
                                        ?>>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Phone Number</label>
                                        <input disabled type="text" class="form-control" name="phone"
                                               placeholder="Phone Number" <?php
                                        echo 'value=' . $user->getPhone();
                                        ?>>
                                    </div>

                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" id="usertype" name="usertype">
                                            <?php foreach ($userTypes as $usertype) {
                                                echo "<option ";
                                                if ($user->getType()->getID() == $usertype->id) {
                                                    echo "selected";
                                                }
                                                echo " value='" . $usertype->id . "'>" . $usertype->name . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name='id' value=<?php echo $user->getID() ?>>
                                    <div class="form-message-div">
                                        <?php flash('formError') ?>
                                    </div>
                                    <div class="form-message-div">
                                        <?php flash('formSuccess') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2" value="Upload File">Edit
                                    </button>
                                    <a href="dashboard/users" class="btn btn-light">Cancel</a>
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

    <!-- plugins:js -->
    <script src="template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->

    <!-- End plugin js for this page -->
    <!-- inject:js -->
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