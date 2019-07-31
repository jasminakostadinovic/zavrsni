<?php
require('database.php');
$sql = "SELECT posts.Id as Id, posts.Title as Title, posts.Created_at as Created_at, posts.Author as Author, posts.Body as Body
FROM posts ORDER BY Created_at DESC";
$stmt = $connection->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$posts = $stmt->fetchAll();

?>

<?php foreach($posts as $post){ ;?>

<div class="blog-post">

    <a href= "single-post.php?post_id=<?php echo($post['Id']) ?>"><h2 class="blog-post-title"><?php echo ($post['Title']); ?></h2></a>
    
    <p class="blog-post-meta"><?php echo ($post['Created_at']); ?> by <a href="#"><?php echo ($post['Author']); ?></a></p>
    
    <p><?php echo ($post['Body']); ?></p>

</div>

<?php };?>

