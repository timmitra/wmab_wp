<?php 
	session_start();      // start the session
	// reset the cart
	unset($_SESSION['country']);
	unset($_SESSION['qty']);
?>
<?php

	/* Template Name: Buy the Book - blue */

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
		query_posts("posts_per_page=-1&post_type=page&post_parent=$post_id". "&order=ASC");
		// -1 gets all the matching posts 
		$i = 0;
		while (have_posts()) : the_post(); ?>
		
		    <div class="entry">
	           	<div class="entry-image"><img src="<?php echo get_post_meta($post->ID, 'entry-image', true); ?>" /></div>
	           	<div class="entry-textblock">
				<div class="entry-title"><?php the_title(); ?></div>
				<p>
				<span class="entry-date"><?php the_content(); ?></span>
				<!--br /-->
                <!--span class="entry-code"><?php echo get_post_meta($post->ID, 'product-code', true); ?></span>
                <br /-->
                <!--span class="entry-price">$<?php echo get_post_meta($post->ID, 'product-price', true); ?></span-->
                <?php $product_code = get_post_meta($post->ID, 'product-code', true); ?>
                <?php if (!empty($product_code)) { ?>
                	<form class="product_form"  enctype="multipart/form-data" action="?page_id=113" method="post" name="product_98" id="product_98" >
                	<input type="hidden" value="<?php echo get_post_meta($post->ID, 'product-code', true); ?>" name="product_id" />
                	<input type="hidden" value="<?php echo get_post_meta($post->ID, 'product-price', true); ?>" name="product_price" />
                	<input type="hidden" value="<?php echo get_post_meta($post->ID, 'entry-image', true); ?>" name="product_image" />
                	<input type="hidden" value="<?php echo the_title(); ?>" name="product_name" />
                	<input type="hidden" value="1" name="qty" />
                	<input type="hidden" value="<?php echo $i; ?>" name="key" />
                	<input type="hidden" value="<?php echo get_post_meta($post->ID, 'product-code', true); ?>" name="product_code" />
                	<input type="submit" value="Add To Cart" name="Buy" class="wpsc_buy_button" id="product_<?php echo get_post_meta($post->ID, 'product-code', true); ?>"/>
                	</form>
                <?php } ?>
                </p>
				</div><!-- entry-textblock -->	
			</div><!-- entry -->

		<?php $i++; ?>
		<?php endwhile; wp_reset_query();
		?>

        	<div class="entry">
            	<div class="entry-image">&nbsp;</div>
            	<div class="entry-textblock">
        		<div class="entry-title"></div>
            	<div class="entry-disclaimer"><?php the_content(); ?></div>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->

        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
