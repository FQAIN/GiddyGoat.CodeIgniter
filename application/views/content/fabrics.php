<?php
$this->load->helper('url');
$base_url = base_url();
?>
<div id="content">
    <div id="latest_product_gallery">
        <h2>Fabrics</h2>
        <p>Historically, clothing is, and has been, made from many clothing materials. These range from grasses and furs to much more elaborate and exotic materials. Some cultures, such as the various people of the Arctic Circle, have made their clothing entirely of prepared and decorated furs and skins These range from grasses and furs to much more.</p>
        <button style="border: none;">View A List Of Fabrics Below</a></button>
    </div>
    <div class="content_section">
        <!-- echos the site url in the form action and gets the fabricsSelect function from 
        the FabricController
        -->
        <form action="<?php echo site_url('FabricController/fabricsSelect'); ?>" method="POST">
            <p>Category
                <!-- gets the name fabricOption -->
                <select name="fabricOption" id="fabricOption">
                    <option value="all">All</option>
                    <?php
                    /* if a fabricType exists */
                    if ($fabricTypes->num_rows() > 0) {
                        /* For each fabric type that there is */
                        foreach ($fabricTypes->result_array() as $fabricType) {
                            //Echos out the all the fabricTypeName based on there IDs in a dropdown list
                            if ($selectedFabricType === $fabricType['fabric_type_id']) {
                                ?>
                                <option value="<?php echo $fabricType['fabric_type_id']; ?>" selected><?php echo $fabricType['fabricTypeName']; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $fabricType['fabric_type_id']; ?>"><?php echo $fabricType['fabricTypeName']; ?></option>
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
        /* if a fabric exists */
        if ($fabrics->num_rows() > 0) {
            /* For each fabric that there is */
            foreach ($fabrics->result_array() as $fabric) {
                //Loads and gets the site url specificFabric function from the FabricController
                //bases on the fabric id
                $tag = site_url('FabricController/specificFabric/' . $fabric['fabric_id']);
                if ($count % 3 != 0) {
                    ?>
                    <div class="product_box margin_r35">
                        <!--Echos out the fabric image based on $tag -->
                        <div class="image_wrapper"> <a href="<?php echo $tag; ?>"><img src="<?php echo $base_url . $fabric['image'] ?>" alt="" width="100%"/></a> </div>
                        <!--Echos out the fabric name based on $tag -->
                        <a href="<?php echo $tag; ?>"><?php echo $fabric['name']; ?></a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="product_box">
                        <!--Echos out the fabric image based on $tag -->
                        <div class="image_wrapper"> <a href="<?php echo $tag; ?>"><img src="<?php echo $base_url . $fabric['image'] ?>" alt="" width="100%" /></a> </div>
                        <!--Echos out the fabric name based on $tag -->
                        <a href="<?php echo $tag; ?>"><?php echo $fabric['name']; ?></a>
                    </div>
                    <?php
                }
                $count++;
            }
        } else {
            ?>
            <h2>No Fabrics</h2>
            <?php
        }
        ?>
        <div class="cleaner"></div>
        <!-- Pagination Link -->

        <?php
//        $config['full_tag_open'] = '<div class="pagination">';
//        $config['full_tag_close'] = '</div>';
//        $config['first_tag_open'] = '<span class="first">';
//        $config['first_tag_close'] = '</span>';
//        $config['first_link'] = '';
//        $config['last_tag_open'] = '<span class="last">';
//        $config['last_tag_close'] = '</span>';
//        $config['last_link'] = '';
//        $config['prev_tag_open'] = '<span class="prev">';
//        $config['prev_tag_close'] = '</span>';
//        $config['prev_link'] = '';
//        $config['next_tag_open'] = '<span class="next">';
//        $config['next_tag_close'] = '</span>';
//        $config['next_link'] = '';
//        $config['cur_tag_open'] = '<span class="current">';
//        $config['cur_tag_close'] = '</span>';
//        
//        $this->pagination->initialize($config);
        ?>
        <p> <?php echo "</br>" . $this->pagination->create_links(); ?></p>
    </div>
</div>
<!-- end of content -->