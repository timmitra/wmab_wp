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
        	<div class="entry">
            	<div class="entry-image"><img src="<?php echo get_template_directory_uri(); ?>/images/cory.png" width="146" /></div>
            	<div class="entry-textblock">
        		<div class="entry-title">Cory Silverberg</div>
            	<p>
            	<span class="entry-date">This page would have a link to a downloadable PDF. And 
possibly would allow people to view the reader’s guide o
nline using some sort of viewer?
For now just leave this blank.

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->

        	<div class="entry">
            	<div class="entry-image"><img src="<?php echo get_template_directory_uri(); ?>/images/fiona.png" width="146" /></div>
            	<div class="entry-textblock">
        		<div class="entry-title">Fiona Smyth</div>
            	<p>
            	<span class="entry-date">This page would have a link to a downloadable PDF. And 
possibly would allow people to view the reader’s guide o
nline using some sort of viewer?
For now just leave this blank.

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->
        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
