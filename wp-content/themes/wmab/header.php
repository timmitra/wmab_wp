<!DOCTYPE HTML>
<html <?php language_attributes();?> >
<head>
<meta charset="<?php bloginfo('charset');?>">
<title><?php 
	global $page, $paged;
	wp_title( '|', true, 'right');
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display');
	if ($site_description && ( is_home() || is_front_page() ) )
		echo " |  $site_description ";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | '. sprintf(__( 'Page %s' ), max ($paged, $page) );
?>
</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- [if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript">
</script>
<![endif]-->
<?php if ( is_singular() && get_option ('thread_comments') ) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div id="outerWrapper">
	<header>
		<!-- navigaiton is in the side bar -->
		<!--nav class="mainMenu">
        	<?php wp_nav_menu(); ?>
        </nav-->
    </header>
