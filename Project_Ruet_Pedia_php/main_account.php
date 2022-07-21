<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
	header("location:login.php");
	exit;
}
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
						<a class="nav-link" href="my_post.html">My Post</a>
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

		<div class="instagram-card">
			<div class="instagram-card-header">
				<img src="assets/index_assets/img/demopic/4.jpg" class="instagram-card-user-image" />
				<a class="instagram-card-user-name" href="https://www.instagram.com/followmeto/">User</a>

			</div>

			<div class="intagram-card-image">
				<img class="img-insta-card" src="assets/index_assets/img/demopic/3.jpg">
			</div>

			<div class="instagram-card-content">
				<p class="likes">Likes</p>
				<p><a class="instagram-card-content-user" href="https://www.instagram.com/followmeto/">followmeto</a> So
					excited to have made it to Lapland! Our first stop was sleeping inside a room made entirely of ice
					at
					the Kemi Snow Hotel 😱 Stoked that I've ticked this off my bucket list and never have to do it
					again...
					Let's just say the novelty of sleeping in -5 degrees temperature quickly wears off (but hey, it was
					a
					COOL experience nonetheless) 😜❄️ <a class="hashtag" href="https://www.instagram.com/explore/tags/visitkemi/">#visitkemi</a></p>
				<p class="comments">Comments</p>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">sanguine.j@loaf_made</a>
				wowwwwww</br>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">spainstakeoverWow</a> 😍</br>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">edieandottotravelsSo</a> cool
				❄️</br>
				<hr>
			</div>

			<div class="instagram-card-footer">
				<a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
				<input class="comments-input" type="text" placeholder="Add Comment" />
				<a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
			</div>

		</div>

		<div class="instagram-card">
			<div class="instagram-card-header">
				<img src="assets/index_assets/img/demopic/1.jpg" class="instagram-card-user-image" />
				<a class="instagram-card-user-name" href="https://www.instagram.com/followmeto/">User</a>

			</div>

			<div class="intagram-card-image">
				<img class="img-insta-card" src="assets/index_assets/img/demopic/6.jpg">
			</div>

			<div class="instagram-card-content">
				<p class="likes">Likes</p>
				<p><a class="instagram-card-content-user" href="https://www.instagram.com/followmeto/">followmeto</a> So
					excited to have made it to Lapland! Our first stop was sleeping inside a room made entirely of ice
					at
					the Kemi Snow Hotel 😱 Stoked that I've ticked this off my bucket list and never have to do it
					again...
					Let's just say the novelty of sleeping in -5 degrees temperature quickly wears off (but hey, it was
					a
					COOL experience nonetheless) 😜❄️ <a class="hashtag" href="https://www.instagram.com/explore/tags/visitkemi/">#visitkemi</a></p>
				<p class="comments">Comments</p>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">sanguine.j@loaf_made</a>
				wowwwwww</br>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">spainstakeoverWow</a> 😍</br>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">edieandottotravelsSo</a> cool
				❄️</br>
				<hr>
			</div>

			<div class="instagram-card-footer">
				<a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
				<input class="comments-input" type="text" placeholder="Add Comment" />
				<a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
			</div>

		</div>

		<div class="instagram-card">
			<div class="instagram-card-header">
				<img src="assets/index_assets/img/demopic/4.jpg" class="instagram-card-user-image" />
				<a class="instagram-card-user-name" href="https://www.instagram.com/followmeto/">User</a>

			</div>

			<div class="intagram-card-image">
				<img class="img-insta-card" src="assets/index_assets/img/demopic/3.jpg">
			</div>

			<div class="instagram-card-content">
				<p class="likes">Likes</p>
				<p><a class="instagram-card-content-user" href="https://www.instagram.com/followmeto/">followmeto</a> So
					excited to have made it to Lapland! Our first stop was sleeping inside a room made entirely of ice
					at
					the Kemi Snow Hotel 😱 Stoked that I've ticked this off my bucket list and never have to do it
					again...
					Let's just say the novelty of sleeping in -5 degrees temperature quickly wears off (but hey, it was
					a
					COOL experience nonetheless) 😜❄️ <a class="hashtag" href="https://www.instagram.com/explore/tags/visitkemi/">#visitkemi</a></p>
				<p class="comments">Comments</p>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">sanguine.j@loaf_made</a>
				wowwwwww</br>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">spainstakeoverWow</a> 😍</br>
				<br><a class="user-comment" href="https://www.instagram.com/anitzakm/">edieandottotravelsSo</a> cool
				❄️</br>
				<hr>
			</div>

			<div class="instagram-card-footer">
				<a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
				<input class="comments-input" type="text" placeholder="Add Comment" />
				<a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
			</div>

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
		<!-- End Footer
	 ================================================== -->

	</div>
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