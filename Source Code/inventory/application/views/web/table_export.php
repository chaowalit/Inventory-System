<html>
	<head>
		<title>Table Export</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
		<script src="<?php echo base_url(); ?>assets/form_page/jquery-1.7.2.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/form_page/jquery-ui.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/export_table/jquery-ui.css" />
		
		<script>  
			$(function() {    
				$( "#datepickerfrom,#datepickerto" ).datepicker({
					dateFormat: 'dd-mm-yy'
				}); 
			});
			function showExportTable()
			{
				var datepickerfrom = $('#datepickerfrom').val();
				var datepickerto = $('#datepickerto').val();
				if(datepickerfrom == "" || datepickerto == ""){
					alert("Insert Data to textbox Please.");
				}else{
					 $.ajax({
						type: 'POST',
						url: '<?php echo base_url(); ?>index.php/table_exportController/getDataExportExcel',
						data: 'datePickerFrom='+datepickerfrom+'&datePickerTo='+datepickerto,
						success: function(resp) {
							$('#showDataFromSearch').html(resp);
						}
					}); 
				}
			}
			function startExportExcel()
			{
				var datepickerfrom = $('#datepickerfrom').val();
				var datepickerto = $('#datepickerto').val();
				if(datepickerfrom == "" || datepickerto == ""){
					alert("Insert Data to textbox Please.");
				}else{
					return 1;
				}
			}
			function chk_form(){  
				$(":input + span.require").remove();  
				$(":input[type='text']").each(function(){  
					$(this).each(function(){      
						if($(this).val()==""){  
							$(this).after("<span class=require>Require Data!</span>");  
						}  
					});  
				});  
					if($(":input").next().is(".require")==false){  
						return true;  
					}else{  
					  return false;  
					}  
			}	
		</script>
		
		<style>
			#box-table-a
			{
			 
				font-size: 12px;
				margin: 0px;
				width: 1190px;
				text-align: left;
				border-collapse: collapse;
			}
			#box-table-a th
			{
				font-size: 13px;
				font-weight: bold;
				padding: 8px;
				background: #b9c9fe;
				border-top: 4px solid #aabcfe;
				border-bottom: 1px solid #fff;
				color: #039;
			}
			#box-table-a td
			{
				font-weight: bold;
				padding: 8px;
				background: #e8edff; 
				border-bottom: 1px solid #fff;
				color: #669;
				border-top: 1px solid transparent;
			}
			#box-table-a tr:hover td
			{
				background: #d0dafd;
				color: #339;
			}
			.btn_search{
				
			}
		</style>
	</head>
	<body>
		<div align="center">
		<label><h4>Export Data to Microsoft Excel 2003-2010</h4></label>
		<label style="font-size:14px;">Click TextBox To Select Date and Show Inventory process table</label>
		<form action="<?php echo site_url(); ?>/table_exportController/exportExcelTo" method="POST" onsubmit="return chk_form()">
			<table border="0" width="70%">
				<tr align="center">
					<td width="20%">
						<span title="from date">Form:</span> <input type="text" name="dateFrom" id="datepickerfrom" /> &nbsp;
						<span title="to date">To:</span> <input type="text" name="dateTo" id="datepickerto" /> &nbsp;
						<input type="button" class="btn btn-info" value="Search" onclick="showExportTable()" class="btn_search">
					</td>
				</tr>
				<tr align="center">
					<td><hr><input class="btn btn-info" type="submit" value="Export To Excel File" onclick="startExportExcel()">
					
					</td>
				</tr>
			</table>
		</form>	
		<table width="100%" id="box-table-a">
			<thead>
				<tr>
					<th>Type</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Cost_Center</th>
					<th>Department</th>
					<th>Manager</th>
					<th>Owner</th>
					<th>En</th>
					<th>Ext</th>
					<th>Model</th>
					<th>Support Prt</th>
				</tr>
			</thead>
			<tbody id="showDataFromSearch">
				
			</tbody>
		</table>
		</div>
	</body>
</html>