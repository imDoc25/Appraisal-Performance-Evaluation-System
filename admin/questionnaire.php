<?php include'db_connect.php' ?>

<style>
	.col-lg-12{
		background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
    
	}

	.card-header{
		background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
	}

	thead{
		background-color: darkred;
		color: white;
	}
	
	</style>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><strong> Manage Questionnaires </strong></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-danger">
      </div><!-- /.container-fluid -->
    </div>

<div class="col-lg-12">
	<div class="card card-outline ">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-danger new_academic" href="javascript:void(0)"> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="35%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>School Year</th>
						<th>Category</th>
						<th>Questions</th>
						<th>Answered</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM academic_list order by abs(year) desc,abs(semester) desc ");
					while($row= $qry->fetch_assoc()):
						$questions = $conn->query("SELECT * FROM question_list where academic_id ={$row['id']} ")->num_rows;
						$answers = $conn->query("SELECT * FROM evaluation_list where academic_id ={$row['id']} ")->num_rows;
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['year'] ?></b></td>
						<td><b><?php echo $row['semester'] ?></b></td>
						<td class="text-center"><b><?php echo number_format($questions) ?></b></td>
						<td class="text-center"><b><?php echo number_format($answers) ?></b></td>
						<td class="text-center">
						<div class="btn-group" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage questionnaires for this school year">
		                        <a href="./index.php?page=manage_questionnaire&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-flat manage_questionnaire">
								<i class="fas fa-user-edit"></i>
		                        </a>
		                        
	                      </div>

							
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.new_academic').click(function(){
			uni_modal("New School Year","<?php echo $_SESSION['login_view_folder'] ?>manage_academic.php")
		})
		$('.manage_academic').click(function(){
			uni_modal("Manage School Year","<?php echo $_SESSION['login_view_folder'] ?>manage_academic.php?id="+$(this).attr('data-id'))
		})
		$('.delete_academic').click(function(){
		_conf("Are you sure to delete this school year?","delete_academic",[$(this).attr('data-id')])
		})
		$('.make_default').click(function(){
		_conf("Are you sure to make this school year as the system default?","make_default",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_academic($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_academic',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	function make_default($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=make_default',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Dafaut Academic Year Updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	}
</script>