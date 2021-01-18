<?php
    $this->load->helper('url'); 
    $base_url = base_url();
    $local_style = base_url()."assets/";
    $image_url = base_url()."assets/images/";
    $css_url = $base_url."assets/stylesheet/";
    $script_url = base_url()."assets/scripts/";


include 'partials/header_view.php';

echo $content;

include 'partials/footer_view.php'; 
?>

