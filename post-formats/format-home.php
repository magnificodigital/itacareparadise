<?php
/**
 * The template for displaying post content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-body">
            <header class="entry-header">
            	<?php //reactor_post_header(); 
                reactor_do_standard_thumbnail();
                reactor_do_home_header_titles();
                ?>
            </header><!-- .entry-header -->
    
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content --> 

            <div class="entry-readmore">
                <a href="<?php the_permalink(); ?>"></a>
            </div><!-- .entry-content -->
    
            <footer class="entry-footer">
            	<?php reactor_post_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .entry-body -->
	</article><!-- #post -->