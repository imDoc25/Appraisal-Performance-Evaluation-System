<?php include('db_connect.php');
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
    
<?php
	  
        ?>    

      <div class="card-body">
      
        <div class="col-md-15">
          <div class="callout callout-danger">
            <h4><b>School Year: <?php echo $_SESSION['academic']['year'] ?> </b></h4>
            <h5><b>Evaluation Category: <?php echo $_SESSION['academic']['semester'] ?></b></h5>
            <h5><b>Evaluation Status: <?php echo $astat[$_SESSION['academic']['status']] ?></b></h5>
            
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
						
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
									</div>
								</form>
							</div>
							
						</div>
            
				
          </div>

          <div class="col-md-6">
						<div class="card card-outline card-danger">
							<div class="card-header" align="center"><h3><b><i class="fas fa-clipboard-check"></i>Perfect Attendance</b></h3></div>
							<div class="card-body">
              
								<form action="" id="manage-criteria">
									
									<div class="form-group">
										
										<table class="table ">
				
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Fullname</th>
						<th>Work Field</th>
						<th>Category</th>
            

			
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
						
						
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
									</div>
								</form>
							</div>
							
						</div>
            
					
          </div>
          
          <div class="col-md-6">
						<div class="card card-outline card-danger">
							<div class="card-header" align="center"><h3><b><i class="fas fa-medal"></i>Best Employee of the Year</b></h3></div>
							<div class="card-body">
              
				
		
								<form action="" id="manage-criteria">
									
									<div class="form-group">
										
										<table class="table ">
				
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Fullname</th>
						<th>Work Field</th>
						<th>Category</th>
           				

			
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
    