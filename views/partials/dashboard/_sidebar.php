<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Carmel Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="./template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="./template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./public/css/admin/styleAdmin.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./public/images/dashboard/logo_mini.jpg" />
  
</head>
<body>
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #DFE0DA;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-map menu-icon"></i>
        <span class="menu-title">Menu</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">View Menu</a></li> -->
          <li class="nav-item"> <a class="nav-link" href="./addItem.php">Add Menu</a></li>
          <li class="nav-item"> <a class="nav-link" href="./menuCRUD.php">Edit Menu</a></li>
          <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Delete Menu</a></li> -->
        </ul>
      </div>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-search menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Add Product</a></li>
          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Edit Product</a></li>
          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Delete Product</a></li>
        </ul>
      </div>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Analytics</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./chartjs.php">Reports</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Orders</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./orderTracks.php">Order Tracks</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="icon-bell menu-icon"></i>
        <span class="menu-title">Drivers</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./drivers.php">Drivers Status</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-server menu-icon"></i>
        <span class="menu-title">Authorization</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./loginAdmin.php"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="./register.php"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./employee.php"> Employees </a></li>
          <li class="nav-item"> <a class="nav-link" href="./customer.php"> Customers </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-heart menu-icon"></i>
        <span class="menu-title">Points</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./points.php">Customer's Points</a></li>
        </ul>
      </div>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <i class="icon-delete menu-icon"></i>
        <span class="menu-title">Promotions</span>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="./reviews.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Reviews</span>
      </a>
    </li>
  </ul>
</nav>
  
</body>
</html>