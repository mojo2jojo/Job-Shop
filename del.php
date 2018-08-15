<?php
$val=$_POST["b"];
$link=mysqli_connect('localhost','root','','portal');
mysql_select_db('portal');
$qr="DELETE FROM jobs WHERE jobid= '$val' ";
$result = mysqli_query($link,$qr);
header("location:admin.php");
mysql_close($link);
?>