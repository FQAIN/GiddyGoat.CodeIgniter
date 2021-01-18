<?php
$this->load->helper('url');
$base_url = base_url();
?>
<style>
	.shift{
		margin-left:100px;
	}
	
	table{
		border:15px solid #7d6887;
		margin-top:20px;
		
		
	}
	td{
		text-align:center;
		border:2px solid #aa9eb0;
		font-size:18px;
		font-weight:bold;
	}
	th{
		background:#7d6887;
		font-size:20px;
		color:white;
	}
	.prevcell a, .nextcell a{
		color:white;
		text-decoration:none;
	}
	
	tr.wk_nm{
		background:#E6C1EB;
		color:#AB08BD;
		font-size:17px;
		font-weight:bold;
		width:10px;
		padding:5px;
	}
	
	.highlight{
		background:#FD5196;
		color:white;
		padding:10px;
	}
</style>

<div id="content">
    <div id="latest_product_gallery">
        <h2>Classes</h2>
        <p>Historically, clothing is, and has been, made from many clothing materials. These range from grasses and furs to much more elaborate and exotic materials. Some cultures, such as the various people of the Arctic Circle, have made their clothing entirely of prepared and decorated furs and skins These range from grasses and furs to much more.</p>
        <button style="border: none;">Look at the list of classes we offer</a></button>
    </div>
    <!-- end of latest_content_gallery -->
    <div class="content_section">
        <h2>Dates of Classes</h2>
    </div>
    <div class="content_section">
        <div class="row"> 
            <!--  <div class="column">
                  <img src="<?php echo $base_url . "assets/images/classes/classes.jpg" ?>" style="width:100%">
                
              </div>-->

        </div>
        <div id="container">

	<div id="body">
		        <p>
         <!--  Generates the calendar-->
        <?php echo $this->calendar->generate($year, $month, $cal); ?></p>
	</div>
</div>

        <!--            <br>
                    <h3><strong>Knitting Class NA0139</strong></h3>
                    <h5><strong>Practical, Knitting Course by Pobalscoil Neasáin  -  Dublin</strong></h5>
                <h3>Details of Course:
                    
                </h3>
                    <p>Challenge yourself by learning something new and different! Portuguese knitting is an alternative method to classical knitting which gets the same results – but faster and with less wear on the joints. 
         
        If you are a knitter, chances are you have chosen the method that you like the best. However, learning alternative knitting methods can ensure that you are knitting in the most comfortable way possible. Sometimes, the way you first learn to do something is not always the best for your hands and wrists.
         
        The Portuguese Knitting is not only simple, but it requires less movement which strains your hands less.  The simplicity of the movement means that hands are not overworked, they do not tire as easily and knitters are less likely to experience pain or cramping.
         
        This method it is also perfect to do circular projects with no joining.</p>
            </div>
              <div class="content_section">
         <p>Page -> 1,2,3</p>-->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
</div>
<!-- end of content -->