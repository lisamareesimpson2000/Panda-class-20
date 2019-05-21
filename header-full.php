<!-- Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags. -->

    <!--  no parameter no return values -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <!-- <p>This is from header.php</p> -->
        <div class="container-fluid p-0">
            <?php
                if(has_nav_menu( 'header_menu' )){
                    wp_nav_menu(array(
                        'theme_location' => 'header_menu',
                        'container_id' => 'headerNav'
                    ));
                }
            ?>
            <nav class="navbar navbar-expand-md navbar-light bg-primary" role="navigation">
              <div class="container">
            	<!-- Brand and toggle get grouped for better mobile display -->
            	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            		<span class="navbar-toggler-icon"></span>
            	</button>
            	<a class="navbar-brand" href="#">Navbar</a>
            		<?php
            		wp_nav_menu( array(
            			'theme_location'    => 'header_menu',
            			'depth'             => 2,
            			'container'         => 'div',
            			'container_class'   => 'collapse navbar-collapse',
            			'container_id'      => 'bs-example-navbar-collapse-1',
            			'menu_class'        => 'nav navbar-nav',
            			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            			'walker'            => new WP_Bootstrap_Navwalker(),
            		) );
            		?>
            	</div>
            </nav>
