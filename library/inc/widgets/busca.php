<?php

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

    class Busca extends WP_Widget {
    public function __construct() {
     parent::WP_Widget(false,'Busca Personalizada','description=Busca Personalizada');
    }

    public function form( $instance ) {

        
    }

    public function update( $new_instance, $old_instance ) {

    }

    public function widget( $args, $instance ) {
        echo ' <div class="widget widget_busca"><h4 class="widget-title">Busca</h4>
        <form role="search" method="get" id="searchform" action="/">
            <div class="row collapse busca">
                <div class="large-12 small-9 columns">
                    <input type="text" value="" name="s" id="s" placeholder="O que voc&ecirc; procura?">
                </div>
                <div class="large-12 small-3 columns end">
                    <input class="botao_busca" type="submit" id="searchsubmit" value="Search">
                </div>
            </div>
            <br />
        </form>
        </div>
        '; 


    }
    
}
    register_widget( 'Busca' );

?>