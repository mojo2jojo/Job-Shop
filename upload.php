<?php
session_start();
$target="upload/";
$na=$_SESSION["login_user"];
$_FILES['fileToUpload']['name']=$na.".pdf";
$target1=$target.basename($_FILES['fileToUpload']['name']);

if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target1)){
	header("location:jobseeker.php");
      }
         
else{
     echo"Error While Uploading";
         }

?>