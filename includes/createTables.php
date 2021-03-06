<?php

	// Categories & Categories Meta Tables
	$categoriesTable = "CREATE TABLE IF NOT EXISTS categories (
							category_id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
							category_title VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
							PRIMARY KEY (category_id)
						) ENGINE = InnoDB;";

	$categoriesMetaTable = "CREATE TABLE IF NOT EXISTS categories_meta (
							meta_id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
							category_id INT(4) UNSIGNED NOT NULL,
							meta_key VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
							meta_value VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
							PRIMARY KEY (meta_id)
						) ENGINE = InnoDB;";

	if(!$mysqli->query($categoriesTable))
		echo 'Categories Table could not be created';

	if(!$mysqli->query($categoriesMetaTable))
		echo 'CategoriesMeta Table could not be created';


	// Posts & Posts Meta Tables
	$postsTable = "CREATE TABLE IF NOT EXISTS posts (
						post_id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
						post_title VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
						post_author VARCHAR(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
						post_date DATE NOT NULL,
						post_image TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
						post_content TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
						post_tags VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
						post_comment_count INT(11) UNSIGNED NOT NULL DEFAULT '0',
						post_status VARCHAR(255) NOT NULL DEFAULT 'draft',
						PRIMARY KEY (post_id)
				   ) ENGINE = InnoDB;";

	$postsMetaTable = "CREATE TABLE IF NOT EXISTS posts_meta (
							meta_id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
							post_id INT(8) UNSIGNED NOT NULL,
							meta_key VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
							meta_value VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
							PRIMARY KEY (meta_id)
					   ) ENGINE = InnoDB;";

	if(!$mysqli->query($postsTable))
		echo 'Posts Table could not be created';

	if(!$mysqli->query($postsMetaTable))
		echo 'PostMeta Table could not be created';


	// Posts/Categories Relationship Table
	$postCategoryTable = "CREATE TABLE IF NOT EXISTS post_category (
								id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
								post_id INT(4) UNSIGNED NOT NULL,
								category_id INT(4) UNSIGNED NOT NULL,
								PRIMARY KEY (id)
						  ) ENGINE = InnoDB;";

	if(!$mysqli->query($postCategoryTable))
		echo 'PostCategory Table could not be created';

?>