<div class="cleaner"></div>
  <div id="sidebar">
    <div class="sidebar_top"></div>
    <div class="sidebar_bottom"></div>
    <div class="sidebar_section">
      <h2>Members</h2>
      <?php
        if (!$this->session->userdata('loggedIn')):
      ?>
      <form action="<?php echo site_url('Login/index'); ?>" method="POST">
        <label>Email</label>
        <input type="text" value="" name="email" size="10" class="input_field" />
        <label>Password</label>
        <input type="password" value="" name="password" class="input_field" />
        <a href="<?php echo site_url('GG/AddEntry'); ?>">Register</a>
        <input type="submit" name="login" value="Login" alt="Login" id="submit_btn" />
      </form>
      <?php
        else:
      ?>
      <a href="<?php echo site_url('GG/logout'); ?>">Logout</a>
      <?php
        endif;
      ?>
      <div class="cleaner"></div>
    </div>
    <div class="sidebar_section">
      <h2>Categories</h2>
      <ul class="categories_list">
        <li><a href="<?php echo site_url('ClassController/classes'); ?>"><span></span>Adult/Children Classes</a></li>
        <li><a href="<?php echo site_url('FabricController/fabrics'); ?>"><span></span>Fabrics</a></li>
        <li><a href="<?php echo site_url('NotionController/notions'); ?>"><span></span>Notions</a></li>
        <li><a href="<?php echo site_url('GG/gallery'); ?>"><span></span>Gallery</a></li>
        <li><a href="<?php echo site_url('GG/contact'); ?>"><span></span>Contact</a></li>
      </ul>
    </div>
    <div class="sidebar_section">
      <h2>Special Offers</h2>
      <div class="image_wrapper"><a href="#"><img src="<?php echo $base_url."assets/images/image_01.jpg"?>" alt="" /></a></div>
      <div class="discount"><span>25% off</span> | <a href="#">Read more</a></div>
    </div>
  </div>
  <!-- end of sidebar -->