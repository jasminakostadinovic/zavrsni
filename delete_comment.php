<?php
    
    include("database.php");

    $sql = 'SELECT id FROM comments';

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

    

    
    $id = $_GET['Id'];
    $post_id = $_GET['post_id'];


         $sqlDelete = "DELETE FROM comments WHERE Id = $id;";
         $statementDelete = $connection->prepare($sqlDelete);
         $statementDelete->execute();
         $statementDelete->setFetchMode(PDO::FETCH_ASSOC);
     
     
       

?> 