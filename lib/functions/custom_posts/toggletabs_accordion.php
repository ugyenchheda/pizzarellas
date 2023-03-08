<?php
function kaya_toggletabs_register() {
	$labels = array(
		'name'				=> __('Tab Items','cooks'),
		'singular_name'		=> __('Toggle Tabs','cooks'),
		'add_new'			=> __('Add New Tab Post', 'cooks'),
		'add_new_item'		=> __('Add New Tabs ','cooks'),
		'edit_item'			=> __('Edit Tabs','cooks'),
		'new_item'			=> __('New Tabs','cooks'),
		'view_item'			=> __('View Tabs Item','cooks'),
		'search_items'		=> __('Search Tabs','cooks'),
		'not_found'			=> __('Nothing found','cooks'),
		'not_found_in_trash'=> __('Nothing found in Trash','cooks'),
		'parent_item_colon'	=> ''
	);
 
	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'exclude_from_search'=> false,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'rewrite' => array( 'slug' => 'tabs', 'with_front' => false ),
		'query_var'			=> false,	
		'menu_icon'			=> get_template_directory_uri() . '/lib/images/kaya_portfolios.png',  		
		'supports'			=> array('title', 'editor', '', '', '', 'page-attributes')
	); 
	register_post_type( 'toogletabs' , $args );
	//register_taxonomy_for_object_type('post_tag', 'testimonial');
}
/*	register_taxonomy("toggletabs_category", 'toogletabs', array(
	'hierarchical'		=> true,
	'label'				=> 'Tabs Categories',
	'singular_label'	=> 'Toggle Tabs / Accordion Categories',
	'show_ui'			=> true,
	'query_var'			=> true,
	'rewrite'			=> false,
	'orderby' => 'name',
	)
);
	*/
add_action('init', 'kaya_toggletabs_register');

function my_taxonomies_tabs() {
  $labels = array(
    'name'              => __( 'Tabs Categories', 'cooks' ),
    'singular_name'     => __( 'Toggle Tabs / Accordion Categories', 'cooks' ),
    'search_items'      => __( 'Search Tabs Categories' , 'cooks' ),
    'all_items'         => __( 'All Tabs Categories' , 'cooks' ),
    'parent_item'       => __( 'Parent Tabs Category' , 'cooks' ),
    'parent_item_colon' => __( 'Parent Tabs Category:', 'cooks' ),
    'edit_item'         => __( 'Edit Tabs Category', 'cooks' ),
    'update_item'       => __( 'Update Tabs Category' , 'cooks' ),
    'add_new_item'      => __( 'Add New Tabs Category' , 'cooks' ),
    'new_item_name'     => __( 'New Tabs Category' , 'cooks' ),
    'menu_name'         => __( 'Tabs Categories' , 'cooks' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'toggletabs_category', 'toogletabs', $args );
}
add_action( 'init', 'my_taxonomies_tabs', 0 );

function toggletabs_columns($columns) {
	$columns['toggletabs_category'] = __('Toggle Tabs Category','atp_admin');
    $columns['thumbnail'] =  __('Post Image','atp_admin');

    return $columns;
}

function kaya_manage_toggletabs_columns($name) {
    global $post;global $wp_query;
    switch ($name) {
	 case 'toggletabs_category':
               $terms = get_the_terms($post->ID, 'toggletabs_category');

        //If the terms array contains items... (dupe of core)
        if ( !empty($terms) ) {
            //Loop through terms
            foreach ( $terms as $term ){
                //Add tax name & link to an array
                $post_terms[] = esc_html(sanitize_term_field('name', $term->name, $term->term_id, '', 'edit'));
            }
            //Spit out the array as CSV
            echo implode( ', ', $post_terms );
        } else {
            //Text to show if no terms attached for post & tax
            echo '<em>No terms</em>';
        }
				break;
        case 'thumbnail':
          
				//echo the_post_thumbnail(array(100,100));
				break;
       
    }
}
add_action('manage_posts_custom_column', 'kaya_manage_toggletabs_columns', 10, 2);
add_filter('manage_edit-toggletabs_columns', 'toggletabs_columns');
?>