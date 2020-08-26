<!-- Template made by @TRIGGEREDNICK, GitHub -->

<!DOCTYPE html>
<html>
<head>

<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
	session_start();

$id = $_GET['id'];
$inc = "UPDATE ARTICLES SET Views = Views + 1 WHERE id = $id";
$sql = "SELECT * FROM ARTICLES WHERE id = $id";
$conn = mysqli_connect("localhost", "dexter", "dextersql@123", "articles");
$incr = mysqli_query($conn,$inc);
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);


?>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $row[2]?> - Dexteroot Daily</title>
    <link rel="stylesheet" type="text/css" href="css/style.min.css">
	<link rel="stylesheet" type="text/css" href="css/font.min.css">
</head>
 <body style="font-size: large;">
	<div class="header">

	<h1><?php echo $row[2]?></h1>
	<span class="author"><?php echo $row[3]?>&bull; <?php echo $row[1];?>&bull; <a href="index.php">Home</a>&bull; <?php echo $row[4]?> Views</span>
	</div>
	<div class="body">
<br>
<?php

echo $row[5];

?>
</body>
</html>
