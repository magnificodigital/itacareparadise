<?php
/**
 * Header Content
 * hook in the content for header.php
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Site meta, title, and favicon
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_reactor_head() { ?>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>

<!-- google chrome frame for ie -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
<!-- mobile meta -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<?php $favicon_uri = reactor_option('favicon_image') ? reactor_option('favicon_image') : get_template_directory_uri() . '/favicon.ico'; ?>
<link rel="shortcut icon" href="<?php echo $favicon_uri; ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php 
}
add_action('wp_head', 'reactor_do_reactor_head', 1);

/**
 * Top bar
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_top_bar() {
	if ( has_nav_menu('top-bar-l') || has_nav_menu('top-bar-r') ) {
		$topbar_args = array(
			'title'     => reactor_option('topbar_title', get_bloginfo('name')),
			'title_url' => reactor_option('topbar_title_url', home_url()),
			'fixed'     => reactor_option('topbar_fixed', 0),
			'contained' => reactor_option('topbar_contain', 1),
		);
		reactor_top_bar( $topbar_args );
	}
}
add_action('reactor_header_before', 'reactor_do_top_bar', 1);

/**
 * Site title, tagline, logo, and nav bar
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_title_logo() { ?>
	<div class="inner-header">
		<div class="row">
			<div class="large-3 columns hide-for-small">
                <div class="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo reactor_option('logo_image') ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?> logo">
					</a>
				</div><!-- .site-logo -->
				<hgroup>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<h2 class="site-description"><?php bloginfo('description'); ?></h2>
				</hgroup>
			</div><!-- .column -->
            <div class="large-9 columns">               
                <div class="top-header-icons hide-for-small">
                
                <ul id="top-icons">
                    <li><a class="header-icon irss" href="<?php echo esc_url( home_url( '/' ) ); ?>blog"></a></li>
                    <li><a class="header-icon iplay" target="_blank" href="http://www.youtube.com/ekoarqconstrutora"></a></li>
                    <li><a class="header-icon iface" target="_blank" href="http://www.facebook.com/sistemafractional"></a></li>
                    <li><a class="header-icon itwit" target="_blank" href="http://www.instagram.com/itacareparadise"></a></li>
                <li><a class="header-area" target="_blank" href="http://gestao.itacareparadise.com.br/">&aacute;rea do propriet&aacute;rio</a></li>
                </ul>
                
                <? $nav_class = ( reactor_option('mobile_menu', 1) ) ? 'class="hide-for-small" ' : ''; ?>
                <div class="main-nav">
                    <nav id="menu" <?php echo $nav_class; ?>role="navigation">
                        <div class="section-container horizontal-nav" data-section="horizontal-nav">               
                            <?php reactor_main_menu(); ?>
                        </div>
                    </nav>
                </div><!-- .main-nav -->
                
                </div>
                
            </div><!-- .column -->
		</div><!-- .row -->
        
        <div class="row show-for-small">
        <div class="small-10 small-centered columns">
                <div class="site-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <img src="<?php echo reactor_option('logo_image') ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?> logo">
                    </a>
                </div><!-- .site-logo -->
                </div>
        </div>
        
        <div class="row show-for-small">
            <div class="small-10 small-centered columns">
                    <ul class="top-icons-small">
                    <li><a class="header-icon irss" href="<?php echo esc_url( home_url( '/' ) ); ?>blog"></a></li>
                    <li><a class="header-icon iplay" target="_blank" href="http://www.youtube.com/ekoarqconstrutora"></a></li>
                    <li><a class="header-icon iface" target="_blank" href="http://www.facebook.com/sistemafractional"></a></li>
                    <li><a class="header-icon itwit" target="_blank" href="https://twitter.com/itacareparadise"></a></li>
                    </ul>
            </div>
        </div>
        
        <div class="row show-for-small">
            <div class="small-10 small-centered columns">
                    <ul class="top-icons-small">
                    <li><a class="header-area-small" target="_blank" href="http://gestao.itacareparadise.com.br/">&aacute;rea do propriet&aacute;rio</a></li>
                    </ul>
            </div>
        </div>
        
	</div><!-- .inner-header -->  
<?php 
}
add_action('reactor_header_inside', 'reactor_do_title_logo', 1);

/**
 * Nav bar and mobile nav button
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_nav_bar() { 
	if ( has_nav_menu('main-menu') ) {
		
        $nav_class = ( reactor_option('mobile_menu', 1) ) ? 'class="hide-for-small" ' : ''; ?>
		
	<?php	
	if ( reactor_option('mobile_menu', 1) ) { ?>       
		<div id="mobile-menu-button" class="show-for-small">
			<button class="secondary button" id="mobileMenuButton" href="#mobile-menu">
                <span class="mobile-menu-icons">
                    <div class="mobile-menu-icon"></div>
                    <div class="mobile-menu-icon"></div>
                    <div class="mobile-menu-icon"></div>
                </span>
                <span class="mobile_menu">MENU</span>
			</button>
            
            
		</div><!-- #mobile-menu-button -->             
	<?php }
	}
}
add_action('reactor_header_inside', 'reactor_do_nav_bar', 2);

/**
 * Mobile nav
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_mobile_nav() {
	if ( reactor_option('mobile_menu', 1) && has_nav_menu('main-menu') ) { ?> 
		<nav id="mobile-menu" class="show-for-small" role="navigation">
			<div class="section-container accordion" data-section="accordion">
				<?php reactor_side_menu(); ?>
			</div>
		</nav>
<?php }
}
add_action('reactor_header_after', 'reactor_do_mobile_nav', 1);
?>