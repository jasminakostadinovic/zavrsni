<?php

$sql = "SELECT posts.Id, posts.Title, posts.Created_at, posts.Author, posts.Body
FROM posts ORDER BY Created_at DESC";

$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetchAll();


?>


<?php foreach($posts as $post){ ;?>

<div class="blog-post">

    <a href= "single-post.php?post_id=<?php echo($post['Id']) ?>"><h2 class="blog-post-title"><?php echo ($post['Title']); ?></h2></a>
    
    <p class="blog-post-meta"><?php echo ($post['Created_at']); ?> by <a href="#"><?php echo ($post['Author']); ?></a></p>
    
    <p><?php echo ($post['Body']); ?></p>

</div>

<?php };?>