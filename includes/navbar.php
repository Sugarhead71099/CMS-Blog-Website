    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="javascript:void(0)">CMS Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav text-capitalize">
                    <?php

                        $categories = $mysqli->query("SELECT * FROM categories");
                        if($categories) {
                            while($category_results = $categories->fetch_assoc()):
                                $category = $category_results;

                    ?>

                                <li>
                                    <a href="javascript:void(0)"><?php echo $category['category_title']; ?></a>
                                </li>

                    <?php

                            endwhile;

                            $categories->close();

                        } else
                            echo "Error: Categories could not be retrieved";

                    ?>

                    <li>
                        <a href="admin/">Admin</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>