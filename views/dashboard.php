<?php
@session_start();
include 'projectFolderName.php';
include 'helpers/session.helper.php';

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$lastSegment = strtolower($segments[count($segments) - 1]);

$currentPage = $lastSegment;

// switch ($lastSegment) {
//   case 'dashboard':
//     $currentPage = 'dashboard';
//     break;
//   case 'additem':
//     $currentPage = 'additem';
//     break;
//   case 'viewitems':
//     $currentPage = 'viewitems';
//     break;
//   case 'edititem':
//     $currentPage = 'edititem';
//     break;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Carmel Dashboard</title>
  <base href="<?php echo $projectFolder ?>/" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/vendors/feather/feather.css">
  <link rel="stylesheet" href="template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="template/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="template/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="template/css/vertical-layout-light/styles.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- endinject -->
  <link rel="shortcut icon" href="template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    <!-- Navigation Bar -->
      <?php 
        include 'views/partials/dashboard/dashboardNav.php'
      ?>

    <!-- Sidebar -->
      <?php
      include 'views/partials/dashboard/sidebar.php';
      ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="background-color: #DFE0DA;">
          <div class="row">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <?php
                switch ($currentPage) {
                  case 'additem':
                    include 'views/partials/dashboard/addItemForm.php';
                    break;
                  case 'edititem':
                    include 'views/partials/dashboard/editItemForm.php';
                    break;
                  case 'viewitems':
                    include 'views/partials/dashboard/viewMenuTable.php';
                    break;
                }

                  
                ?>
              </div>
            </div>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    </div>
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="template/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="template/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="public/js/dashboard/dashboard.js"></script>
  <script src="template/js/settings.js"></script>
  <script src="template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="template/js/file-upload.js"></script>
  <script src="template/js/typeahead.js"></script>
  <script src="template/js/select2.js"></script>

  <!-- End custom js for this page-->
</body>

</html>