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
	.excadd{
		float: left;
	}
	
	
	</style>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><strong> Manage Employee </strong></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-danger">
      </div><!-- /.container-fluid -->
    </div>

<div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-header">
			<div class="card-tools">
			
				<a class="btn btn-secondary" id="categadd" href="./index.php?page=subject_list"> Manage Category </a>
				<a class="btn btn-danger" id="empadd" href="./index.php?page=new_faculty"> Add New </a>
				<a class="btn btn-danger" id="empadd" href="./index.php?page=new_evalacc"> Add New for Evaluation </a>
				<a class="btn btn-success" id="excadd" href="admin/employeeUpload/index.php"> Upload Excel File </a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$categ= array();
					$category = $conn->query("SELECT id,concat(subject) as `categ` FROM subject_list");
					while($row=$category->fetch_assoc()){
						$categ[$row['id']] = $row['categ'];
					}
					
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM faculty_list order by concat(firstname,' ',lastname) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['school_id'] ?></b></td>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo $row['email'] ?></b></td>

						<td><b><?php echo isset($categ[$row['categ_id']]) ? $categ[$row['categ_id']] : "N/A" ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="./index.php?page=edit_faculty&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-flat edit_faculty">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-secondary btn-flat delete_faculty" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
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
	$('.view_faculty').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Faculty Details","<?php echo $_SESSION['login_view_folder'] ?>view_faculty.php?id="+$(this).attr('data-id'))
	})
	$('.delete_faculty').click(function(){
	_conf("Are you sure to delete this employee?","delete_faculty",[$(this).attr('data-id')])
	})
		$('#list').dataTable()
	})
	function delete_faculty($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_faculty',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Employee successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>