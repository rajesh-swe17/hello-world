<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Malala</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<div id="top"><p>This is Top bar</p></div>
<?php include('header.php'); ?>

<?php include('nav.php'); ?>
<?php include('sidebar.php'); ?>
<div class="post_body">
<?php
include('connect.php');
$page_id = $_GET['id'];

$query = "select * from posts where post_id= '$page_id' ";

$run = mysql_query($query);

while($row = mysql_fetch_array($run))
	{
		$title = $row['post_title'];
		$date = $row['post_date'];
		$author = $row['post_author'];
		$image = $row['post_image'];
		$content = $row['post_content'];
	
?>


<h2><?php echo $title; ?></h2>
<p>Published On:&nbsp;<?php echo $date ;?></p>
<p align="right">Posted By : &nbsp;&nbsp;<?php echo $author; ?>
</p>
<img src="images/<?php echo $image; ?>" />

<p align="justify"><?php echo $content; ?></p>

<?php } ?>
</div>


<div class="footer">This is footer</div>
</body>
</html>
