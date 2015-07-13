<?php
	$session_data = $this->session->userdata('logged_in');
	$user_name_login = $session_data['username'];
?>
<html>
	<head>
		<title>Add New User</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form_page.css" type="text/css" />
	</head>
<body>
	<h3>Save new user successfully</h3>
	<a href="<?php echo site_url(); ?>/admincontroller/index/<?php echo $user_name_login; ?>"><input type="button" value="Back"></a>
</body>
</html>
