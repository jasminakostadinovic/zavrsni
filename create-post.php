<?php
require("database.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $author = $_POST['Author'];
        $title = $_POST['Title'];
        $body = $_POST['Body'];
        $createdAt = date('Y-m-d h:i:s');
        
        $sql = "INSERT INTO posts ( Title, Body, Author, Created_at) VALUES ('{$title}', '{$body}', '{$author}', '{$createdAt}');";
        $stmt = $connection->prepare($sql);
        $stmt->execute([ $author, $title, $body, $createdAt]);

        } 
        $last_id = $connection->lastInsertId();
        header( "Location: single-post.php?post_id=$last_id");
?>
