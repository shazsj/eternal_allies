<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $item_name = $_POST['i_name'];
        $item_desc= $_POST['i_desc'];
        $item_price = $_POST['i_price'];
        $item_status = $_POST['i_status'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO items
         (item_name,item_image,item_price,item_desc,item_status) 
         VALUES ('$item_name','$image', $item_price,'$item_desc','$item_status')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>
        
?>