<?php

require('database.php');

?>

<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Vivify Blog</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <link href="styles/blog.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">

    </head>

    <?php

        $sql = "SELECT posts.Id as Id, posts.Title as Title, posts.Created_at as Created_at, posts.Author as Author, posts.Body as Body
        FROM posts ";

        $sql = $connection->prepare($sql);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $singlePost = $sql->fetchAll()[0];

    ?>

    <body>

        <?php include 'header.php' ?>

        <main role="main" class="container">

            <div class="row">
                <div class="col-sm-8 blog-main">
                    <div class="blog-post">
                        <a href= "single-post.php?post_id=<?php echo($singlePost['Id']) ?>"><h2 class="blog-post-title"><?php echo ($singlePost['Title']); ?></h2></a>
                        <p class="blog-post-meta"><?php echo ($singlePost['Created_at']); ?> by <a href="#"><?php echo ($singlePost['Author']); ?></a></p>
                        <p><?php echo ($singlePost['Body']); ?></p>
                    </div>
            

                    <?php

                        $error = '';

                        if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['required'])) {
                            $error = "All fields are required";
                        }

                    ?>

                    <form method="GET" action="delete-post.php" name="deletePostForm">
                        <button id="delete" class="btn btn-primary" onclick="confirmDelete()">Delete this post</button>
                        <input type="hidden" value="Id" name="Id"/>
                        <hr/>
                    </form>

                    <script>
                        document.getElementById("delete").addEventListener("click", function(event){
                            event.preventDefault()
                            if(window.confirm("Do you really want to delete this post?")){
                                document.deletePostForm.submit();
                            }
                        });
                    </script>



                    <form method="POST" action="create-comment.php" id= "addComment" >

                        <?php if (!empty($error) && $error !== "false") { ?>

                        <span class="alert alert-danger"><?php echo $error ; ?></span>

                        <hr/>

                        <?php } ?>
                       
                        <input id="Author" name="Author" type="text" placeholder="Author" style="display:block; margin-bottom:1.2rem; padding:0.8rem"/>
                        <textarea id="comment" name="comment" rows="10" cols="100" placeholder="Comment" style="display:block; margin-bottom:1.5rem"></textarea>
                      
                        <input type="hidden" name="post_id" value="Id"/>
                        
                        <input class="btn btn-default" type="submit" value="Submit comment">

                        
                    </form>
                                

                    <script>

                        var Autor = document.querySelector('#Autor');
                        var comment = document.querySelector('#comment');
                        var addComment = document.querySelector('#addComment');

                        addComment.addEventListener('submit', function(pEvent){
                            if(Autor.value === '' && comment.value === '') {
                            pEvent.preventDefault(); 
                            alert('Please Fill in all Required Fields');
                        });

                       

                    </script>

                    

                    <hr>

                    <?php include 'comments.php' ?>

                </div>

                <?php include 'sidebar.php' ?>

            </div>

        </main>

        <?php include 'footer.php' ?>

    </body>
</html>
    


