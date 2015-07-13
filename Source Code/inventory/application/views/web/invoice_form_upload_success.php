<html>
	<head>
		<title>Upload Form</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form_page.css" type="text/css" />
	</head>
<body>

	<h3>Your file was successfully uploaded!</h3>

	<ul>
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
			
		<?php
		 endforeach; ?>
	</ul>
	<a href="#" onclick="window.close(); window.opener.location.reload();"><input type="button" value="Exit"></a>
</body>
</html>
