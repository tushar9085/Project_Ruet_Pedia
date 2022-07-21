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
$query = "SELECT * FROM post;";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);


while ($row = mysqli_fetch_assoc($result)) {

    $user_id = $row['user_id'];


    $user_name_query = "SELECT name FROM user WHERE id=$user_id;";
    $user_name_result = mysqli_query($conn, $user_name_query);
    $user_name_row = mysqli_fetch_assoc($user_name_result);
    $user_name = $user_name_row['name'];


    $user_image_query = "SELECT profile_picture FROM user WHERE id=$user_id;";
    $user_image_result = mysqli_query($conn, $user_image_query);
    $user_image_row = mysqli_fetch_assoc($user_image_result);
    $user_image = $user_image_row['profile_picture'];

    $post_title = $row['post_title'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
    $likes = $row['likes'];
    $comments = $row['comments'];

    showAPost($user_name, $user_image, $post_title, $post_content, $post_image, $likes, $comments);
}

?>

<img src="../images/<?php echo $post_image; ?>" height="50%" width="50%">

<?php



function showAPost($user_name, $user_img, $post_title, $post_content, $post_img, $likes, $comments)
{ ?>

    <div class="instagram-card">
        <div class="instagram-card-header">  
            <img class="instagram-card-user-image" src="../images/<?php echo $user_img; ?>">
            <a class="instagram-card-user-name" href="#"> <?php echo $user_name ?></a>
        </div>

        <div class="intagram-card-image">
            <img class="img-insta-card" src="../images/<?php echo $post_img; ?>">
        </div>

        <div class="instagram-card-content">
            <p class="likes"><?php echo $likes . " Likes" ?></p>
            <p><a class="instagram-card-content-user" href="#"> <?php echo $post_title ?> <br></a> <?php echo $post_content ?> </p>
            <p class="comments"><?php echo $comments . " Comments" ?></p>
        </div>

        <div class="instagram-card-footer">
            <a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
            <input class="comments-input" type="text" placeholder="Add Comment" />
            <a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
        </div>

    </div>


<?php } ?>