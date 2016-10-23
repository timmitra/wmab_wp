<?php get_header(); ?>
<div id="contentWrap">

    <?php get_sidebar(); ?>

	<div id="content">
	   <div id="page-title">
        	News + Events
        </div>
        <br />
        
        <div id="page-content">

    	<?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="entry-textblock">
                	<div class="entry-title"><?php the_title(); ?></div>
                    <span class="entry-date">
                    	<?php the_time('F j, Y'); ?>
                    </span>
                    <p>
                    	<?php the_content(); ?>
                    </p>
                    <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                     </div><!-- entry-textblock -->
                </article>
                <?php endwhile; ?>
        	<?php else : ?>
            <h2>Not found</h2>
        <?php endif; ?>

	</div> <!-- end content -->

</div><!-- end contentWrap -->

<?php get_footer(); ?>
