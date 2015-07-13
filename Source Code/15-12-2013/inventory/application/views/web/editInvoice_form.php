	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/export_table/jquery-ui.css" />
	<script src="<?php echo base_url(); ?>assets/form_page/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/form_page/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
		$(function() {    
			$("#datePickerFrom2").datepicker({
				dateFormat: 'yy-mm-dd'
			}); 
		});  
</script>
<style type="text/css">
		.css_editInvoice{
			background: #fff;
			border: 2px solid #c6c9cc;
			border-radius: 4px;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 0 #fff;
			color: #555;
			font: 14px/16px 'Droid Sans', Arial, 'Helvetica Neue', 'Lucida Grande', sans-serif;
			padding: 5px 2px 5px 2px;
			margin-bottom:0;
			width: 270px;
			height: 28px;
		}
		label {
		   color: #404853;
		   display: inline;
		   font-weight: bold;
		}
		textarea{
			background: #fff;
			border: 2px solid #c6c9cc;
			border-radius: 4px;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 0 #fff;
			color: #555;
			font: 14px/16px 'Droid Sans', Arial, 'Helvetica Neue', 'Lucida Grande', sans-serif;
			padding: 5px 2px 5px 2px;
			margin-bottom:0;
			width:270px;
		}
</style>
	
<div align="center">
	<fieldset>
		<legend><h3>Insert Edit Data from Invoice Menu</h3></legend>
		<form action="<?php echo site_url(); ?>/invoiceController/saveEditInvoice" method="post" onsubmit="return chk_form()">
			<table border="0" align="center">
				<tbody>
					<tr align="left"><td><label>PO Number : </label></td>
						<td><input type="text" name="invoice_po" value="<?php foreach($returnRecordEditInvoice as $row) echo $row->po_number; ?>" class="css_editInvoice"></td>
					</tr>
					<tr align="left"><td><label>Vendor : </label></td>
						<td>
							<select name="invoice_vendor" class="css_editInvoice">
								<?php
									foreach($vender_db as $row_show_vender){
										echo "<option value=\"$row_show_vender->type\""." ";
										foreach($returnRecordEditInvoice as $row_edit_vender){
											if($row_edit_vender->vendor == $row_show_vender->type){
												echo "selected";
											}
										}
										echo ">$row_show_vender->type</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr><td colspan="2">.</td></tr>
					<tr align="left"><td><label>Receive By : </label></td>
						<td align="left">
							<input type="radio" name="invoice_receiveBy" value="IT_Student" <?php foreach($returnRecordEditInvoice as $row){ if($row->receiveBy == "IT_Student") echo "checked"; } ?>>IT_Student<br>
							<input type="radio" name="invoice_receiveBy" value="Staff_IT" <?php foreach($returnRecordEditInvoice as $row){ if($row->receiveBy == "Staff_IT") echo "checked"; } ?>>Staff_IT
							<br><input type="text" name="invoice_receiveByName" value="<?php foreach($returnRecordEditInvoice as $row) echo $row->receiveByName; ?>" class="css_editInvoice">
						</td>
					</tr>
					<tr><td colspan="2">.</td></tr>
					<tr align="left"><td><label>Receive Date : </label></td>
						<td><input type="text" name="invoice_recievedate" id="datePickerFrom2" value="<?php foreach($returnRecordEditInvoice as $row) echo $row->recieveDate; ?>" class="css_editInvoice"></td>
					</tr>
					<tr align="left"><td><label>Detail : </label></td>
						<td><textarea name="invoice_detail" cols="35" rows="5"><?php foreach($returnRecordEditInvoice as $row) echo $row->detail; ?></textarea></td>
					</tr>		
					<tr align="left"><td><label>Comment : </label></td>
						<td><input type="text" name="invoice_comment" value="<?php foreach($returnRecordEditInvoice as $row) echo $row->comment; ?>" class="css_editInvoice"></td>
					</tr>
					<tr align="left">
						<td colspan="2"><br><input type="submit" class="btn btn-info" onclick="return confirm('Are you sure to Save?','Save')" value="Update"> &nbsp;
						<a class="back_button" href="<?php echo site_url(); ?>/invoiceController/show_invoice">Back</a>
						<input type="hidden" name="id_edit" value="<?php foreach($returnRecordEditInvoice as $row) echo $row->po_number; ?>"></td>
					</tr>		
				</tbody>
			</table>
		</form>
	</fieldset>
</div>