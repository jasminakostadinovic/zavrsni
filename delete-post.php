<?php
     
    require("database.php");

	$id = $_GET['Id'];

    $sql = "DELETE FROM comments WHERE post_id = 23";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $sqlDeletePost = "DELETE FROM posts WHERE Id = $id";
    $stmt = $connection->prepare($sqlDeletePost);
    $stmt->execute();

    header("Location: posts.php");

?>