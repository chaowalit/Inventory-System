<script type="text/javascript">
	$(function() { 
		showVender();
		showUserAccount();
		$('#btn_addVender').click(function() {
			var newVender = $('#newVendor').val();
			if(newVender == ""){
				alert( "Please, Insert Data to New Vender" );
			}else{
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>index.php/adminController/saveDataVender',
					data: 'vender='+newVender,
					success: function(resp) {
						$('#seccessSave').html(resp);
						showVender();
						cleanText();
					}
				});
			}
			
		});
		
		$('#btn_deleteVender').click(function(){
			if(confirm('Are you sure to delete this vender?')){
				var vender_Delete = $('#listVender').val();
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>index.php/adminController/deleteVender',
					data: 'vender_Delete='+vender_Delete,
					success: function(resp) {
						alert(resp);
						showVender();
						cleanText();
					}
				});
			}
		})
		
		$('#btn_SubmitAddUser').click(function(){
				var addNameUser = $('#nameAdd').val();
				var addSurNameUser = $('#surnameAdd').val();
				var addDeptUser = $('#deptAdd').val();
				var addExtUser = $('#extAdd').val();
				var addUserName = $('#username_control').val();
				var addPassword1User = $('#password1').val();
				var addPassword2User = $('#password2').val();
				var addStatusAdminUser = $('#statusUser').val();
				

				if(addNameUser == "" || addSurNameUser == "" || addDeptUser == "" || addExtUser == "" || addUserName == "" || addStatusAdminUser == "" || addPassword1User == ""){
					alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
				}else{
					var chk_Pass = chk_password_match();
					if(chk_Pass){
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>index.php/adminController/addUser',
							data: 'addNameUser='+addNameUser+'&addSurNameUser='+addSurNameUser+'&addDeptUser='+addDeptUser+'&addExtUser='+addExtUser+
									'&addUserName='+addUserName+'&addPassword2User='+addPassword2User+'&addStatusAdminUser='+addStatusAdminUser,
							success: function(resp) {
								$('#seccessSaveUser').html(resp);
								cleanText();
								showUserAccount();
							}
						});
					}else{
						
					}
				}
		})
		$('#btn_DeleteUser').click(function(){
			 
			 if(confirm('Are you sure to delete this User?')){
				var user_Delete = $('#select_userForDelete').val();
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>index.php/adminController/deleteUser',
					data: 'user_Delete='+user_Delete,
					success: function(resp) {
						alert(resp);
						showUserAccount();
						cleanText();
					}
				});
			}
		})
	});
	function showVender(){
		var vender = "vender";
		$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>index.php/adminController/getDataVender',
				data: 'vender='+vender,
				success: function(resp) {
					$('select#listVender').html(resp);
				}
		});
	}
	function showUserAccount(){
		$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>index.php/adminController/getDataUserAccount',
				success: function(resp) {
					$('select#select_userForDelete').html(resp);
				}
		});
	}
	function cleanText(){
		$('#newVendor').val("");
		$('#nameAdd').val("");
		$('#surnameAdd').val("");
		$('#deptAdd').val("");
		$('#extAdd').val("");
		$('#username_control').val("");
		$('#password1').val("");
		$('#password2').val("");
		
	}
	function chk_password_match(){
		$('span.require').remove();  
		var password1 = $('#password1').val();
		var password2 = $('#password2').val();
		if(password1 != password2){
			$('#password2').after("<span class=require>Password do not match!</span>"); 
			return false;
		}else{
			return true;
		}
	}

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
<div class="withdraw_dialog" title="Withdraw (Edit)">
	<center><b><h2>Administrator Panel</h2></b></center>
	<table width="100%">
	<tr><td valign="0" width="50%">
		<fieldset><legend><b>-Add new Menu-</b></legend>
			<table>
				<tr><td>New Vendor: </td><td><input type="text" name="newVendor" id="newVendor" style="width:250px;"></td><td>&emsp;<input type="button" class="btn btn-info" value="Save" id="btn_addVender"></td></tr>
				<tr><td colspan="3"><div id="seccessSave"></div></td></tr>
			</table>
		</fieldset>
		<fieldset><legend><b>-Delete Menu-</b></legend>
			<table>
				<tr><td>Delete Vendor: </td><td>
					<select name="invoice_vendor" style="width:280px;" id="listVender">
						
					</select>
				</td><td>&emsp;<input class="btn btn-info" type="button" value="Delete" id="btn_deleteVender"></td></tr>
			</table>
		</fieldset>
	</td><td valign="0">
		<form method="post" action="<?php echo site_url(); ?>/adminController/addUser">
			<fieldset><legend><b>-Add new user-</b></legend>
				<table width="100%" border="0">
					<tr><td>Name: </td><td><input type="text" id="nameAdd" style="width:150px;"></td></tr>
					<tr><td>Surname: </td><td><input type="text" id="surnameAdd" style="width:150px;"></td></tr>
					<tr><td>Dept: </td><td><input type="text" id="deptAdd" style="width:150px;"></td></tr>
					<tr><td>Ext Phone: </td><td><input type="text" id="extAdd" style="width:150px;"></td></tr>
					<tr><td>Username: </td><td><input type="text" id="username_control" style="width:150px;"></td></tr>
					<tr><td>Password: </td><td><input type="password" name="newpassword_control1" id="password1" style="width:150px;"></td></tr>
					<tr><td>Retype Password: </td><td><input type="password" name="newpassword_control2" id="password2" style="width:150px;"></td></tr>
					<tr><td>User Status:</td><td>
												<select id="statusUser">
													<option value="0">Normal User</option>
													<option value="1">Administrator</option>
												</select>
										  </td></tr>
					
					<tr><td colspan="2"><input class="btn btn-info" type="button" value="Save" id="btn_SubmitAddUser"/> <div id="seccessSaveUser"></div></td></tr>
				</table>
			</fieldset>
		</form>
		<fieldset><legend><b>-Delete User-</b></legend>
			<form method="post">
				<select style="width:230px;" id="select_userForDelete">
					
				</select>
				&emsp;<input class="btn btn-info" type="button" value="Delete" id="btn_DeleteUser">
			</form>		
		</fieldset>
	</td></tr>
	<tr><td colspan="2">
		<fieldset><legend><b>-Deleted Items-</b></legend>
			<table width="100%">
				Testing Items
			</table>
		</fieldset>
	</td></tr>
	</table>
</div>
