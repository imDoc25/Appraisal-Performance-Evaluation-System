<?php
include '../db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM attendance_list where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-attendance">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="fullname" class="control-label">Fullname</label>
			<input type="text" class="form-control form-control-sm" name="fullname" id="fullname" value="<?php echo isset($fullname) ? $fullname : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="workfield" class="control-label">Work Field</label>
			<select type="text" class="form-control form-control-sm" name="workfield" id="workfield" value="<?php echo isset($workfield) ? $workfield : '' ?>" required>
				<option value="Faculty">Faculty</option>
				<option value="HR">HR</option>
				<option value="Registrar">Registrar</option>
				<option value="Maintenance">Maintenance</option>
				<option value="Security">Security</option>
				<option value="Clinic">Clinic</option>
  			</select>
		</div>
		<div class="form-group">
			<label for="semester" class="control-label">Category</label>
			<select type="text" class="form-control form-control-sm" name="semester" id="semester" value="<?php echo isset($semester) ? $semester : '' ?>" required>
				<option value="Academe">Academe</option>
				<option value="Non-Academe">Non-Academe</option>
  			</select>
		</div>
		
		
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-attendance').submit(function(e){
			e.preventDefault();
			start_load()
			$('#msg').html('')
			$.ajax({
				url:'ajax.php?action=save_attendance',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Awardee successfully saved.","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Awardee already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

</script>