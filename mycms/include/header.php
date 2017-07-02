<?php
    include("include/config.php");
    include("include/db.php");

    $query = "SELECT * FROM catagories";
    $catagories = $db->query($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Blog</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <?php
                    if (isset($_GET['catagory'])) {
                ?>
                <a class="blog-nav-item" href="index.php">Home</a>
                <?php } else{ ?>
                     <a class="blog-nav-item active" href="index.php">Home</a>
                <?php } ?>
                <?php
                if ($catagories->num_rows>0) {
                    while ($row = $catagories->fetch_assoc()) {
                        if(isset($_GET['catagory']) && $row['id'] == $_GET['catagory']){
                ?>
                <a class="blog-nav-item active" href="index.php?catagory=<?php echo $row['id'];?>"><?php echo $row['text']; ?></a>
                <?php }
                    else{
                        echo "<a class='blog-nav-item' href='index.php?catagory=$row[id]'>$row[text]</a>";
                    }

                } } ?>
            </nav>
        </div>
    </div>


    <div class="container">

        <div class="row">
            <div class="col-sm-12 blog-main">