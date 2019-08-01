

<?php
     include("database.php");
     if(!empty($_POST['Author'])){
        $author = $_POST['Author'];
    } else{
        header("Location: http://localhost:8080/create.php?required=false");
        exit;
    }
     if(!empty($_POST['Title'])){
        $title = $_POST['Title'];
    } else {
        header("Location: http://localhost:8080/create.php?required=false");
        exit;
    } 
    if(!empty($_POST['Body'])){
        $body = $_POST['Body'];
    } else {
        header("Location: http://localhost:8080/create.php?required=false");
        exit;
    } 
        
    $date = date('Y-m-d H:i:s');
         $sqlCreate = "INSERT INTO posts (Title, Body, Author, Created_at) VALUES ('{$title}', '{$body}', '{$author}', '{$date}');";
         $statementCreate = $connection->prepare($sqlCreate);
         $statementCreate->execute();
         $statementCreate->setFetchMode(PDO::FETCH_ASSOC);
     header("Location: http://localhost:8080/index.php");
?> 