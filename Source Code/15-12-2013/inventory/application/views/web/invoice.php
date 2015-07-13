<br>
<center><h3 class="topics">- Invoice Received -</h3></center>

<div class="add_bar">
<a title="Click to add new invoice" href="#" onclick="javascript:void window.open('<?php echo site_url(); ?>/invoiceController','1380984715051',
	'width=700,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=460,top=100');
	return false;">+ Add</a></div>

<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="invoicetable" style="font-size:12px;font-weight:bold;
	font-style:normal;">
	<thead align="left" style="color:Blue;">
		<tr>
			<th>PO Number</th>
			<th>Vendor</th>
			<th>Recive By</th>
			<th>Recieve Date</th>
			<th>Detail</th>
			<th>Comment</th>
			<th width="94px">Menu</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$base = base_url();
			foreach($result_invoice as $row){
				echo "<tr>";
				echo "<td>$row->po_number</td>
					<td>$row->vendor</td>
					<td>$row->receiveBy<br>$row->receiveByName</td>
					<td>$row->recieveDate</td>
					<td><textarea cols='30' readonly>$row->detail</textarea></td>
					<td>$row->comment</td>";
		?>
			<td align='center' width="100px">
				<a href='javascript:void(0)' title='Open PDF file' onclick="window.open('<?php echo base_url().'uploads/'.$row->fileName;?>','pdf','height=650, width=500,location=no,scrollbars=yes')">
					<img src="<?php echo base_url(); ?>assets/images/pdf.png" style="border:none;width:20px;height:18px;"></a> &nbsp;
				<a href="<?php echo site_url(); ?>/invoiceController/editInvoice/<?php echo base64_encode($row->po_number); ?>"><img src="<?php echo base_url(); ?>assets/images/edit2.png" title="Edit" style="border:none;width:20px;height:18px;"></a> &nbsp;
				<a onclick="return confirm('Are you sure?','Delete')" href='<?php echo site_url(); ?>/invoiceController/delInvoice/<?php echo base64_encode($row->po_number); ?>/<?php echo base64_encode($row->fileName); ?>'>
					<img src="<?php echo base_url(); ?>assets/images/delete.png" title="Delete" style="border:none;width:20px;height:18px;"></a>	
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
</div>
<div class="spacer"></div>
