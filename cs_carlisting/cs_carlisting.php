<?php

/**

 * @link              winspire.rs
 * @since             1.0.0
 * @package           Cs_carlisting
 *
 * @wordpress-plugin
 * Plugin Name:       carlisting
 * Plugin URI:        winspire.rs
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aleksandar Vojinovic
 * Author URI:        winspire.rs
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cs_carlisting
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}


define('CS_CARLISTING_VERSION', '1.0.0');


function activate_cs_carlisting()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-cs_carlisting-activator.php';
	Cs_carlisting_Activator::activate();
}


function deactivate_cs_carlisting()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-cs_carlisting-deactivator.php';
	Cs_carlisting_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_cs_carlisting');
register_deactivation_hook(__FILE__, 'deactivate_cs_carlisting');


require plugin_dir_path(__FILE__) . 'includes/class-cs_carlisting.php';

/**
 * @since    1.0.0
 */
function run_cs_carlisting()
{

	$plugin = new Cs_carlisting();
	$plugin->run();
}
// Car Type
function car_listing_dashboard()
{

	$labels = array(
		'name'                  => _x('Cars', 'Post Type General Name', 'text_domain'),
		'singular_name'         => _x('Car', 'Post Type Singular Name', 'text_domain'),
		'menu_name'             => __('Car', 'text_domain'),
		'name_admin_bar'        => __('Car', 'text_domain'),
		'parent_item_colon'     => __('Parent Car:', 'text_domain'),
		'all_items'             => __('All Cars', 'text_domain'),
		'add_new_item'          => __('Add New Car', 'text_domain'),
		'add_new'               => __('Add New', 'text_domain'),
		'new_item'              => __('New Car', 'text_domain'),
		'edit_item'             => __('Edit Car', 'text_domain'),
		'update_item'           => __('Update Car', 'text_domain'),
		'view_item'             => __('View Car', 'text_domain'),
		'search_items'          => __('Search Car', 'text_domain'),
		'not_found'             => __('Not found', 'text_domain'),
		'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
		'items_list'            => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list'     => __('Filter items list', 'text_domain'),

	);
	$args = array(
		'label'                 => __('Car', 'text_domain'),
		'description'           => __('Car post type.', 'text_domain'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'comments', 'thumbnail'),
		'taxonomies'            => array('Location', 'Color', 'Price'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-dashboard',
		'query_var' => true,
		'rewrite' => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type('car', $args);
}

add_action('init', 'car_listing_dashboard', 0);


//Pgge Template - Car Listing Layout
add_filter('page_template', 'car_listing_page_layout');
function car_listing_page_layout($page_template)
{
	if (is_page($post->ID == 46)) {
		$page_template = dirname(__FILE__) . '/car-listing-page.php';
	}
	return $page_template;
}

//Car LS - Model
function car_model()
{

	$labels = array(
		'name'                       => _x('Model', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Model', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Model', 'text_domain'),
		'all_items'                  => __('All Items', 'text_domain'),
		'parent_item'                => __('Parent Item', 'text_domain'),
		'parent_item_colon'          => __('Parent Item:', 'text_domain'),
		'new_item_name'              => __('New Item Name', 'text_domain'),
		'add_new_item'               => __('Add New Item', 'text_domain'),
		'edit_item'                  => __('Edit Item', 'text_domain'),
		'update_item'                => __('Update Item', 'text_domain'),
		'view_item'                  => __('View Item', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Items', 'text_domain'),
		'search_items'               => __('Search Items', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'items_list'                 => __('Items list', 'text_domain'),
		'items_list_navigation'      => __('Items list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('model', array('car'), $args);
}
add_action('init', 'car_model', 0);



// Car LS - Color
function car_color()
{

	$labels = array(
		'name'                       => _x('Color', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Color', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Color', 'text_domain'),
		'all_items'                  => __('All Items', 'text_domain'),
		'parent_item'                => __('Parent Item', 'text_domain'),
		'parent_item_colon'          => __('Parent Item:', 'text_domain'),
		'new_item_name'              => __('New Item Name', 'text_domain'),
		'add_new_item'               => __('Add New Item', 'text_domain'),
		'edit_item'                  => __('Edit Item', 'text_domain'),
		'update_item'                => __('Update Item', 'text_domain'),
		'view_item'                  => __('View Item', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Items', 'text_domain'),
		'search_items'               => __('Search Items', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'items_list'                 => __('Items list', 'text_domain'),
		'items_list_navigation'      => __('Items list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,

	);
	register_taxonomy('color', array('car'), $args);
}
add_action('init', 'car_color', 0);



// Car LS - Price
function car_price()
{

	$labels = array(
		'name'                       => _x('Price Range', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Price', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Price', 'text_domain'),
		'all_items'                  => __('All Items', 'text_domain'),
		'parent_item'                => __('Parent Item', 'text_domain'),
		'parent_item_colon'          => __('Parent Item:', 'text_domain'),
		'new_item_name'              => __('New Item Name', 'text_domain'),
		'add_new_item'               => __('Add New Item', 'text_domain'),
		'edit_item'                  => __('Edit Item', 'text_domain'),
		'update_item'                => __('Update Item', 'text_domain'),
		'view_item'                  => __('View Item', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Items', 'text_domain'),
		'search_items'               => __('Search Items', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'items_list'                 => __('Items list', 'text_domain'),
		'items_list_navigation'      => __('Items list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'taxonomy' => 'fabric_building_types',
		'field' => 'term_id',
		'terms' => $cat->term_id,
	);
	register_taxonomy('price', array('car'), $args);
}
add_action('init', 'car_price', 0);


//Filtering Car Listing -WP Dashboard 
function filter_cars_by_taxonomies($post_type, $which)
{


	if ('car' !== $post_type)
		return;


	$taxonomies = array('model', 'color', 'price');

	foreach ($taxonomies as $taxonomy_slug) {


		$taxonomy_obj = get_taxonomy($taxonomy_slug);
		$taxonomy_name = $taxonomy_obj->labels->name;


		$terms = get_terms($taxonomy_slug);


		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf(esc_html__('Show All %s', 'text_domain'), $taxonomy_name) . '</option>';
		foreach ($terms as $term) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				((isset($_GET[$taxonomy_slug]) && ($_GET[$taxonomy_slug] == $term->slug)) ? ' selected="selected"' : ''),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}
}
add_action('restrict_manage_posts', 'filter_cars_by_taxonomies', 10, 2);


//Listing tag

function carLinksTags()
{

	if (!$post = get_post()) {
		return '';
	}


	$post_type = $post->post_type;


	$taxonomies = get_object_taxonomies($post_type, 'objects');

	$out = array();

	foreach ($taxonomies as $taxonomy_slug => $taxonomy) {


		$terms = get_the_terms($post->ID, $taxonomy_slug);

		if (!empty($terms)) {
			$out[] = "<div class='carmodels'><strong> " . $taxonomy->label . "</strong> \n";
			foreach ($terms as $term) {
				$out[] = sprintf(
					'<a href="%1$s">%2$s</a>',
					esc_url(get_term_link($term->slug, $taxonomy_slug)),
					esc_html($term->name)
				);
			}
			$out[] = "\n</div>\n";
		}
	}
	return implode('', $out);
}


//dropdown filter
//Listing tag

function classCars()
{

	if (!$post = get_post()) {
		return '';
	}


	$post_type = $post->post_type;


	$taxonomies = get_object_taxonomies($post_type, 'objects');

	$out = array();

	foreach ($taxonomies as $taxonomy_slug => $taxonomy) {


		$terms = get_the_terms($post->ID, $taxonomy_slug);

		if (!empty($terms)) {

			foreach ($terms as $term) {
				$out[] = sprintf(
					"%s ",

					esc_html($term->name)
				);
			}
		}
	}
	return implode('', $out);
}




run_cs_carlisting();
