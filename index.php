<?php get_header(); ?>
<!--<div class="w500 h150 subtitle central">
     <div class="f60">The Blog</div> 
</div>-->
</div>

<br>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="<?php post_class('two_cols pt50'); ?>">
            <div class="central">
                <div class="blog">
                    <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
                    <div>
                        <div class="fl w80">
                            <div class="fl"><div><?php the_author_posts_link(); ?> </div><div>Author</div></div>
                            <div class="fl pl10 tgrey"><?php comments_popup_link(__('No comments yet', 'Avenir'), __('1 comment', 'Avenir'), __('% comments', 'Avenir'), 'comments-link', __('Comments are Off', 'Avenir'));
        ?></div>
                        </div>
                        <div class="fr w20 tright"><?php the_time(get_option('date_format')); ?></div>
                    </div>
                    <div class="clear"></div>
                    <div class="text">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="blog_cat">
                        <div><?php the_category(', '); ?></div>
                        <div class="f10">Category</div>
                    </div>
                </div>
                <?php if (has_post_thumbnail()): ?>
                    <div class="fr w40 h350">
                        <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img class="w40 fr" src="<?php echo IMAGES; ?>/blogimg.png"/>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <hr class="central"/>

        <br/>
    <?php endwhile; ?>

<?php else: ?>
    <p><?php _e('No Posts Were Found.', 'Avenir'); ?></p>
<?php endif; ?>

</div>

</section>
<?php get_footer(); ?>