<?php
session_start();

$name= $_POST["username"];
$pwd= $_POST["password"];
$ty=$_POST["optradio"];
$link=mysqli_connect('localhost','root','','portal');
mysql_select_db('portal');
$qr="SELECT password FROM $ty WHERE username = '$name' and password ='$pwd' ";
$result = mysqli_query($link,$qr);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];
$count = mysqli_num_rows($result);
      if($count == 1) 
      {
         ?>
     <script type="text/javascript">
     alert("logged in");
     </script>
  <?php
         $_SESSION["login_user"] = $name;
         $_SESSION["login_type"] = $ty;
         header("location: ".$ty.".php");
      }
    else {
     header("location:login.html");
      }
mysqli_close($link);
?>