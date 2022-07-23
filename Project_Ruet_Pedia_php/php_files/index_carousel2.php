<?php
include("php_files/database_connection.php");
?>

<?php
$query = "SELECT * FROM post;";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
if ($rows > 4) { ?>

    <h4>
        Recent Stories
    </h4>
    <hr>

    <div class="owl-carousel owl-1">


        <?php

        for ($i = 0; $i < 5; $i++) {

            $row = mysqli_fetch_assoc($result);

            $post_title = $row['post_title'];
            $post_content = $row['post_content'];
            $post_image = $row['post_image'];
            $likes = $row['likes'];
            $comments = $row['comments'];
        ?>

            <div class="content-carousel">

                <div class="media-29101 d-md-flex w-100">
                    <div class="img">
                        <img src="images/<?php echo $post_image; ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="text">

                        <h2><a href="#"><?php echo $post_title ?></a></h2>
                        <p> <?php echo $post_content ?> </p>
                    </div>
                </div>



            </div>


        <?php } ?>

    </div>

<?php } ?>