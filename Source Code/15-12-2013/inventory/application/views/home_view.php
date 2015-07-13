

<html>
 <head>
	<title>Inventory System, IT-Helpdesk</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/form_page/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/form_page/jquery-ui.js" type="text/javascript"></script>
		
	
	<!-- Begin Store Table -->
	<style type="text/css" media="screen">
			@import "<?php echo base_url(); ?>assets/table/css/demo_page.css";
			@import "<?php echo base_url(); ?>assets/table/css/demo_table.css";
			@import "<?php echo base_url(); ?>assets/table/css/themes/base/jquery-ui.css";
			@import "<?php echo base_url(); ?>assets/table/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
	</style>
        <script src="<?php echo base_url(); ?>assets/table/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/table/js/jquery.dataTables.columnFilter.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function () {
                $('#example').dataTable({
						"iDisplayLength": 25,
						"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
					}).columnFilter({ sPlaceHolder: "head:after",
                    aoColumns: [
						null,
						null,
						{ type: "select", values: [ '-----Hardware-----', 'Computer', 'Monitor', 'Keyboard', 'Mouse', 'RAM', 'Power Supply', 'CPU', 'MotherBoard', 'LAN Card','VGA Card','Projector',
						'----------Ink----------', 'Toner', 'Ink Jet',
						'------Accessories------', 'VGA Cable', 'Power Cable', 'LAN Cable', 'TEL Cable', 'SATA Cable', 'Other Cable', 'Other'] },
						null,
						{ type: "select", values: [ 'B3', 'B4', 'B6'] },
						null,
						null
						]
                });
				$('#invoicetable').dataTable({
					"aaSorting": [[3, 'desc']],
					"iDisplayLength": 25,
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
				});
				$('#processtable').dataTable({
					"aaSorting": [[8, 'desc']],
					"iDisplayLength": 25,
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
				});
            });
		</script>
	<!-- End store table -->
	
	<!-- logout -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/logout_drop/pro_drop_1.css" />
	<script src="<?php echo base_url(); ?>assets/logout_drop/stuHover.js" type="text/javascript"></script>
	<!-- end logout -->
	
	<script type="text/javascript" charset="utf-8">
		$(function() { 
			//When the DOM is ready, we disable the matches list
			$('select#typeShow').attr('disabled',true);
			
		});
		function activate_match()
		{
			var category = $('select#categoriesSelect').val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>index.php/process_store/getTypeData',
				data: 'categorySend='+category,
				success: function(resp) {
					$('select#typeShow').attr('disabled',false).html(resp);
				}
			});
		}
		function chk_form(){  
			$(":input + span.require").remove();  
			$(":input").each(function(){  
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
		.require{
			color:red;
			font-size:12px;
		}
	</style>
 </head>
 <body>
	<div id="large_con">
		<?php echo $this->load->view('template/header'); ?>
		<?php echo $this->load->view('template/menu',array('id'=>'1')); ?>
		<div id="con">
			<div id="my_content">
			<?php
				if(isset($content_text)) echo $content_text;
				if(isset($content_view)){
					if(isset($content_data)){
						foreach($content_data as $key=>$value){$data[$key]=$value;}
						$this->load->view($content_view,$data);	
					}else{
						$this->load->view($content_view);
					}
				}
			?>
			</div>
			
		</div>
		<?php echo $this->load->view('template/footer'); ?>
	</div>
 </body>
</html>

