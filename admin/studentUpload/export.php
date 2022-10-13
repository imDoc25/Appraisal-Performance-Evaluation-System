<?php  
 //export.php  
 if(!empty($_FILES["excel_file"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "dbevaluation");  
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xlsx")  
      {  
           include("PHPExcel/IOFactory.php");  
           $output = '';  
           $output .= "  
           <label class='text-success'>Data Inserted</label>  
                <table class='table table-bordered'>  
                     <tr>  
                    
                     <th>Employee ID</th> 
                          <th>First Name</th>  
                          <th>Last Name</th>  
                          <th>Email</th>  
                          <th>Password</th> 
                          <th>Category</th>
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {
                    $school_id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue()); 
                     $firstname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $lastname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                     $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
                     $password = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
                     $category = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                     $query = "  
                     INSERT INTO student_list  
                     (school_id, firstname, lastname, email, password, class_id)   
                     VALUES ('".$school_id."', '".$firstname."', '".$lastname."', '".$email."', '".$password."', '".$category."')  
                     ";  
                     mysqli_query($connect, $query);  
                     $output .= '  
                     <tr>  
                     <td>'.$school_id.'</td>  
                          <td>'.$firstname.'</td>  
                          <td>'.$lastname.'</td>  
                          <td>'.$email.'</td>  
                          <td>'.$password.'</td> 
                          <td>'.$category.'</td>  
                     </tr>  
                     ';  
                }  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo '<label class="text-danger">Invalid File</label>';  
      }  
 }  
 ?>  
