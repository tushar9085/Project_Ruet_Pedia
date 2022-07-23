<?php

///Showing comments from the database if exists
if ($comments > 0) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    //creating connection
    $conn = mysqli_connect($servername, $username, $password, "ruet_pedia");

    if (!$conn) {
        die("connection error" . mysqli_connect_error());
    }


    $comment_query = "SELECT comment,user_id FROM comments WHERE post_id=$post_id;";
    $comment_query_result = mysqli_query($conn, $comment_query);

    while ($row = mysqli_fetch_assoc($comment_query_result)) {
        $comment_user_id = $row['user_id'];
        $comment = $row['comment'];

        ///Finding the user name from database
        $comment_user_name_query = "SELECT name FROM user WHERE id=$comment_user_id;";
        $comment_user_name_query_result = mysqli_query($conn, $comment_user_name_query);
        $comment_user_name_query_result_row = mysqli_fetch_assoc($comment_user_name_query_result);

        $comment_user_name = $comment_user_name_query_result_row['name'];
?>

        <b>@<?php echo $comment_user_name ?></b> <?php echo $comment ?></br>
<?php
    }
}
?>