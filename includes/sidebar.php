<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="" method="POST" id="searchForm">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" name="searchSubmit" id="searchSubmit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div><!-- /.input-group -->
        </form><!-- /search form -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well text-center">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php

                        $categories = $mysqli->query("SELECT * FROM categories");
                        if($categories) {
                            while($category_results = $categories->fetch_assoc()) {
                                $category = $category_results;

                    ?>

                                <li class="col-sm-4">
                                    <a href="javascript:void(0)"><?php echo $category['category_title']; ?></a>
                                </li>

                    <?php

                            }

                            $categories->close();

                        } else
                            echo "Error: Categories could not be retrieved";

                    ?>
                </ul>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div>

    <?php include_once('widget.php'); ?>

</div>