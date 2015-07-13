<style>
	.css_updateStore{
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
</style>
<script>
	$(function(){
		$typeUpdate = $('#typeUpdate').val();
		if($typeUpdate == "Toner" || $typeUpdate == "Ink Jet"){
			$('#forInkStoreUpdate').show();
		}else{
			$('#forInkStoreUpdate').hide();
		}
	});
</script>
<div align="center">
	<fieldset>
	<legend><h3>Insert Data for Update To Store or Click Back to Store</h3></legend>
	<form method="post" action="<?php echo site_url(); ?>/process_store/saveUpdateStore" onsubmit="return chk_form()">
			<table border="0" style="text-align:left;">  
				<tr><td><label for="model">Model</label></td>
					<td>: <input type="text" name="model" value="<?php foreach($resultRecordUpdate as $row) echo $row->model; ?>" class="css_updateStore"/></td>
				</tr>
				<tr><td><label for="type">Type</label></td>
					<td>: <select name="type" class="css_updateStore" id="typeUpdate">
							<option value="">---------Hardware---------</option>
							<option value="Computer" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Computer") echo "selected"; } ?>>Computer</option>
							<option value="Monitor" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Monitor") echo "selected"; } ?>>Monitor</option>
							<option value="Keyboard" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Keyboard") echo "selected"; } ?>>Keyboard</option>
							<option value="Mouse" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Mouse") echo "selected"; } ?>>Mouse</option>
							<option value="RAM" <?php foreach($resultRecordUpdate as $row){ if($row->type == "RAM") echo "selected"; } ?>>RAM</option>
							<option value="Power Supply" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Power Supply") echo "selected"; } ?>>Power Supply</option>
							<option value="CPU" <?php foreach($resultRecordUpdate as $row){ if($row->type == "CPU") echo "selected"; } ?>>CPU</option>
							<option value="Motherboard" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Motherboard") echo "selected"; } ?>>Motherboard</option>
							<option value="LAN Card" <?php foreach($resultRecordUpdate as $row){ if($row->type == "LAN Card") echo "selected"; } ?>>LAN Card</option>
							<option value="VGA Card" <?php foreach($resultRecordUpdate as $row){ if($row->type == "VGA Card") echo "selected"; } ?>>VGA Card</option>
							<option value="Projector" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Projector") echo "selected"; } ?>>Projector</option>
							<option value="">-------------Ink-------------</option>
							<option value="Toner" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Toner") echo "selected"; } ?>>Toner</option>
							<option value="Ink Jet" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Ink Jet") echo "selected"; } ?>>Ink Jet</option>
							<option value="">------Accessories------</option>
							<option value="VGA Cable" <?php foreach($resultRecordUpdate as $row){ if($row->type == "VGA Cable") echo "selected"; } ?>>VGA Cable</option>
							<option value="Power Cable" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Power Cable") echo "selected"; } ?>>Power Cable</option>
							<option value="LAN Cable" <?php foreach($resultRecordUpdate as $row){ if($row->type == "LAN Cable") echo "selected"; } ?>>LAN Cable</option>
							<option value="TEL Cable" <?php foreach($resultRecordUpdate as $row){ if($row->type == "TEL Cable") echo "selected"; } ?>>TEL Cable</option>
							<option value="SATA Cable" <?php foreach($resultRecordUpdate as $row){ if($row->type == "SATA Cable") echo "selected"; } ?>>SATA Cable</option>
							<option value="Other Cable" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Other Cable") echo "selected"; } ?>>Other Cable</option>
							<option value="Other" <?php foreach($resultRecordUpdate as $row){ if($row->type == "Other") echo "selected"; } ?>>Other</option>
						</select></td>
				</tr>
				<tr><td><label for="brand">Brand</label></td>
					<td>: <input type="text" name="brand" value="<?php foreach($resultRecordUpdate as $row) echo $row->brand; ?>" class="css_updateStore"></td>
				</tr>
				
				<?php
					$support_HW = array("HP Laserjet P3005n","HP Laserjet P3015","HP Laserjet P2420n","HP Laserjet M2727NL","HP Laserjet P4015N",
					"HP Laserjet 1320n","HP Laserjet 5200n","HP Laserjet 4050","HP Laserjet 3520N","HP Photosmart C6180 All in one","HP Color Laserjet 3600dn",
					"HP Photosmart Premium","HP Officejet Pro 8600","HP Laserjet 1536 dnf MFP","HP model E609a","HP Hewlit packard","HP Laserjet Pro 400",
					"HP Inkjet 990c","HP Auto Smart Primiem all in one","Brother MFC-8460N","Brother MFG-8460N","Brother HL-12130","Brother HL-21400",
					"Brother Drum HL-22400","Brother MFC-J5910DW","Brother MFC-J67100W","Epson S015531/S015086","Electonic board","Laserjet 500 color M551"); 
				?>
				<tr id="forInkStoreUpdate"><td><label>Support Printer</label></td>
					<td>: 
						<select name="support_Printer" id="mySupport_Printer" size="1" style="width:250px;overflow-y: scroll;">
							<option value="-">Please Select</option>
							<?php 
								for($i = 0;$i < count($support_HW); $i++){
									echo "<option value=\"$support_HW[$i]\" ";
									foreach($resultRecordUpdate as $row){
										if($row->Support_Prt == $support_HW[$i]) echo "selected";
									}
									echo ">"."$support_HW[$i]"."</option>";
								}
							?>
						</select>
					</td>
				</tr>
				
				<tr><td><label for="building">Building</label></td>
					<td>: <select name="building" class="css_updateStore">
							<option value="">Select Location</option>
							<option value="B3" <?php foreach($resultRecordUpdate as $row){ if($row->building == "B3") echo "selected"; } ?> >B3</option>
							<option value="B4" <?php foreach($resultRecordUpdate as $row){ if($row->building == "B4") echo "selected"; } ?> >B4</option>
							<option value="B6" <?php foreach($resultRecordUpdate as $row){ if($row->building == "B6") echo "selected"; } ?> >B6</option>
						</select></td>
				</tr>
				<tr><td><label>Old Quantity</label></td>
					<td>: <input name="old_quantity" type="text" value="<?php foreach($resultRecordUpdate as $row) echo $row->quantity; ?>" class="css_updateStore"><big> + </big><input name="update_quantity" type="text" class="css_updateStore"> <label for="quantity">Update Quantity</label></td>
				</tr>
				<tr><td><label for="minimum_quantity">Minimum Quantity</label></td>
					<td>: <input name="minimum_quantity" type="text" value="<?php foreach($resultRecordUpdate as $row) echo $row->min; ?>" class="css_updateStore"></td>
				</tr>
				<tr align="center"><td colspan="2">
					<input type="submit" class="btn btn-info" onclick="return confirm('Are you sure to Save?','Save')" value="Update" name="Submit_store"> &nbsp;
					<a href="<?php echo site_url(); ?>/template/store">Back</a>
					<input type="hidden" value="<?php foreach($resultRecordUpdate as $row) echo $row->id; ?>" name="id_form"></td>
				</tr>
			</table>
	</form>
	</fieldset>
</div>
