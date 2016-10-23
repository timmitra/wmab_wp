<?php

	/* Template Name: Blog Events Page - green */

?>
<?php get_header(); ?>
<meta http-equiv="refresh" content="0;url=http://www.facebook.com/whatmakesababy" />
<div id="contentWrap">

    <?php get_sidebar(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">

    <div id="content">
        <div id="page-title">
        	<?php the_title(); ?>
        </div>
        <br />
	 
	 <?php query_posts("posts_per_page=5"); ?>
	 
    	<div id="page-content">

    	<?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<div class="entry-textblock">
				<div class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
                    <span class="entry-date">
                    	published on <?php the_time('F j, Y'); ?>
                    </span>
                    <p>
                    	<?php the_excerpt(); ?>
                    </p>
                    </div><!-- entry-textblock -->
                </article>
                <?php endwhile; ?>
        	<?php else : ?>
            <h2>Not found</h2>
        <?php endif; ?>

        </div><!-- end page-content -->

	</div><!-- end content -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
