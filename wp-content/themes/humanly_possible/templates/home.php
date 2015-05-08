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
                </div><!--end hero-->
            
            <div class="gold-band"></div>
            
            <!--begin services-->
            <div class="services">
                <div class="row">
                    
                    <h2 class="services-headline underline">Easy Legal Tools for Filmmakers. Finally. </h2>

                    
                    <?php 
                        $args = array(
                            'post_type' => 'service',
                            'posts_per_page' => 3,
                            'order' => ASC
                        );
                        $loop = new WP_Query ( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                    ?>    
                
                    <div class="column third">
                        <img class="service-icon" src="<?php the_field('service_icon'); ?>">
                        <h3 class="service-title"><?php the_title();?></h3> 
                        <p class="service-description"><?php the_field('service_description'); ?></p>    
                    </div>
                    
                    <?php; endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    
                </div>
            </div>
            
            <!--end services-->
            
            <div class="gold-band"></div>

            
            <!--begin library-->
            <div class="library">
                <h2 class="library-headline underline">Examples</h2>
                
                    <div class="row">
                        
                        <?php 
                            $args = array(
                                'post_type' => 'library',
                                'posts_per_page' => 3
                            );
                            $loop = new WP_Query( $args );
                            while ($loop->have_posts() ) : $loop->the_post();
                        ?>
                    
                        <div class="column third" style="background-image: url(<?php the_field('library_feature_image'); ?>);">
                            <div class="library-color-overlay"></div>
                            
                            <h3 class="library-title"><?php the_title(); ?></h3>
                            <a class="library-link" href="<?php the_permalink(); ?>">➞</a>
                        </div>
                        
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        
                    </div>
                    <a class="view-more" href=" ">View More ➞ </a>
                
            </div>
            <!--end library-->
            
            <!--begin blog -->
            <div class="recent-blog">
                <h2 class="blog-headline">Blog</h2>
            
                    <div class="row">
                        
                        <?php
                            $args = array( 
                                'post_type' => 'post',
                                'posts_per_page' => 3
                            );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
                        
                        <div class="blog-post">
                            <h3><?php the_title(); ?></h3>
                            <div class="meta"><?php humanly_possible_posted_on(); ?></div>
                            <p><? the_excerpt(); ?></p>
                            <a class="read-more" href="<?php the_permalink(); ?>">Read More ➞</a>
                        </div>
                        
                       <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?> 
                        
                    </div>
                
                    <a class="view-more" href=""> View More ➞</a>    
            </div>
            <!--end blog-->
            
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
