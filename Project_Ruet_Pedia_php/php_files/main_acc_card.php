<?php
include("php_functions/showACard.php");
?>

<?php
//if catagory is selected then show catagorywise post
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
    //fetching user name
    $user_name_query = "SELECT name FROM user WHERE id=$user_id;";
    $user_name_result = mysqli_query($conn, $user_name_query);
    $user_name_row = mysqli_fetch_assoc($user_name_result);
    $user_name = $user_name_row['name'];

    //fetching user image
    $user_image_query = "SELECT profile_picture FROM user WHERE id=$user_id;";
    $user_image_result = mysqli_query($conn, $user_image_query);
    $user_image_row = mysqli_fetch_assoc($user_image_result);
    $user_image = $user_image_row['profile_picture'];
    //Fetching each post
    $post_title = $row['post_title'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
    $likes = $row['likes'];
    $post_id = $row['post_id'];


    //Fetching Comment(count) for each row,means each post id ///FROM COMMENT TABLE
    $comment_query = "SELECT COUNT(comment_id) as comment_number FROM comments WHERE post_id=$post_id GROUP BY post_id;";
    $comment_query_result = mysqli_query($conn, $comment_query);
    $comment_query_row = mysqli_fetch_assoc($comment_query_result);
    //got the comment(count) for each post,now have to update it in the post table and show it in the card

    //checking if there is a comment for the post!
    if(!isset($comment_query_row['comment_number']))
    {
        $comments =0;
    }
    else{
        $comments = $comment_query_row['comment_number'];
    }
    

    $comment_update_query = "UPDATE post SET comments = $comments WHERE post_id = $post_id;";
    $comment_update_result = mysqli_query($conn, $comment_update_query);


?>


    <div class="instagram-card">
        <?php showAPost($user_name, $user_image, $post_title, $post_content, $post_image, $likes, $comments, $post_id); ?>
        

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