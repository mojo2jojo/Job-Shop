<?php
session_start();

$name= $_POST["username"];
$pwd= $_POST["password"];
if($name=="admin" && $pwd=="admin")
{
  $_SESSION["login_type"] = "admin";
  header("location:admin.php");
}
else
{ ?>
  <script type="text/javascript">
     alert("Not Admin");
     window.location="adminlogin.html";
     </script>
     <?php
}
?>
