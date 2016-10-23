<?php

	/* Template Name: Buy the Book - eCommerce */

?>
<?php
	// Setup globals
	// @todo: Get these out of template
	global $wp_query;

	// Setup image width and height variables
	// @todo: Investigate if these are still needed here
	$image_width  = get_option( 'single_view_image_width' );
	$image_height = get_option( 'single_view_image_height' );
		
		// Plugin hook for adding things to the top of the products page, like the live search
		do_action( 'wpsc_top_of_products_page' );
?>
<?php get_header(); ?>
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
	
		global $wp_query;	

		$post_id = get_the_ID();
		
		// find the children of this page (post)
		query_posts("posts_per_page=-1&post_type=page&post_parent=$post_id". "&order=ASC");
		// -1 gets all the matching posts 
		?>
	
	<?php if(wpsc_display_products()): ?>

		<?php /** start the product loop here */?>
		<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>
			
			<?php echo "foo"; ?>

		<?php endwhile; ?>
		<?php /** end the product loop here */?>

	<?php endif; ?>
		
        	<div class="entry">
            	<div class="entry-image">&nbsp;</div>
            	<div class="entry-textblock">
        		<div class="entry-title"></div>
            	<p>
            	<span class="entry-disclaimer">Retailers, agencies, community groups, organizations, 
and anyone interested in bulk purchasing should contact: 
sales@zoballpress.com</span><br />
            	<span class="entry-date"></span><br />
                <span class="entry-code"></span>
                <br />
                <span class="entry-price"></span>

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->

        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
