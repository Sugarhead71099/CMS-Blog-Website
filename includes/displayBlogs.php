<?php

    $posts = $mysqli->query('SELECT * FROM posts');
    if($posts) {
        while($post = $posts->fetch_assoc()):
        
?>

            <!-- First Blog Post -->
            <h2>
                <a href="javascript:void(0)"><?php echo $post['post_title']; ?></a>
            </h2> 
            <p class="lead">
                by <a href="index.php"><?php echo $post['post_author']; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date']; ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post['post_image']; ?>" alt="<?php echo $post['post_title'] . ' Image'; ?>">
            <hr>
            <p><?php echo $post['post_content']; ?></p>
            <a class="btn btn-primary" href="javascript:void(0)">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

<?php

        endwhile;

        $posts->close();
    } else
        echo 'Error: Posts could not be retrieved';

?>