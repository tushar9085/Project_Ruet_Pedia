<?php
include("php_functions/showACard.php");

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
$my_user_id = $_SESSION['user_id'];

$query = "SELECT * FROM `post` WHERE user_id = $my_user_id;";
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
    $post_id = $row['post_id'];

    //Fetching likes
    $like_count_query = "SELECT * FROM likes WHERE post_id = $post_id;";
    $like_count_query_result = mysqli_query($conn, $like_count_query);
    $num_rows_like = mysqli_num_rows($like_count_query_result);

    $likes = $num_rows_like;

    //Fetching Comment(count) for each row,means each post id ///FROM COMMENT TABLE
    $comment_query = "SELECT COUNT(comment_id) as comment_number FROM comments WHERE post_id=$post_id GROUP BY post_id;";
    $comment_query_result = mysqli_query($conn, $comment_query);
    $comment_query_row = mysqli_fetch_assoc($comment_query_result);
    //got the comment(count) for each post,now have to update it in the post table and show it in the card

    //checking if there is a comment for the post!
    if (!isset($comment_query_row['comment_number'])) {
        $comments = 0;
    } else {
        $comments = $comment_query_row['comment_number'];
    }


    $comment_update_query = "UPDATE post SET comments = $comments WHERE post_id = $post_id;";
    $comment_update_result = mysqli_query($conn, $comment_update_query);


    //checking is there a like in a post
    $main_user_id = $_SESSION['user_id'];
    $like_query = "SELECT * FROM likes WHERE user_id=$main_user_id AND post_id=$post_id;";

    $like_query_result = mysqli_query($conn, $like_query);

    $num = mysqli_num_rows($like_query_result);


    if ($num == 1) {

        $loveicon = "fa-solid fa-heart";
    } else {
        $loveicon = "fa-regular fa-heart";
    }
?>


    <div class="instagram-card">
        <?php showAPost($user_name, $user_image, $post_title, $post_content, $post_image, $likes, $comments, $post_id); ?>


        <div class="instagram-card-footer">
            <form action="main_account.php" method="post">
                <button name="postlike" value="<?php echo $post_id; ?>" class="p-0 m-0 footer-action-icons" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;" href="#">
                    <i class="<?php echo $loveicon; ?>"></i>
                </button>
            </form>
            <form name="add-comment-form" action="main_account.php" method="post" style="display: flex;">

                <input name="add_comment" class="comments-input" type="text" placeholder="Add Comment" style=" margin-right:10px;" />
                <button name="post_comment" style="margin:0px" value="<?php echo $post_id; ?>">Comment</button>

            </form>
        </div>


</div>
 <?php } ?> 
    
    <?php include("php_files/add_comment.php")  ?> 
    
    <?php include("php_files/set_unset_like.php")  ?>