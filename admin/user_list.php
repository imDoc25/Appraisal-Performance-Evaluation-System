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
            <h1><strong> Manage Admin </strong></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-danger">
      </div><!-- /.container-fluid -->
    </div>


<div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-danger " id="admadd" href="./index.php?page=new_user"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users order by concat(firstname,' ',lastname) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo $row['email'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="./index.php?page=edit_user&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-flat edit_user">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-secondary btn-flat delete_user" data-id="<?php echo $row['id'] ?>">
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
	$('.view_user').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> User Details","view_user.php?id="+$(this).attr('data-id'))
	})
	$('.delete_user').click(function(){
	_conf("Are you sure to delete this admin?","delete_user",[$(this).attr('data-id')])
	})
		$('#list').dataTable()
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Admin successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>