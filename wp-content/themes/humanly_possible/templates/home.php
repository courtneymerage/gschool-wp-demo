<?php
/**
 * Template Name: Home Page
 *
 * @package Humanly Possible Productions
 */

get_header();

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
                <div class="hero" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
                    <h1><?php the_field('hero_headline'); ?></h1>
                    <p><?php the_field('hero_subheadline'); ?></p>
                </div>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
