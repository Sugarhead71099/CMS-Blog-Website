<!-- Seach Functionality -->
<?php

    $search = $_POST['search'];
    $fsearch = strtolower($mysqli->real_escape_string(htmlentities($search)));
    $search = '%' . $fsearch . '%';

    $getCategories = $mysqli->stmt_init();
    $getCategories = $mysqli->prepare('SELECT * FROM posts WHERE LOWER(post_tags) LIKE ?');
    $getCategories->bind_param('s', $search);
    $getCategories->execute();
    $categories = $getCategories->get_result();
    if(!$categories) {
        echo "Error: Search could not be made";
    } else if(!$categories->num_rows) {

?>

        <h1>No Results Were Found for &quot;<?php echo $fsearch; ?>&quot;</h1>

<?php

        $getCategories->close();

    } else {
        $category;
        while($category_results = $categories->fetch_assoc()) {
            $category = $category_results;

?>

            <!-- Matching Blog Post -->
            <h2>
                <a href="javascript:void(0)"><?php echo $category['post_title']; ?></a>
            </h2> 
            <p class="lead">
                by <a href="index.php"><?php echo $category['post_author']; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $category['post_date']; ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $category['post_image']; ?>" alt="<?php echo $category['post_title'] . ' Image'; ?>">
            <hr>
            <p><?php echo $category['post_content']; ?></p>
            <a class="btn btn-primary" href="javascript:void(0)">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

<?php

        }

        $getCategories->close();

    }

?>