<?php

	/* Template Name: Reader's Guide Page - orange */

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
        	<div class="entry-title">Coming Soon...</div>
            <!--p>
            <span class="entry-date"></span><br />This page would have  link to a downloadable PDF. And possibly would allow people to view the reader's guide online using some sort of viewer? For now just leave this blank.
			</p>
			<p>
				<img src="<?php echo get_template_directory_uri(); ?>/images/reader-guide-pdf.png" />
			</p-->	
			</div><!-- entry-textblock -->
			</div><!-- entry -->
        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
