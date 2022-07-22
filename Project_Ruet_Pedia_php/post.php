<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/index_assets/img/logo.ico">
	<title>Ruet Pedia</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/index_assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="assets/index_assets/css/mediumish.css" rel="stylesheet">

	<link rel="stylesheet" href="assets\dropdown_assets/fonts/icomoon/style.css">

	<link rel="stylesheet" href="assets\dropdown_assets/css/owl.carousel.min.css">

	<link rel="stylesheet" href="assets\dropdown_assets/css/style.css">
	<link rel="stylesheet" href="assets/main_acc_assets/css/style.css">
	<link rel="stylesheet" href="assets/post_assets/css/style.css">

	<link rel="stylesheet" href="assets/alerts/css/style.css">


</head>

<body>

	<!-- Popup Alert -->
	<?php
	if (isset($_SESSION['status'])) {
	?>

		<div class="alert alert-success" role="alert" id="popup-alert" style="display: block;">

			<div class="alert-items" style="display: flex;justify-content: space-between;">
				<div class="popup-message">
					<?php echo $_SESSION['status']; ?>
				</div>

				<div class="close-button">
					<button class="close-button" onclick="myFunction()">x</button>
				</div>

			</div>


		</div>


	<?php
		unset($_SESSION['status']);
	}
	?>
	<!-- Popup Alert -->

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	//creating connection
	$conn = mysqli_connect($servername, $username, $password, "ruet_pedia");

	if (!$conn) {
		die("connection error" . mysqli_connect_error());
	}

	?>

	<?php

	if (isset($_POST['upload'])) {

		$story_catagory_id = $_POST['story_section'];
		$user_id = $_SESSION['user_id'];
		$post_title = $_POST['post_title'];
		$post_content = $_POST['post_content'];
		$img_name = $_FILES['post_image']['name'];
		$likes = 0;
		$comments = 0;
		//Extracting image extension
		$image_extension = pathinfo($img_name, PATHINFO_EXTENSION);
		//changing the image name unique
		$post_image = 'image_' . date("mjYHis") . '.' . $image_extension;
		//moving the image into folder
		move_uploaded_file($_FILES['post_image']['tmp_name'], 'images/' . $post_image);

		$post_query = "INSERT INTO `post` (`story_catagory_id`,`user_id`,`post_title`,`post_content`,`post_image`,`likes`,`comments`) VALUES ('$story_catagory_id','$user_id','$post_title','$post_content','$post_image','$likes','$comments');";

		$post_query_result = mysqli_query($conn, $post_query);



		if ($post_query_result) {
			$_SESSION['status'] = "Your Post Uploaded Successfully!";
			header("location:post.php");
		} else {
			$_SESSION['status'] = "Something Went Wrong!";
			header("location:post.php");
		}
	}

	?>




	<!-- Begin Nav
================================================== -->
	<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<!-- Begin Logo -->
			<a class="navbar-brand" href="index.php">
				<img src="assets/index_assets/img/logo.png" alt="logo">
			</a>
			<!-- End Logo -->


			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<!-- Begin Menu -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="main_account.php">All Stories</a>
					</li>

					<li class="nav-item" class="dropbtn">
						<div class="dropdown custom-dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link align-items-center dropdown-link " data-offset="-70, 20">
								Stories
								<span class="arrow icon-keyboard_arrow_down"></span>
							</a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Academic Stories</a>
								<a class="dropdown-item" href="#">Departmental Stories</a>
								<a class="dropdown-item" href="#">Hall Stories</a>
								<a class="dropdown-item" href="#">Club Stories</a>
								<a class="dropdown-item" href="#">Sport Stories</a>
								<a class="dropdown-item" href="#">Memes</a>
								<a class="dropdown-item" href="#">Others</a>
							</div>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="post.php">Post</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="my_post.php">My Post</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Log Out</a>
					</li>

				</ul>



				<!-- End Menu -->
				<!-- Begin Search -->
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search">
					<span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
							<path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z">
							</path>
						</svg></span>
				</form>
				<!-- End Search -->
			</div>
		</div>
	</nav>
	<!-- End Nav
================================================== -->
	<div class="container">

		<div class="create-post">
			<div class="header-for-post">
				<h3>Create Post</h3>
			</div>
			<form action="post.php" method="post" enctype="multipart/form-data">
				<div class="textarea-post-title">
					<input type="text" name="post_title" placeholder="Title" style="width: 50%;padding: 5px;border: none;border-radius: 5px;">
				</div>
				<div class="textarea-post">
					<textarea name="post_content" placeholder="What's on your mind?"></textarea>
				</div>
				<div class="add-image-post">
					<label>Select Image File:</label>
					<input type="file" name="post_image" id="post_image">
				</div>

				<?php
				include("php_files/create_post_story_catagory.php");
				?>

				<div class="post-button">
					<button name="upload">Upload</button>
				</div>
			</form>
		</div>






		<!-- Begin Footer
		 ================================================== -->
		<div class="footer">
			<p class="pull-left">
				Copyright &copy; 2022 Ruet Pedia
			</p>
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- End Footer
	 ================================================== -->
	<!-- /.container -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/index_assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="assets/index_assets/js/bootstrap.min.js"></script>
	<script src="assets/index_assets/js/ie10-viewport-bug-workaround.js"></script>


	<script src="assets\dropdown_assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets\dropdown_assets/js/popper.min.js"></script>
	<script src="assets\dropdown_assets/js/bootstrap.min.js"></script>
	<script src="assets\dropdown_assets/js/owl.carousel.min.js"></script>
	<script src="assets\dropdown_assets/js/main.js"></script>

	<script src="assets/alerts/js/main.js"></script>
</body>

</html>