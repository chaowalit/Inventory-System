<html>
	<head>
		<title>Error Store</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
	</head>
<body>
	<h3>Can not save this data to database</h3>
	<div style="text-align:left;">
		<ul><b>Please Enter data or</b>
			<li>You've added a duplicate data (see at model)</li>
			<li>You've added an incorrect data type</li>
		</ul>
	</div>
	<font size="1">Click the button below to try again</font><br>
	<a href="#" onclick="window.close(); window.opener.location.reload();"><input type="button" value="Back"></a>
</body>
</html>
