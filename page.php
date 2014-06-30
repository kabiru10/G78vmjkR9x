<?php get_header(); ?>
<div class="w500 h150 subtitle central">
    <?php if ((is_page() || is_single()) && !is_front_page()): ?>
        <div class="f60"><?php the_title(); ?></div>
    <?php endif; ?>
</div>
</div>
<br>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="<?php post_class('two_cols central pt50'); ?>">
            <div class="blog">
                <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
                <div>

                </div>
                <div class="clear"></div>
                <div class="f14 gray">
                    <?php the_content(); ?>
                </div>

            </div>

        </div>
    <?php endwhile; ?>

<?php else: ?>
    <p><?php _e('No Pages  Were Found.', 'Avenir'); ?></p>
<?php endif; ?>

</div>

</section>
<?php get_footer(); ?>