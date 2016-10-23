<?php

	/* Template Name: About Us Page */

?>
<?php get_header(); the_post(); ?>
<div id="contentWrap">

    <?php get_sidebar(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">

    <div id="content">
        <div id="page-title">
        	<?php the_title(); ?>
        </div>
        <br />

    	<div id="page-content">
	<?php
	
		$post_id = get_the_ID();
		
		// find the children of this page (post)
		query_posts("posts_per_page=-1&post_type=page&post_parent=$post_id" . "&order=DESC");
		// -1 gets all the matching posts 
		
		while (have_posts()) : the_post(); ?>
		
		    <div class="entry">
	           	<div class="entry-image"><img src="<?php echo get_post_meta($post->ID, 'entry-image', true); ?>" /></div>
	           	<div class="entry-textblock">
				<div class="entry-title"><?php the_title(); ?></div>
				<p>
				<span class="entry-date"><?php the_content(); ?></span></p>
				</div><!-- entry-textblock -->	
			</div><!-- entry -->

		
		<?php endwhile; wp_reset_query();
	?>
	
        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
