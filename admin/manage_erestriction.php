<?php
include '../db_connect.php';
?>
<style>
	thead{
		background-color: gray;
		color: white;
		
	}
	
	</style>
<div class="container-fluid">
	<form action="" id="manage-erestriction">
		<div class="row">
			<div class="col-md-4 border-right">
				<input type="hidden" name="academic_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
				<div id="msg" class="form-group"></div>
				<div class="form-group">
					<label for="" class="control-label">Faculty</label>
					<select name="" id="efaculty_id" class="form-control form-control-sm select2">
						<option value=""></option>
						<?php 
						$faculty = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM faculty_list order by concat(firstname,' ',lastname) asc");
						$f_arr = array();
						while($row=$faculty->fetch_assoc()):
							$f_arr[$row['id']]= $row;
						?>
						<option value="<?php echo $row['id'] ?>" <?php echo isset($efaculty_id) && $efaculty_id == $row['id'] ? "selected" : "" ?>><?php echo ucwords($row['name']) ?></option>
						<?php endwhile; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="" class="control-label">Evaluator</label>
					<select name="" id="categ_id" class="form-control form-control-sm select2">
						<option value=""></option>
						<?php 
						$category = $conn->query("SELECT id,concat(curriculum) as categ FROM category_list");
						$c_arr = array();
						while($row=$category->fetch_assoc()):
							$c_arr[$row['id']]= $row;
						?>
						<option value="<?php echo $row['id'] ?>" <?php echo isset($categ_id) && $categ_id == $row['id'] ? "selected" : "" ?>><?php echo $row['categ'] ?></option>
						<?php endwhile; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="" class="control-label">Category/Work Field</label>
					<select name="" id="esubject_id" class="form-control form-control-sm select2">
						<option value=""></option>
						<?php 
						$subject = $conn->query("SELECT id,concat(subject,' - ',code) as subj FROM subject_list");
						$s_arr = array();
						while($row=$subject->fetch_assoc()):
							$s_arr[$row['id']]= $row;
						?>
						<option value="<?php echo $row['id'] ?>" <?php echo isset($esubject_id) && $esubject_id == $row['id'] ? "selected" : "" ?>><?php echo $row['subj'] ?></option>
						<?php endwhile; ?>
					</select>
				</div>
				<div class="form-group">
					<div class="d-flex w-100 justify-content-center">
						<button class="btn btn-sm btn-flat btn-danger bg-gradient-danger" id="add_to_list" type="button">Add to List</button>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<table class="table table-condensed" id="r-list">
					<thead>
						<tr>
							<th>Employee</th>
							<th>Evaluator</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$restriction = $conn->query("SELECT * FROM erestriction_list where academic_id = {$_GET['id']} order by id asc");
						while($row=$restriction->fetch_assoc()):
						?>
						<tr>
							<td>
								<b><?php echo isset($f_arr[$row['efaculty_id']]) ? $f_arr[$row['efaculty_id']]['name'] : '' ?></b>
								<input type="hidden" name="rid[]" value="<?php echo $row['id'] ?>">
								<input type="hidden" name="efaculty_id[]" value="<?php echo $row['efaculty_id'] ?>">
							</td>
							<td>
								<b><?php echo isset($c_arr[$row['categ_id']]) ? $c_arr[$row['categ_id']]['categ'] : '' ?></b>
								<input type="hidden" name="categ_id[]" value="<?php echo $row['categ_id'] ?>">
							</td>
							<td>
								<b><?php echo isset($s_arr[$row['esubject_id']]) ? $s_arr[$row['esubject_id']]['subj'] : '' ?></b>
								<input type="hidden" name="esubject_id[]" value="<?php echo $row['esubject_id'] ?>">
							</td>
							<td class="text-center">
								<button class="btn btn-sm btn-outline-danger" onclick="$(this).closest('tr').remove()" type="button"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('.select2').select2({
		    placeholder:"Please select here",
		    width: "100%"
		  });
		$('#manage-erestriction').submit(function(e){
			e.preventDefault();
			start_load()
			$('#msg').html('')
			$.ajax({
				url:'ajax.php?action=save_erestriction',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Successfully assign","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Already exist.</div>')
						end_load()
					}
				}
			})
		})
		$('#add_to_list').click(function(){
			start_load()
			var frm = $('#manage-erestriction')
			var cid = frm.find('#categ_id').val()
			var fid = frm.find('#efaculty_id').val()
			var sid = frm.find('#esubject_id').val()
			var f_arr = <?php echo json_encode($f_arr) ?>;
			var c_arr = <?php echo json_encode($c_arr) ?>;
			var s_arr = <?php echo json_encode($s_arr) ?>;
			var tr = $("<tr></tr>")
			tr.append('<td><b>'+f_arr[fid].name+'</b><input type="hidden" name="rid[]" value=""><input type="hidden" name="efaculty_id[]" value="'+fid+'"></td>')
			tr.append('<td><b>'+c_arr[cid].categ+'</b><input type="hidden" name="categ_id[]" value="'+cid+'"></td>')
			tr.append('<td><b>'+s_arr[sid].subj+'</b><input type="hidden" name="esubject_id[]" value="'+sid+'"></td>')
			tr.append('<td class="text-center"><span class="btn btn-sm btn-outline-danger" onclick="$(this).closest(\'tr\').remove()" type="button"><i class="fa fa-trash"></i></span></td>')
			$('#r-list tbody').append(tr)
			frm.find('#categ_id').val('').trigger('change')
			frm.find('#efaculty_id').val('').trigger('change')
			frm.find('#esubject_id').val('').trigger('change')
			end_load()
		})
	})

</script>