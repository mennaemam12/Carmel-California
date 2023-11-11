<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Carmel Admin</title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="../../vendors/feather/feather.css">
   <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
   <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="/template/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="/template/css/vertical-layout-light/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../..//template/images/favicon.png" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo_mini.jpg" />
  
</head>
<body>
   
     <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #DFE0DA;">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">
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
              <li class="nav-item"> <a class="nav-link" href="pages/forms/addItem.html">Add Menu</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/forms/menuCRUD.html">Edit Menu</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Reports</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Order Tracks</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table4.html">Drivers Status</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
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
              <li class="nav-item"> <a class="nav-link" href="/template/pages/forms/employee.html"> Employees </a></li>
              <li class="nav-item"> <a class="nav-link" href="/template/pages/forms/customer.html"> Customers </a></li>
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
              <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table2.html">Customer's Points</a></li>
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
          <a class="nav-link" href="pages/tables/basic-table3.html">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Reviews</span>
          </a>
        </li>
      </ul>
    </nav>
      <div style="background-color: #DFE0DA; width: 100vw; height: 100vh;">
    
    <div class="containerx">

        <header>

            <div class="filterEntries">
                <div class="entries" >
                    Show <select name="" id="table_size" style="color: rgb(113, 113, 113);">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> entries
                </div>

                <div class="filter" style="color: black;">
                    <label for="search">Search:</label>
                    <input type="search" name="" id="search" placeholder="Enter name/city/post">
                </div>
            </div>


        </header>


        <table>

            <thead>
                <tr class="heading">
                    <th>ID</th>
                    <th>Picture</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Country</th>
                    <th>Category</th>
                     <!-- <th>Salary</th>
                    <th>Start Date</th>
                    <th>Email</th>
                    <th>Phone</th> -->
                    <th>Action</th> 
                </tr>
            </thead>


            <tbody class="menuInfo">
                <!-- <tr><td class="empty" colspan="11" align="center">No data available in table</td></tr> -->
                
                 <tr>
                     <td>1</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>Pasta</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>Breakfast</td>
                    <!-- <td>$25000</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td> -->
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="/template/images/faces/face1.jpg" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>Front-End Developer</td>
                    <!-- <td>$25000</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td> -->
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>Front-End Developer</td>
                    <!-- <td>$25000</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td> -->
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>Front-End Developer</td>
                    <!-- <td>$25000</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td> -->
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr> 
            </tbody>

        </table>


        <footer>
            <span class="showEntries">Showing 1 to 10 of 50 entries</span>
            <div class="pagination">
                <!-- <button>Prev</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>Next</button> -->
            </div>
        </footer>
    </div>
  </div>


    <!--Popup Form-->

    <div class="dark_bg">

        <div class="popup">
             <header>
                <h2 class="modalTitle">Fill the Form</h2>
                <button class="closeBtn">&times;</button>
             </header>

             <div class="body">
                <form action="#" id="myForm">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="" id="uploadimg" class="picture">
                            <i class="fa-solid fa-plus"></i>
                        </label>
                        <img src="./img/pic1.png" alt="" width="150" height="150" class="img">
                    </div>

                    <div class="inputFieldcontainerx">

                        <div class="nameField">
                            <div class="form_control">
                                <label for="itemName">Item Name:</label>
                                <input type="text" name="" id="itemName" required>
                            </div>

                            <div class="form_control">
                                <label for="price">Price:</label>
                                <input type="number" name="" id="price" required>
                            </div>
                        </div>

                        <div class="ageCityField">
                            <div class="form_control">
                                <label for="country">Country:</label>
                                <input type="text" name="" id="country" required>
                            </div>

                            <div class="form_control">
                                <label for="city">Category:</label>
                                <input type="text" name="" id="category" required>
                            </div>
                        </div>

                      
                    </div>
                </form>
             </div>

             <footer class="popupFooter">
                <button form="myForm" class="submitBtn">Submit</button>
             </footer>
        </div>

    </div>


    <script src="/template/js/app2.js"></script>
</body>
</html>