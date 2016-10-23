<?php

	/* Template Name: Home Page */

?>
<?php get_header(); the_post(); ?>
<div id="contentWrap">

    <?php get_sidebar(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">

    <div id="content">
    	<img src="<?php echo get_template_directory_uri(); ?>/images/cover-home.png" id="cover-home" />
    	<br />
    	<!--a href="#video">The story behind the book.</a-->
		<div id="video">
        		<iframe src="http://player.vimeo.com/video/42668529?title=0&amp;byline=0&amp;portrait=0" width="650" height="368" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
