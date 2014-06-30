<?php



add_action('init', 'testimonials_register');

function testimonials_register() {

 	//Arguments to create post type.
    $args = array(  
        'labels' => array(
            'name' => __('Testimonials', 'Avenir'),
            'singular_name' => __('Testimonial', 'Avenir'),
            'add_new' => __('Add New', 'Avenir'),
            'add_new_item' => __('Add New Testimonial', 'Avenir'),
            'edit' => __('Edit', 'Avenir'),
            'edit_item' => __('Edit Testimonial', 'Avenir'),
            'new_item' => __('New Testimonial', 'Avenir'),
            'view' => __('View', 'Avenir'),
            'view_item' => __('View Testimonials', 'Avenir'),
            'search_items' => __('Search Testimonials', 'Avenir'),
            'not_found' => __('No Testimonials found', 'Avenir'),
            'not_found_in_trash' => __('No Testimonials found in Trash', 'Avenir'),
            'parent' => __('Parent Testimonial', 'Avenir')
        ),

    	'singular_label' => __('Testimonial', 'Avenir'),  
	    'public' => true,  
	    'show_ui' => true,  
	    'capability_type' => 'post',  
	    'hierarchical' => true,  
	    'has_archive' => true,
	    //'rewrite' => array('slug' => 'Avenir'),
	    'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => plugins_url('images/icon_16.png', __FILE__) ,
		'menu_position' => 22	

    );

    //Register type and custom taxonomy for type.
    register_post_type( 'testimonials' , $args ); 

    register_taxonomy(
        'testimonials-category',
        'testimonials',
        array(
            'labels' => array(
                'name' => __('Testimonial Category', 'Avenir'),
                'add_new_item' => __('Add New Testimonial Category', 'Avenir'),
                'new_item_name' => __('New Testimonial Category Name', 'Avenir')
            ),
            'show_ui' => false,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}



add_action("admin_init", "testimonials_add_meta");  
  
// Function to register new meta box for Business listing post editor
function testimonials_add_meta(){  
    add_meta_box("testimonial-meta-box", "Testimonial Options", "testimonials_meta_options", "testimonials", "normal", "high");
    //ID, Title of metabox, callback fn, post type it should apply to PG 70
}  

function testimonials_meta_options() {
    global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        
        $custom = get_post_custom($post->ID);
        $fullname = $custom["fullname"][0];
        $job_title = $custom["job_title"][0];
        $company = $custom["company"][0];
        $email = $custom["email"][0];
        
?>  

       
    <table>
        <tr>
            <td style="width: 100%"><?php _e('Full Name', 'Avenir') ?></td>
            <td><input type="text" size="80" name="fullname" value="<?php echo $fullname; ?>" /></td>
        </tr>       
        
        <tr>
            <td style="width: 100%"><?php _e('Job Title', 'Avenir') ?></td>
            <td><input type="text" size="80" name="job_title" value="<?php echo $job_title; ?>" /></td>
        </tr>    

        <tr>
            <td style="width: 100%"><?php _e('Company', 'Avenir') ?></td>
            <td><input type="text" size="80" name="company" value="<?php echo $company; ?>" /></td>
        </tr> 
        <tr>
            <td style="width: 100%"><?php _e('Email', 'Avenir') ?></td>
            <td><input type="email" size="80" name="email" value="<?php echo $email; ?>" /></td>
        </tr>       
                
    </table>

<?php  
}


add_action('save_post', 'testimonials_save_extra_fields'); 
  
function testimonials_save_extra_fields(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ //if you remove this the sky will fall on your head.
        return $post_id;
    }else{
        update_post_meta($post->ID, "fullname", $_POST["fullname"]); 
        update_post_meta($post->ID, "job_title", $_POST["job_title"]);
        update_post_meta($post->ID, "company", $_POST["company"]);
        update_post_meta($post->ID, "email", $_POST["email"]);
    } 
}  

add_filter("manage_edit-testimonials_columns", "testimonials_edit_columns");   

function testimonials_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __('Testimonial Title', 'Avenir'),
            "description" => __('Description', 'Avenir'),
            "fullname" => __('Full Name',  'Avenir'),
            "job_title" => __('Job Title', 'Avenir'),
            "company" => __('Company', 'Avenir'),
            "email" => __('Email', 'Avenir'),
            
            "cat" => __('Category', 'Avenir')
        );  

        return $columns;
}  


add_action("manage_testimonials_posts_custom_column",  "testimonials_custom_columns"); 

function testimonials_custom_columns($column){
        global $post;
        $custom = get_post_custom();
        switch ($column)
        {
                        
            case "description":
                the_excerpt();
                break;
            
            case "fullname":
                echo $custom["fullname"][0];
                break;
            case "job_title":
                echo $custom["job_title"][0];
                break;
            case "company":
                echo $custom["website"][0];
                break;

            case "email":
                echo $custom["email"][0];
                break;

            case "cat":
                echo get_the_term_list($post->ID, 'testimonials-category', '', ', ','');
                break;
        }
}  

?>