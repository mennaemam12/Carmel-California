<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../public/css/admin/styleAdmin.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include_once './partials/dashboard/_navbar.php'; ?>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include_once './partials/dashboard/_settings-panel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include_once './partials/dashboard/_sidebar.php'; ?>

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
        <!-- partial:../../partials/_footer.html -->
        <?php include_once './partials/dashboard/_footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
