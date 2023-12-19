<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Carmel Dashboard</title>

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
<?php include_once 'views/partials/dashboard/_navbar.php'; ?>
     <!-- partial:partials/_sidebar.html -->
     <?php include_once 'views/partials/dashboard/_sidebar.php'; ?>
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

             <?php include_once 'views/partials/dashboard/_footer.php'; ?>
        </div>

    </div>


    <script src="template/js/app2.js"></script>
</body>
</html>