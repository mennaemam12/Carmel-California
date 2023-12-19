<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #DFE0DA;">
  <ul class="nav">
    <li class="nav-item" id="sidebar-dashboard">
      <a class="nav-link" href="dashboard">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item" id="sidebar-menu">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-map menu-icon"></i>
        <span class="menu-title">Menu</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="dashboard/menu?action=additem">Add Menu Item</a></li>
          <li class="nav-item"> <a class="nav-link" href="dashboard/menu">View/ Edit Menu</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Analytics</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="dashboard/chartjs">Reports</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="dashboard/orderTracks">Order Tracks</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="dashboard/drivers">Drivers Status</a></li>
        </ul>
      </div>
    </li>
    <!-- discounts -->
    <li class="nav-item" id = "sidebar-discount" >
      <a class="nav-link" data-toggle="collapse" href="#dis" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-delete menu-icon"></i>
        <span class="menu-title">Discounts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="dis">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="dashboard/discount?action=add">Add Discount</a></li>
          <li class="nav-item"> <a class="nav-link" href="dashboard/discount">View Discounts</a></li>
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
          <li class="nav-item"> <a class="nav-link" href="dashboard/loginAdmin"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="dashboard/registerAdmin"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id = "sidebar-users">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="dashboard/users"> View/Edit Users </a></li>
          <li class="nav-item"> <a class="nav-link" href="dashboard/users?action=viewusertypes"> User Types </a></li>
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
          <li class="nav-item"> <a class="nav-link" href="dashboard/points">Customer's Points</a></li>
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
      <a class="nav-link" href="dashboard/reviews">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Reviews</span>
      </a>
    </li>
  </ul>
</nav>