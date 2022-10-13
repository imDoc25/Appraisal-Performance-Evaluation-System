<?php 
include 'db_connect.php';

if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM academic_list where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return $num.'st';
            case 2: return $num.'nd';
            case 3: return $num.'rd';
        }
    }
    return $num.'th';
}
?>
<style>
	#container{
		background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
    
	}

	

	
	</style>

<div class="container-fluid" id="container">
	<div class="row">
		<div class="col-md-4">
			<br>
			<div class="card card-danger card-danger">
				<div class="card-header">
					<b>Question Form</b>
				</div>
				<div class="card-body">
					<form action="" id="manage-question">
						<input type="hidden" name="academic_id" value="<?php echo isset($id) ? $id : '' ?>">
						<input type="hidden" name="id" value="">
						<div class="form-group">
							<label for="">Criteria</label>
							<select name="criteria_id" id="criteria_id" class="custom-select custom-select-sm select2">
								<option value=""></option>
							<?php 
								$criteria = $conn->query("SELECT * FROM criteria_list order by abs(order_by) asc ");
								while($row = $criteria->fetch_assoc()):
							?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['criteria'] ?></option>
							<?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Question</label>
							<textarea name="question" id="question" cols="30" rows="4" class="form-control" required=""><?php echo isset($question) ? $question : '' ?></textarea>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-end w-100">
						<button class="btn btn-sm btn-danger btn-flat bg-gradient-danger mx-1" form="manage-question">Save</button>
						<button class="btn btn-sm btn-flat btn-secondary bg-gradient-secondary mx-1" form="manage-question" type="reset">Cancel</button>
					</div>
					<div class="btn-group" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Criteria">
		                        <a href="./index.php?page=criteria_list" class="btn btn-danger btn-flat criteria_list">
								<i class="fas fa-user-plus"></i>
		                        </a>
		                        
	                      </div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<br>
			<div class="card card-outline ">
				<div class="card-header">
					<b>Evaluation Questionnaire for School Year: <?php echo $year. " - " .$semester?> </b><br><br>
					
					<div class="card-tools">
						<button class="btn btn-sm btn-flat btn-secondary bg-gradient-secondary mx-1" id="eval_restrict" type="button">Assign Evaluation</button>
						<button class="btn btn-sm btn-flat btn-danger bg-gradient-danger mx-1" form="order-question">Save Order</button>
					</div>
				</div>
				<div class="card-body">
					<fieldset class="border border-dark p-2 w-100">
					   <legend  class="w-auto">Rating Legend</legend>
					   <p align="center">5 = Strongly Agree, 4 = Agree, 3 = Uncertain, 2 = Disagree, 1 = Strongly Disagree</p>
					</fieldset>
					<form id="order-question">
					<div class="clear-fix mt-2"></div>
					<?php 
							$q_arr = array();
						$criteria = $conn->query("SELECT * FROM criteria_list order by abs(order_by) asc ");
						while($crow = $criteria->fetch_assoc()):
					?>
					<table class="table table-condensed">
						<thead>
							<tr class="bg-gradient-dark">
								<th colspan="2" class=" p-1"><b><?php echo $crow['criteria'] ?></b></th>
								<th class="text-center">5</th>
								<th class="text-center">4</th>
								<th class="text-center">3</th>
								<th class="text-center">2</th>
								<th class="text-center">1</th>
							</tr>
						</thead>
						<tbody class="tr-sortable">
							<?php 
							$questions = $conn->query("SELECT * FROM question_list where criteria_id = {$crow['id']} and academic_id = $id order by abs(order_by) asc ");
							while($row=$questions->fetch_assoc()):
							$q_arr[$row['id']] = $row;
							?>
							<tr class="bg-white">
								<td class="p-1 text-center" width="5px">
									<span class="btn-group dropright">
									  <span type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									   <i class="fa fa-ellipsis-v"></i>
									  </span>
									  <div class="dropdown-menu">
									     <a class="dropdown-item edit_question" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Edit</a>
					                      <div class="dropdown-divider"></div>
					                     <a class="dropdown-item delete_question" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete  </a>
									  </div>
									</span>
								</td>
								<td class="p-1" width="40%">
									<?php echo $row['question'] ?>
									<input type="hidden" name="qid[]" value="<?php echo $row['id'] ?>">
								</td>
								<?php for($c=0;$c<5;$c++): ?>
								<td class="text-center">
									<div class="icheck-success d-inline">
				                        <input type="radio" name="qid[<?php echo $row['id'] ?>][]" id="qradio<?php echo $row['id'].'_'.$c ?>">
				                        <label for="qradio<?php echo $row['id'].'_'.$c ?>">
				                        </label>
			                      </div>
								</td>
								<?php endfor; ?>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
					<?php endwhile; ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

<script>
	$(document).ready(function(){
     $('.select2').select2({
	    placeholder:"Please select here",
	    width: "100%"
	  });
     })
	$('.edit_question').click(function(){
		var id = $(this).attr('data-id')
		var question = <?php echo json_encode($q_arr) ?>;
		$('#manage-question').find("[name='id']").val(question[id].id)
		$('#manage-question').find("[name='question']").val(question[id].question)
		$('#manage-question').find("[name='criteria_id']").val(question[id].criteria_id).trigger('change')
	})
	$('.delete_question').click(function(){
		_conf("Are you sure to delete this question?","delete_question",[$(this).attr('data-id')])
		})
	$('#eval_restrict').click(function(){
		uni_modal("Assign Evaluation","<?php echo $_SESSION['login_view_folder'] ?>manage_restriction.php?id=<?php echo $id ?>","mid-large")
	})
	$('.tr-sortable').sortable()
	$('#manage-question').on('reset',function(){
			$(this).find('input[name="id"]').val('')
			$('#manage-question').find("[name='criteria_id']").val('').trigger('change')
		})
    $('#manage-question').submit(function(e){
    	e.preventDefault()
    	start_load()
    	if($('#question').val() == ''){
    		alert_toast("Please fill the question description first",'error');
    		end_load();
    		return false;
    	}
    	$.ajax({
    		url:'ajax.php?action=save_question',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Question successfully saved',"success");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
    	})
    })
    $('#order-question').submit(function(e){
    	e.preventDefault()
    	start_load()
    	$.ajax({
    		url:'ajax.php?action=save_question_order',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Order successfully saved',"success");
					end_load()
				}
			}
    	})
    })
    function delete_question($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_question',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Question successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>