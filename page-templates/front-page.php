<?php
    /**
    * Template Name: Front Page
    *
    * @package Reactor
    * @subpackge Page-Templates
    * @since 1.0.0
    */
?>

<?php // get the options
    $slider_category = reactor_option('frontpage_slider_category', ''); ?>

<?php get_header(); ?>

<div id="primary" class="site-content">

    <?php reactor_content_before(); ?>

    <div id="slider">
        
        <div class="row">
            <div class="<?php reactor_columns( 12 ); ?>">
                <?php // slider function passing category from options
                    reactor_slider( array('category' => $slider_category, 'slider_id' => 'slider-front-page' ) ); ?>
            </div><!-- .columns -->
        </div><!-- .row -->
    
    </div>

    <div id="content" role="main">
    
    <div id="depoimentos">
        <div class="row">  
            <div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="6000">
                
                <?php
    
                $args = array( 'post_type' => 'depoimentos');
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();

                    $c++;
                    $depoimentos[$c]['autor'] = get_the_title();
                    $depoimentos[$c]['texto'] = strip_tags(get_the_content());
                endwhile;
?>
                
                <?php
                foreach($depoimentos as $depoimento) {
?>
                <div class="depoimento">
                    <p class="depoimento"><?php echo $depoimento['texto'] ?></p>
                    <p class="autor"><?php echo $depoimento['autor'] ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

        <div id="bb">
        <div class="row"> 
            <div class="small-6 columns bb1">
                <img class="b1" src="wp-content/uploads/b1.jpg" />
            </div>
            <div class="small-6 columns">
                <div class="bm1">
                    <h4>Casas de Alto Padr&atilde;o em Itacar&eacute;/BA</h4>
                    <p>Desfrute de um dos lugares mais paradis&iacute;acos do mundo, em casas de 4 ou 3
su&iacute;tes, com piscina, a 150 metros da praia e servi&ccedil;os de Hotel. Um condom&iacute;nio 
exclusivo em local cinematogr&aacute;fico.</p>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="small-6 columns">
                <div class="bm2">
                    <h4>F&eacute;rias para toda a vida</h4>
                    <p>O Itacar&eacute; Paradise faz parte do exclusivo <em>The Registry Collection</em>&reg;, um programa
de interc&acirc;mbio imobili&aacute;rio que oferece as melhores hospedagens em mais de 100
destinos ao redor do mundo. Viaje para diversos outros pa&iacute;ses com
classe e sofistica&ccedil;&atilde;o.</p>
                </div>
            </div>
            <div class="small-6 columns  bb2">
                <img class="b2" src="wp-content/uploads/b2.jpg" />
            </div>
        </div>
        <div class="row"> 
            <div class="small-6 columns bb3">
                <img class="b3" src="wp-content/uploads/b3.jpg" />
            </div>
            <div class="small-6 columns">
                <div class="bm3">
                    <h4>Dividir = Multiplicar</h4>
                    <p>Fazer parte do Sistema Fractional &eacute; sin&ocirc;nimo de economizar. Sucesso nos 
                        Estados Unidos, Canad&aacute;, M&eacute;xico, Caribe e Europa, o novo neg&oacute;cio imobili&aacute;rio
                        &eacute; mais do que inteligente, &eacute; uma nova cultura, &eacute; um novo estilo de viver. Compre
                        o seu im&oacute;vel e s&oacute; pague pelo tempo que pretende utiliz&aacute;-lo.</p>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="small-6 columns">
                <div class="bm4">
                    <h4>Retorno de Investimento</h4>
                    <p>Al&eacute;m de economizar, o Itacar&eacute; Paradise &eacute; seu! E, como todo im&oacute;vel, pode ser
vendido, emprestado, alugado, hipotecado, herdado... e principalmente valorizado!
Os primeiros empreendimentos de compra fracionada de im&oacute;veis est&atilde;o
colhendo os frutos do pioneirismo, com valoriza&ccedil;&otilde;es de at&eacute; 200% do valor original.</p>
                </div>
            </div>
            <div class="small-6 columns bb4">
                <img class="b4" src="wp-content/uploads/b4.jpg" />
            </div>
        </div>
        </div>
        
        <div id="call-home" class="row">  
            <div class="large-6 small-9 large-centered small-centered columns">
                <a href="/sobre-o-sistema-fractional"><strong>INTERESSOU?</strong><br />Clique aqui e saiba tudo sobre o Itacar&eacute; Paradise</a>
            </div>
        </div>
        
        <div id="blog-home">
            <div class="row">  
                <div class="large-8 columns">
                <h3>Blog do Itacar&eacute; Paradise</h3>    
                <?php // get the main loop
                    get_template_part('loops/loop', 'frontpage'); ?>
                </div>
                <div class="large-4 columns">
                    <div class="newsletter" id="newsletter-home">
                        <h4>Newsletter</h4>
                        <p>Cadastre-se para receber gratuitamente nossos informativos</p>
                        
                        <?php  echo do_shortcode('[formidable id=10]') ?>

                    </div>    
                    <div class="indique">
                        <h4>Indique para um amigo</h4>
                        <p><button data-reveal-id="indique-email">Email</button>&nbsp;&nbsp;<button onclick="javascript:myPopup('//www.facebook.com/share.php?u=http://www.itacareparadise.com.br')">Facebook</button></p>
                                              
                        
                    </div>    
                    <div class="agende">
                        <h4>Agende sua Visita</h4>
                        <p><a href="<?php echo get_bloginfo('url') ?>/agende-sua-visita"><img src="/wp/wp-content/themes/itacare/img/agende.png" /></a></p>
                    </div>    
                </div>
            </div>
        </div>   
        


    </div><!-- #content -->

    <?php reactor_content_after(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
