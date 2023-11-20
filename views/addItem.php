<?php
$con = mysqli_connect("localhost:3307", "root", "","carmel");
if(isset($_POST['submit'])){

	$Name=$_POST['Name'];
	$Price=$_POST['Price'];
  $Description=$_POST['Description'];
  $Category=$_POST['Category'];
   
	
	$sql="insert into menuitems(Name,Price,Description,Category) values ('$Name','$Price','$Description','$Category')";
		if(mysqli_query($GLOBALS['con'],$sql)){
            header("Location:/carmelCal/template/index.php");
        }
		
		
	
}
?>

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
</head>>

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
      <!-- partial:partials/_sidebar.html -->
<!-- partial:partials/_sidebar.html -->
    <?php include_once './partials/dashboard/_sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper"style="background-color: #DFE0DA;">
          <div class="row">
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Item </h4>
                  <p class="card-description">
                    Add Product To Menu
                  </p>
                  <form class="forms-sample" method="post" action="">
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" name="Name" class="form-control" id="exampleInputName1" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Product Price</label>
                      <input type="number" name="Price" class="form-control" id="exampleInputEmail3" placeholder="Product Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Description</label>
                      <input type="text" name="Description" class="form-control" id="exampleInputPassword4" placeholder="Product Ingredients">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="Category" id="exampleSelectGender">
                          <option>Breakfast</option>
                          <option>Meals</option>
                          <option >Drinks</option>
                        </select>
                      </div>
                    <!-- <div class="form-group">
                      <label>Product Image </label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div> -->
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
           
        </footer>
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
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
