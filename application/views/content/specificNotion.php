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
        <h2>You are Currently On: <br><br>
            <!-- echos and gets the site url in the form action and gets the notions 
           function from the NotionController
            -->
            <a href="<?php echo site_url('NotionController/notions'); ?>">Notion</a> -> <?php echo $notion->name; ?>
        </h2>
    </div>
    <div class="content_section">
        <div class="product_box margin_r35">
            <div class="image_wrapper">
                  <!-- echos out the notion image -->
                <img src="<?php echo $base_url . $notion->image; ?>" width="100%"/>
            </div>
        </div>
        <!-- echos out the notion cost -->
        <br><p><strong>Cost:</strong>€<?php echo $notion->cost; ?></p>
        <p><strong>Description: </strong></p>
         <!-- echos out the notion description -->
        <p> <?php echo $notion->description; ?></p>
       <form action="<?php echo site_url('ShoppingCartController/addNotionToCart/' . $notion->notion_id); ?>" method="POST">
            <p><strong>Quantity: </strong><input type="number" name="quantity" width="900px" value="1"></p>
            <input type="submit" value="Add to Cart">
        </form>
    </div>
</div>