<?php

    class Newsletter extends WP_Widget {
    public function __construct() {
     parent::WP_Widget(false,'Newsletter','description=Newsletter Personalizada');
    }

    public function form( $instance ) {

        
    }

    public function update( $new_instance, $old_instance ) {

    }

    public function widget( $args, $instance ) {
        echo ' <div class="widget widget_newsletter" id="widget_newsletter"><h4 class="widget-title">Newsletter</h4>
        
        
        '.do_shortcode('[formidable id=12]').'
        <br />
        

        </div>
        '; 


    }
    
}
    register_widget( 'Newsletter' );

?>