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

    #empsb:hover{
      color: gray;
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
            <a href="./index.php?page=evaluate" class="nav-link nav-evaluate">
            <i class="nav-icon fas fa-list-alt"></i>
              <p id="sb">
                Evaluate
              </p>
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