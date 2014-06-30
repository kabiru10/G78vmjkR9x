<div class="clear"></div>
<footer>
    <?php
    $copyright = get_option('avenir_copyrights', 'Theme by Futurist. All rights reserved . Powered by WordPress');
    ?>
    <div class="central">
        <div id="level1">
            <div class="fl">
                <?php if (is_active_sidebar('social-widget')): ?>
                    <?php dynamic_sidebar('social-widget'); ?>
                <?php endif; ?>
            </div>
            <div class="subscribe fr">
                <?php if (is_active_sidebar('newsletter-widget')) : ?>
                    <?php dynamic_sidebar('newsletter-widget'); ?>  
                <?php endif; ?>
            </div>
        </div>
        <div id="level2">
            <div id="foot_nav">
                <div>
                    <div><img src="<?php echo IMAGES; ?>/logo_white.png"/></div>
                    <div>&copy; 2014</div>
                    <div>
                        <div><a href="">Home</a></div>
                        <div><a href="">Privacy Policy</a></div>
                        <div><a href="">Contact</a></div>
                    </div>
                </div>
            </div>

            <?php if (is_active_sidebar('footer-widget1')) : ?>

                    <?php dynamic_sidebar('footer-widget1'); ?>

            <?php endif; ?>

            <?php if (is_active_sidebar('footer-widget2')) : ?>

                    <?php dynamic_sidebar('footer-widget2'); ?>

            <?php endif; ?>

            <?php if (is_active_sidebar('footer-widget3')) : ?>
    
                    <?php dynamic_sidebar('footer-widget3'); ?>
    
            <?php endif; ?>




        </div>
    </div>
    <div class="clear"></div>
    <div class="copy">
        <div class="central"><?php echo $copyright; ?></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
