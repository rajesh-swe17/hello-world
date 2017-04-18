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
	if(isset($_GET['submit']))
{
		$search_id = $_GET['search'];
	$query = "select * from posts where post_title like '%search_id%'";
	$run = mysql_query($query);
	
	while($row=mysql_fetch_array($run))
	{
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_image = $row['post_image'];
		$post_content = substr($row['post_content'],0,100);
		
}

?>
<h2><a href="pages.php?id=<?php echo $post_id;?>"><?php echo $post_title; ?></a></h2>

<img src="images/<?php echo $post_image; ?>" />

<p align="justify"><?php echo $post_content; ?></p>
<P align="right"><a href="pages.php?id=<?php echo $post_id ?> ">Read More</a></P>
<?php } ?>
</div>


<div class="footer">This is footer</div>
</body>
</html>
