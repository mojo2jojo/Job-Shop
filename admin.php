<?php
session_start();
if(!isset($_SESSION["login_type"])||$_SESSION["login_type"] != "admin")
{
	?>
     <script type="text/javascript">
     alert("Log in as admin first");
     window.location="adminlogin.html";
     </script>
  <?php
}
?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="image/Job-Fair.png" rel="icon"/>
<title>JOBS AT MAIL</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
<link href="style.css" rel="stylesheet">

</head>
<body>
<div class="back">
 <div class="head">
    <a  href="index.html" >Home</a>
   </div>
  <div class="head">
    <a  href="jobseeker.php">Jobseeker</a>
   </div>
  <div class="head">
     <a href="employer.php">Employer</a>
  </div>
  <div class="head">
     <a href="admin.php">Admin</a>
  </div>
  <div class="head">
     <a href="aboutus.html">Contact Us</a>
  </div>
  <div class="head">
     <a  href="login.html">Login</a>
  </div>
  <div class="head">
     <a href="logout.php">Logout</a>
  </div>

<br><br>
 <center><h1><font color= "White" id="job"><u>Welcome Admin</u></font></h1></center>";

<br>
<div align="right"><a href="#seek"><button type="button" class="btn btn-danger" >Get Jobseekers</button></a></div>
<br>
<hr>
<br>
<font size="40%"><span class="label label-success" >Jobs Posted:&nbsp;</span></font>
<?php
$link=mysqli_connect('localhost','root','','portal');
mysql_select_db('portal');
$sql = "SELECT jobid,comp, description, lin FROM jobs ";
$result = $link->query($sql);
if ($result->num_rows > 0) {
$count=0;
    while($row = $result->fetch_assoc()) {
    	$count=$count+1;
        echo "<br><br><font size= 9px color="." 'Orange' ".">" . $count.". ".$row["comp"]. "</font><br><font size="." 6px "."color="." 'LightGreen' ".">
        ".$row["description"]. "</font><br>
        <a href=".$row["lin"].">".$row["lin"]."</a>"."<br> <br><form action="." 'del.php' "." method ="." 'post' ".">
         <button name="." 'b' "." type="." 'submit' "." class="."btn btn-danger"." style="." 'background-color : #4CAF50;' "."value=".$row["jobid"].">
        &nbsp; Remove Job &nbsp;</button></form>"."
        <HR color="." 'Red' "." size=10px> ";
    }
} else {
    echo "<br><br><font size= 10px color= "."'Red'"."> No jobs Posted </font>";
}
$link->close();
?>
<br>
<div align="right"><a href="#job"><button type="button" class="btn btn-danger">Get Jobs</button></a></div>
<br>
<font size="40%"><span class="label label-success" id="seek">JobSeekers:&nbsp;</span></font>
<br>
<?php

$link=mysqli_connect('localhost','root','','portal');
mysql_select_db('portal');
$sql = "SELECT id,username FROM jobseeker ";
$result = $link->query($sql);
if ($result->num_rows > 0) {
$count=0;
    while($row = $result->fetch_assoc()) {
    	$count=$count+1;
        echo "<br><br><font size= 6px color="." 'Orange' ".">" . $count.". ".$row["username"]. "</font><br><br><form action="." 'rem.php' "." method ="." 'post' ".">
         <button name="." 'b' "." type="." 'submit' "." class="."btn btn-danger"." style="." 'background-color : #4CAF50;' "."value=".$row["id"].">
         Remove Profile</button></form>"."<br><a href=upload\\".$row["username"].".pdf><button class="." 'btn btn-success' ".">See C.V.</button></a>"."
        <HR color="." 'Red' "." size=10px> ";
    }
} else {
    echo "<br><br><font size= 10px color= "."'Red'"."> No JobSeekers </font>";
}

$link->close();
?>
<br><br><br>

</div>
</body>
</html>
