<?php

if (isset($_POST['post_comment'])) {
    $post_comment = $_POST['add_comment'];
    $main_user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_comment'];



    if(!empty($post_comment))
    {
        $add_post_query = "INSERT INTO `comments` (`post_id`, `user_id`, `comment`) VALUES ('$post_id', '$main_user_id', '$post_comment');";

        $query_result = mysqli_query($conn, $add_post_query);
    
        if($query_result)
        {
            $_SESSION['status'] = "Comment Added";
            echo "<script> window.location.href='main_account.php'; </script>";
        }
        else{
            $_SESSION['status'] = "Comment not Added";
            echo "<script> window.location.href='main_account.php'; </script>";
        }
    }


}
