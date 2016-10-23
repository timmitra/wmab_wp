<?php

	/* Template Name: Thank You Page - Blue */

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
			<div class="entry">
            	<div class="entry-textblock">
            	<p>
				<?php the_content(); ?>
				</p>
				</div><!-- entry-textblock -->	
			</div><!-- entry -->
		</div><!-- end page-content -->

	</div>
	</div><!-- end post -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
