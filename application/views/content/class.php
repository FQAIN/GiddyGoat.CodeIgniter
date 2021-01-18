<?php
$this->load->helper('url');
$base_url = base_url();
?>
<div id="content">
    <div id="latest_product_gallery">
        <h2>View Class Details</h2>
        <p>Historically, clothing is, and has been, made from many clothing materials. These range from grasses and furs to much more elaborate and exotic materials. Some cultures, such as the various people of the Arctic Circle, have made their clothing entirely of prepared and decorated furs and skins These range from grasses and furs to much more.</p>
        <button style="border: none;">Look at our information for these classes</a></button>
    </div>
    <!-- end of latest_content_gallery -->
    <div class="content_section">

        <h3>You are Viewing: <br>
            <a href="<?php echo site_url('ClassController/classes'); ?>">Classes</a>><?php echo $classes->first_row()->dateOfClass; ?>
        </h3>

    </div>
    <div class="content_section">
        <img src="<?php echo $base_url . "assets/images/classes/classes.jpg" ?>" style="width:60%">
        <br><br>
        <?php
        /* if a classes exists */
        if ($classes->num_rows() > 0) {
            /* For each classes that there is */
            foreach ($classes->result_array() as $class) {
                ?>
                <div class="content_sections">
                    <!--Echos out the classes name-->
                    <h3><?php echo $class['name']; ?></h3>
                    <p><strong>Description</strong></p>
                    <!--Echos out the classes description-->
                    <p><?php echo $class['description']; ?></p>
                    <!--Echos out the classes dateOfClass-->
                    <p><strong>Date:</strong><?php echo $class['dateOfClass']; ?></p>
                    <!--Echos out the classes timeOfClass-->
                    <p><strong>Time:</strong><?php echo $class['timeOfClass']; ?></p>
                    <!--Echos out the classes maxAttendees-->
                    <p><strong>Max:</strong><?php echo $class['maxAttendees']; ?></p>
                    <!--Echos out the classes price-->
                    <p><strong>Price:</strong><?php echo $class['price']; ?></p>
                    <input type="submit" value="Book A Class">
                </div>
                <?php
            }
        }
        ?>


    </div>

</div>