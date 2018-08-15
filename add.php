<?php
session_start();
$name= $_SESSION['login_user'];
$comp= $_POST["comp"];
$des=$_POST["des"];
$li=$_POST["li"];
$link=mysql_connect('localhost','root','','portal');
$qr="INSERT INTO jobs (username,comp,description,lin) values "."('$name','$comp','$des','$li')";
mysql_select_db('portal');
$ret=mysql_query($qr,$link);
if( $ret)
{  
         header("location:employer.php");
}
mysql_close($link);
?>