
<body>
<div class="header-bg">
	<div class="wrap"> 
		<div class="total-box">
				<div class="total">
					<div class="header_top">
				     	<div class="menu">
				     		<ul>
                           		 <li <?php if($title=="Home"){ echo 'class="active"';} ?>><?php echo anchor("home", "Home") ?></li>
                                 <li <?php if($title=="About"){ echo 'class="active"';} ?>><?php echo anchor("about", "About") ?></li>
                                 <!--li <?php if($title=="Staff"){ echo 'class="active"';} ?>><?php echo anchor("staff", "Staff") ?></li-->
                                 <li <?php if($title=="Programs"){ echo 'class="active"';} ?>><?php echo anchor("programs", "Programs") ?></li>
                                 <li <?php if($title=="Contact"){ echo 'class="active"';} ?>><?php echo anchor("contact", "Contact") ?></li>
								 
								 <div class="clear"></div>
			     			</ul>
				     	</div>
				     	<ul class="follow_icon">
							<li><a href="#" style="opacity: 1;"><img src="<?php echo site_url() ?>/src/front-end/images/fb.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="<?php echo site_url() ?>/src/front-end/images/tw.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="<?php echo site_url() ?>/src/front-end/images/rss.png" alt=""></a></li>
						</ul>
		     			<div class="clear"></div>
		     	</div>
			     <div class="header-bottom">
					 <div class="logo">
						<h1><a href="index.html">Guidance</a></h1>
					 </div>
					<div class="search">
						   <form>
						    	<input type="text" value="">
						    	<input type="submit" value="">
						  </form>
					</div>
					<div class="clear"></div> 
				</div>
			</div>	
		</div>
	 </div>
</div>