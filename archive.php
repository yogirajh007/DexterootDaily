<!-- Template made by @TRIGGEREDNICK, GitHub -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dexteroot Daily</title>
    <link rel="stylesheet" type="text/css" href="css/style.min.css">
	<link rel="stylesheet" type="text/css" href="css/font.min.css">
</head>
<body>
	<div class="header">
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
	session_start();

$da = date("Y-m-d");
$sql1 = "select DISTINCT(AUTHOR) from ARTICLES";
$conn1 = mysqli_connect("localhost", "dexterweb", "dExtersql@123", "articles");
$result1 = mysqli_query($conn1,$sql1);



?>
	<h1><?php echo "Archives";?></h1>
	<span class="author">Admin &bull; <?php echo date("d-F-Y");?>&bull;  <a href="index.php"> Home</a></span>
	</div>
	<div class="body" style="font-size: large;">
<br>
<form action="">
  <label for="Date">Select Date:</label>
  <input type="date" id="Date" name="Date">
  <input type="submit">
</form>
<br>
OR
<br>
<br>
<form action="">
  <label for="Date">Select Author:</label>
  <select name="Author">
<?php
while($row1 = mysqli_fetch_row($result1))
{
	echo '<option value="'.$row1[0].'">'.$row1[0].'</option>';
}
?>
  <input type="submit">
</form>
<br>
<?php
if(isset($_GET['Date']))
{
$da =  $_GET['Date'];
$sql = "select * from articles.ARTICLES WHERE DATE(Date_Added) = '$da' ";
$conn = mysqli_connect("localhost", "dexterweb", "dExtersql@123", "articles");
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_row($result))
{
	echo '<li><a href="view.php?id='.$row[0].'">'.$row[2].'- By - '.$row[3].'<br><br></a></li>';
}
}
if(isset($_GET['Author']))
{
$da =  $_GET['Author'];
$sql = "select * from articles.ARTICLES WHERE AUTHOR  = '$da' ";
$conn = mysqli_connect("localhost", "dexterweb", "dExtersql@123", "articles");
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_row($result))
{
	echo '<li><a href="view.php?id='.$row[0].'">'.$row[2].'- By - '.$row[3].'<br><br></a></li>';
}
}
?>
</body>
</html>
