<?php get_header(); ?>
<div id="contentWrap">
	<div id="content">
    	<?php if ( have_posts() ) : ?>
        	<h2 id="pageTitle">Search Results</h2>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">
                    	<?php the_excerpt(); ?>
                    </div>
                </article>
                <?php endwhile; ?>
        	<?php else : ?>
            <h2>No Search Results</h2>
        <?php endif; ?>
	</div> <!-- end content -->
    <?php get_sidebar(); ?>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
