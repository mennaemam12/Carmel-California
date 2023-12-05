<?php
@session_start();
include 'projectFolderName.php';
require_once 'helpers/session.helper.php';
require_once 'models/User.php';
$user =new  User;
$rows=$user->getalluser();
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
<?php include_once 'views/partials/dashboard/_navbar.php'; ?>
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
                <?php
for ($i = 0; $i < count($rows); $i++) {
    echo "<td>" . $rows[$i]->id . "</td>";
    echo "<td>" . $rows[$i]->FullName . "</td>";
    echo "<td>" . $rows[$i]->Email . "</td>";
    echo "<td>" . $rows[$i]->PhoneNumber . "</td>";
    echo "<td>" . $rows[$i]->Usertype . "</td>";
    echo "<td>
        <a class='itemOptions' href=''>
            <i class='fa-regular fa-pen-to-square'></i>
        </a>
        <a class='itemOptions' href=''><i class='fa-regular fa-trash-can'></i>
        </a>
        </td></tr>";
}
?>
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


       
    </div>
  </div>


    <!--Popup Form-->

    <div class="dark_bg">
             <?php include_once 'views/partials/dashboard/_footer.php'; ?>
    </div>



</body>
</html>