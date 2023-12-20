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
    <!-- partial:template/partials/_navbar.html -->
    <?php include_once 'views/partials/dashboard/_navbar.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:template/partials/_settings-panel.html -->
        <?php include_once 'views/partials/dashboard/_settings-panel.php'; ?>
        <!-- partial -->
        <!-- partial:template/partials/_sidebar.html -->
        <?php include_once 'views/partials/dashboard/_sidebar.php'; ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" style="background-color: #DFE0DA;">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Orders Status</h4>
                                <p class="card-description">
                                    Recent Orders
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>No Of Orders</th>
                                            <th>Birthday</th>
                                            <th>Points</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>10</td>
                                            <td>12 May 2017</td>
                                            <td><label class="badge badge-danger">50</label></td>
                                        </tr>
                                        <tr>
                                            <td>Messsy</td>
                                            <td>20</td>
                                            <td>15 May 2017</td>
                                            <td><label class="badge badge-warning">70</label></td>
                                        </tr>
                                        <tr>
                                            <td>John</td>
                                            <td>34</td>
                                            <td>14 May 2017</td>
                                            <td><label class="badge badge-info">200</label></td>
                                        </tr>
                                        <tr>
                                            <td>Peter</td>
                                            <td>100</td>
                                            <td>16 May 2017</td>
                                            <td><label class="badge badge-success">1000</label></td>
                                        </tr>
                                        <tr>
                                            <td>Dave</td>
                                            <td>20</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-warning">70</label></td>
                                        </tr>
                                        <tr>
                                            <td>Erik</td>
                                            <td>100</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-success">100</label></td>
                                        </tr>
                                        <tr>
                                            <td>Dave</td>
                                            <td>10</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-danger">50</label></td>
                                        </tr>
                                        <tr>
                                            <td>John</td>
                                            <td>77</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-success">800</label></td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>101</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-success">1200</label></td>
                                        </tr>
                                        <tr>
                                            <td>Dan</td>
                                            <td>55</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-danger">71</label></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- content-wrapper ends -->
                    <!-- partial:template/partials/_footer.html -->
                    <?php include_once 'views/partials/dashboard/_footer.php'; ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
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
        <script src="template/js/template.js"></script>
        <script src="template/js/settings.js"></script>
        <script src="template/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
</body>

</html>
