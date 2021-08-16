<?php
namespace MKR\MVPrimaryCategory;

class PrimaryCategory{
	/**
	 * PrimaryCategory constructor.
	 * Simply adds action to WordPress.
	 * "Actions are the hooks that the WordPress core launches at specific points during execution, or when specific events occur. Plugins can specify that one or more of its PHP functions are executed at these points, using the Action API."
	 * @link https://developer.wordpress.org/reference/functions/add_action/
	 * 
	 */
	public function __construct() {
		add_action('add_meta_boxes', array( $this, 'addPrimaryCategoryBox' ));
	}

	/**
	 * Adds Primary Category Metabox to all post types and custom post types, pages, etc.
	 * 
	 * TODO: select for which post type you want to display this? 
	 * 
	 * When a user edits a post, the edit screen is composed of several default boxes: Editor, Publish, Categories, Tags, etc. These boxes are meta boxes. Plugins can add custom meta boxes to an edit screen of any post type.
	 * The content of custom meta boxes are usually HTML form elements where the user enters data related to a Plugin’s purpose, but the content can be practically any HTML you desire.
	 * @link https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
	 */
	public function addPrimaryCategoryBox() {
		$allPostTypes = get_post_types();

		add_meta_box(
			'primary_category_box',
			'Primary Category',
			array( $this, 'populatePrimaryCategoryBox' ),
			$allPostTypes,
			'side',
			'high'
		);
	}

	/**
	* Obtains the categories associated with article ID. Then populates the option list and 
 	* renders it in the post.php page.
	* 
	* @return string html: the <select> tag built with the categories
	*/	
	public function populatePrimaryCategoryBox(){
		global $post;

	    // Get primary category associated with article ID.
		$selectedCategory = get_post_meta( $post->ID, 'primaryCategory', true );
		
		// Gets all categories associated with the post ID.
	    $categories = get_the_category();


	    if(!empty($categories)){
			// Create HTML select tag
		    $html = '<select name="primaryCategory" id="primaryCategory">';
	    	foreach ($categories as $category) {
				// Populate select with post's categories
			    $html .= '<option value="' . $category->name . '" ' . selected( $selectedCategory, $category->name, false ) . '>' . $category->name . '</option>';
		    }
		    $html .= '</select>';
	    } 
		else {
			// Display single message if no categories are found. 
	    	$html = "<strong>No categories found. Please, check the categories from above and select your primary from here.</strong>";
	    }

	    echo $html;
    }

	/**
	 * TODO: Save primary category
	*/
	

}