<?php
session_start();
?>

<?php include("php_files/navbar_main_acc.php") ?>

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