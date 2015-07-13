<!DOCTYPE html>
<html>
	<head>
		<title>Add to Inventory</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/form_page/site-demos.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" type="text/css" />
		<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/jquery.validate.js" type="text/javascript"></script>
		<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/additional-methods.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() { 
				//When the DOM is ready, we disable the matches list
				$('select#myType').attr('disabled',true);
				$('#forInkShowe').hide();
			});
			function activate_match()
			{
				 var category = $('select#myCategory1').val();
				 $.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>index.php/process_store/getTypeData',
					data: 'categorySend='+category,
					success: function(resp) {
						$('select#myType').attr('disabled',false).html(resp);
						if(category == "Ink"){
							$('#forInkShowe').show(1000);
						}else{
							$('#forInkShowe').hide(1000);
						}
					}
				});
			}
		</script>  
		<script type="text/javascript">
			//http://stackoverflow.com/questions/11335992/html-page-with-jquery-refuses-to-submit
			$(document).ready(function(){
				jQuery.validator.setDefaults({
					//debug: true,
					success: "valid"
				});
				$("#add_inventory_form").validate({
					rules: {
						model: {
							required: true
						},
						building: {
							required: true
						},
						quantity: {
							required: true,
							number: true
						},
						minimum_quantity: {
							required: true,
							number: true
						},
						brand: {
							required: true
						},
						category: {
							required: true
						}
					}
				});
			});
		</script>
		<style type="text/css">  
			input[type="text"] {
			  width: 200px;
			  
			}
			select{
			  width: 205px;
			  font-family: Trebuchet MS;
			}
			label{
				font-family: Trebuchet MS;
			}
		</style>  
	</head>
	<body>
		<?php
			//$this->load->helper('form'); 
			//echo form_open('/process_store/index'); 
		?>
		<form id="add_inventory_form" action="<?php echo site_url(); ?>/process_store/index" method="post">
			<table border="0">
				<tr><td><label for="category">Category</label></td>
					<td>&nbsp;<select name="category" id="myCategory1" class="category" onchange="activate_match()">
							<option value="">Select category</option>
							<option value="Hardware">Hardware</option>
							<option value="Ink">Ink</option>
							<option value="Accessories">Accessories</option>
						</select>
					</td>
				</tr>
				<tr><td><label for="type">Type</label></td>
					<td>&nbsp;<select name="type" id="myType">
						<option value="">Select Type</option>
						
					</select></td>
				</tr>
				<?php
					$support_HW = array("HP Laserjet P3005n","HP Laserjet P3015","HP Laserjet P2420n","HP Laserjet M2727NL","HP Laserjet P4015N",
					"HP Laserjet 1320n","HP Laserjet 5200n","HP Laserjet 4050","HP Laserjet 3520N","HP Photosmart C6180 All in one","HP Color Laserjet 3600dn",
					"HP Photosmart Premium","HP Officejet Pro 8600","HP Laserjet 1536 dnf MFP","HP model E609a","HP Hewlit packard","HP Laserjet Pro 400",
					"HP Inkjet 990c","HP Auto Smart Primiem all in one","Brother MFC-8460N","Brother MFG-8460N","Brother HL-12130","Brother HL-21400",
					"Brother Drum HL-22400","Brother MFC-J5910DW","Brother MFC-J67100W","Epson S015531/S015086","Electonic board","Laserjet 500 color M551"); 
				?>
				<tr id="forInkShowe"><td><label>Support Printer</label></td>
					<td>&nbsp;
						<select name="support_Printer" id="mySupport_Printer" size="1" style="width:250px;overflow-y: scroll;">
							<?php 
								for($i = 0;$i < count($support_HW); $i++){
									echo "<option value=\"$support_HW[$i]\">$support_HW[$i]</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr><td><label for="brand">Brand</label></td>
					<td><input type="text" name="brand" id="brand" placeholder="Brand"></td>
				</tr>
				<tr><td><label for="model">Model</label><br/></td>
					<td  valign="bottom"><input type="text" name="model" id="model" placeholder="Model"></td>
				</tr>
				<tr><td><label for="building">Building</label></td>
					<td>&nbsp;<select name="building" id="building">
							<option value="">Select Location</option>
							<option value="B3">B3</option>
							<option value="B4">B4</option>
							<option value="B6">B6</option>
						</select></td>
				</tr>
				<tr><td><label for="quantity">Quantity</label><br/></td>
					<td><input name="quantity" type="text" id="quantity"></td>
				</tr>
				<tr><td><label for="minimum_quantity">Minimum Quantity</label><br/></td>
					<td><input name="minimum_quantity" type="text" value="1" id="minimum_quantity"></td>
				</tr>
				<tr>
					<td align="right"><input class="btn btn-info" type="submit" value="Add" style="width:70px"></td>
					<td align="left"><a href="#" onclick="window.close()"><input class="btn btn-info" type="button" value="Cancel" style="width:70px"></a></td>
				</tr>
			</table>
		</form>
	</body>
</html>
