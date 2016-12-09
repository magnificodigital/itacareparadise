<?php


/**


 * The template for displaying the header


 *


 * @package Reactor


 * @subpackge Templates


 * @since 1.0.0


 */?><!DOCTYPE html>


<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->


<!--[if ( IE 7 )&!( IEMobile )]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->


<!--[if ( IE 8 )&!( IEMobile )]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->


<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->





<head>


<!-- WordPress head -->


<?php wp_head(); ?>


<!-- end WordPress head -->


<?php reactor_head(); ?>





<!-- Facebook Open Graph Protocol -->


<meta property="og:title" content="Itacaré Paradise | O primeiro imóvel fractional do Brasil" />


<meta property="og:description" content="O Itacaré Paradise é o primeiro imóvel fractional do Brasil. Um condomínio exclusivo com casas de alto padrão em Itacaré na Bahia que oferece um novo estilo de vida para os seus proprietários." />


<meta property="og:image" content="http://www.itacareparadise.com.br/wp-content/uploads/b1.jpg" />


<meta property="og:url" content="http://www.itacareparadise.com.br" />


<meta property="og:site_name" content="Itacaré Paradise | O primeiro imóvel fractional do Brasil" />





<!-- Google Plus Open Graph Protocol-->


<meta itemprop="name" content="Itacaré Paradise | O primeiro imóvel fractional do Brasil">


<meta itemprop="description" content="O Itacaré Paradise é o primeiro imóvel fractional do Brasil. Um condomínio exclusivo com casas de alto padrão em Itacaré na Bahia que oferece um novo estilo de vida para os seus proprietários.">

<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-42963571-1']);
	_gaq.push(['_gat._forceSSL']);
	_gaq.push(['_trackPageview']);

	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 

'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();

</script>

<!--integração RD-->
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>  
<script type="text/javascript">
    var meus_campos = {
        'item_meta[108]': 'email',
        'item_meta[106]': 'nome',
        'item_meta[116]': 'Assunto',
        'item_meta[110]': 'celular',
        'item_meta[114]': 'Mensagem',
        'item_meta[109]': 'telefone'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('5bc74d9a15dc71ab1bd0bc162ae544d5', 'Itacaré Paradise - Contato', options);  
</script>

                        <!-- Início do script Omnize --> 
<script>document.addEventListener('DOMContentLoaded',function(){var JSLink=location.protocol+'//widget.omnize.com',JSElement=document.createElement('script');JSElement.async=!0;JSElement.charset='UTF-8';JSElement.src=JSLink;JSElement.onload=OnceLoaded;document.getElementsByTagName('body')[0].appendChild(JSElement);function OnceLoaded(){wOmz.init({id:3666});}},false);</script> 
<!-- Fim do script Omnize -->

</head>



<body <?php body_class(); ?>>





    <div id="page" class="hfeed site"> 


    


        <?php reactor_header_before(); ?>


    


        <header id="header" class="site-header" role="banner">


            <div class="row">


                <div class="<?php reactor_columns( 12 ); ?>">


                    


                    <?php reactor_header_inside(); ?>


                    


                </div><!-- .columns -->


            </div><!-- .row -->


        </header><!-- #header -->


        


        <?php reactor_header_after(); ?>


        


        <div id="main" class="wrapper">