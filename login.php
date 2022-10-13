<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<style>
* {
    font-family: Georgia, 'Times New Roman', Times, serif;
}
strong{
  color: white;
}
.login-page{
    background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
    
}
.input-group{
    background-color: transparent;
}
[type=submit]{
    width: 100%;  
    height: 50px;  
    border: none;  
    margin-top: 20px;
    background-color: darkred;
    border-radius: 25px;   
    color: white; 
    font-size: 32x; 
    font-family: Georgia, 'Times New Roman', Times, serif, Helvetica, sans-serif;
}
[type=submit]:hover{
    background-color: red;
}
[type=emai]{
  border: none;
  width: 100px;
}

.form-group{
  color: white;
  text-align: center;
  background-color: transparent;
}

.mb-3{
  background-color: darkred;
}

  </style>

<?php include 'header.php' ?>
<body class="hold-transition login-page">
  <h2><strong>LOGIN</strong></h2>
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"></a>
  </div>
  <!-- /.login-logo -->
  <div class="container-fluid">
    <div class="card-body">
      <form action="" id="login-form">
        <div class="input-group mb-3">
        <div class="input-group-append">
        <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            </div>
          <input type="email" class="form-control" name="email" required placeholder="Email">
      
        </div>
        <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" name="password" required placeholder="Password">
          
        </div>
        <div class="form-group mb-2">
          <label for="">Login As</label>
          <select name="login" id="" class="custom-select custom-select-m ">
            
            
            <option value="1">Admin</option>
            <option value="2">Employee</option>
            <option value="3">Student</option>
          </select>
        </div>
        
          <!-- /.col -->
          <div class="submit">
            <button type="submit" alignment="center">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Incorrect Email or Password!</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
