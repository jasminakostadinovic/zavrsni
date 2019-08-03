

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

<?php

require('db.php');

$sql = 'SELECT id, email FROM users';

$stmt = $connection->prepare($sql);

$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$results = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $title = $_POST['title'];
    $userId = $_POST['user_id'];
    $createdAt = date('Y-m-d h:i:s');
    $expiresAt = date('Y-m-d', strtotime($createdAt . "+ 1 month"));
    
    $sql = 'INSERT INTO ads (category, title, created_at, expires_at, user_id) VALUES (?, ?, ?, ?, ?)';

    $stmt = $connection->prepare($sql);

    $stmt->execute([$category, $title, $createdAt, $expiresAt, $userId]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select name="category">
            <option value="cars">Cars</option>
            <option value="trucks">Trucks</option>
            <option value="boats">Boats</option>
        </select>
        <input type="text" name="title" placeholder='Title'>
        <select name="user_id">
            <?php
            foreach($results as $r) {
            ?>
            <option value="<?php echo $r['id']; ?>"><?php echo $r['email']; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" value='Kreiraj oglas'>
    </form>
</body>
</html>