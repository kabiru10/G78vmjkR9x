<?php 


/***********************************************************************************************/
/* Big Button Shortcode */
/***********************************************************************************************/
add_shortcode('ourpeople', 'ourpeople');

function ourpeople($atts, $content = null) {
	extract(shortcode_atts(array(
		'limit' => 7,
	), $atts));

	$query_array = array(
		'post_type' => 'people',
        'post_status' => 'publish',
        'posts_per_page' => $limit
	);

	$people_query = new WP_Query($query_array);

	?>

	<div id="people" class="central">
	    <div class="title pb50">Our People</div>
		    <div id="layer1">
				<?php if ($people_query->have_posts()) :  while ($people_query->have_posts()) : $people_query->the_post(); ?>
				<?php 
				$custom = get_post_custom($post->ID);

				$fullname = $custom["fullname"][0];  
				$job_title = $custom["job_title"][0]; 
				$facebook = $custom["facebook"][0]; 
				$twitter = $custom["twitter"][0];  

				$pix = get_the_post_thumbnail($post->ID);
				?>
		        <div>
		            <div class="pix tc left">
		                <span class="people rotate">
		                    <span class="name">
		                        <?php if ($fullname != ""): ?>
                                	<?php echo $fullname; ?>
                            	<?php endif; ?>
		                    </span>
		                    <span class="rating">
		                        &star;&star;&star;&star;&star;
		                    </span>
		                    <span class="ss">
		                        <span class="ss_">
		                            <span class="pic">
		                                <?php if (has_post_thumbnail()): ?>
            								<?php the_post_thumbnail('medium-thumb'); ?>
	                                    <?php endif; ?>
		                            </span>	
		                        </span>
		                    </span>
		                </span>
		            </div>
		        </div>
                <?php endwhile; else: ?>
                    <p><?php _e('No Testimonials were found. Sorry!'); ?></p>
                <?php endif; ?>
		
		        
		        
		        
		    </div>
	    
	</div>
<?php

}

add_shortcode('testimonials', 'testimonials');

function testimonials($atts, $content = null) {

}

?>

