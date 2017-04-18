<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert New Post</title>
</head>

<body>
<form method="post" action="insert_post.php" enctype="multipart/form-data">
<table align="center" border="10px" width="400px">
	<tr>
    	<td align="center" colspan="2" bgcolor="yellow"><h1>Insert New Post Here</h1></td>
    </tr>
	
    <tr>
    	<td>Post Title:</td>
        <td><input type="text" name="title" /></td>
    </tr>
    
    <tr>
    	<td>Post Author</td>
        <td><input type="text" name="author" /></td>
    </tr>
    
    <tr>
    	<td>Post Image:</td>
        <td><input type="file" name="image" /></td>
    </tr>
    
    <tr>
    	<td>Post Content:</td>
        <td><textarea name="content" cols="20" rows="20"></textarea></td>
    </tr>
    
    <tr>
    	
        <td colspan="2" align="center"><input type="submit" name="submit" value="Publish Now"/></td>
    </tr>

</table>

</form>
</body>
</html>
<?php
include("includes/connect.php");

if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$date = date('d/m/y');
	$author = $_POST['author'];
	$content = $_POST['content'];
	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	
if($title =='' or $author == '' or $content == ''){
	echo "<script> Alert ('any field is empty')</script>";
	exit();
	}
	
if($image_type =="image/jpeg" or $image_type == "image/png" or $image_type == "image/gif")
{
	if($image_size<=50000)
		{
		move_uploaded_file($image_tmp,"images/$image_name");
		}
	else{
		echo "<script>alert ('images size is larger than 50kb')</script>";
		}
}
	else{
		echo"<script>alert('image type is not valid')</script>";
		}
	
		
	$query = "insert into posts(post_title , post_date, post_author , post_image , post_content) values('$title' ,'$date' ,'$author' ,'$image_name' ,'$content')";
	
	if(mysql_query($query))
	{
		echo"<script><h1>Post Has been published</h1></script>";
		}
}

	
	
	
	
?>