<?php

    require('database.php');
    $sql = "SELECT posts.Id as Id, comments.Id as Id, comments.Author as Author, comments.post_id as post_id, comments.Text as Text 
    FROM posts JOIN comments ON comments.post_id = posts.Id";


    
    $sql = $connection->prepare($sql);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $sql->fetchAll();
?>


<button class="btn btn-default" id="button" onclick="hideComment()">Hide Comments</button>

<hr>
<div class="comments" id="comment-section">
    <ul id='comment-list'>
        <?php foreach($comments as $comment){ ;?>
            <li>
                <h6><?php echo($comment['Author']); ?></h6>
                <p><?php echo($comment['Text']); ?></p>
                <form method="GET" action="delete_comment.php" >
                    <button id="delete" class="btn btn-default">Delete</button>
                    <input type="hidden" value="<?php echo($comment['Id']); ?>" name="Id"/>
                    <input type="hidden" value="<?php echo($comment['post_id']); ?>" name="post_id"/>
                </form>
                
            </li>
        <?php };?>
    </ul>
</div>
<hr>



    

<script>

    var comments = document.getElementById('comment-list')
    var button = document.getElementById('button')

    function hideComment(){
        
        if(comments.style.display === "none"){
            comments.style.display = "block";
            button.innerHTML = "Hide Comments"
        } else{
            comments.style.display = "none";
            button.innerHTML = "Show Comments"
        }
    }
  
</script>





