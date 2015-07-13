<!-- Withdraw Popup -->
<style type="text/css">
	#quantity,#costcenter,#department,#manager,#owner,#en,#ext,select,.Data_Details{
	  background: #fff;
	  border: 2px solid #c6c9cc;
	  border-radius: 4px;
	  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 0 #fff;
	  color: #555;
	  font: 14px/16px 'Droid Sans', Arial, 'Helvetica Neue', 'Lucida Grande', sans-serif;
	  padding: 5px 2px 5px 2px;
	  margin-bottom:0;
	  width: 220px;
	  height: 28px;
	}
	label {
	  color: #404853;
	  display: block;
	  font-weight: bold;
	}
</style>	
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/form_page/site-demos-for-withdrawform-only.css">
<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/jquery.validate.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/additional-methods.js" type="text/javascript"></script>

<div class="withdraw_dialog" title="Withdraw (Edit)">  
		<table width="100%" border="0"><tr><td>
		<form id="withdraw_form" action="<?php echo site_url(); ?>/process_store/saveWithdrawController" method="POST">
			<table id="ok" width="80%" border="0" style="color:#14396a;font-size:13px;font-weight:bold;font-style:normal;">
				<legend style="color:#14396a;font-size:20px;font-weight:bold;">Withdraw Register</legend>
				<tr><td width="150px">Quantity :</td><td><input id="quantity" type="text" name="quantity" min="1" max="<?php foreach($resultWithdraw as $row) echo $row->quantity; ?>"></td></tr>
				<tr><td width="150px">Cost Center :</td><td><input id="costcenter" type="text" name="costcenter"></td></tr>
				<tr><td width="150px">Department :</td><td><input id="department" type="text" name="department"></td></tr>
				<tr><td width="150px">Manager :</td><td><input id="manager" type="text" name="manager"></td></tr>
				<tr><td width="150px">Owner :</td><td><input id="owner" type="text" name="owner"></td></tr>
				<tr><td width="150px">En :</td><td><input id="en" type="text" name="en"></td></tr>
				<tr><td width="150px">External Phone :</td><td><input id="ext" type="text" name="ext"></td></tr>
				<tr><td width="150px">To Building :</td><td><select id="buildingto" name="buildingTo">
					<option value="">Select Location</option>
					<option value="B3">B3</option>
					<option value="B4">B4</option>
					<option value="B6">B6</option>
				</select></td></tr>
				<tr><td colspan="2" align="left"><input class="btn btn-info" type="submit" value="Save" name="withdrawform">&emsp;<a href="<?php echo site_url(); ?>/template/store">Back</a></td></tr>
			</table>
			</td><td valign="0">
			<table border="0" style="color:#14396a;font-size:13px;font-weight:bold;font-style:normal;">
					<legend style="color:#14396a;font-size:20px;font-weight:bold;">Data Details</legend>
					<tr><td>Type :</td><td><input type="text" name="type" value="<?php foreach($resultWithdraw as $row) echo $row->type; ?>" class="Data_Details" readonly></td></tr>
					<tr><td>Brand :</td><td><input type="text" name="brand" value="<?php foreach($resultWithdraw as $row) echo $row->brand; ?>" class="Data_Details" readonly></td></tr>
					<tr><td>Model :</td><td><input type="text" name="model" value="<?php foreach($resultWithdraw as $row) echo $row->model; ?>" class="Data_Details" readonly></td></tr>
					<tr><td>Support Printer :</td><td><input type="text" name="support_prt" value="<?php foreach($resultWithdraw as $row) echo $row->Support_Prt; ?>" class="Data_Details" readonly></td></tr>
					<tr><td>Quantity :</td><td><input type="text" name="quantity_old" value="<?php foreach($resultWithdraw as $row) echo $row->quantity; ?>" class="Data_Details" readonly></td></tr>
					<tr><td>Building From :</td><td><input type="text" name="buildingFrom" value="<?php foreach($resultWithdraw as $row) echo $row->building; ?>" class="Data_Details" readonly></td></tr>
					<tr><td></td><td><input type="hidden" name="id" value="<?php foreach($resultWithdraw as $row) echo $row->id; ?>"></td></tr>
			</table>
		</td></tr>
		</form>
		
		<script type="text/javascript">
		$(document).ready(function(){
			jQuery.validator.setDefaults({
				//debug: true,
				success: "valid"
			});
			$("#withdraw_form").validate({
				rules: {
					quantity: {
						required: true,
						number: true
					},
					costcenter: {
						number: true,
						required: true
					},
					department: {
						required: true
					},
					manager: {
						required: true
					},
					owner: {
						required: true
					},
					en: {
						required: true,
						number: true
					},
					ext: {
						required: true,
						number: true
					},
					buildingTo: {
						required: true
					}
				}
			});
		});
	</script>
	</table>
</div>