<?php


require('database.php');



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['post_id'];
        $author = $_POST['Author'];
        $comment = $_POST['comment'];
        
        $sql= "INSERT INTO comments (Author, Text, post_id) VALUES ('{$author}', '{$comment}', {$id});";
        
        $stmt = $connection->prepare($sql);
        $stmt->execute([$author, $comment]);
		header( "Location: single-post.php?post_id=$id" );
    } 
?>