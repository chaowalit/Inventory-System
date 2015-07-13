<script type="text/javascript">
	$(document).ready(function(){
		var warning1 = $('a[title="empty"]');
		warning1.each(function(){
			
			$(this).hide();
			$(this).attr("disabled","disabled");
			
		});
	});
</script>
<br>
<center><h3 class="topics">- IT Store -</h3></center>
<div class="add_bar"><a title="Click to add new item" href="#" onclick="javascript:void window.open('<?php echo site_url(); ?>/inventoryAddController','1380984715051',
	'width=600,height=350,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=460,top=100');
	return false;">+ Add</a></div>

<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" style="font-weight:bold;
	font-style:normal;font-size:12px;">
	<thead align="left" style="color:Blue;">
		<tr>
			<th>Plus+</th>
			<th>Model</th>
			<th>Type</th>
			<th>Brand</th>
			<th>Building</th>
			<th>Quantity</th>
			<th>Choose</th>
		</tr>
		<tr>
			<th>-</th>
			<th>-</th>
			<th>Type</th>
			<th>-</th>
			<th>Building</th>
			<th>-</th>
			<th>-</th>
		</tr>
	</thead>
<!--
	<tfoot align="left">
		<tr>
			<th>Plus+</th>
			<th>Model</th>
			<th>Type</th>
			<th>Brand</th>
			<th>Building</th>
			<th>Quantity</th>
			<th>Choose</th>
		</tr>
	</tfoot>
-->
	<tbody>
		
		<?php
		foreach($result as $row){ //$result of template.php(controller)
			echo "<tr>";
		?>
		<td width="40px"><a href="<?php echo site_url(); ?>/process_store/update_Edit_Store/<?php echo base64_encode($row->id); ?>"><img src="<?php echo base_url();?>/assets/images/add_store.png" alt='Update Store' title="Update Store" style="border:none;width:20px;height:18px;"></a></td>
		<?php
			echo "<td>$row->model</td>";
			echo "<td>$row->type</td>";
			echo "<td>$row->brand</td>";
			echo "<td>$row->building</td>";
		?>
			<td width='38px'>
				<?php 
					echo "$row->quantity";
					if($row->quantity == 0){
				?>
						<img src="<?php echo base_url();?>/assets/images/error.png" style="border:none;width:20px;height:18px;">
				<?php
					}else if($row->quantity <= $row->min){
				?>
						<img src="<?php echo base_url();?>/assets/images/alert.png" style="border:none;width:20px;height:18px;">
				<?php
					}
				?>
					
				
			</td>
		<td width="80px">
		<a href="<?php echo site_url(); ?>/process_store/showwithdraw/<?php echo base64_encode($row->id); ?>" 
			title=<?php if($row->quantity == 0){echo "empty";} ?> ><img src="<?php echo base_url();?>/assets/images/withdraw.png" title="Withdraw from inventory system" style="border:none;width:20px;height:18px;"></a>&nbsp;
		<a onclick="return confirm('Are you sure?')" href='<?php echo site_url(); ?>/process_store/del/<?php echo base64_encode($row->id); ?>'><img src="<?php echo base_url(); ?>/assets/images/delete.png" title="Delete from inventory system" style="border:none;width:20px;height:18px;"></a>
		</td>
		<?php
			echo "</tr>";
			}
		?>
	</tbody>
</table>
</div>
