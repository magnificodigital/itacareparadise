
					<?php // start the loop
                    
                    if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
                    $args = array( 
						'post_type'           => 'post',
						'cat'                 => $post_category,
						'posts_per_page'      => 3,
						'paged'               => get_query_var('paged') );
					
					global $bloghome_query;
                    $bloghome_query = new WP_Query( $args ); ?>
                          
				    <?php while ( $bloghome_query->have_posts() ) : $bloghome_query->the_post(); get_template_part('post-formats/format', 'bloghome'); ?>
                    

                            

                    <?php endwhile;  // end have_posts() check ?>
                    <br /><br />
                    <?php wp_pagenavi(array( 'query' => $bloghome_query)); ?>


                    
