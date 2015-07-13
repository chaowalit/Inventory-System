<br>
<center><h3 class="topics">- Inventory Process -</h3></center>
<div id="demo">
<div class="add_bar"><a title="Click here to export data to excel" href="#" onclick="javascript:void window.open('<?php echo site_url(); ?>/table_exportController','1380984715051',
	'width=1230,height=450,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=60,top=100');
	return false;">Export Data to Excel</a></div>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="processtable" style="font-size:12px;font-weight:bold;
	font-style:normal;">
	<thead align="left" style="color:Blue;">
		<tr>
			<th>Description</th>
			<th>Quantity</th>
			<th>Cost <br> Center</th>
			<th>Department</th>
			<th>Manager</th>
			<th>Owner</th>
			<th>En</th>
			<th>Ext</th>
			<th>Date</th>
			<th width="60px">Choose</th>
		</tr>
	</thead>
	<!--<tfoot>
		<tr>
			<th>Description</th>
			<th>Quantity</th>
			<th>Cost <br> Center</th>
			<th>Department</th>
			<th>Manager</th>
			<th>Owner</th>
			<th>En</th>
			<th>Ext</th>
			<th>Date</th>
			<th width="8px">Choose</th>
		</tr>
	</tfoot> -->

	<tbody>
		<?php
			$base = base_url();
			foreach($result_process as $row){ //$result of template.php(controller)
				echo "<tr>";
				echo "<td>$row->Type $row->Description $row->Model</td>";
				echo "<td width='8px'>$row->Quantity</td>";
				echo "<td>$row->Cost_Center</td>";
				echo "<td>$row->Department</td>";
				echo "<td>$row->Manager</td>";
				echo "<td>$row->Owner</td>";
				echo "<td>$row->En</td>";
				echo "<td>$row->Ext</td>";
				echo "<td>$row->Date_time</td>";
		?>
			<td align='center'>
				<a href="<?php echo site_url(); ?>/process_store/editProcess/<?php echo base64_encode($row->ID); ?>"><img src="<?php echo base_url(); ?>assets/images/edit2.png" class="down" title="Edit" style="border:none;width:20px;height:18px;"></a> &nbsp;
				<a onclick="return confirm('Are you sure?','Delete')" href='<?php echo site_url(); ?>/process_store/delProcess/<?php echo base64_encode($row->ID); ?>/<?php echo base64_encode($row->ID_Store); ?>/<?php echo $row->Quantity; ?>'><img src="<?php echo base_url(); ?>assets/images/delete.png" class="down" title="Delete" style="border:none;width:20px;height:18px;"></a>	
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
</div>
<div class="spacer"></div>
