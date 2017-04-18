<div class="post_body">
<?php
include('connect.php');

$query = "select * from posts order by 1 DESC ";
//$query = "select * from posts order rand() LIMIT 0,4 ";//// uses for seen 4 image in front
$run = mysql_query($query);

while($row = mysql_fetch_array($run))
	{
		$post_id = $row['post_id'];
		$title = $row['post_title'];
		$date = $row['post_date'];
		$author = $row['post_author'];
		$image = $row['post_image'];
		$content = substr($row['post_content'],0,200); 
	
?>


<h2><a href="../pages.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a></h2>
<p>Published On:&nbsp;<?php echo $date ;?></p>
<p align="right">Posted By : &nbsp;&nbsp;<?php echo $author; ?>
</p>
<img src="images/<?php echo $image; ?>" />

<p align="justify"><?php echo $content; ?></p>
<P align="right"><a href="pages.php?id=<?php echo $post_id ?> ">Read More</a></P>
<?php } ?>












</div>
