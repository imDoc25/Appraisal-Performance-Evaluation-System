<html>  
      <head>  
           <title>Appraisal Performance Evaluation System</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>  
                body  
                {  
                     margin:0;  
                     padding:0;  
                     background-color:#f1f1f1;  
                }  
                .box  
                {  
                     width:900px;  
                     padding:20px;  
                     background-color:#fff;  
                     border:1px solid #ccc;  
                     border-radius:5px;  
                     margin-top:100px;  
                }  
                body{
                    background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
                }
                #save{
                     float: right;
                }
           </style>  
      </head>  
      <body>  
           <div class="container box">  
                <h3 align="center"><strong>Upload Excel File</strong></h3> 
                
                <hr class="border-danger"> 
                <a class="btn btn-danger" id="save" href="../../index.php"> Save </a>
                <br /><br />  
                <form mehtod="post" id="export_excel">  
                     <h4>Select Excel<h4>
                     <a class="btn btn-danger"><input type="file" name="excel_file" id="excel_file" /></a>
                </form>  
                <br />  
                <br />  
                <div id="result">  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#excel_file').change(function(){  
           $('#export_excel').submit();  
      });  
      $('#export_excel').on('submit', function(event){  
           event.preventDefault();  
           $.ajax({  
                url:"export.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#result').html(data);  
                     $('#excel_file').val('');  
                } 
           });  
      });  
 });  
 </script>  