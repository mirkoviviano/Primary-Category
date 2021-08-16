<?php
/**
 * Primary Category class: the constructor doesn't take any parameters.
 * The constructor adds actions to the hooks "add_meta_boxes" and "save_post":
 * the former adds a metabox to the post page whilst the latter adds/updates
 * a metadata value to the post's metadata set.
 * 
 * @author Mirko Viviano 
 * 
 */
namespace MKR\MVPrimaryCategory;

class PrimaryCategory{
	/**
	 * PrimaryCategory constructor.
	 * Simply adds action to WordPress.
	 * Actions are the hooks that the WordPress core launches at specific points during execution, or when specific events occur. Plugins can specify that one or more of its PHP functions are executed at these points, using the Action API.
	 * @link https://developer.wordpress.org/reference/functions/add_action/
	 * 
	 */
	public function __construct() {
		add_action('add_meta_boxes', array( $this, 'addPrimaryCategoryBox' ));
		add_action('save_post', array( $this, 'savePrimaryCategory' ));
	}

	/**
	 * Adds Primary Category Metabox to all post types and custom post types, pages, etc.
	 * 
	 * TODO: select for which post type you want to display this? 
	 * 
	 * When a user edits a post, the edit screen is composed of several default boxes: Editor, Publish, Categories, Tags, etc. These boxes are meta boxes. Plugins can add custom meta boxes to an edit screen of any post type.
	 * The content of custom meta boxes are usually HTML form elements where the user enters data related to a Plugin’s purpose, but the content can be practically any HTML you desire.
	 * @link https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
	 * 
	 * @return void
	 */
	public function addPrimaryCategoryBox() {
		$allPostTypes = get_post_types();

		/** 
		 * @param string 					$id				(Required) Meta box ID (used in the 'id' attribute for the meta box).
		 * @param string 					$title			(Required) Title of the meta box.
		 * @param callable 					$callback 		(Required) Function that fills the box with the desired content. The function should echo its output.
		 * @param string|array|WP_Screen 	$screen			(Optional) The screen or screens on which to show the box.
		 * @param string					$context		(Optional) The context within the screen where the box should display. 
		 * @param string 					$priority		(Optional) The priority within the context where the box should show.
		 * 
		 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
		*/
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
		$selectedCategory = str_replace(" ", "_", strtolower(get_post_meta( $post->ID, 'primaryCategory', true )));
		
		// Gets all categories associated with the post ID.
	    $categories = get_the_category();


	    if(!empty($categories)){
			// Create HTML select tag
		    $html = '<select name="primaryCategory" id="primaryCategory">';
	    	foreach ($categories as $category) {
				// Remove space from category name and replace it with an underscore "_"; 
				// Set lowecase on the whole category name.
				$categoryName = str_replace(" ", "_", strtolower($category->name));
				// Populate select with post's categories
			    $html .= '<option value="' . $categoryName . '" ' . selected( $selectedCategory, $categoryName, false ) . '>' . $category->name . '</option>';
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
	 * Save primary category as post's metadata using WordPress update_post_meta() function.
	 * 
	 * @return void
	*/
	public function savePrimaryCategory(){
		global $post;

		if ( isset($_POST['primaryCategory']) ) {
			$primaryCategory = sanitize_text_field( $_POST[ 'primaryCategory' ] );
			update_post_meta( $post->ID, 'primaryCategory', $primaryCategory );
		}
	}


}