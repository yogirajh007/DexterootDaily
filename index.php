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
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
//	session_start();

$date = date("Y-m-d");
$sql = "select * from articles.ARTICLES WHERE DATE(Date_Added) = '$date' ";
$views= "SELECT SUM(Views) FROM ARTICLES WHERE DATE(Date_Added)= '$date' ";
$conn = mysqli_connect("localhost", "dexterweb", "dExtersql@123", "articles");
$result = mysqli_query($conn,$sql);
$vc = mysqli_query($conn, $views);
$vrow = mysqli_fetch_row($vc);


?>
	<h1><?php echo "Articles Today";?></h1>
	<span class="author">Admin &bull; <?php echo date("d-F-Y");?> &bull; <a href="archive.php"> Archives </a>&bull; Views Today: <?php echo $vrow[0]?></span>
	</div>
	<div class="body" style="font-size: large;">
<br>
<?php

$ThatTime ="07:14:59";
if (time() <= strtotime($ThatTime)) {
  echo "Articles will be updated at 7:15AM. Check again later &#128521;";
}
else
{
	while($row = mysqli_fetch_row($result))
	{
		echo '<li><a href="view.php?id='.$row[0].'">'.$row[2].'- By - '.$row[3].'<br><br></a></li>';
	}
}
?>
</body>
</html>
