<?php
/**
 * The template for displaying archive pages
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
    
        <div id="content" role="main">
        	<div class="row">
                <div class="<?php reactor_columns(); ?>">
                <img style="padding-bottom: 25px;" src="/wp/wp-content/themes/itacare/img/blog_head.jpg" />
                
                <?php reactor_inner_content_before(); ?>
                
				<?php if ( have_posts() ) : ?>
                    <header class="archive-header">
                        <h1 class="archive-title"><?php
                            if ( is_day() ) :
                                printf( __('Arquivos diários: %s', 'reactor'), '<span>' . get_the_date() . '</span>');
                            elseif ( is_month() ) :
                                printf( __('Arquivos Mensais: %s', 'reactor'), '<span>' . get_the_date( _x('F Y', 'monthly archives date format', 'reactor') ) . '</span>');
                            elseif ( is_year() ) :
                                printf( __('Arquivos Anuais: %s', 'reactor'), '<span>' . get_the_date( _x('Y', 'yearly archives date format', 'reactor') ) . '</span>');
                            else :
                                _e('Arquivos', 'reactor');
                            endif;
                        ?></h1>
                    </header><!-- .archive-header -->
                <?php endif; // end have_posts() check ?> 
                
				<?php // get the loop
				get_template_part('loops/loop', 'index'); ?>
                
                <?php reactor_inner_content_after(); ?>
                
                </div><!-- .columns -->
                
                <?php get_sidebar(); ?>
                
            </div><!-- .row -->
        </div><!-- #content -->
        
        <?php reactor_content_after(); ?>
        
	</div><!-- #primary -->

<?php get_footer(); ?>