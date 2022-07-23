<?php
include("php_files/navbar_index.php");
?>

<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle">RUET PEDIA</h1>
        <p class="lead">
            Share Stories About RUET
        </p>
    </div>

    <hr>
    <!-- End Site Title
================================================== -->

    <div id="carouselExample" class="carousel slide" data-ride="carousel">


        <div class="carousel-inner">

            <div class="carousel-item active">

                <img class="d-block w-100" src="assets/carousel_assets/image/academic-story.jpg" alt="First slide">

                <div class="carousel-caption">

                    <h1>Academic Stories</h1>

                    <h6>Find all about Academic Stories</h6>

                </div>

            </div>
            <!-- Carousel Item 1 -->


            <div class="carousel-item ">

                <img class="d-block w-100" src="assets/carousel_assets/image/Department.jpg" alt="Second slide">

                <div class="carousel-caption">

                    <h1>Departmental Stories</h1>

                    <h6>Find all about Departmental Stories</h6>

                </div>

            </div>

            <div class="carousel-item ">

                <img class="d-block w-100" src="assets/carousel_assets/image/hall.jpg" alt="Third slide">

                <div class="carousel-caption">

                    <h1>Hall Stories</h1>

                    <h6>Find all about Hall Stories</h6>

                </div>

            </div>
            <div class="carousel-item ">

                <img class="d-block w-100" src="assets/carousel_assets/image/club.jpg" alt="Fourth slide">

                <div class="carousel-caption">

                    <h1>Club Stories</h1>

                    <h6>Find all about Club Stories</h6>

                </div>

            </div>


            <!-- Carousel Item 2 -->


            <!-- Carousel Item 3 -->

        </div>

        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">

            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            <span class="sr-only">Previous</span>

        </a>
        <!-- Carousel Control Prev -->

        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">

            <span class="carousel-control-next-icon" aria-hidden="true"></span>

            <span class="sr-only">Next</span>

        </a>
        <!-- Carousel Control Next -->

    </div>

    <br>




    <!-- carousel 2 -->
    
    <?php include("php_files/index_carousel2.php") ?>



    <?php
    include("php_files/footer_index.php");
    ?>