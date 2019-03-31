<?php
/*
Template Name: Téléchargements
*/
?>
<?php get_header(); ?>

<div class="main-content clear-fix<?php echo esc_attr(ashe_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">
	
	<?php
	
	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	?>

	<!-- Main Container -->
	<div class="main-container">
		
		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php

			if ( have_posts() ) :

			// Loop Start
			while ( have_posts() ) : the_post();

				if ( has_post_thumbnail() ) {
					echo '<div class="post-media">';
						the_post_thumbnail('ashe-full-thumbnail');
					echo '</div>';
				}

				if ( get_the_title() !== '' ) {
					echo '<header class="post-header">';
						echo '<h1 class="page-title">'. get_the_title() .'</h1>';
					echo '</header>';
				}

				echo '<div class="post-content">';
					the_content('');

					// Post Pagination
					$defaults = array(
						'before' => '<p class="single-pagination">'. esc_html__( 'Pages:', 'ashe' ),
						'after' => '</p>'
					);

					wp_link_pages( $defaults );
				echo '</div>';

			endwhile; // Loop End

			endif;

			?>
			
			<div class="telehargement">
                        <span class="titre-cat">
                            Vie Quotidienne
                        </span>
			    <?php
                    $vie_quotidienne = array(
                        'taxonomy' => 'telechargement_cat',
                        'hide_empty' => false,
                        'parent' => '5'
                    );
                
                    $results = get_terms($vie_quotidienne);
                    //var_dump($results);
                foreach ($results as $result) { ?>
                    <div class="vie-quotidienne">
                        
                        <div class="liste-cat">
                            <li>
                                <a href="<?php echo get_term_link($result->term_id);?>" title="<?php echo $result->name;?>">
                                    <?php echo $result->name;?>
                                </a>
                            </li>
                        </div>
                    </div>
                    
                <?php     }
                ?>
                        <span class="titre-cat">
                            Notre Agglo
                        </span>
                        <?php
                    $notre_agglo = array(
                        'taxonomy' => 'telechargement_cat',
                        'hide_empty' => false,
                        'parent' => '9'
                    );
                
                    $results2 = get_terms($notre_agglo);
                    //var_dump($results);
                foreach ($results2 as $result2) { ?>
                    <div class="nottre-agglo">
                        
                        <div class="liste-cat">
                            <li>
                                <a href="<?php echo get_term_link($result2->term_id);?>" title="<?php echo $result2->name;?>">
                                    <?php echo $result2->name;?>
                                </a>
                            </li>
                        </div>
                    </div>
                    
                <?php     }
                ?>
			</div>

		</article>

		<?php get_template_part( 'templates/single/comments', 'area' ); ?>

	</div><!-- .main-container -->

	<?php
	
	// Sidebar Right
	//get_template_part( 'templates/sidebars/sidebar', 'right' ); 

	?>

</div><!-- .page-content -->

<?php get_footer(); ?>