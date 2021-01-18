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
        <h2>You are Currently On: <br><br>
            <!-- echos and gets the site url in the form action and gets the fabrics 
            function from the FabricController
            -->
            <a href="<?php echo site_url('FabricController/fabrics'); ?>">Fabric</a> -> <?php echo $fabric->name; ?>
        </h2>
    </div>
    <div class="content_section">
        <div class="product_box margin_r35">
            <div class="image_wrapper">
                <!-- echos out the fabric image -->
                <img src="<?php echo $base_url . $fabric->image; ?>" width="100%"/>
            </div>
        </div>
        <!-- echos out the fabric cost -->
        <p><strong>Cost:</strong>€<?php echo $fabric->cost; ?></p>
        <p><strong>Description: </strong></p>
        <!-- echos out the fabric description -->
        <p> <?php echo $fabric->description; ?></p>
        <p><strong>Available Colors: </strong></p>
        <!-- echos out the fabric primaryColour -->
        <!-- echos out the fabric secondaryColour -->
        <!-- echos out the fabric ternaryColour -->
        <p> <?php echo $fabric->primaryColour; ?>,
            <?php echo $fabric->secondaryColour; ?>,
            <?php echo $fabric->ternaryColour; ?></p>
        <form action="<?php echo site_url('ShoppingCartController/AddFabricToCart/' . $fabric->fabric_id); ?>" method="POST">
            <p><strong>Meters: </strong><input type="number" name="quantity" width="900px" value="1"></p>
            <input type="submit" value="Add to Cart">
        </form>
    </div>
</div>