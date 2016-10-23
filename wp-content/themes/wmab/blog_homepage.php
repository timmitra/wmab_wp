<?php

	/* Template Name: Blog Homepage - green */

?>
<?php get_header(); ?>
<div id="contentWrap">

	<?php query_posts("posts_per_page=5"); ?>

	<div id="content">
    	<?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="meta">
                    	<?php the_time('F j, Y'); ?>
                    </div>
                    <div class="entry">
                    	<?php the_content(); ?>
                    </div>
                </article>
                <?php endwhile; ?>
        	<?php else : ?>
            <h2>Not found</h2>
        <?php endif; ?>
	</div> <!-- end content -->
    <?php get_sidebar(); ?>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
