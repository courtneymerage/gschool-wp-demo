<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Humanly Possible Productions
 */

get_header(); ?>

	<div id="primary" class="content-area library">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

<h2 class="library-headline underline">Library</h2>
           
            <div class="row">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="column third" style="background-image: url(<?php the_field('library_feature_image'); ?>);">
                            <div class="library-color-overlay"></div>`
                            
                            <h3 class="library-title"><?php the_title(); ?></h3>
                            <a class="library-link" href="<?php the_permalink(); ?>">➞</a>
                        </div>

			<?php endwhile; ?>
            </div>    

			<?php the_posts_navigation(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>










