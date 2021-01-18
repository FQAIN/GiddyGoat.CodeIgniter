<?php
$this->load->helper('url');
$base_url = base_url();
?>

<div id="content">
    <div id="latest_product_gallery">
        <h2>Notions</h2>
        <p>Historically, clothing is, and has been, made from many clothing materials. These range from grasses and furs to much more elaborate and exotic materials. Some cultures, such as the various people of the Arctic Circle, have made their clothing entirely of prepared and decorated furs and skins These range from grasses and furs to much more.</p>
        <button style="border: none;">View A List Of Notions Below</a></button>
    </div>
    <div class="content_section">
        <!-- echos the site url in the form action and gets the notionsSelect function from 
      the NotionController
        -->
        <form action="<?php echo site_url('NotionController/notionsSelect'); ?>" method="POST">
            <p>Category
                <!-- gets the name notionOption -->
                <select name="notionOption" id="notionOption">
                    <option value="all">All</option>
                    <?php
                    /* if a $notionTypes exists */
                    if ($notionTypes->num_rows() > 0) {
                        /* For each notion type that there is */
                        foreach ($notionTypes->result_array() as $notionType) {
                            //Echos out the all the notionTypeName based on there IDs in a dropdown list
                            if ($selectedNotionType === $notionType['notion_type_id']) {
                                ?>
                                <option value="<?php echo $notionType['notion_type_id']; ?>" selected><?php echo $notionType['notionTypeName']; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $notionType['notion_type_id']; ?>"><?php echo $notionType['notionTypeName']; ?></option>
                                <?php
                            }
                        }
                    }
                    ?>  
                </select>
                <input type="submit" value="Search">
            </p>
        </form>
    </div>
    <div class="content_section">

        <?php
        /* if a notion exists */
        if ($notions->num_rows() > 0) {
            /* For each notion that there is */
            foreach ($notions->result_array() as $notion) {
                //Loads and gets the site url specificNotion function from the NotionController
                //bases on the notion id
                $tag = site_url('NotionController/specificNotion/' . $notion['notion_id']);
                if ($count % 3 != 0) {
                    ?>
                    <div class="product_box margin_r35">
                        <!--Echos out the notion image based on $tag -->
                        <div class="image_wrapper"> <a href="<?php echo $tag; ?>"><img src="<?php echo $base_url . $notion['image'] ?>" alt="" width="100%" height="200px"/></a> </div>
                        <!--Echos out the notion name based on $tag -->
                        <a href="<?php echo $tag; ?>"><?php echo $notion['name']; ?></a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="product_box">
                        <!--Echos out the notion image based on $tag -->
                        <div class="image_wrapper"> <a href="<?php echo $tag; ?>"><img src="<?php echo $base_url . $notion['image'] ?>" alt="" width="100%" height="200px" /></a> </div>
                        <!--Echos out the notion name based on $tag -->
                        <a href="<?php echo $tag; ?>"><?php echo $notion['name']; ?></a>
                    </div>
                    <?php
                }
                $count++;
            }
        } else {
            ?>
            <h2>No Notions</h2>
            <?php
        }
        ?>

        <div class="cleaner"></div>
        <!-- Pagination Link -->
        <p> <?php echo "</br>" . $this->pagination->create_links(); ?></p>
    </div>
</div>
<!-- end of content -->