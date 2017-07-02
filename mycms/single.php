<?php
include("include/header.php");
if (isset($_GET['post'])) {
    $id = mysqli_real_escape_string($db,$_GET['post']);
    $query = "SELECT * FROM posts WHERE id = '$id'";
}

$posts = $db->query($query);


?>

<br>


<?php  if($posts->num_rows>0){ 
    while ($row = $posts->fetch_assoc()) {
?>

<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $row['title'];?></h2>

    <p class="blog-post-meta"><?php echo $row['date'];?>

    <a href="#"><?php echo $row['author'];?></a></p>

    <?php
        $body = $row['body'];
        echo $body;
    ?>

</div>

<?php } } ?>



</div>



<?php
    include("include/footer.php");
?>
