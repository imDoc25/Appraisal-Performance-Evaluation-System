  <style>
    .user-img {
        border-radius: 50%;
        height: 25px;
        width: 25px;
        object-fit: cover;
        
    }

    .main-header{
      background-color: whitesmoke;
      
    }

    .fa-cog{
      margin: 5px;
    }
    
    .fa-power-off{
      margin: 5px;
    }

    #right{
      width: 100%;
    }
    .d-felx{
      color: darkred;
      font-size: 20px;
    }

    .dropdown-item:hover{
      background-color: darkred;
      color: white;
    }

  </style>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['login_id'])): ?>
      
    <?php endif; ?>
      
    </ul>

    <ul class="navbar-nav ml-auto">
     
      
     <li class="nav-item dropdown" id="right">
            <a class="nav-link"  data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
              <span>
                <div class="d-felx badge-pill">
                  
                <span><b><?php echo ucwords($_SESSION['login_firstname']) ?></b></span>
                  <span><b><?php echo ucwords($_SESSION['login_lastname']) ?></b></span>
                  <span class="fa fa-angle-down ml-2"></span>
                </div>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
              <a class="dropdown-item" href="javascript:void(0)" id="manage_account"><i class="fa fa-cog"></i> Manage Account</a>
              <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
            </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <script>
     $('#manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id=<?php echo $_SESSION['login_id'] ?>')
      })
  </script>
