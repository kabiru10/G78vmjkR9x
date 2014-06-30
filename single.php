<?php get_header(); ?>
<!--<div class="w500 h150 subtitle central">
     <div class="f60">The Blog</div> 
</div>-->

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

<!-- new added -->
<div class="two_cols central pt50">
    <div class="fl w60">
        <div class="title">The Crunch Man</div>
        <div>
            <div class="fl w80">
                <div class="fl"><div>John Doe </div><div>Author</div></div>
                <div class="fl pl10 tgrey">45 Comments</div>
            </div>
            <div class="fr w20 tright">Jan 20, 2014</div>
        </div>
        <div><img src="<?php echo IMAGES; ?>/blogimg.png"/></div>
        <div class="text">
            <p>
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. 
                Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. 
                Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. 
                Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.	
            </p>
            <p>
                Aenean ultricies mi vitae est. Mauris placerat eleifend leo. 
                Quisque sit amet est et sapien ullamcorper pharetra. 
                Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. 	
            </p>
        </div>
        <div>
            <div class="fl w40"><button>Share</button></div>
            <div class="blog_cat fr w60">
                <div>
                    <div>Suits, Wool, Photography, Web Designs</div>
                    <div class="f10">Category</div>
                </div>
                <div>
                    <div>Suits, Wool, Photography, Web Designs</div>
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
                        <div>John Doe</div>
                        <div class="f14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nam viverra euismod odio, gravida pellentesque urna varius vitae. 
                            Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. 
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>Related Post</div>
                <br/><br/><br/><br/>
            </div>
            <div class="comment">
                <div>Comments</div>
                <div class="post">
                    <div>
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
                    <div class="fr">
                        <div>
                            <div class="fl">John Doe</div><div class="comment_time">Jan 20, 2014 1:05pm</div>
                        </div>
                        <div class="clear"></div>
                        <div class="f13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nam viverra euismod odio, gravida pellentesque urna varius vitae. 
                            Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.
                        </div>
                    </div>
                </div>
                <!--<div class="clear"></div>-->
                <div class="post response">
                    <div>
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
                    <div class="fr">
                        <div>
                            <div class="fl">John Doe</div><div class="comment_time">Jan 20, 2014 1:05pm</div>
                        </div>
                        <div class="clear"></div>
                        <div class="f13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nam viverra euismod odio, gravida pellentesque urna varius vitae. 
                            Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.
                        </div>
                    </div>
                </div>
                <div class="post response ml10">
                    <div>
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
                    <div class="fr">
                        <div>
                            <div class="fl">John Doe</div><div class="comment_time">Jan 20, 2014 1:05pm</div>
                        </div>
                        <div class="clear"></div>
                        <div class="f13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nam viverra euismod odio, gravida pellentesque urna varius vitae. 
                            Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.
                        </div>
                    </div>
                </div>
                <div class="post response ml20">
                    <div>
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
                    <div class="fr">
                        <div>
                            <div class="fl">John Doe</div><div class="comment_time">Jan 20, 2014 1:05pm</div>
                        </div>
                        <div class="clear"></div>
                        <div class="f13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nam viverra euismod odio, gravida pellentesque urna varius vitae. 
                            Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="">
            <div>
                <input type="text" placeholder="Name" class=""/><!--
                --><input type="text" placeholder="Email" class=""/><!--
                --><input type="text" placeholder="Phone" class=""/>
            </div>
            <textarea placeholder="Message"></textarea><br/>
            <button type="button">Submit</button>
        </form>
    </div>
    <aside>
        <div>
            <form><input type="text" placeholder="Search..."/></form>
            <div id="cat">
                <div class="f20">Categories</div>
                <div>
                    <div>Web Designs<span>2</span></div>
                    <div>Suits<span>2</span></div>
                    <div>Photography<span>2</span></div>
                    <div>Logos<span>2</span></div>
                </div>
            </div>
            <div id="news">
                <div class="tab">
                    <div class="active">Popular</div><div>Recent</div><div>Comments</div>
                </div>
            </div>
            <div id="socials">
                <div>Facebook</div>
                <div>Twitter</div>
                <div>
                    Flickr
                    <div class="socialphoto">
                        <div><img src="img/blogimg1.png"></div>
                        <div><img src="img/blogimg1.png"></div>
                        <div><img src="img/blogimg1.png"></div>
                        <div><img src="img/blogimg1.png"></div>
                        <div><img src="img/blogimg1.png"></div>
                        <div><img src="img/blogimg1.png"/></div>
                    </div>
                </div>
                <div>Latest Video</div>
            </div>
        </div>
    </aside>
</div>

<!-- new added -->

</section>
<?php get_footer(); ?>