<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(!session_id())
        session_start();

    require_once('config.inc.php');
    include_once('includes/header.php');
    include_once('includes/navbar.php');

?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php

                    if(isset($_POST['search']) && trim($_POST['search']))
                        include_once('includes/search.php');
                    else
                        include_once('includes/displayBlogs.php');

                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="javascript:void(0)">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="javascript:void(0)">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <?php include_once('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

<?php

    include_once('includes/footer.php');
    $mysqli->close();
 
?>
