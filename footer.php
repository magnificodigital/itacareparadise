<?php
/**
 * The template for displaying the footer
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
       
        <?php //reactor_footer_before(); ?>
        
        <footer id="footer" class="site-footer" role="contentinfo">

            <div class="row" style="padding-bottom:15px;">
            
                <div class="twitter large-6 columns">
                    <h4>&Uacute;ltimas do Twitter</h4>
                    <?php
                        $c = new dw_twitter_query_Widget();
                        $tweets = $c->get_tweets(array('consumer_key' => 'nEt3oW3sge25m2OhMjuA', 'consumer_secret' => 'oX0hrtQcrTEqa3YuKPtUcFuRAWOJTO9y54ZcRiE92u4','query' => 'from:itacareparadise','number' => '2'), $array = 1);
                        
                        echo '<ul class="footer-twits small-block-grid-2">';
                        foreach ($tweets as $tweet ) {
                                        $text = $c->update_tweet_urls( $tweet->text );
                                        $url = 'http://twitter.com/'.$tweet->user->id.'/status/'.$tweet->id_str;
                                       
                                        echo    '<li><ul><li class="bird hide-for-small"><img src="'.get_site_url().'/wp-content/themes/itacare/img/twit.gif" /></li><li class="twit">'.$text.'</li></ul>';
                          }
                          echo "</ul>";
                                    
                    ?>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style" addthis:url="http://www.itacareparadise.com.br/">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
<!-- AddThis Button END -->
                                        
                </div>
                
                <div class="footer-categories large-3 columns">
                    <h4>Categorias do Blog</h4>
                    
                    <?php wp_nav_menu( array('container_class' => 'footer-categories', 'theme_location' => 'footer-blog' ) );  ?>
        
                </div>
                
                <div class="footer-menu large-3 columns">
                    <h4>Menu</h4> 
                    
                    <?php wp_nav_menu( array('container_class' => 'footer-menu', 'theme_location' => 'footer-links' ) );  ?>
                    
                </div>
            
            </div>
            
        	<?php  reactor_footer_inside(); ?>
  
        </footer><!-- #footer -->
        
        <?php reactor_footer_after(); ?>

    </div><!-- #main -->
</div><!-- #page -->

        <div id="indique-email" class="reveal-modal small">
            <?php echo do_shortcode('[formidable id=9]') ?>
        </div>
        <?php if(array_key_exists('newsletter',$_GET)) { ?>
        <div id="newsletter-ok" class="reveal-modal small">
            <img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/itacare/img/cadastro-sucesso.jpg" />
        </div>
        <script type="text/javascript">

jQuery(function() {
     jQuery('#newsletter-ok').foundation('reveal', 'open');
    });
        
        </script>
         <?php } ?>

<?php wp_footer(); reactor_foot(); ?>
</body>
</html>