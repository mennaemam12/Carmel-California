<?php
include 'helpers/session.helper.php';
include 'projectFolderName.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Item</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="public/css/login.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="public/images/reg.jpg" style="object-fit: fill;max-height: 780px;"alt="">
				</div>
				
				<form action="<?php echo $projectFolder;?>/itemadd" method="post">
					<h3>Add Item</h3>
					<input type="hidden" name="type" value="add">
					<div class="form-holder active">
						<input type="text" placeholder="Item Name" name="ItemName" class="form-control">
					</div>
					<div class="form-holder">
						<input type="text" placeholder="Price" name="Price" class="form-control">
					</div>
					<div class="form-holder">
						<input type="text" placeholder="Category" name="Category" class="form-control">
					</div>
                    <div class="form-holder">
						<input type="text" placeholder="Description" name="Descriptions" class="form-control">
					</div>
					<div class="checkbox">
						<label>
							<span class="checkmark"></span>
						</label>
					</div>
					<div>
						<?php // flash('itemadd') ?>
					</div>
					<div class="form-login" style="margin-top: 10%;">
					<div class="form-login">
						<button class="button" type="submit" name="Submit">Add</button>
					</div>
				</form>
			</div>
		</div>

		<script src="public/js/jquery.js"></script>
		<script src="public/js/reg.js"></script>
	</body>
</html>