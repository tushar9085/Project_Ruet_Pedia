<?php

if (isset($_POST['postlike'])) {
    //checking is there a like in a post
    $main_user_id = $_SESSION['user_id'];
    $post_id = $_POST['postlike'];
    $like_query = "SELECT * FROM likes WHERE user_id=$main_user_id AND post_id=$post_id;";

    $like_query_result = mysqli_query($conn, $like_query);

    $num = mysqli_num_rows($like_query_result);


    if ($num == 1) {
        $delete_like= "DELETE FROM likes WHERE user_id=$main_user_id AND post_id=$post_id;";
        $delete_like_result= mysqli_query($conn,$delete_like);

        if($delete_like_result){
            echo "<script> window.location.href='main_account.php'; </script>";        
        }

        // $loveicon = "fa-solid fa-heart";
    } else {

        $insert_like= "INSERT INTO likes VALUE($post_id,$main_user_id);";
        $insert_like_result= mysqli_query($conn,$insert_like);
        if($insert_like_result){
            echo "<script> window.location.href='main_account.php'; </script>";        
        }
        // $loveicon = "fa-regular fa-heart";
    }
}


?>