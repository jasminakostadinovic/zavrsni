<?php

require('database.php');

?>

<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Vivify Blog</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <link href="styles/blog.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">

    </head>

    <?php
        $sql = "SELECT posts.Id as Id, posts.Title as Title, posts.Created_at as Created_at, posts.Author as Author, posts.Body as Body
        FROM posts ORDER BY Created_at DESC";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();
        
    ?>

    <body>

        <?php include 'header.php' ?>

        <main role="main" class="container">

            <div class="row">
                <div class="col-sm-8 blog-main">
                    <div class="blog-post">
                        <?php foreach($posts as $post){ ;?>

                        <a href="single-post.php" class="blog-post-title" > <h2><?php echo $post['Title']; ?></h2> </a>
        
                        <p class="blog-post-meta">
                            <?php echo ($post['Created_at']); ?> 
                             <a href="#"><?php echo ($post['Author']); ?></a>
                        </p>
                        
                        <p>
                            <?php echo ($post['Body']); ?>
                        </p>

                        <?php };?>

                    </div>
                                        
                </div>

                <?php include 'sidebar.php' ?>

            </div>

        </main>

        <?php include 'footer.php' ?>

    </body>
</html>    
