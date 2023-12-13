<?php
@session_start();
include 'projectFolderName.php';
require_once 'helpers/session.helper.php';
require_once 'models/Item.php';
$rows = Item::getAllItems();
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
                                <div class="viewItemsContainer">
                                    <div class="filterEntries">
                                        <div class="entries">
                                            Show <select name="" id="table_size" style="color: rgb(113, 113, 113);">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries
                                        </div>

                                        <div class="filter" style="color: black;">
                                            <label for="search" id="searchLabel">Search:</label>
                                            <input type="search" name="" id="search" placeholder="Enter product name">
                                        </div>
                                    </div>

                                    <table>
                                        <thead>
                                            <tr class="heading">
                                                <th></th>
                                                <th>ID</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>

                                        <tbody class="menuInfo">

                                            <?php

                                            for ($i = 0; $i < count($rows); $i++) {
                                                echo "<tr><td><img src='" . $rows[$i]->ImagePath . "' alt='' width='40' height='40'> </td>";
                                                echo "<td>" . $rows[$i]->id . "</td>";
                                                echo "<td>" . $rows[$i]->Name . "</td>";
                                                echo "<td>" . $rows[$i]->Price . "</td>";
                                                echo "<td>" . $rows[$i]->Category . "</td>";
                                                echo "<td>" . $rows[$i]->itemType . "</td>";
                                                echo "<td>
                                                    <a class='itemOptions' href='product?type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id . "'><i class='fa-regular fa-eye'></i></a>
                                                    <a class='itemOptions' href='dashboard/menu?action=edititem&type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id . "'>
                                                        <i class='fa-regular fa-pen-to-square'></i>
                                                    </a>";
                                                echo "<a class='itemOptions' onclick='deleteItem(\"".$rows[$i]->itemType."\", \"".$rows[$i]->id."\")'><i class='fa-regular fa-trash-can'></i></a>
                                                    </td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div class="tableFooter">
                                        <span class="showEntries">Showing 1 to 10 of 50 entries</span>
                                        <div class="pagination">
                                            <button>Prev</button>
                                            <button class="active">1</button>
                                            <button>2</button>
                                            <button>3</button>
                                            <button>4</button>
                                            <button>5</button>
                                            <button>Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-message-div">
                                            <?php flash('formError') ?>
                                        </div>
                                        <div class="form-message-div">
                                            <?php flash('formSuccess') ?>
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
        <script src="public/js/dashboard/itemFunctions.js"></script>

</body>

</html>