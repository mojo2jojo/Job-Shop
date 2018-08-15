<?php
session_start();
if(!isset($_SESSION["login_user"])||$_SESSION["login_type"] != "employer")
{
  ?>
  <script type="text/javascript">
     alert("login as employer first");
     window.location="login.html";
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
<?php
 echo "<center><h1><font color= "." 'White' ".">Welcome ".$_SESSION["login_user"]."</font></h1></center>";
?>
<br>
<div align="right"><a href="#content"><button type="button" class="btn btn-danger">Post Job</button></a></div>
<font size="40%"><span class="label label-success">Jobs Posted:&nbsp;</span></font>
<?php

$link=mysqli_connect('localhost','root','','portal');
mysql_select_db('portal');
$name=$_SESSION["login_user"];
$sql = "SELECT jobid,comp, description, lin FROM jobs WHERE username= '$name' ";
$result = $link->query($sql);
if ($result->num_rows > 0) {
$count=0;
    while($row = $result->fetch_assoc()) {
    	$count=$count+1;
        echo "<br><br><font size= 9px color="." 'Orange' ".">" . $count.". ".$row["comp"]. "</font><br><font size="." 6px "."color="." 'LightGreen' ".">
        ".$row["description"]. "</font><br>
        <a href=".$row["lin"].">".$row["lin"]."</a>"."<br> <br>
        <HR color="." 'Red' "." size=10px> ";
    }
} else {
    echo "<br><br><font size= 10px color= "."'Red'"."> No jobs Posted </font>";
}

$link->close();
?>
<br><br><br>
<center>
<h1><span class="label label-danger" id="content">Post Here</span></h1><br>
</center>
<div class="gr">
<form action="add.php" method="post">
 <div class="form-group">
    <label for="exampleInputName2"><h3><font color="White">Company Name:</font></h3></label>
    <input type="text" class="form-control" name="comp" placeholder="Company Name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputName2"><h3><font color="White">Description:</font></h3></label>
    <textarea  class="form-control" name="des" rows="5" cols="50" placeholder="Description" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputName2"><h4><font color="White">Link for more:</font></h4></label>
    <input type="text" class="form-control" name="li" placeholder="Paste Here" required>
  </div>
  <br><br>
    <button type="submit" class="btn btn-success"> &nbsp; &nbsp; &nbsp; Post &nbsp; &nbsp; &nbsp;</button>
</form>
<br><br><br>
</div>
<hr color="Red">
</div>
</body>
</html>
