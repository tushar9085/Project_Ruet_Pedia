<?php
include("php_functions/showACard.php");




?>

<?php
if (isset($_GET['cat_id'])) {
    $story_catagory_id = $_GET['cat_id'];
    $query = "SELECT * FROM post WHERE story_catagory_id = $story_catagory_id;";
} else {
    $query = "SELECT * FROM post;";
}


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
    $post_id = $row['post_id'];
?>


    <div class="instagram-card">
        <?php showAPost($user_name, $user_image, $post_title, $post_content, $post_image, $likes, $comments); ?>

        <div class="instagram-card-footer">
            <a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
            <form name="add-comment-form" action="main_account.php" method="post" style="display: flex;">

                <input name="add_comment" class="comments-input" type="text" placeholder="Add Comment" />
                <button name="post_comment" style="margin:0px" value="<?php echo $post_id; ?>">Comment</button>

            </form>
        </div>
    </div>



<?php } ?>


<?php include("php_files/add_comment.php")  ?>