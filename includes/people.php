<?php



add_action('init', 'people_register');

function people_register() {

 	//Arguments to create post type.
    $args = array(  
        'labels' => array(
            'name' => __('People', 'Avenir'),
            'singular_name' => __('People', 'Avenir'),
            'add_new' => __('Add New', 'Avenir'),
            'add_new_item' => __('Add New People', 'Avenir'),
            'edit' => __('Edit', 'Avenir'),
            'edit_item' => __('Edit People', 'Avenir'),
            'new_item' => __('New People', 'Avenir'),
            'view' => __('View', 'Avenir'),
            'view_item' => __('View People', 'Avenir'),
            'search_items' => __('Search People', 'Avenir'),
            'not_found' => __('No People found', 'Avenir'),
            'not_found_in_trash' => __('No People found in Trash', 'Avenir'),
            'parent' => __('Parent People', 'Avenir')
        ),

    	'singular_label' => __('People', 'Avenir'),  
	    'public' => true,  
	    'show_ui' => true,  
	    'capability_type' => 'post',  
	    'hierarchical' => true,  
	    'has_archive' => true,
	    'supports' => array('title', 'editor', 'thumbnail'),
		//'menu_icon' => theme_url('images/icon_16.png', __FILE__) ,
        'menu_icon' => THEMEROOT . '/img/icons/people.png' ,
		'menu_position' => 24	

    );

    //Register type and custom taxonomy for type.
    register_post_type( 'people' , $args ); 

    register_taxonomy(
        'people-category',
        'people',
        array(
            'labels' => array(
                'name' => __('People Category', 'Avenir'),
                'add_new_item' => __('Add New People Category', 'Avenir'),
                'new_item_name' => __('New People Category Name', 'Avenir')
            ),
            'show_ui' => false,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}



add_action("admin_init", "people_add_meta");  
  
// Function to register new meta box for Business listing post editor
function people_add_meta(){  
    add_meta_box("people-meta-box", "People Options", "people_meta_options", "people", "normal", "high");
    //ID, Title of metabox, callback fn, post type it should apply to PG 70
}  

function people_meta_options() {
    global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        
        $custom = get_post_custom($post->ID);
        $fullname = $custom["fullname"][0];
        $job_title = $custom["job_title"][0];
        $facebook = $custom["facebook"][0];
        $twitter = $custom["twitter"][0];
        
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
            <td style="width: 100%"><?php _e('Facebook Link', 'Avenir') ?></td>
            <td><input type="text" size="80" name="facebook" value="<?php echo $facebook; ?>" /></td>
        </tr> 
        <tr>
            <td style="width: 100%"><?php _e('Twitter Handle', 'Avenir') ?></td>
            <td><input type="email" size="80" name="twitter" value="<?php echo $twitter; ?>" /></td>
        </tr>       
                
    </table>

<?php  
}


add_action('save_post', 'people_save_extra_fields'); 
  
function people_save_extra_fields(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ //if you remove this the sky will fall on your head.
        return $post_id;
    }else{
        update_post_meta($post->ID, "fullname", $_POST["fullname"]); 
        update_post_meta($post->ID, "job_title", $_POST["job_title"]);
        update_post_meta($post->ID, "facebook", $_POST["facebook"]);
        update_post_meta($post->ID, "twitter", $_POST["twitter"]);
    } 
}  

add_filter("manage_edit-people_columns", "people_edit_columns");   

function people_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __('People Title', 'Avenir'),
            "description" => __('Description', 'Avenir'),
            "fullname" => __('Full Name',  'Avenir'),
            "job_title" => __('Job Title', 'Avenir'),
            "facebook" => __('Facebook', 'Avenir'),
            "twitter" => __('Twitter', 'Avenir'),
            
            "cat" => __('Category', 'Avenir')
        );  

        return $columns;
}  


add_action("manage_people_posts_custom_column",  "people_custom_columns"); 

function people_custom_columns($column){
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
            case "facebook":
                echo $custom["facebook"][0];
                break;

            case "twitter":
                echo $custom["twitter"][0];
                break;

            case "cat":
                echo get_the_term_list($post->ID, 'people-category', '', ', ','');
                break;
        }
}  

?>