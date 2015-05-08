<?php
/**
 * The template for displaying all single posts.
 *
 * @package Humanly Possible Productions
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                
            <div class="row">


		<?php while ( have_posts() ) : the_post(); ?>
            
                <h2 class='library-page-title underline'><?php the_title(); ?></h2>
           
                <div class='category-list'><?php echo get_the_category_list(', '); ?></div>

                <div class="library-hero" style="background-image: url(<?php the_field('library_hero_image'); ?>);"></div>
                
                <p class="intro"><?php the_field('library_introduction_text'); ?></p>
                
                <?php the_content(); ?>
                
                <!-- Related Posts -->
<?php 
$orig_post = $post;

global $post;

$categories = get_the_category($post->ID); // Get the current post's categories

if ($categories) {

    $category_ids = array();

    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    // Related Post Loop Settings
    $args=array(
        'post_type' => 'library', // Post type to include
        'category__in' => $category_ids, // Categories to include (the categories associated with the current post)
        'post__not_in' => array($post->ID), // Posts to exclude (the current post)
        'posts_per_page'=> 3, // Number of related posts that will be shown.
        'caller_get_posts'=>1
    );

    $my_query = new wp_query( $args ); 

    if( $my_query->have_posts() ) { ?>

        <div class="library"> <!-- Using the .library class to inherit styles -->
            <h3 class='underline'>Related Topics</h3> <!-- Section Headline -->

            <div class="row">

            <?php while( $my_query->have_posts() ) { $my_query->the_post();  // Begin Loop ?>

            <!-- Begin Related Post -->
<div class="column third" style="background-image: url(<?php the_field('library_feature_image'); ?>);">
                            <div class="library-color-overlay"></div>
                            
                            <h3 class="library-title"><?php the_title(); ?></h3>
                            <a class="library-link" href="<?php the_permalink(); ?>">➞</a>
                        </div>
                        
            <!-- End Related Post -->

            <?php } // End Loop ?>

        </div>

<?php } }  // Closing `if categories` and `if query`

    // Resetting query for the rest of the page.
    $post = $orig_post;
    wp_reset_query(); 
?>


		<?php endwhile; // end of the loop. ?>
                </div>

		</main><!-- #main -->
	<!-- #primary -->

<?php get_footer(); ?>
