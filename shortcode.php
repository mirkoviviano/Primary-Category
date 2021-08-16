<?php
/**
 * Primary Category shortcode class: generates the shortcode to 
 * display posts based on the primary category. The posts are 
 * obtained by quering the database through WordPress WP_Query.
 * 
 * @author Mirko Viviano 
 */

namespace MKR\MVPrimaryCategory;

class PrimaryCategoryShortcode {
	/**
	 * PrimaryCategoryShortcode constructor.
	 * Add a new shortcode to WordPress.
	 * Care should be taken through prefixing or other means to ensure 
	 * that the shortcode tag being added is unique and will not conflict 
	 * with other, already-added shortcode tags. In the event of a 
	 * duplicated tag, the tag loaded last will take precedence.
	 * @link https://developer.wordpress.org/reference/functions/add_shortcode
	 * 
	 */
	public function __construct() {
		add_shortcode(
			'posts-primary-category', 
			array($this, 'shortcode') // shortcode is the callback function here
		); 
	}
	
	/**
	 * Callback function of the add_shortcode function above. 
	 * 
	 * @param array $atts
	 * @return string html: the <ul> tag list with n <li> items representing 
	 * 								the articles filtered by primary category
	 */
	public function shortcode($atts = []){
		// change the key case of all items in array
		$atts = array_change_key_case((array)$atts, CASE_LOWER);
		
		$atts = shortcode_atts(
			// Default shortcode values
			array(
				'category' => 'homepage_articles',
				'template' => 'simple',
				'columns' => 4
			), 
			$atts, 
			'posts-primary-category' 
		);

		// Query posts based on the category value
		$query_posts = new \WP_Query( array(
			'post_type'     => 'any', // TODO: change if implement selection of post type
			'meta_key'      => 'primaryCategory',
			'meta_value'    => $atts['category']
		));

		// Select the template to render based on the value of "template". Defualt is set to "simple".
		switch($atts['template']){
			default: 
			case "simple":
				return include(plugin_dir_path( __FILE__ ) . 'templates/simple-list-template.php');
				break;
			case "horizontal-list":
				return include(plugin_dir_path( __FILE__ ) . 'templates/horizontal-list-template.php');
				break; 
			case "cards": 
				return include(plugin_dir_path( __FILE__ ) . 'templates/cards-template.php');
				break;
			case "modern":
				return include(plugin_dir_path( __FILE__ ) . 'templates/modern-template.php');
				break;
		}
	}

}