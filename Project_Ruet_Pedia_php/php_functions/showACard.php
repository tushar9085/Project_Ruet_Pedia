<?php
function showAPost($user_name, $user_img, $post_title, $post_content, $post_img, $likes, $comments)
{ ?>

    <div class="instagram-card-header">
        <img class="instagram-card-user-image" src="images/<?php echo $user_img; ?>">
        <a class="instagram-card-user-name" href="#"> <?php echo $user_name ?></a>
    </div>

    <div class="intagram-card-image">
        <img class="img-insta-card" src="images/<?php echo $post_img; ?>">
    </div>

    <div class="instagram-card-content">
        <p class="likes"><?php echo $likes . " Likes" ?></p>

        <h6><?php echo $post_title ?></h6>
        <span class="dots">....</span>
        <span class="more">
            <?php echo $post_content ?>
        </span>


        <button class="read">read the post</button>
        <br>

        <p class="comments"><?php echo $comments . " Comments" ?></p>


    </div>


<?php } ?>