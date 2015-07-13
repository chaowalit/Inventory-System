<div align="center">
	<style type="text/css">
		.css_editProcess{
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
		   display: inline;
		   font-weight: bold;
		}
		textarea{
				width:250px;
		}
	</style>  
	<fieldset>
		<legend><h3>Insert Edit Data from Process Menu</h3></legend>
		<form action="<?php echo site_url(); ?>/process_store/saveEditProcess" method="POST" onsubmit="return chk_form()">
			<table width="50%" border="0">
				<tr align="left"><td><label>Description :</label></td><td><input type="text" name="description" value="<?php foreach($resultRecordEdit as $row) echo "$row->Type"." "."$row->Description"." "."$row->Model"; ?>" class="css_editProcess" readonly></td></tr>
				<tr align="left"><td><label>Quantity :<label></td><td><input type="text" name="quantity" value="<?php foreach($resultRecordEdit as $row) echo $row->Quantity; ?>" class="css_editProcess"></td></tr>
				<tr align="left"><td><label>Cost Center :</label></td><td><input type="text" name="costcenter" value="<?php foreach($resultRecordEdit as $row) echo $row->Cost_Center; ?>" class="css_editProcess"></td></tr>
				<tr align="left"><td><label>Department :</label></td><td><input type="text" name="department" value="<?php foreach($resultRecordEdit as $row) echo $row->Department; ?>" class="css_editProcess"></td></tr>
				<tr align="left"><td><label>Manager :</label></td><td><input type="text" name="manager" value="<?php foreach($resultRecordEdit as $row) echo $row->Manager; ?>" class="css_editProcess"></td></tr>
				<tr align="left"><td><label>Owner :</label></td><td><input type="text" name="owner" value="<?php foreach($resultRecordEdit as $row) echo $row->Owner; ?>" class="css_editProcess"></td></tr>
				<tr align="left"><td><label>En :</label></td><td><input type="text" name="en" value="<?php foreach($resultRecordEdit as $row) echo $row->En; ?>" class="css_editProcess"></td></tr>
				<tr align="left"><td><label>External Phone :</label></td><td><input type="text" name="ext" value="<?php foreach($resultRecordEdit as $row) echo $row->Ext; ?>" class="css_editProcess"></td></tr>
				<!--<tr><td>To Building</td><td>:<select name="building">
					<option value="">Select Location</option>
					<option value="B3">B3</option>
					<option value="B4">B4</option>
					<option value="B6">B6</option>
				</select></td></tr> -->
				<tr><td colspan="2" align="left"><input type="submit" class="btn btn-info" onclick="return confirm('Are you sure to Save?','Save')" value="Update" name="withdrawForm">&emsp;<a href="<?php echo site_url(); ?>/template/process">Back</a>
				<input type="hidden" name="id_form" value="<?php foreach($resultRecordEdit as $row) echo $row->ID; ?>">
				<input type="hidden" name="id_store" value="<?php foreach($resultRecordEdit as $row) echo $row->ID_Store; ?>">
				<input type="hidden" name="old_Quantity_withdraw" value="<?php foreach($resultRecordEdit as $row) echo $row->Quantity; ?>">
				</td></tr>
			</table>
		</form>
		<div>
			<?php
				if(isset($error_form)){
					echo "$error_form";
				}
			?>
		</div>
	</fieldset>
</div>
