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
  .card-body{
    background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
    
}

  h4{
    color: white;
    
  }

  #LG{
	  float: right;
	  width: 200px;
	  height: 40px;
    margin: 5px;
  }
  
  
  
  </style>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><strong> Evaluation Time <?php echo $_SESSION['login_lastname'] ?>! </strong></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-danger">
      </div><!-- /.container-fluid -->
    </div>
  
	

	<div class="card-body">
	<h4><b>In order to evaluate, use your default account and login as a student.</b></h4>
	 
	  <button type="button" class="btn btn-danger" id="LG">
            <a  href="ajax.php?action=logout">
              <p > 
                LOGIN
              </p>
              </a>
            </button> 

  </div>

