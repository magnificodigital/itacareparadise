<?php
    /**
    * Reactor Shortcodes
    * lots of Foundation elements in shortcode form
    *
    * @package Reactor
    * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
    * @since 1.0.0
    * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
    */

    /**
    * Table of Contents
    *
    * 1. Alerts
    * 2. Buttons
    * 3. Columns
    * 4. Flex Video
    * 5. Gallery ( custom WP shortcode )
    * 6. Glyph Icons
    * 7. Labels
    * 8. Panels
    * 9. Price Tables
    * 10. Price Table Items
    * 11. Progress Bars
    * 12. Reveal Modals
    * 13. Section Groups
    * 14. Sections
    * 15. Slider
    * 16. Tooltips
    */

    /**
    * 1. Alerts
    *
    * @since 1.0.0
    */
    function reactor_add_alerts( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'type'  => '',     // standard, success, alert, secondary
                    'shape' => '',     // radius, round
                    'close' => 'true', // add X to close alert
                    'class' => ''
                ), $atts ) );

        $class_array[] = ( $shape ) ? $shape : '';
        $class_array[] = ( $type ) ? $type : '';
        $class_array[] = ( $class ) ? $class : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );

        $output  = '<div class="alert-box ' . $classes . '">';
        $output .= do_shortcode( $content );
        $output .= ( 'false' != $close ) ? '<a class="close" href="">x</a>' : '';
        $output .= '</div>';

        return $output;
    }

    /** 
    * 2. Buttons
    *
    * @since 1.0.0
    */
    function reactor_add_buttons( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'url'     => '#',      // target for the button
                    'size'     => 'medium', // tiny, small, medium, large
                    'shape'    => '',       // radius, round
                    'type'     => '',       // standard, success, alert, secondary
                    'disabled' => 'false',
                    'expand'   => 'false',
                    'class'    => '',       // optional CSS class
                    'target'   => '',
                ), $atts ) );

        $class_array = array();
        $class_array[] = ( $size ) ? $size : '';
        $class_array[] = ( $shape ) ? $shape : '';
        $class_array[] = ( $type ) ? $type : '';
        $class_array[] = ( $class ) ? $class : '';
        $class_array[] = ( 'true' == $disabled ) ? 'disabled' : '';
        $class_array[] = ( 'true' == $expand ) ? 'expand' : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );

        $target = ( $target ) ? ' target="' . $target . '"' : '';

        $output  = '<a class="' . $classes . ' button" href="' . $url . '"' . $target .'>';
        $output .= $content;
        $output .= '</a>';

        return $output;
    }

    /**
    * 3. Columns
    *
    * @since 1.0.0
    */
    function reactor_add_columns( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'first_last' => '', // first or last
                    'large' => '',
                    'small' => '',
                    'large_centered' => '',
                    'small_centered' => '',
                    'text_center' => ''
                ), $atts ) );

        switch( $large ) {
            case '12'   : $large = 'large-12'; break;
            case '11'   : $large = 'large-11'; break;
            case '10'   : $large = 'large-10'; break;
            case '9'    : $large = 'large-9'; break;
            case '8'    : $large = 'large-8'; break;
            case '7'    : $large = 'large-7'; break;
            case '6'    : $large = 'large-6'; break;
            case '5'    : $large = 'large-5'; break;
            case '4'    : $large = 'large-4'; break;
            case '3'    : $large = 'large-3'; break;
            case '2'    : $large = 'large-2'; break;
            case '1'    : $large = 'large-1'; break;
        }

        switch( $small ) {
            case '12'   : $small = ' small-12'; break;
            case '11'   : $small = ' small-11'; break;
            case '10'   : $small = ' small-10'; break;
            case '9'    : $small = ' small-9'; break;
            case '8'    : $small = ' small-8'; break;
            case '7'    : $small = ' small-7'; break;
            case '6'    : $small = ' small-6'; break;
            case '5'    : $small = ' small-5'; break;
            case '4'    : $small = ' small-4'; break;
            case '3'    : $small = ' small-3'; break;
            case '2'    : $small = ' small-2'; break;
            case '1'    : $small = ' small-1'; break;
        }
        switch( $large_centered ) {
            case true    : $large_centered = ' large-centered'; break;
        }

        switch( $large_centered ) {
            case true    : $small_centered = ' small-centered'; break;
        }

        switch( $text_center ) {
            case true    : $text_center = ' text-center'; break;
        }

        $output  = '';
        $output .= ( $first_last == 'first' ) ? '<div class="row">' : '';
        $output .= '<div class="' . $large . $small . $small_centered . $large_centered . $text_center .' columns">';
        $output .= do_shortcode( $content );
        $output .= '</div>';
        $output .= ( $first_last == 'last' ) ? '</div>' : '';

        return $output;
    }

    /**
    * 4. Flex Videos
    *
    * @since 1.0.0
    */
    function reactor_add_flex_video( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'widescreen' => 'true',
                    'vimeo'      => 'false'
                ), $atts ) );

        $class_array = array();
        $class_array[] = ( $widescreen == 'true' ) ? 'widescreen' : '';
        $class_array[] = ( $vimeo == 'true' ) ? 'vimeo' : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );	

        $output  = '<div class="flex-video' . $classes . '">';
        $output .= $content;
        $output .= '</div>';

        return $output;
    }

    /**
    * 5. Gallery
    * customized WP shortcode (from wp-includes/media.php)
    *
    * @since 1.0.0
    */
    remove_shortcode('gallery');
    function reactor_add_custom_gallery( $attr ) {
        $post = get_post();

        static $instance = 0;
        $instance++;

        if ( !empty( $attr['ids'] ) ) {
            // 'ids' is explicitly ordered, unless you specify otherwise.
            if ( empty( $attr['orderby'] ) )
                $attr['orderby'] = 'post__in';
            $attr['include'] = $attr['ids'];
        }

        // Allow plugins/themes to override the default gallery template.
        $output = apply_filters( 'post_gallery', '', $attr );
        if ( $output != '' )
            return $output;

        // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
        if ( isset( $attr['orderby'] ) ) {
            $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
            if ( !$attr['orderby'] )
                unset( $attr['orderby'] );
        }

        extract( shortcode_atts( array( 
                    'order'      => 'ASC',
                    'orderby'    => 'menu_order ID',
                    'id'         => $post->ID,
                    'itemtag'    => 'ul',
                    'icontag'    => 'li',
                    'captiontag' => 'li',
                    'columns'    => 4,
                    'size'       => 'thumbnail',
                    'include'    => '',
                    'exclude'    => ''
                ), $attr ) );

        $id = intval( $id );
        if ('RAND' == $order )
            $orderby = 'none';

        if ( !empty( $include ) ) {
            $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

            $attachments = array();
            foreach ( $_attachments as $key => $val ) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        }elseif ( !empty( $exclude ) ) {
            $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
        }else{
            $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
        }

        if ( empty( $attachments ) )
            return '';

        if ( is_feed() ) {
            $output = "\n";
            foreach ( $attachments as $att_id => $attachment )
                $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
            return $output;
        }

        $itemtag = tag_escape( $itemtag );
        $captiontag = tag_escape( $captiontag );
        $columns = intval( $columns );
        $itemwidth = $columns > 0 ? floor( 100/$columns ) : 100;
        $float = is_rtl() ? 'right' : 'left';

        $selector = "gallery-{$instance}";

        $size_class = sanitize_html_class( $size );
        $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
        $output = apply_filters('gallery_style', $gallery_div );

        $i = 0;
        $grid = $columns;
        $clearing = ( isset( $attr['link'] ) && 'file' == $attr['link'] ) ? 'data-clearing' : '';

        $output .= "<{$itemtag} class='large-block-grid-{$grid} small-block-grid-2 gallery-item' {$clearing}>";

        foreach ( $attachments as $id => $attachment ) {
            $link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false );

            $output .= "
            <{$icontag} class='gallery-icon'>
            $link
            </{$icontag}>";
            if ( $captiontag && trim( $attachment->post_excerpt ) ) {
                $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                ".wptexturize( $attachment->post_excerpt )."
                </{$captiontag}>";
            }
            if ( $columns > 0 && ++$i % $columns == 0 )
                $output .= '<br style="clear: both" />';
        }

        $output .= "</{$itemtag}>";
        $output .= "</div>\n";

        return $output;
    }

    /**
    * 6. Glyph Icons
    *
    * @link http://www.zurb.com/playground/foundation-icons
    * @since 1.0.0
    */
    function reactor_add_glyph_icons( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'type'    => 'general', // general, enclosed, social, accessible
                    'icon'    => 'star',
                    'class'   => '',
                    'style'   => '',
                ), $atts ) );

        $class_array = array();
        $class_array[] = ( $type ) ? $type : '';
        $class_array[] = ( $icon ) ? 'foundicon-' . $icon : '';
        $class_array[] = ( $class ) ? $class : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );

        $style = ( $style ) ? ' style="' . $style . '"' : '';

        $output  = '<i class="' . $classes . '"' . $style . '>';
        $output .= do_shortcode( $content );
        $output .= '</i>';

        return $output;
    }

    /**
    * 7. Labels
    *
    * @since 1.0.0
    */
    function reactor_add_labels( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'type'  => '', // standard, success, alert, secondary
                    'shape' => '', // radius, round
                    'class' => ''
                ), $atts ) );

        $class_array[] = ( $shape ) ? $shape : '';
        $class_array[] = ( $type ) ? $type : '';
        $class_array[] = ( $class ) ? $class : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );	

        $output  = '<span class="' . $classes . ' label">';
        $output .= do_shortcode( $content );
        $output .= '</span>';

        return $output;
    }

    /**
    * 8. Panels
    *
    * @since 1.0.0
    */
    function reactor_add_panels( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'shape'   => '',      // square, radius
                    'callout' => 'false', // true for a brighter panel
                    'class'   => ''
                ), $atts ) );

        $class_array = array();
        $class_array[] = ( $shape ) ? $shape : '';
        $class_array[] = ( $callout == 'true') ? 'callout' : '';
        $class_array[] = ( $class ) ? $class : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );	

        $output  = '<div class="' . $classes . ' panel">';
        $output .= do_shortcode( $content );
        $output .= '</div>';

        return $output;	
    }

    /**
    * 9. Price Tables
    *
    * @since 1.0.0
    */
    function reactor_add_price_tables( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'title' => 'Title',
                    'price' => '0.00',
                    'desc'  => '',
                    'url'   => '#',
                    'button' => 'Buy Now'
                ), $atts ) );

        $output  = '<ul class="pricing-table">';
        $output .= '<li class="title">' . $title . '</li>';
        $output .= '<li class="price">' . $price . '</li>';
        $output .= ( $desc ) ? '<li class="description">' . $desc . '</li>' : '';
        $output .= do_shortcode( $content );
        $output .= '<li class="cta-button"><a class="button" href="' . $url . '">' . $button . '</a></li>';
        $output .= '</ul>';

        return $output;
    }

    /**
    * 10. Price Table Items
    *
    * @since 1.0.0
    */
    function reactor_add_pt_items( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                ), $atts ) );

        $output  = '<li class="bullet-item">';
        $output .= do_shortcode( $content );
        $output .= '</li>';

        return $output;
    }

    /**
    * 11. Progress Bars
    *
    * @since 1.0.0
    */
    function reactor_add_progress_bars( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'shape'   => '', // square, radius, round
                    'type'    => '', // standard, success, alert, secondary
                    'columns' => '', // number of grid columns for overall length
                    'fill'    => ''  // width of the fill meter in percent
                ), $atts ) );

        $class_array = array();
        $class_array[] = ( $shape ) ? $shape : '';
        $class_array[] = ( $type ) ? $type : '';
        $class_array[] = ( $columns ) ? 'large-' . $columns : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );

        $output  = '<div class="progress ' . $classes . '">';
        $output .= '<span class="meter" style="width:' . $fill . '">';
        $output .= do_shortcode( $content );
        $output .= '</span>';
        $output .= '</div>';

        return $output;
    }

    /**
    * 12. Reveal Modals
    *
    * @since 1.0.0
    */
    function reactor_add_reveal_modals( $atts, $content = null ) {
        global $post;
        extract( shortcode_atts( array( 
                    'button'         => 'false', // whether or not the link is a button
                    'text'           => 'Click here', // text for link or button
                    'size'           => '' // tiny, small, medium, large, xlarge
                ), $atts ) );

        $unique_id = $post->ID . '-' . rand( 1000, 9999 );
        $class = ( $button == 'true') ? 'class="button"' : '';
        $output  = '<a href="#" ' . $class . ' data-reveal-id="' . $unique_id . '">' . $text . '</a>';

        $reveal_output  = '<div id="' . $unique_id . '" class="reveal-modal ' . $size . ' shortcode-modal">';
        $reveal_output .= do_shortcode( $content );
        $reveal_output .= '<a class="close-reveal-modal">&#215;</a>';
        $reveal_output .= '</div>';

        $GLOBALS['reveal_content'][] = $reveal_output;

        return $output;
    }

    add_action('wp_footer', 'reveal_footer_content');
    function reveal_footer_content() {
        if ( !empty( $GLOBALS['reveal_content'] ) ) {
            echo "\n".'<!-- [reveal_modal] shortcode output -->';

            foreach ( $GLOBALS['reveal_content'] as $output ) {
                echo "\n" . $output;
            }

            echo "\n" . '<!-- / end [reveal_modal] output -->' . "\n";
        }
    }

    /**
    * 13. Section Groups
    *
    * @link http://michaelwender.com/blog/2010/11/01/creating-wordpress-shortcodes-for-jquery-tools-tabs/
    * @since 1.0.0
    */
    function reactor_add_section_groups( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'type' => 'tabs', // tabs, accordion, veritcal-nav, horizontal-nav
                    'options' => ''
                ), $atts ) );

        $GLOBALS['tab_count'] = 1;
        $GLOBALS['tabs'] = '';
        $output = ''; $count = 1;

        $type = ( 'vertical' == $type ) ? 'vertical-nav' : $type;
        $data_options = ( $options ) ? ' data-options="' . $options . '"' : '';

        do_shortcode( $content );

        if ( is_array( $GLOBALS['tabs'] ) ) {
            foreach ( $GLOBALS['tabs'] as $tab ) {
                $tabs[] = '<div class="section' . $tab['active'] .'">
                <p class="title' . $tab['active'] . '"><a class="" href="#panel' . $count . '">' . $tab['title'] . '</a></p>
                <div class="content" data-slug="panel' . $count . '">' . $tab['content'] . '</div>
                </div>';
                $count++;
            }
            $output .= '<div class="section-container ' . $type . '" data-section="' . $type . '"' . $data_options . '>';
            $output .= implode( "\n", $tabs );
            $output .= '</div>';
        }
        return $output;
    }


    /**
    * 14. Sections
    *
    * @since 1.0.0
    */
    function reactor_add_sections( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'active' => 'false',
                    'title'  => 'Section %d'
                ), $atts ) );

        $active = ( $active == 'true' ) ? ' active' : '';

        $x = $GLOBALS['tab_count'];
        $GLOBALS['tabs'][$x] = array('active' => $active, 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' => $content);
        $GLOBALS['tab_count']++;
    }

    /**
    * 15. Slider
    *
    * @since 1.0.0
    */
    function reactor_add_orbit_slider( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'orderby'  => 'date',
                    'order'    => 'DESC',
                    'category' => '',
                    'slides'   => -1,
                    'id'       => '',
                ), $atts ) );

        $args = array(
            'orderby'        => $orderby,
            'order'          => $order,
            'category'       => $category,
            'posts_per_page' => $slides,
            'slider_id'      => $id,
            'echo'           => false
        );

        $output = reactor_slider( $args );

        return $output;
    }

    /**
    * 16. Tooltips
    *
    * @since 1.0.0
    */
    function reactor_add_tooltips( $atts, $content = null ) {
        extract( shortcode_atts( array( 
                    'position' => '', // bottom ( deftault ), top, right, left
                    'width'    => '', // set the width
                    'class'    => '',
                    'text'     => 'Add some tooltip text' // add text to the tooltip
                ), $atts ) );

        $class_array = array();
        $class_array[] = ( $position ) ? 'tip-' . $position : '';
        $class_array[] = ( $class ) ? $class : '';
        $class_array = array_filter( $class_array );
        $classes = implode( ' ', $class_array );

        $output  = '<span data-tooltip class="has-tip ' . $classes . '"';
        if ( $width ) {$output .= ' data-width="' . $width . '"';}
        $output .= ' title="' . $text . '">';
        $output .= do_shortcode( $content );
        $output .= '</span>';

        return $output;
    }

    function itacare_grafico_fracional()
    {
        $output = <<<EOT
    <div class="grafico_fracional">
        <div class="row">
            <div class="large-5 columns">      
            aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa 
            </div>        
            <div class="large-2 columns">
            aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa 
            </div>
            <div class="large-5 columns">
            aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa 
            </div>        
        </div>
    </div>
    
EOT;

        return $output;    
    }

    function itacare_vantagens()
    {

        $args = array( 'post_type' => 'vantagens');
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();

            $c++;
            $vantagens[$c]['title'] = get_the_title();
            $vantagens[$c]['img'] = strip_tags(get_the_content(), '<img>');
            $vantagens[$c]['link'] = get_the_excerpt();


            endwhile;


        foreach($vantagens as $vantagem)
        {
            $x++;
            $before = $after = ""; 
            if($x % 3 === 0)
            {
                $before = '<div class="row">';
                $after = '</div>';    
            } 

            $html .= $before.'<div class="large-4 small-12 columns"><div class="vantagem"><a href="'.$vantagem['link'].'" class="vantagem-mais">&nbsp;</a><div class="vantagem-content">'.$vantagem['img'].'<div class="vantagem_texto">'.$vantagem['title'].'</div></div></div></div>'.$after;

        }

        $output =  '<div class="vantagens">'.$html.'</div>';

        $output.=
        "
        <script>

        jQuery('.vantagem').hover(
        function() {
        jQuery(this).children('.vantagem-content').fadeTo(200, 0.7).end().children('.vantagem-mais').show();
        },
        function() {
        jQuery(this).children('.vantagem-content').fadeTo(200, 1).end().children('.vantagem-mais').hide();
        });

        </script>
        ";

        /*
        $output = <<<EOT
        <div class="grafico_fracional">
        <div class="row">
        <div class="large-5 columns">      
        aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa 
        </div>        
        <div class="large-2 columns">
        aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa 
        </div>
        <div class="large-5 columns">
        aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa 
        </div>        
        </div>
        </div>

        EOT;
        */
        return $output;    
    }


    function itacare_sobre1()
    {

        $output = '


        <div class="row">
        <div class="large-12 large-centered columns" style="margin-bottom:15px;">
        <a href="'.get_bloginfo('url').'/wp-content/uploads/01-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Fachada - Itacar&eacute;/BA">
        <img src="'.get_bloginfo('url').'/wp-content/uploads/galeria1.jpg" />
        </a>
        </div>

        <a href="'.get_bloginfo('url').'/wp-content/uploads/02-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Acesso &agrave; varanda - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/03-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Piscina e varanda - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/04-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Varanda - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/05-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Sala de estar - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/06-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Cozinha - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/07-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Su&iacute;te 1 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/08-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Closet da Su&iacute;te 1 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/09-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Su&iacute;te 2 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/10-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Su&iacute;te 3 - Itacar&eacute;/BA">
        </a>
		<a href="'.get_bloginfo('url').'/wp-content/uploads/11-casas-itacare.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Banheira com hidromassagem - Itacar&eacute;/BA">
        </a>




        <a href="'.get_bloginfo('url').'/wp-content/uploads/01-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Fachada - Itacar&eacute;/BA">
        </a>      
        <a href="'.get_bloginfo('url').'/wp-content/uploads/02-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Vis&atilde;o da cozinha com sala de estar - Itacar&eacute;/BA">
        </a>              
        <a href="'.get_bloginfo('url').'/wp-content/uploads/03-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Closet da su&iacute;te 1 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/04-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Su&iacute;te 1 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/05-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Su&iacute;te 2 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/06-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Banheiro da su&iacute;te 2 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/07-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Sala de estar - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/08-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Deck coberto - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/09-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Cama de casal da su&iacute;te 3 - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/10-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Banheira com hidromassagem da su&iacute;te 3 - Itacar&eacute;/BA>
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/11-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Varanda - Itacar&eacute;/BA">
        </a>
		<a href="'.get_bloginfo('url').'/wp-content/uploads/12-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Varanda e piscina - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/13-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Casa com 3 Su&iacute;tes - Piscina e varanda - Itacar&eacute;/BA">
        </a>
        <a href="'.get_bloginfo('url').'/wp-content/uploads/14-casas-itacare1.jpg" 
        class="fresco" 
        data-fresco-group="casas" 
        data-fresco-caption="Churrasqueira e forno de pizza">
        </a>

        </div>

        <div class="row">
        <div class="large-6 columns">
        <a href="http://youtu.be/3uZ5zLKJles" class="fresco" data-fresco-group="unique_name"><img src="'.get_bloginfo('url').'/wp-content/uploads/video.jpg" /></a>
        </div>


        <div class="large-6 columns">

        <a id="planta-1" href="'.get_bloginfo('url').'/wp-content/uploads/01-4suites-superior.jpg" 
        class="fresco" 
        data-fresco-group="plantas" 
        data-fresco-caption="Casa com 4 su&iacute;tes - Planta Humanizada Piso Superior - Itacar&eacute;/BA">
        <img src="'.get_bloginfo('url').'/wp-content/uploads/plantas.jpg" />
        </a>

        </div>
        </div>


        <a href="'.get_bloginfo('url').'/wp-content/uploads/04-3suites-terreo.jpg" 
        class="fresco" 
        data-fresco-group="plantas" 
        data-fresco-caption="Casa com 4 su&iacute;tes - Planta Humanizada Piso T&eacute;rreo - Itacar&eacute;/BA">
        </a>

        <a href="'.get_bloginfo('url').'/wp-content/uploads/03-3suites-superior.jpg" 
        class="fresco" 
        data-fresco-group="plantas" 
        data-fresco-caption="Casa com 3 su&iacute;tes - Planta Humanizada Piso Superior - Itacar&eacute;/BA">
        </a>

        <a href="'.get_bloginfo('url').'/wp-content/uploads/04-3suites-terreo.jpg" 
        class="fresco" 
        data-fresco-group="plantas" 
        data-fresco-caption="Casa com 3 su&iacute;tes - Planta Humanizada Piso T&eacute;rreo - Itacar&eacute;/BA">
        </a>





        ';
        return $output;    
    }

    function itacare_sobre2()
    {
        $output = '
        <div class="row">
        <div class="large-12 columns" style="margin-bottom:15px;">
        <a href="'.get_bloginfo('url').'/wp-content/uploads/01-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Prainha de Itacar&eacute;.">
        <img src="'.get_bloginfo('url').'/wp-content/uploads/galeria2.jpg" />
        </a>       
        </div>
        </div>

        <div class="row">
        <div class="large-12 columns">
        <a href="/blog"><img src="'.get_bloginfo('url').'/wp-content/uploads/link_blog.jpg" /></a>
        </div>
        </div>

    
        <a href="'.get_bloginfo('url').'/wp-content/uploads/02-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption=" Arraial, Ilh&eacute;us Serra Grande.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/03-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Prainha de Itacar&eacute;, um espet&aacute;culo a parte.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/04-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption=" Praia Ribeira">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/05-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Itacar&eacute; Paradise.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/06-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="CasaPrainha de Itacar&eacute;, refer&ecirc;ncia do Surf nacional">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/07-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="O para&iacute;so do Surf.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/08-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Itacar&eacute; Paradise.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/9-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia rochosa de Resende.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/10-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Rafting &eacute; uma &oacute;tima op&ccedil;&atilde;o para quem gosta de divers&atilde;o e adrenalina.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/11-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia Tirirca.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/12-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia da Concha.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/13-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia rochosa de Resende.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/14-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia da Concha.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/15-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia Resende.
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/16-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Praia da Coroinha.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/17-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Que tal termos uma vis&atilde;o panor&acirc; mica de cima das praias?">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/18-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Uma verdadeira obra de arte natural.">
        </a>     
        <a href="'.get_bloginfo('url').'/wp-content/uploads/19-itacare-bahia.jpg" 
        class="fresco" 
        data-fresco-group="itacare" 
        data-fresco-caption="Itacar&eacute; Paradise.">
        </a>     


        ';
        return $output;    
    }


    function itacare_callout($attrs = "")
    {

        if($attrs['xlarge']) { $size = "call-out-xlarge"; 
        $link = '<a style="line-height:16px;" href="'.$attrs['href'].'"><strong>'.$attrs['linha1'].'</strong><br />'.$attrs['linha2'].'</a>';
        
        } else { $size = "call-out-large";
        $link = '<a href="'.$attrs['href'].'"><strong>'.$attrs['linha1'].'<br />'.$attrs['linha2'].'</strong></a>';
        }

        $output = '<div class="call-out '.$size.'">'.$link.'
                </div>';
        return $output;   
    }
    
    function itacare_mapa($attrs = "")
    {
        $x = substr(md5(microtime()),0,10);
        $x = preg_replace('/[0-9]+/', '', $x);
        
        $output = '<p align="center"><a target="_blank" class="'.$x.'" href="'.$attrs['href'].'"></a></p>
        <style>
        .'.$x.'
        {
            background-image: url(\''.$attrs['img'].'\');
            width:160px;
            height:160px;
            display:block;
        }
        .'.$x.':hover
        {
            background-image: url(\''.$attrs['hover'].'\')
        }
        </style>
        ';
        return $output;   
    }

    function itacare_calllink($attrs = "")
    {
        $output = '<div class="calllink">
        <a href="'.$attrs['href'].'" target="_blank"><strong>'.$attrs['texto'].'</strong></a>
        </div>';
        return $output;   
    }

    function itacare_bloghome()
    {
        get_template_part('loops/loop', 'bloghome'); 
    }


    function itacare_indique()
    {
        $output = '<table style="font-family: Verdana; font-size: 12px;">
        <tr>
        <td width="150"><img src="http://www.itacareparadise.com.br/wp/wp-content/themes/itacare/img/f.jpg" width="100" height="800" /></td>
        <td width="500" valign="top"><br /><br /><img alt="Logo" src="http://www.itacareparadise.com.br/wp/wp-content/themes/itacare/img/l.jpg"  width="140" height="160" />
        <p>
        Olá '.$attrs['voce'].',
        </p> 

        <p>
        O seu amigo '.$attrs['amigo'].' visitou o nosso site e convidou você para conhecer o Itacaré Paradise.
        </p>
        <p>
        <a href="http://www.itacareparadise.com.br">www.itacareparadise.com.br</a>
        </p>
        <p>&nbsp;</p>
        <p align="center"><a href="http://www.itacareparadise.com.br"><img alt="Clique para conhecer" border="0" src="http://www.itacareparadise.com.br/wp/wp-content/themes/itacare/img/b.jpg"  width="320" height="90" /></a></p>
        </td>
        <td width="150"><img src="http://www.itacareparadise.com.br/wp/wp-content/themes/itacare/img/f.jpg" width="50" height="1" /><img src="http://www.itacareparadise.com.br/wp/wp-content/themes/itacare/img/f.jpg"  width="100" height="800" /></td>
        </tr>
        </table>';
        return $output;
    }

    function register_shortcodes() {
        add_shortcode('alert', 'reactor_add_alerts');
        add_shortcode('button', 'reactor_add_buttons');
        add_shortcode('column', 'reactor_add_columns');
        add_shortcode('flex_video', 'reactor_add_flex_video');
        add_shortcode('gallery', 'reactor_add_custom_gallery');
        add_shortcode('glyph_icon', 'reactor_add_glyph_icons');
        add_shortcode('label', 'reactor_add_labels');
        add_shortcode('panel', 'reactor_add_panels');
        add_shortcode('price_table', 'reactor_add_price_tables');
        add_shortcode('pt_item', 'reactor_add_pt_items');
        add_shortcode('progress_bar', 'reactor_add_progress_bars');
        add_shortcode('reveal_modal', 'reactor_add_reveal_modals');
        add_shortcode('section_group', 'reactor_add_section_groups');
        add_shortcode('section', 'reactor_add_sections');
        add_shortcode('orbit_slider', 'reactor_add_orbit_slider');

        add_shortcode('grafico_fracional', 'itacare_grafico_fracional');
        add_shortcode('vantagens', 'itacare_vantagens');
        add_shortcode('sobre1', 'itacare_sobre1');
        add_shortcode('sobre2', 'itacare_sobre2');
        add_shortcode('callout', 'itacare_callout');
        add_shortcode('calllink', 'itacare_calllink');
        add_shortcode('indique', 'itacare_indique');
        add_shortcode('bloghome', 'itacare_bloghome');
        add_shortcode('mapa', 'itacare_mapa');

        add_shortcode('tooltip', 'reactor_add_tooltips');
    }
    add_action('init', 'register_shortcodes');

    /**
    * Remove br and p tags around shorcodes
    *
    * @link http://www.wpexplorer.com/snippet/clean-wordpress-shortcodes
    * @since 1.0.0
    */
    if ( !function_exists('reactor_clean_shortcodes') ) {
        function reactor_clean_shortcodes( $content ) {   
            $array = array ( 
                '<p>['    => '[', 
                ']</p>'   => ']', 
                ']<br />' => ']'
            );
            $content = strtr( $content, $array );
            return $content;
        }
        add_filter('the_content', 'reactor_clean_shortcodes');
}