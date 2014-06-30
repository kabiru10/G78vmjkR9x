<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="author" content="">
        <link rel="icon" type="image/x-icon" href="<?php echo IMAGES; ?>/favicon.png">

        <!-- Dynamic Styles -->
        <style type="text/css">
<?php //if(get_option('avenir_subscribe') == 'No'):   ?>
            /*.subscribe{ display: none; }*/
<?php //endif;   ?>
        </style>

        <!--<script src="js/jquery.js"></script>
        <script src="js/js.js"></script>-->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <?php wp_head(); ?>
    </head>
    <body>

        <header>

            <nav>
                <div class="bg"></div>
                <div class="central nav">
                    <?php
                    $default_logo = IMAGES . '/logo.png';
                    $logo = get_option('avenir_logo', $default_logo);
                    ?>
                    <div id="logo" class="fl">
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo $default_logo; ?>"/></a> 
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'container' => false,
                        'menu_class' => 'fr',
                        'menu_id' => '',
                            //'items_wrap' => '<ul class="fr"></ul>',
                            //'walker' => ''
                    ));
                    ?>

                </div>
            </nav>
        </header>
        <div class="clear"></div>
