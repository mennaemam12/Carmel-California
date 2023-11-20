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
 <link rel="stylesheet" href="../template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
 <link rel="stylesheet" href="../templatevendors/ti-icons/css/themify-icons.css">
 <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
 <link rel="stylesheet" href="../public/css/admin/styleAdmin.css">
 <link rel="stylesheet" href="../public/css/admin/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- endinject -->
 <!-- Plugin css for this page -->
 <link rel="stylesheet" href="../template/vendors/select2/select2.min.css">
 <link rel="stylesheet" href="../template/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
 <!-- End plugin css for this page -->
 <!-- inject:css -->
 <link rel="stylesheet" href="../public/css/admin/styleAdmin.css">
 <!-- endinject -->
 <link rel="shortcut icon" href="../public/images/favicon.png" />
 <!-- End plugin css for this page -->
 <!-- inject:css -->

 <!-- endinject -->
 <link rel="shortcut icon" href="images/logo_mini.jpg" />
  
</head>
<body>
<?php include_once './partials/dashboard/_navbar.php'; ?>
<?php include_once './partials/dashboard/_sidebar.php'; ?>
      
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

                <div class="filter">
                    <label for="search">Search:</label>
                    <input type="search" name="" id="search" placeholder="Enter name/city/post">
                </div>
            </div>

            <div class="addMemberBtn">
                <button>New member</button>
            </div>

        </header>


        <table style="max-width: 1250px;min-width: 1280px">

            <thead>
                <tr class="heading">
                    <th>SL No</th>
                    <th>Picture</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Order Numbers</th>
                    <th>Points</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody class="customerInfo">
                <!-- <tr><td class="empty" colspan="11" align="center">No data available in table</td></tr> -->
                <tr>
                    <!-- <td>1</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>20</td>
                    <td>250</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td>
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td> -->
                </tr>
                <tr>
                    <!-- <td>1</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>100</td>
                    <td>600</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td> -->
                    <!-- <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td> -->
                </tr>
                <tr>
                    <!-- <td>1</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>70</td>
                    <td>96</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td>
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td> -->
                </tr>
                <tr>
                    <!-- <td>1</td>
                    <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>New York</td>
                    <td>50</td>
                    <td>50</td>
                    <td>03-08-2010</td>
                    <td>jhondoe.net111@gmail.com</td>
                    <td>924157812</td>
                    <td>
                        <button><i class="fa-regular fa-eye"></i></button>
                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                        <button><i class="fa-regular fa-trash-can"></i></button>
                    </td> -->
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
                                <label for="fName">First Name:</label>
                                <input type="text" name="" id="fName" required>
                            </div>

                            <div class="form_control">
                                <label for="lName">Last Name:</label>
                                <input type="text" name="" id="lName" required>
                            </div>
                        </div>

                        <div class="ageCityField">
                            <div class="form_control">
                                <label for="age">Age:</label>
                                <input type="number" name="" id="age" required>
                            </div>

                            <div class="form_control">
                                <label for="city">City:</label>
                                <input type="text" name="" id="city" required>
                            </div>
                        </div>

                        <div class="postSalary">
                            <div class="form_control">
                                <label for="orderNumbers">Order Numbers:</label>
                                <input type="number" name="" id="orderNumbers" required>
                            </div>

                            <div class="form_control">
                                <label for="points">Points:</label>
                                <input type="number" name="" id="points" required>
                            </div>
                        </div>

                        <div class="form_control">
                            <label for="birthday">Birthday:</label>
                            <input type="date" name="" id="birthday" required>
                        </div>

                        <div class="form_control">
                            <label for="email">Email:</label>
                            <input type="email" name="" id="email" required>
                        </div>

                        <div class="form_control">
                            <label for="phone">Phone:</label>
                            <input type="number" name="" id="phone" required>
                        </div>
                    </div>
                </form>
             </div>

             <footer class="popupFooter">
                <button form="myForm" class="submitBtn">Submit</button>
             </footer>
        </div>

    </div>


    <script src="../template/js/app1.js"></script>
</body>
</html>