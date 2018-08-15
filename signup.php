<?php
session_start();
$name= $_POST["username"];
$pwd= $_POST["password"];
$ty=$_POST["optradio"];
$link=mysql_connect('localhost','root','','portal');
$qr="INSERT INTO $ty (username,password) values "."('$name','$pwd')";
mysql_select_db('portal');
$ret=mysql_query($qr,$link);
if( $ret)
{  
	 ?>
 	
     <script type="text/javascript">
     alert("account created");
     </script>
  <?php
         $_SESSION['login_user'] = $name;
         $_SESSION['login_type'] = $ty;
         header("location: ".$ty.".php");
}
else
 { ?>
 	
     <script type="text/javascript">
     alert("username should be unique or check enteries");
     </script>
  <?php
     header("location:signup.html");
 }
mysql_close($link);
?>