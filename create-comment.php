<?php


require('database.php');



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
             
        $author = $_POST['Author'];
        $comment = $_POST['comment'];
        
        $sql= "INSERT INTO comments (Author, Text) VALUES ('{$author}', '{$comment}');";
        
        $stmt = $connection->prepare($sql);
        $stmt->execute([$author, $comment]);
    
    } 
