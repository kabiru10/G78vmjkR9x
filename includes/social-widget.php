<?php 

class SocialWidget extends WP_Widget{

	public function __construct() {
		parent::__construct(
			'avenir-social-widget',
			'Custom Widget: Social Icons',
			array('description' => __('Displays a list of social icons', 'avenir'))
		); 
	}

	public function form($instance) {
			$defaults = array(
				'title' => __('Connect', 'avenir'),
				'social_facebook' => '',
				'social_twitter' => '',
				'social_gplus' => '',
				'social_linkedin' => '',
				'social_youtube' => '',
				'social_pinterest' => '',
				'social_dribbble' => '',
				'social_vimeo' => '',
				'social_flickr' => '',
				'social_instagram' => '',
				
				'description' => __('Connect with us on our social networks.', 'avenir')
			);
			
			$instance = wp_parse_args((array) $instance, $defaults);
			
			?>
			<!-- The Title -->
			<p>
				<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'avenir'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>


			<!-- Facebook -->
			<p>
				<label for="<?php echo $this->get_field_id('social_facebook') ?>">Facebook:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_facebook'); ?>" name="<?php echo $this->get_field_name('social_facebook'); ?>" value="<?php echo $instance['social_facebook']; ?>" />
			</p>

			<!-- Twitter -->
			<p>
				<label for="<?php echo $this->get_field_id('social_twitter') ?>">Twitter:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_twitter'); ?>" name="<?php echo $this->get_field_name('social_twitter'); ?>" value="<?php echo $instance['social_twitter']; ?>" />
			</p>

			<!-- Google+ -->
			<p>
				<label for="<?php echo $this->get_field_id('social_gplus') ?>">Google+:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_gplus'); ?>" name="<?php echo $this->get_field_name('social_gplus'); ?>" value="<?php echo $instance['social_gplus']; ?>" />
			</p>

			<!-- LinkedIn -->
			<p>
				<label for="<?php echo $this->get_field_id('social_linkedin') ?>">LinkedIn:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_linkedin'); ?>" name="<?php echo $this->get_field_name('social_linkedin'); ?>" value="<?php echo $instance['social_linkedin']; ?>" />
			</p>

			<!-- YouTube -->
			<p>
				<label for="<?php echo $this->get_field_id('social_youtube') ?>">YouTube:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_youtube'); ?>" name="<?php echo $this->get_field_name('social_youtube'); ?>" value="<?php echo $instance['social_youtube']; ?>" />
			</p>

			<!-- Pinterest -->
			<p>
				<label for="<?php echo $this->get_field_id('social_pinterest') ?>">Pinterest:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_pinterest'); ?>" name="<?php echo $this->get_field_name('social_pinterest'); ?>" value="<?php echo $instance['social_pinterest']; ?>" />
			</p>

			<!-- Dribbble -->
			<p>
				<label for="<?php echo $this->get_field_id('social_dribbble') ?>">Dribbble:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_dribbble'); ?>" name="<?php echo $this->get_field_name('social_dribbble'); ?>" value="<?php echo $instance['social_dribbble']; ?>" />
			</p>

			<!-- Vimeo -->
			<p>
				<label for="<?php echo $this->get_field_id('social_vimeo') ?>">Vimeo:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_vimeo'); ?>" name="<?php echo $this->get_field_name('social_vimeo'); ?>" value="<?php echo $instance['social_vimeo']; ?>" />
			</p>

			<!-- Flickr -->
			<p>
				<label for="<?php echo $this->get_field_id('social_flickr') ?>">Flickr:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_flickr'); ?>" name="<?php echo $this->get_field_name('social_flickr'); ?>" value="<?php echo $instance['social_flickr']; ?>" />
			</p>


			<!-- MySpace -->
			<p>
				<label for="<?php echo $this->get_field_id('social_instagram') ?>">Instagram:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_instagram'); ?>" name="<?php echo $this->get_field_name('social_instagram'); ?>" value="<?php echo $instance['social_instagram']; ?>" />
			</p>
			
			<?php
		}

		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			// The Title
			$instance['title'] = strip_tags($new_instance['title']);
			
			// The Description
			// $instance['description'] = $new_instance['description'];

			// The Social Link
			$instance['social_facebook'] = $new_instance['social_facebook'];
			$instance['social_twitter'] = $new_instance['social_twitter'];
			$instance['social_gplus'] = $new_instance['social_gplus'];
			$instance['social_linkedin'] = $new_instance['social_linkedin'];
			$instance['social_youtube'] = $new_instance['social_youtube'];
			$instance['social_pinterest'] = $new_instance['social_pinterest'];
			$instance['social_dribbble'] = $new_instance['social_dribbble'];
			$instance['social_vimeo'] = $new_instance['social_vimeo'];
			$instance['social_flickr'] = $new_instance['social_flickr'];
			$instance['social_instagram'] = $new_instance['social_instagram'];
			
			return $instance;
		}

		public function widget($args, $instance) {
			extract($args);
			
			// Get the title and prepare it for display
			$title = apply_filters('widget_title', $instance['title']);
			
			// Get the description
			// $description = $instance['description'];

			// Get the social links
			$social_facebook = $instance['social_facebook'];
			$social_twitter = $instance['social_twitter'];
			$social_gplus = $instance['social_gplus'];
			$social_linkedin = $instance['social_linkedin'];
			$social_youtube = $instance['social_youtube'];
			$social_pinterest = $instance['social_pinterest'];
			$social_dribbble = $instance['social_dribbble'];
			$social_vimeo = $instance['social_vimeo'];
			$social_flickr = $instance['social_flickr'];
			$social_instagram = $instance['social_instagram'];
			
			echo $before_widget;
			
			if ($title) {
				echo $before_title . $title . $after_title;
			}
			
			// if ($description) {
			// 	echo '<p>' . $description . '</p>';
			// }
			
			echo '<ul class="social-widget clearfix">';
			
			if ($social_facebook) : ?>
				<a href="<?php echo $social_facebook ?>"><img src="<?php echo IMAGES; ?>/facebook.png" /></a>
			<?php endif;

			if ($social_twitter) : ?>
				<a href="<?php echo $social_twitter ?>"><img src="<?php echo IMAGES; ?>/twitter.png" /></a>
			<?php endif;

			if ($social_gplus) : ?>
				<a href="<?php echo $social_gplus ?>"><img src="<?php echo IMAGES; ?>/google.png" /></a>
			<?php endif;

			if ($social_linkedin) : ?>
				<a href="<?php echo $social_linkedin ?>"><img src="<?php echo IMAGES; ?>/linkedin.png" /></a>
			<?php endif;

			if ($social_youtube) : ?>
				<a href="<?php echo $social_youtube ?>"><img src="<?php echo IMAGES; ?>/youtube.png" /></a>
			<?php endif;

			if ($social_pinterest) : ?>
				<a href="<?php echo $social_pinterest ?>"><img src="<?php echo IMAGES; ?>/p.png" /></a>
			<?php endif;

			if ($social_dribbble) : ?>
				<a href="<?php echo $social_dribbble ?>"><img src="<?php echo IMAGES; ?>/bball.png" /></a>
			<?php endif;

			if ($social_vimeo) : ?>
				<a href="<?php echo $social_vimeo ?>"><img src="<?php echo IMAGES; ?>/v.png" /></a>
			<?php endif;

			if ($social_flickr) : ?>
				<a href="<?php echo $social_flickr ?>"><img src="<?php echo IMAGES; ?>/oo.png" /></a>
			<?php endif;

			if ($social_instagram) : ?>
				<a href="<?php echo $social_instagram ?>"><img src="<?php echo IMAGES; ?>/instagram.png" /></a>
			<?php endif;
			
			
			echo '</ul>';
			echo $after_widget; 
		}

}	//End of Class


function social_widget_init() {
    register_widget('SocialWidget');
}

add_action('widgets_init', 'social_widget_init');



?>