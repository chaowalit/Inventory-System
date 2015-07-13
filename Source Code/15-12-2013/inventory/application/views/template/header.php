<script>
	$(function() { 
		$('#btn_clickToAdmin').click(function(){
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>index.php/adminController/index',
					success: function(resp) {
						alert(resp);
						if(resp == "Welcome to Administrator page"){
							window.location = "<?php echo base_url(); ?>index.php/adminController/goToAdminPage";
						}
					}
			});
		})
	});
</script>
<div id="my_header" style="clear:both;">
	<p class="loginname">
		<a style="font-weight: bold; color:#14396a;">Welcome To Inventory System : <?php echo $username; ?></a>
	</p>
	<p class="logout">
		<a href="#" id="btn_clickToAdmin" title="Click to control system">Administrator</a>&emsp;|&emsp;
		<a href="<?php echo site_url();?>/adminController/change_password_page" title="Click to change password">Change Password</a>&emsp;|&emsp;
		<a href="<?php echo site_url();?>/home/logout" title="Click to logout">Log out</a>
	</p>
	
<!--
	<div class="piclogout">
		<ul id="navlog">
		//<li class="toplog"><a href="#nogo2" id="products" class="toplog_link"><span class="down">Products</span></a>
			<li class="toplog"><a href="#"><img src="<?php echo base_url(); ?>/assets/images/logout.jpg" height="30px" width="30px" class="down"></a>
				<ul class="sub">
					<li><a href="#nogo3" class="fly">Building</a>
							<ul>
								<li><a href="#nogo4">B3</a></li>
								<li><a href="#nogo5">B4</a></li>
								<li><a href="#nogo6">B6</a></li>
							</ul>
					</li>
					<li class="mid"><a href="#nogo7" class="fly">Edit</a>
							<ul>
								<li><a href="#nogo8">Password</a></li>
								<li><a href="#nogo9">Phone</a></li>
								<li><a href="#nogo10">Add Menu</a></li>
							</ul>
					</li>
					<li><a href="<?php echo site_url();?>/home/logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div> 
-->
	
</div>

	
