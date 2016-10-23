<?php

	/* Template Name: Asset Entry Page */

?>
<?php get_header(); the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
		
	<div id="page-content">
		<div class="entry">
            	<?php if (get_post_meta($post->ID, 'entry-image', true)) { ?>
				<div class="entry-image">
            		<img src="<?php echo get_post_meta($post->ID, 'entry-image', true); ?>" width="146" />
            	</div>
			<?php } ?>
			
            	<div class="entry-textblock">
        		<div class="entry-title"><?php the_title(); ?></div>
            	<p>
            		<?php if (get_post_meta($post->ID, 'entry-date', true)) { ?>
            			<span class="entry-date"><?php echo get_post_meta($post->ID, 'entry-date', true); ?></span>
            		<?php } ?>
            		<?php the_content(); ?>
				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->
	</div><!-- end page-content -->

	</div><!-- end post -->

<?php get_footer(); ?>
