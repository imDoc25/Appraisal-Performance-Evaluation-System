<?php include('db_connect.php'); ?>
<?php 
function ordinal_suffix1($num){
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
$astat = array("Not Yet Started","On-going","Closed");
 ?>
<style>
  #home{
    background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
    
}
  #wcm{
    color: white;
    padding-top: 10px;
    padding-left: 10px;
  }

  .btn{
    
    float: right;
  }
  
  
  #AY{
    color: white;
    
  }

  #syadd{
    margin-right: 20px;
    margin-bottom: 2px;
    margin-top: 2px;
  }

  #syawd{
    margin: 2px;
    
  }

  
  thead{
    background-color: darkred;
    color: white;
  }

  .fa-award{
    margin: 5px;
	
  }

  .fa-clipboard-check{
	margin: 5px;
  }

  .fa-medal{
	margin: 5px;
  }

  #award{
	  color: whitesmoke;
	  padding-top: 5px;
  }
  </style>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
            <h1><strong> Welcome <?php echo $_SESSION['login_lastname'] ?>! </strong></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-danger">
      </div><!-- /.container-fluid -->
    </div>
  
<div class="container-fluid" id="home">
<p>.</p>
    
    
      <div class="card-body">
      
        
        
        <div class="col-md-15">
          <div class="callout callout-danger">
            <h4><b>School Year: <?php echo $_SESSION['academic']['year'] ?> </b></h4>
            <h5><b>Evaluation Category: <?php echo $_SESSION['academic']['semester'] ?></b></h5>
            <h5><b>Evaluation Status: <?php echo $astat[$_SESSION['academic']['status']] ?></b></h5>
            <button type="button" class="btn btn-danger">
            <a  href="./index.php?page=academic_list" class="nav-link nav-academic_list">
              <p id="AY"> 
                Manage School Year
              </p>
              </a>
            </button> 
          </div>
          
        </div>
        
    
	</div>
</div>
<br>


<div class="container-fluid" id="home">
<h1 align="center" id="award"><b><i class="fas fa-bullhorn"></i> Special Awards </b></h1>
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-outline card-danger">
							<div class="card-header" align="center"><h3><b><i class="fas fa-award"></i>Candidate for Promotion</b></h3>
            </div>
            <div class="card-tools">
				<a class="btn btn-danger new_promotion" id="syadd" href="javascript:void(0)"> Add New </a>
			
							<div class="card-body">
                
								<form action="" id="manage-promotion">
									
									<div class="form-group">
										
										<table class="table ">
				
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Fullname</th>
						<th>Work Field</th>
						<th>Category</th>
						<th>Position to Promote</th>
            			<th>Action</th>

			
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM promotion_list order by abs(workfield) desc,abs(semester) desc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
            <td><b><?php echo $row['fullname'] ?></b></td>
						<td><b><?php echo $row['workfield'] ?></b></td>
						<td><b><?php echo $row['semester'] ?></b></td>
						<td><b><?php echo $row['position'] ?></b></td>
						
						<td class="text-center">
		                    <div class="btn-group">
		                       
		                        <button type="button" class="btn btn-secondary btn-flat delete_promotion" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
          </td>
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
									</div>
								</form>
							</div>
							
						</div>
            
					</div>
          </div>

          <div class="col-md-6">
						<div class="card card-outline card-danger">
							<div class="card-header" align="center"><h3><b><i class="fas fa-clipboard-check"></i>Perfect Attendance</b></h3></div>
							<div class="card-body">
              <div class="card-tools">
				<a class="btn btn-danger new_attendance" id="syawd" href="javascript:void(0)"> Add New </a>
			
								<form action="" id="manage-criteria">
									
									<div class="form-group">
										
										<table class="table ">
				
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Fullname</th>
						<th>Work Field</th>
						<th>Category</th>
            			<th>Action</th>

			
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM attendance_list order by abs(workfield) desc,abs(semester) desc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
            <td><b><?php echo $row['fullname'] ?></b></td>
						<td><b><?php echo $row['workfield'] ?></b></td>
						<td><b><?php echo $row['semester'] ?></b></td>
						
						<td class="text-center">
		                    <div class="btn-group">
		                        
		                        <button type="button" class="btn btn-secondary btn-flat delete_attendance" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
									</div>
								</form>
							</div>
							
						</div>
            
					</div>
          </div>
          
          <div class="col-md-6">
						<div class="card card-outline card-danger">
							<div class="card-header" align="center"><h3><b><i class="fas fa-medal"></i>Best Employee of the Year</b></h3></div>
							<div class="card-body">
              
				<a class="btn btn-danger new_award" id="syawd" href="javascript:void(0)"> Add New </a>
		
								<form action="" id="manage-criteria">
									
									<div class="form-group">
										
										<table class="table ">
				
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Fullname</th>
						<th>Work Field</th>
						<th>Category</th>
            			<th>Action</th>

			
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM awardee_list order by abs(workfield) desc,abs(semester) desc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
            <td><b><?php echo $row['fullname'] ?></b></td>
						<td><b><?php echo $row['workfield'] ?></b></td>
						<td><b><?php echo $row['semester'] ?></b></td>
						
						<td class="text-center">
		                    <div class="btn-group">
		                        
		                        <button type="button" class="btn btn-secondary btn-flat delete_award" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
									</div>
								</form>
							</div>
							
						</div>
            
					</div>
          

          </div>
      </div>
</div>
<script>
  $(document).ready(function(){
		$('.new_promotion').click(function(){
			uni_modal("New Candidate","<?php echo $_SESSION['login_view_folder'] ?>manage_promotion.php")
		})
    $('.manage_promotion').click(function(){
			uni_modal("Manage Promotion","<?php echo $_SESSION['login_view_folder'] ?>manage_promotion.php?id="+$(this).attr('data-id'))
		})
		$('.delete_promotion').click(function(){
		_conf("Are you sure to delete this candidate?","delete_promotion",[$(this).attr('data-id')])
		})
    $('#list').dataTable()
	})

  function delete_promotion($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_promotion',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Candidate successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

  $(document).ready(function(){
		$('.new_attendance').click(function(){
			uni_modal("New Awardee","<?php echo $_SESSION['login_view_folder'] ?>manage_attendance.php")
		})
    $('.manage_attendance').click(function(){
			uni_modal("Manage Attendance Awardee","<?php echo $_SESSION['login_view_folder'] ?>manage_attendance.php?id="+$(this).attr('data-id'))
		})
		$('.delete_attendance').click(function(){
		_conf("Are you sure to delete this awardee?","delete_attendance",[$(this).attr('data-id')])
		})
    $('#list').dataTable()
	})

  function delete_attendance($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_attendance',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Awardee successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	$(document).ready(function(){
		$('.new_award').click(function(){
			uni_modal("New Awardee","<?php echo $_SESSION['login_view_folder'] ?>manage_award.php")
		})
    $('.manage_award').click(function(){
			uni_modal("Manage Awardee","<?php echo $_SESSION['login_view_folder'] ?>manage_award.php?id="+$(this).attr('data-id'))
		})
		$('.delete_award').click(function(){
		_conf("Are you sure to delete this awardee?","delete_award",[$(this).attr('data-id')])
		})
    $('#list').dataTable()
	})

  function delete_award($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_award',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Awardee successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

  </script>