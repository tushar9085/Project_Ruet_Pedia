<?php
function showAPost($user_name, $user_img, $post_title, $post_content, $post_img, $likes, $comments)
{ ?>

    <div class="instagram-card">
        <div class="instagram-card-header">  
            <img class="instagram-card-user-image" src="images/<?php echo $user_img; ?>">
            <a class="instagram-card-user-name" href="#"> <?php echo $user_name ?></a>
        </div>

        <div class="intagram-card-image">
            <img class="img-insta-card" src="images/<?php echo $post_img; ?>">
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