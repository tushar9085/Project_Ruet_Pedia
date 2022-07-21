<?php
$story_catagory_table_query = "SELECT * FROM story_catagory;";

$story_catagory_table = mysqli_query($conn, $story_catagory_table_query);
$story_catagory_table_rows = mysqli_num_rows($story_catagory_table);

?>


<div class="catagory-post">

    <label for="story_section">Choose your story section:</label>

    <select name="story_section" id="story_section">

        <?php

        for ($i = 0; $i < $story_catagory_table_rows; $i++) {
            $story_catagory_table_row = mysqli_fetch_assoc($story_catagory_table);
        ?>
            <option value="<?php echo $story_catagory_table_row['catagory_id'] ?>"><?php echo $story_catagory_table_row['catagory_name'] ?></option>

        <?php } ?>

    </select>

</div>