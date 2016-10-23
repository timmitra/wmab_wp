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
        	<div class="entry-title"></div>

            <span class="entry-date"></span><br />Click on the cover below to download the Reader's Guide.
			</p>
			<p>
				<a href="http://www.what-makes-a-baby.com/wp-content/uploads/2013/03/WMAB-Readers-Guide-opt.pdf">
				<img src="http://www.what-makes-a-baby.com/wp-content/uploads/2013/03/WMAB-Readers-Guide1.png" width="400px" />
				</a>
			</p>	
			</div><!-- entry-textblock -->
			</div><!-- entry -->
        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
