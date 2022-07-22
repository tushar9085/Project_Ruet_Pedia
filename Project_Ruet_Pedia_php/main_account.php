<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
	header("location:login.php");
	exit;
}
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

<div class="container">

	<?php
	include("php_files/main_acc_card.php");
	?>

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
<script src="assets/readmore_assets/js/main.js"></script>
</body>

</html>