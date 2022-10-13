  <style>
    * {
    font-family: Georgia, 'Times New Roman', Times, serif;
    }

    img{
    height: 50px;
    width: 50px;
    float: left;
    }

    #tag{
    font-family: 'Courier New', Courier, monospace;
    color: darkred;
    padding-left: 60px;
    padding-top: 3px;
    }

    .main-sidebar{
      background-color: whitesmoke;
      
    }

    

    .brand-link{
      background-color: whitesmoke;
      
    }

    
    #side{
      font-family: Georgia, 'Times New Roman', Times, serif;
      background-color: darkred;
      border-radius: 25px;
      width: 98%;
      margin: 2px;
      color: white;
      
    }

    #side:hover{
      background-color: red;
      
    }

    a,.nav-icon{
      color: white;
      
    }

    #sb{
      font-size: 20px;
    }
    
    a:hover{
      color: white;
    }

    #empsb{
      color: darkred;
    }

    #empsb:hover{
      color: red;
    }
    
    #sbs{
      font-size: 16px;
    }

    
    </style>
  
  <aside class="main-sidebar">
    
  
  
    <div class="dropdown">
    
   	<a class="brand-link">
     <img src = "cdsplogo.png">
        <h6 id="tag"><b>Colegio De <br>
        San Pedro</b></h6>
    </a>
    
    </div>
    <br>
    
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav  nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown" id="side">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p id="sb">
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item dropdown" id="side">
            <a href="./index.php?page=questionnaire" class="nav-link nav-questionnaire">
              <i class="nav-icon fas fa-file-alt"></i>
              <p id="sbs">
                Manage Questionnaires
              </p>
            </a>
          </li>
          
          
          
          <li class="nav-item dropdown" id="side">
            <a href="./index.php?page=report" class="nav-link nav-report">
            <i class="nav-icon fas fa-poll-h"></i>
              
              <p id="sb">
               Result
              </p>
            </a>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link nav-edit_user" id="side">
              <i class="nav-icon fas fa-users"></i>
              <p id="sb">
                Manage Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item" >
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item" >
                  <i class="fas fa-angle-right nav-icon" id="empsb"></i>
                  <p id="empsb"><b>Admin</b></p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="./index.php?page=faculty_list" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon" id="empsb"></i>
                  <p id="empsb"><b>Employee</b></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=student_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon" id="empsb"></i>
                  <p id="empsb"><b>Student</b></p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>