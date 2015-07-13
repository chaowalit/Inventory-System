<!doctype html>
<html>
	<head>
		<title>Add Invoice</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/export_table/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" type="text/css" />
		<script src="<?php echo base_url(); ?>assets/form_page/jquery-1.7.2.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/form_page/jquery-ui.js" type="text/javascript"></script>
		
		<!-- validate -->
		<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/jquery.validate.js" type="text/javascript"></script>
		<script language="javascript" src="<?php echo base_url(); ?>assets/form_page/additional-methods.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/form_page/site-demos.css">
		<!-- end validate -->
		
		<script type="text/javascript">
			$(document).ready(function(){
				jQuery.validator.setDefaults({
					//debug: true,
					success: "valid"
				});
				$("#invoice_form").validate({
					rules: {
						invoice_po: {
							required: true
						},
						invoice_vendor: {
							required: true
						},
						recievedate: {
							required: true
						},
						invoice_detail: {
							required: true
						},
						invoice_receiveByName: {
							required: true
						}
					}
				});
			});
			$(function() {
				showVender();
				$("#datePickerFrom").datepicker({
					dateFormat: 'yy-mm-dd'
				});
				function showVender(){
					var vender = "vender";
					$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>index.php/adminController/getDataVender',
							data: 'vender='+vender,
							success: function(resp) {
								$('select#invoice_vendor').html(resp);
							}
					});
				}
			});  
		</script>  

		<style type="text/css">  
			.require{  
				height:20px;  
				color:#AA0000;  
				padding-left:5px;  
				padding-right:5px;  
				font-size:12px;  
				line-height:15px;  
				width:100px;  
				float:none;  
			}
			input[type="text"]{
				width: 200px;
			}
			select{
				width: 250px;
				font-family:Trebuchet MS;
			}
			textarea{
				width: 200px;
			}
		</style>  
	</head>
	<body>
		<?php
			if(isset($error)){
				echo "<span class=require>$error</span>";
			}
			//$this->load->helper('form'); 
			//echo form_open_multipart('invoiceController/do_upload',array('id' => 'invoice_form')); 
		?>
			<form id="invoice_form" action="invoiceController/do_upload" method="post" enctype="multipart/form-data">
				<table border="0" class="table table-condensed">
					<tbody>
						<tr><td>PO Number</td>
							<td><input id="invoice_po" type="text" name="invoice_po"><br><hr></td>
						</tr>
						<tr><td>Vendor</td>
							<td>
								<select id="invoice_vendor" name="invoice_vendor">
									
								</select>
							</td>
						</tr>
						<tr><td>Receive By</td>
							<td align="left"><hr><input type="radio" name="invoice_receiveBy" value="IT_Student" style="border:none">IT_Student <br>
								<input type="radio" name="invoice_receiveBy" value="Staff_IT" style="border:none;">Staff_IT
								<br><input id="invoice_receiveByName" type="text" name="invoice_receiveByName"><br><hr>
							</td>
						</tr>
						<tr><td>Receive Date</td>
							<td><input type="text" name="invoice_recievedate" id="datePickerFrom"><br><hr></td>
						</tr>
						<tr><td>Detail</td>
							<td><textarea id="invoice_detail" name="invoice_detail" class="form-control" rows="5"></textarea><br><hr></td>
						</tr>		
						<tr><td>Comment</td>
							<td><input type="text" name="invoice_comment"><br><hr></td>
						</tr>		
						<tr><td>Choose File</td>
							<td><input type="file" name="userfile" size="20" /><br><hr></td>
						</tr>
						<tr align="center">
							<td colspan="2"><input class="btn btn-info" type="submit" value="Save" style="width:70px";> &nbsp;
								<a href="#" onclick="window.close()"><input class="btn btn-info" type="button" value="Cancel" style="width:70px";></a>
							</td>
						</tr>		
					</tbody>
				</table>
			</form>
	</body>
</html>