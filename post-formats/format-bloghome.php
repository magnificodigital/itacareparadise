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
            
            <header class="entry-header"><span class="entry-date"><?php the_date('d/m/Y'); ?></span>    
    <h2 class="entry-title"><?php the_title(); ?></h2>
    <?php the_post_thumbnail(); ?>
            </header><!-- .entry-header -->
    
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <div class="entry-readmore">
                <a href="<?php the_permalink(); ?>"></a>
            </div><!-- .entry-content -->
    
        </div><!-- .entry-body -->
	</article><!-- #post -->
    <hr />