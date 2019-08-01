<?php


require('database.php');

$id = $_POST['Id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $author = $_POST['Author'];
        $comment = $_POST['Text'];
        $id = $_POST['Id'];
        $sql= "INSERT INTO comments (Author, Text, post_id) VALUES ('{$author}', '{$comment}', {$id});";
        
        $stmt = $connection->prepare($sql);
        $stmt->execute([$author, $comment, $id]);
    
    } 
