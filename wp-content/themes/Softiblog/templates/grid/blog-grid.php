<!-- Main Container -->
<?php 
    if(is_category()) { //echo "test";?>
        <div class="main-container">
	
	<?php
//    $sql = $wpdb->prepare( "SELECT comment_ID, comment_agent FROM $wpdb->comments LIMIT %d,%d", $offset, $limit );
//			$results = $wpdb->get_results( $sql );
//    $sql = $wpdb->prepare( "SELECT meta_id FROM 'wp_postmeta'`' WHERE meta_key IN ('_edit_lock','_edit_last')" );
//    print_r($sql);
			//$results = $wpdb->get_results( $sql );
    
     /*$ids = $wpdb->get_results("SELECT meta_id FROM $wpdb->postmeta WHERE meta_key IN ('_edit_last') AND meta_value <> 0 LIMIT 2");
		echo"<pre>";	
        print_r($ids);    
    
        foreach($ids as $id){
            $where = array( 'meta_id' => $id->meta_id );
            $wpdb->update( $wpdb->postmeta, array('meta_value' => 0), array('meta_id' => $id->meta_id) );
            print_r($id->meta_id);
            echo"<br>";
        }*/
    
    // Premierement initialiser le nombre de poste par page
    $postsPerPage = 3;

    // Deuxiemement, prendre le numero de la page courante
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    // Ensuite, calculer l'offset ou le poste à afficher  
    $postOffset = $postsPerPage * $page;
    //print_r($postOffset);
    
    // Finalment, trier les articles qui sont publiés uniqement par ordre desc par date de poste
    $wpQuery = new WP_Query(
                    [
                        'post_status'   => 'publish',
                        'posts_per_page'=> $postsPerPage,
                        'offset'=> $postOffset,
                        'order'=> 'desc',
                        'orderby'=> 'post_date',
                    ]
                );
    
	// Blog Grid
	echo '<ul class="blog-grid">';
	$numArticle = 0;
    if ( !is_archive() ? $wpQuery->have_posts() : have_posts() ) :
                while ( !is_archive() ? $wpQuery->have_posts() : have_posts() ) :    
			     !is_archive() ? $wpQuery->the_post() : the_post();
                 $classPageMiseEnAvant = is_category() && ($page === 1) && ($numArticle === 0) ? ' class="post-mise-en-avant"' : ''; 
		// Loop Start           

			// if is preview (boat post)
			if ( ! ( ashe_is_preview() && get_the_ID() == 19 ) ) :

			echo "<li $classPageMiseEnAvant>";

			?>
			<article id="post-<?php the_ID()?>" <?php post_class('blog-post'); ?>>
				
				<div class="post-media">
					<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
					<?php the_post_thumbnail('ashe-full-thumbnail'); ?>
				</div>

				<header class="post-header">

			 		<?php

					$category_list = get_the_category_list( ',&nbsp;&nbsp;' );

					if ( ashe_options( 'blog_page_show_categories' ) === true && $category_list ) {
						echo '<div class="post-categories">' . $category_list . ' </div>';
					}

					?>

					<?php if ( get_the_title() ) : ?>
					<h2 class="post-title">
						<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
					</h2>
					<?php endif; ?>

					<?php if ( ashe_options( 'blog_page_show_date' ) === true ) : ?>
					<div class="post-meta clear-fix">
						<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div>
					<?php endif; ?>
					
				</header>

				<?php if ( ashe_options( 'blog_page_post_description' ) !== 'none' ) : ?>

				<div class="post-content">
					<?php
					if ( ashe_options( 'blog_page_post_description' ) === 'content' ) {
						the_content('');
					} elseif ( ashe_options( 'blog_page_post_description' ) === 'excerpt' ) {
						ashe_excerpt( 110 );												
					}
					?>
				</div>

				<?php endif; ?>

				<div class="read-more">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','ashe' ); ?></a>
				</div>
				
				<footer class="post-footer">

					<?php if ( ashe_options( 'blog_page_show_author' ) === true ) : ?>
					<span class="post-author">
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
						</a>
						<?php the_author_posts_link(); ?>	
					</span>
					<?php endif; ?>

					<?php
					if ( ashe_options( 'blog_page_show_comments' ) === true ) {
						comments_popup_link( esc_html__( '0 Comments', 'ashe' ), esc_html__( '1 Comment', 'ashe' ), '% '. esc_html__( 'Comments', 'ashe' ), 'post-comments');
					}
					?>
					
				</footer>

				<!-- Related Posts -->
				<?php //ashe_related_posts( esc_html__( 'You May Also Like','ashe' ), ashe_options( 'blog_page_related_orderby' ) ); ?>

			</article>
		
			<?php

			echo '</li>';

			endif;
            $numArticle++;
		endwhile; // Loop End

	else:

	?>

	<div class="no-result-found">
		<h3><?php esc_html_e( 'Nothing Found!', 'ashe' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ashe' ); ?></p>
		<div class="ashe-widget widget_search">
			<?php get_search_form(); ?>
		</div>
	</div>

	<?php
	
	endif; // have_posts()

	echo '</ul>';

	?>

	<?php //get_template_part( 'templates/grid/blog', 'pagination' ); ?>

</div><!-- .main-container -->
    <?php } else { ?>

<div class="main-container home-wht-scroll">
	
	<?php
//    $sql = $wpdb->prepare( "SELECT comment_ID, comment_agent FROM $wpdb->comments LIMIT %d,%d", $offset, $limit );
//			$results = $wpdb->get_results( $sql );
//    $sql = $wpdb->prepare( "SELECT meta_id FROM 'wp_postmeta'`' WHERE meta_key IN ('_edit_lock','_edit_last')" );
//    print_r($sql);
			//$results = $wpdb->get_results( $sql );
    
     /*$ids = $wpdb->get_results("SELECT meta_id FROM $wpdb->postmeta WHERE meta_key IN ('_edit_last') AND meta_value <> 0 LIMIT 2");
		echo"<pre>";	
        print_r($ids);    
    
        foreach($ids as $id){
            $where = array( 'meta_id' => $id->meta_id );
            $wpdb->update( $wpdb->postmeta, array('meta_value' => 0), array('meta_id' => $id->meta_id) );
            print_r($id->meta_id);
            echo"<br>";
        }*/
    
    // Premierement initialiser le nombre de poste par page
    $postsPerPage = 3;

    // Deuxiemement, prendre le numero de la page courante
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    // Ensuite, calculer l'offset ou le poste à afficher  
    $postOffset = $postsPerPage * $page;
    //print_r($postOffset);
    
    // Finalment, trier les articles qui sont publiés uniqement par ordre desc par date de poste
    $wpQuery = new WP_Query(
                    [
                        'post_status'   => 'publish',
                        'posts_per_page'=> $postsPerPage,
                        'offset'=> $postOffset,
                        'order'=> 'desc',
                        'orderby'=> 'post_date',
                    ]
                );
    
	// Blog Grid
	echo '<ul class="blog-grid">';
	$numArticle = 0;
    if ( !is_archive() ? $wpQuery->have_posts() : have_posts() ) :
                while ( !is_archive() ? $wpQuery->have_posts() : have_posts() ) :    
			     !is_archive() ? $wpQuery->the_post() : the_post();
                 $classPageMiseEnAvant = is_category() && ($page === 1) && ($numArticle === 0) ? ' class="post-mise-en-avant"' : ''; 
		// Loop Start           

			// if is preview (boat post)
			if ( ! ( ashe_is_preview() && get_the_ID() == 19 ) ) :

			echo "<li $classPageMiseEnAvant>";

			?>
			<article id="post-<?php the_ID()?>" <?php post_class('blog-post'); ?>>
				
				<div class="post-media">
					<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
					<?php the_post_thumbnail('ashe-full-thumbnail'); ?>
				</div>

				<header class="post-header">

			 		<?php

					$category_list = get_the_category_list( ',&nbsp;&nbsp;' );

					if ( ashe_options( 'blog_page_show_categories' ) === true && $category_list ) {
						echo '<div class="post-categories">' . $category_list . ' </div>';
					}

					?>

					<?php if ( get_the_title() ) : ?>
					<h2 class="post-title">
						<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
					</h2>
					<?php endif; ?>

					<?php if ( ashe_options( 'blog_page_show_date' ) === true ) : ?>
					<div class="post-meta clear-fix">
						<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div>
					<?php endif; ?>
					
				</header>

				<?php if ( ashe_options( 'blog_page_post_description' ) !== 'none' ) : ?>

				<div class="post-content">
					<?php
					if ( ashe_options( 'blog_page_post_description' ) === 'content' ) {
						the_content('');
					} elseif ( ashe_options( 'blog_page_post_description' ) === 'excerpt' ) {
						ashe_excerpt( 110 );												
					}
					?>
				</div>

				<?php endif; ?>

				<div class="read-more">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','ashe' ); ?></a>
				</div>
				
				<footer class="post-footer">

					<?php if ( ashe_options( 'blog_page_show_author' ) === true ) : ?>
					<span class="post-author">
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
						</a>
						<?php the_author_posts_link(); ?>	
					</span>
					<?php endif; ?>

					<?php
					if ( ashe_options( 'blog_page_show_comments' ) === true ) {
						comments_popup_link( esc_html__( '0 Comments', 'ashe' ), esc_html__( '1 Comment', 'ashe' ), '% '. esc_html__( 'Comments', 'ashe' ), 'post-comments');
					}
					?>
					
				</footer>

				<!-- Related Posts -->
				<?php //ashe_related_posts( esc_html__( 'You May Also Like','ashe' ), ashe_options( 'blog_page_related_orderby' ) ); ?>

			</article>
		
			<?php

			echo '</li>';

			endif;
            $numArticle++;
		endwhile; // Loop End

	else:

	?>

	<div class="no-result-found">
		<h3><?php esc_html_e( 'Nothing Found!', 'ashe' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ashe' ); ?></p>
		<div class="ashe-widget widget_search">
			<?php get_search_form(); ?>
		</div>
	</div>

	<?php
	
	endif; // have_posts()

	echo '</ul>';

	?>
    <?php echo do_shortcode('[ajax_posts]');?>
	<?php //get_template_part( 'templates/grid/blog', 'pagination' ); ?>

</div><!-- .main-container -->
<?php } 
?>