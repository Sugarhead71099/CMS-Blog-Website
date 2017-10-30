<?php

    include_once('includes/header.php');
    include_once('includes/navbar.php');

?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories
                        <small>Add Category</small>
                    </h1>
                    <ol class="breadcrumb">

                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Categories</a>
                        </li>

                        <li class="active">
                            <i class="fa fa-file"></i> admin
                        </li>

                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <u><h2 class="text-center">Existing Categories</h2></u>
                    <ul class="list-unstyled text-center">

                        <?php

                            $categories = $mysqli->query("SELECT * FROM categories");
                            if(!$categories) {  ?>

                                <h1>Error: Query has failed</h1>

                        <?php

                            } else if(!$categories->num_rows) { ?>

                                <h1 class="text-center text-muted">There are no categories to be displayed</h1>

                        <?php

                                $categories->close();

                            } else {
                                while($category = $categories->fetch_assoc()) { ?>

                                    <li class="col-lg-3">
                                        <a href="javascript:void(0)"><?php echo $category['category_title']; ?></a>
                                    </li>

                        <?php

                                }

                                $categories->close();

                            }

                        ?>

                    </ul>
                </div>
            </div>

            <hr>

            <?php
                
                if(isset($_SESSION['category_error'])) { ?>

                    <div class="alert alert-danger text-center col-lg-6" style="float: none;  margin: 0 auto; margin-bottom: 25px;"><?php echo $_SESSION['category_error']; ?></div>

            <?php

                }

                if(isset($_POST['newCategory']) && trim($_POST['newCategory']   )) {

                    $newCategory = $mysqli->real_escape_string(htmlentities($_POST['newCategory']));

                    $categoryExists = $mysqli->stmt_init();
                    $categoryExists = $mysqli->prepare('SELECT * FROM categories WHERE LOWER(category_title) = ?');
                    $categoryExists->bind_param('s', $newCategory);
                    $categoryExists->execute();
                    $exists = $categoryExists->get_result();
                    $categoryExists->close();

                    if($exists->num_rows)
                        $_SESSION['category_error'] = 'That category already exists';
                    else {

                        unset($_SESSION['category_error']);
                        $insertCategory = $mysqli->stmt_init();
                        $insertCategory = $mysqli->prepare('INSERT INTO categories (category_title) VALUES (?)');
                        $insertCategory->bind_param('s', $newCategory);
                        $insertCategory->execute();
                        $insertCategory->close();

                    }

                    header('Refresh:0');

                }

            ?>

            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="POST" id="addNewCategory" class="col-lg-6 text-center" style="float: none; margin: 0 auto;">

                        <div class="form-group row">
                            <label for="newCategory" class="col-sm-4 col-form-label text-center">Add New Category: </label>
                            <div class="col-sm-8">
                                <input type="text" name="newCategory" id="newCategory" class="form-control" placeholder="e.g. HTML"></input>
                            </div>
                        </div>

                        <button type="submit" id="newCategorySubmit" class="btn btn-primary col-xs-12">Add Category</button>

                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->

    </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php include_once('includes/footer.php'); ?>