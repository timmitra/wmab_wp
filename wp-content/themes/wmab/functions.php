<?php
	
	/* Declare siderBar widget zone here */
	/* past proof check that we are 3.0 and greater */
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
			'name' => 'Sidebar Widgets',
			'id' => 'sidebar-widgets',
			'description' => 'Widgets for the sidebar.',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
	}

	function new_excerpt_more($more) {
		global $post;
		return '... <a href="'. get_permalink($post->ID) . '">Read more</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	/* past proof check that we are 3.0 and greater */
	if (function_exists('register_nav_menus')) {
		register_nav_menus (
			array (
				"main_nav" => "Main Navigation Menu"
			)
		);
	}
	
	// Load jQuery
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery',( "http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ), false );
		wp_enqueue_script('jquery');
	
		wp_register_script("myScript", get_bloginfo('template_directory') . "/js/scripts.js");
		wp_enqueue_script("myScript");
		
		wp_register_script("spryJs", get_bloginfo('template_directory') . "/SpryAssets/SpryValidationTextField.js");
		wp_enqueue_script("spryJs");
		
		wp_register_style("spryCss", get_bloginfo('template_directory') . "/SpryAssets/SpryValidationTextField.css");
		wp_enqueue_style("spryCss");
	}

	function custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/custom-login.css" />';
	}
	add_action('login_head', 'custom_login');
	
	function dynamic_stylesheet () {
	
		$dpname = get_the_ID();
		//echo $dpname;
		switch ($dpname) {
			case 7:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/about.css" />';
				break;
			case 13:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/guide.css" />';
				break;
			/* follow us */
			case 111:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/guide.css" />';
				break;
			case 15:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/book.css" />';
				break;
			/* shopping cart */
			case 113:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/book.css" />';
				break;
			/* thank you */
			case 115:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/book.css" />';
				break;
			case 17:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/blog.css" />';
				break;
			case 79:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/contact.css" />';
				break;
			case 77:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/invite.css" />';
				break;
			case 87:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/download_code.css" />';
				break;
			/* wpsc cart stuff */
			/* products page */
			case 94:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/shop.css" />';
				break;
			/* checkout page */
			case 95:
				echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/shop.css" />';
				break;
			default:
			break;
		}
	}
	add_action("wp_head", "dynamic_stylesheet");

	function single_stylesheet () {
		if (is_single() == true) {
			echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/blog.css" />';	
		}
	}
	add_action("wp_head", "single_stylesheet");
	
	function custom_excerpt_length( $length ) {
		return 75;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	function custom_wp_trim_excerpt($text) {
		$raw_excerpt = $text;
		if ( '' == $text ) {
			//Retrieve the post content.
			$text = get_the_content('');
 
			//Delete all shortcode tags from the content.
			$text = strip_shortcodes( $text );
 
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
 
			$allowed_tags = '<p>, </p>, <img>, <br>, <em>, <strong>, <a>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
			$text = strip_tags($text, $allowed_tags);
 
			$excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
			$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
 
			$excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
			$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
 
			$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
			if ( count($words) > $excerpt_length ) {
				array_pop($words);
				$text = implode(' ', $words);
				$text = $text . $excerpt_more;
			} else {
				$text = implode(' ', $words);
			}
		}
		return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');
	
?>
