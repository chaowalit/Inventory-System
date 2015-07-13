<html>
	<head>
		<title>Error Invoice</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
	</head>
<body>
	<h3>Can not save this data to invoice database</h3>
	<div style="text-align:left;">
		<ul><b>Please Enter data or</b>
			<li>You've added a duplicate data (see at PO Number)</li>
			<li>You've added an incorrect data type</li>
		</ul>
	</div>
	<font size="1">Click the button below to try again</font><br>
	<a href="<?php echo site_url('invoiceController/show_invoice'); ?>">Back</a>
</body>
</html>
