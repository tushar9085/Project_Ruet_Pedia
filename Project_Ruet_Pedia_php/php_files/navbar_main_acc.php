<?php
include("php_files/database_connection.php");
?>

<?php
$query = "SELECT * FROM story_catagory;";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
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
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/index_assets/css/mediumish.css" rel="stylesheet">

    <link rel="stylesheet" href="assets\dropdown_assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets\dropdown_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets\dropdown_assets/css/style.css">

    <link rel="stylesheet" href="assets/main_acc_assets/css/style.css">
    <link rel="stylesheet" href="assets/alerts/css/style.css">

    <link rel="stylesheet" href="assets/readmore_assets/css/style.css">
    <link rel="stylesheet" href="assets/post_assets/css/style.css">


</head>


<body>


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

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $catagory_name = $row['catagory_name'];
                                    $catagory_id = $row['catagory_id'];
                                ?>

                                    <a class="dropdown-item" href="?cat_id=<?php echo $catagory_id; ?>"><?php echo $catagory_name ?></a>

                                <?php } ?>
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