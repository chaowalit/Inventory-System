<script type="text/javascript">

	function update_chk_password_match(){
		$('span.require_update').remove();  
		var password1 = $('#idnewpassword1up').val();
		var password2 = $('#idnewpassword2up').val();
		if(password1 != password2){
			$('#idnewpassword2up').after("<span class=require_update>Password do not match!</span>"); 
			return false;
		}else{
			return true;
		}
	}
</script>

<!-- Withdraw Popup -->
<div class="withdraw_dialog" >
	<center><b><h2>Change Password</h2></b></center>
		<form method="post" action="<?php echo site_url(); ?>/adminController/updatePass" onsubmit="return update_chk_password_match()">
		
				<table width="50%" align="center">
					<tr><td>Old Password: </td><td><input type="password" name="oldpasswordup" /></td></tr>
					<tr><td>New Password: </td><td><input type="password" id="idnewpassword1up" name="newpassword1up"></td></tr>
					<tr><td>Comfirm Password: </td><td><input type="password" id="idnewpassword2up" name="newpassword2up"></td></tr>
					<tr><td colspan="2"><input class="btn btn-info" type="submit" value="Save">&emsp;<input class="btn btn-info" type="reset" value="Clear"></td></tr>
				</table>

		</form>
</div>
