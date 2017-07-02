<?php
include("include/header.php");

    if (isset($_GET['catagory'])) {
        $catagory = mysqli_real_escape_string($db,$_GET['catagory']);
        $query = "SELECT * FROM posts WHERE catagory = '$catagory'";
    } else {
        $query = "SELECT * FROM posts";    
    }
    
    $posts = $db->query($query);


?>

<div class="blog-header">
    <h1 class="blog-title">Fun Movie House</h1>
    <p class="lead blog-description">
    	The official example template of creating a blog with Bootstrap.
    </p>
</div>


<?php  if($posts->num_rows>0){ 
    while ($row = $posts->fetch_assoc()) {
        if($row['id']<=1){
?>

<div class="blog-post">
    <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id']; ?>"><?php echo $row['title'];?></h2></a>
    <p class="blog-post-meta"><?php echo $row['date'];?>
    <a href="#"><?php echo $row['author'];?></a></p>
    <?php
        $body = $row['body'];
        echo substr($body, 0 ,400)."......  ";
    ?>
    <a href="single.php?post=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
</div>

<?php } else{ ?>

<nav class="mynavfooter">
    <a href="#"><button type="button" class="btn btn-primary">Previous</button></a>
    <a href="#"><button type="button" class="btn btn-success">Next</button></a>
</nav>


<?php } } } ?>








</div>

<?php
	include("include/footer.php");
?>
