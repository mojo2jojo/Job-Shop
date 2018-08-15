<?php
session_start();
if(!isset($_SESSION["login_user"])||$_SESSION["login_type"] != "jobseeker")
{
	?>
     <script type="text/javascript">
     alert("Log in as jobseeker first");
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
<br><br>
<form action="upload.php" enctype="multipart/form-data"  method="post" >

    <label ><font size="30%" color="White">Upload Your C.V.</font></label>
    <br>
    <input type="file" class="btn btn-danger" id="fileToUpload" name="fileToUpload" >
    <font size="%15" color="White">Caution:Upload file of type .pdf</font><br><br>
    <button type="submit" class="btn btn-success" name="cv" value= "<?php $_SESSION["login_user"] ?>" >Upload&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
    
</form>
<br>

<?php
echo "<a href=upload\\".$_SESSION["login_user"].".pdf><button class="." 'btn btn-success' ".">See Your C.V.</button></a>"
?>
<br><br>


<font size="40%"><span class="label label-success">Jobs Available:&nbsp;</span></font>
<?php

$link=mysqli_connect('localhost','root','','portal');
mysql_select_db('portal');
$name=$_SESSION["login_user"];
$sql = "SELECT jobid,comp, description, lin FROM jobs ";
$result = $link->query($sql);
if ($result->num_rows > 0) {
$count=0;
    while($row = $result->fetch_assoc()) {
    	$count=$count+1;
        echo "<br><br><font size= 9px color="." 'Orange' ".">" . $count.". ".$row["comp"]. "</font><br><font size="." 6px "."color="." 'LightGreen' ".">
        ".$row["description"]. "</font><br><h3><font color= "." 'Orange' ".">Apply Here:</font>&nbsp;</h3>
        <a href=".$row["lin"].">".$row["lin"]."</a>"."<br> <br>
        <HR color="." 'Red' "." size=10px> ";
    }
} else {
    echo "<br><br><font size= 10px color= "."'Red'"."> No jobs Available </font>";
}

$link->close();
?>
<br><br><br>
</div>
</body>
</html>
