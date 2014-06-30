<?php

class LatestPostWidget extends WP_Widget{
    
    function __construct() {
        parent::__construct(
                'latestpost-widget',
                'Avenir: Latest Posts',
                array('Description' => __('A Fancy widget to display Latest News', 'Avenir'))
        );
    }
    
    function form($instance) {
        $defaults = array(
            'title' => __('Latest Posts', 'Avenir'),
            'nposts' => 2
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title') ?>">Title:</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nposts') ?>">How many posts? (Max:3):</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('nposts'); ?>" name="<?php echo $this->get_field_name('nposts'); ?>" value="<?php echo esc_attr($instance['nposts']); ?>" />
        </p>
        <?php
    }
    
    function update($new_instance, $old_instance) {
        $instance = $old_instance; //get Old values from db n assign to $instance
        // The Title
        $instance['title'] = strip_tags($new_instance['title']);
        
        if (intval($new_instance['nposts'])> 3) {
            $instance['nposts'] = $instance['nposts'];
        }
        elseif (is_numeric($new_instance['nposts'])) {
            $instance['nposts'] = intval($new_instance['nposts']);
        }  else {
            $instance['nposts'] = $instance['nposts'];
        }
       
        return $instance;
    }
    
    function widget($args, $instance) {
        extract($args);
        // Get the title and prepare it for display
	    $title = apply_filters('widget_title', $instance['title']);
        $nposts = $instance['nposts'];
        
        $query_array = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $nposts
        );
        $latestposts_query = new WP_Query($query_array);
        
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        
        if ($latestposts_query->have_posts()) {
            ?>
            <?php while($latestposts_query->have_posts()): $latestposts_query->the_post(); ?>
                <div>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="fl w20"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumb'); ?></a></div>
                    <?php endif; ?>

                    <div>
                        <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
                        <div><?php the_time(get_option('date_format')); ?></div>
                    </div>
                </div>

                <div class="footer_news_item clearfix">
                        <div class="footer_pic">
                                <?php if (has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumb'); ?></a>
                                <?php endif; ?>
                        </div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p class="date"><?php the_time(get_option('date_format')); ?></p>
                </div>
            <?php endwhile; ?>
        
        
            <?php
        }
        // Reset post data query
        wp_reset_query();
        echo $after_widget;
    }  

    
}   //End of Class


function latestposts_widget_init() {
    register_widget('LatestPostWidget');
}

add_action('widgets_init', 'latestposts_widget_init');


?>
