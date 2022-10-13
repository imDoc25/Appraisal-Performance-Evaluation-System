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
            <h1><strong> Category </strong></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-danger">
      </div><!-- /.container-fluid -->
    </div>

<div class="col-lg-12">
	<div class="card card-outline ">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-danger new_class" href="javascript:void(0)" id="studlvladd"> Add New </a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="60%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT *,concat(curriculum) as `class` FROM class_list order by class asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['class'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-danger btn-flat manage_class">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-secondary btn-flat delete_class" data-id="<?php echo $row['id'] ?>">
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
		$('#list').dataTable()
		$('.new_class').click(function(){
			uni_modal("New student level","<?php echo $_SESSION['login_view_folder'] ?>manage_class.php")
		})
		$('.manage_class').click(function(){
			uni_modal("Manage student level","<?php echo $_SESSION['login_view_folder'] ?>manage_class.php?id="+$(this).attr('data-id'))
		})
	$('.delete_class').click(function(){
	_conf("Are you sure to delete this class?","delete_class",[$(this).attr('data-id')])
	})
	})
	function delete_class($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_class',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Category successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>