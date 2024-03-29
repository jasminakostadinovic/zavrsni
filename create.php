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

    <body>

        <?php include("header.php"); ?>

        <main role="main" class="container">

            <div class="row">

                <div class="col-sm-8 blog-main">
                    <div class="form-container">
        
                        <div class="alert alert-danger" id="alertBox">
                        <strong>Failed submit!</strong> Please fill out all remaining fields.
                        </div>
                    
                    
                        <form method="POST"  action = "create-post.php">
                                                      
                            <input id="Author" name="Author" type="text" placeholder="Author" style="display:block; margin-bottom:1rem; padding:0.5rem"/>
                            <input id="Title" name="Title" type="text" placeholder="Title" style="display:block; margin-bottom:1rem; padding:0.5rem"/>
                            <textarea id="Body" name="Body" rows="5" cols="70" placeholder="Text" style="display:block; margin-bottom:1rem"></textarea>
                            <input id="submit" class="btn btn-default" type="submit" value="Submit">
                        
                        </form>
                    </div>
                 
      

                </div><!-- /.blog-main -->

                    <?php include('sidebar.php'); ?><!-- /.blog-sidebar -->

            </div><!-- /.row -->
            <script>
                const title = document.getElementById('Title').value;
                const body = document.getElementById('Body').value;
                const commentSubmitBtn = document.getElementById('submit');

                commentSubmitBtn.addEventListener('click', function() {
                    if (Title === "" || Body === "") {
                        alertBox.style.display = 'block';
                    }
                });
            </script>

        </main><!-- /.container -->

        <?php include('footer.php'); ?>
    </body>
</html>









