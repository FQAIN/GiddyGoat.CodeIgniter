<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Giddy Goat Patchwork</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $local_style."style.css"?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $css_url."styles.css"?>" />
<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script language="javascript" type="text/javascript" src="<?php echo $script_url."mootools-1.2.1-core.js"?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo $script_url."mootools-1.2-more.js"?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo $script_url."slideitmoo-1.1.js"?>"></script>
<script language="javascript" type="text/javascript">
window.addEvents({
    'domready': function () { /* thumbnails example , div containers */
        new SlideItMoo({
            overallContainer: 'SlideItMoo_outer',
            elementScrolled: 'SlideItMoo_inner',
            thumbsContainer: 'SlideItMoo_items',
            itemsVisible: 5,
            elemsSlide: 3,
            duration: 200,
            itemsSelector: '.SlideItMoo_element',
            itemWidth: 140,
            showControls: 1
        });
    },

});
</script>
</head>
<body>
<div id="wrapper">
  <div id="menu">
    <ul>
        <li><a href="<?php echo site_url('GG/index'); ?>" class="current"><span></span>Home</a></li>
        <li><a href="<?php echo site_url('ClassController/classes'); ?>"><span></span>Classes</a></li>
        <li><a href="<?php echo site_url('FabricController/fabrics'); ?>"><span></span>Fabrics</a></li>
        <li><a href="<?php echo site_url('NotionController/notions'); ?>"><span></span>Notions</a></li>
        <li><a href="<?php echo site_url('GG/gallery'); ?>"><span></span>Gallery</a></li>
        <li><a href="<?php echo site_url('GG/contact'); ?>"><span></span>Contact</a></li>
    </ul>
  </div>
  <!-- end of menu -->
  <div id="header_bar">
    <div id="header">
      <div class="right"></div>
      <h1><a href="#"> <img src="<?php echo $base_url."assets/images/logo.png"?>" alt="" /> <span>Giddy Goat Patchwork</span> </a></h1>
    </div>
    <div id="search_box">
      <form action="#" method="get">
        <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
        <input type="submit" name="Search" value="" alt="Search" id="searchbutton" />
      </form>
    </div>
  </div>
  <!-- end of header_bar -->