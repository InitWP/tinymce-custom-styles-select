<?php
/*
 * Add the style selectbox containing custom styles to TinyMCE
 */
function TEXTDOMAIN_mce_styleselect($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'TEXTDOMAIN_mce_styleselect');


/*
 * Callback function to filter the MCE settings
 */
function TEXTDOMAIN_insert_custom_styles( $init_array ) {

// Define the style_formats array
	$style_formats = array(
	/*
	* Each array child is a format with it's own settings
	* Notice that each array has title, block, classes, and wrapper arguments
	* Title is the label which will be visible in Formats menu
	* Block defines whether it is a span, div, selector, or inline style
	* Classes allows you to define CSS classes
	* Wrapper whether or not to add a new block-level element around any selected elements
	*/
		array(
			'title' => 'Introtekst',
			'block' => 'p',
			'classes' => 'entry--content--intro',
			'wrapper' => false,

		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'TEXTDOMAIN_insert_custom_styles' );