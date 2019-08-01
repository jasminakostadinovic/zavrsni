<?php
     
     require("database.php");
     $sql = 'SELECT id FROM comments';

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

    $id = $_GET['Id'];


    $sqlDeletePost = "DELETE FROM posts WHERE Id = $id ;";
    $stmt = $connection->prepare($sqlDeletePost);
    $stmt->execute();
    $sqlDeletePost->setFetchMode(PDO::FETCH_ASSOC);

     header("Location: http://localhost:8080/index.php");

?>