<?php

    require('database.php');

    $sql = "SELECT posts.Id as Id, posts.Title as Title, posts.Created_at as Created_at, posts.Author as Author, posts.Body as Body
    FROM posts ORDER BY Created_at DESC 
    LIMIT 5";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
?>



<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest posts</h4>
        <ul>
            <?php foreach($posts as $post){ ;?>
                <li>
                    <a href="single-post.php?post_id=<?php echo($post['Id']) ?>"><p><?php echo ($post['Title']); ?><p></a>
                </li>
            <?php } ;?>
        </ul>
    </div>
            
</aside>