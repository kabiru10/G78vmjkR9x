<?php get_header(); ?>

<br>



<!-- new added -->
<div class="two_cols central pt50">
    <!-- Single Post -->

    <div class="fl w60">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="title"><?php the_title(); ?></div>
        <div>
            <div class="fl w80">
                <div class="fl"><div><?php the_author_posts_link(); ?> </div><div>Author</div></div>
                <div class="fl pl10 tgrey"><?php comments_popup_link(__('No comments yet', 'Avenir'), __('1 comment', 'Avenir'), __('% comments', 'Avenir'), 'comments-link', __('Comments are Off', 'Avenir'));
        ?></div>
            </div>
            <div class="fr w20 tright"><?php the_time(get_option('date_format')); ?></div>
        </div>
        <div>
             <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
             <?php else: ?>
                <img src="<?php echo IMAGES; ?>/blogimg.png"/>
            <?php endif; ?>
        </div>

        <div class="text">
            
            <?php the_content(); ?>
            
        </div>
        <?php endwhile; endif; ?>
        <div>
            <div class="fl w40"><button>Share</button></div>
            <div class="blog_cat fr w60">
                <div>
                    <div><?php the_category(', '); ?></div>
                    <div class="f10">Category</div>
                </div>
                <div>
                    <div><?php the_tags(); ?></div>
                    <div class="f10">Tags</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="blog_detail">
            <div>
                <div>About the Author</div>
                <div>
                    <div class="fl w30">
                        <div class="pix tc">
                            <span class="people rotate">
                                <span class="ss">
                                    <span class="ss_">
                                        <span class="pic">
                                            <img src="<?php echo IMAGES; ?>/test.jpg"/>
                                        </span> 
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="fr">
                        <div><?php the_author_posts_link(); ?></div>
                        <div class="f14">
                            <?php the_author_meta('description'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>Related Post</div>
                <br/><br/><br/><br/>
            </div>

            <!-- Comments Section -->

                <?php comments_template('', true); ?>
            </div>
            <!-- end Comments Section -->

        </div>

        <!-- form here b4 -->
    </div>
    <!-- /Single Post -->

    <?php get_sidebar(); ?>
</div>

<!-- new added -->

</div>

</section>
<?php get_footer(); ?>