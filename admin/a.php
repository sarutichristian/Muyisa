<?php
require 'conn.php';
// If upload button is clicked ...

 
  /*
 

    $nam = $_POST["nam"];
    $pri =$_POST["pri"];

    $image =$_FILES["img"]["tmp_name"];
    $path ="../uploads";


    $name = basename($_FILES["img"]["name"]);
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename =time().'.'.$image_ext;

 
    // Get all the submitted data from the form
    $sql = "INSERT INTO products VALUES ('','$nam','$filename', NOW(),'$pri')";
 
    // Execute query
   $re= mysqli_query($con, $sql);
 if($re){
      
   move_uploaded_file($_FILES['img']['tmp_name'], $path .'/'.$filename);

   move_uploaded_file($image, "$path/$name");

    header("location:produit.php");
   }
   
   */



 
$statusMsg = ''; 
 
// File upload directory 
$targetDir = "../uploads/"; 
 
if(isset($_POST["submit"])){ 
    if(!empty($_FILES["file"]["name"])){ 

      $nam = $_POST["nam"];
      $pri =$_POST["pri"];
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 

        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $insert ="INSERT INTO products VALUES ('','".$nam."','".$fileName."', NOW(),'".$pri."')"; 
                $re=mysqli_query($con, $insert);
                if($insert){ 
                  header("location:produit.php");
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg;
   
   


?>