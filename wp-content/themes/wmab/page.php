<?php get_header(); //the_post(); ?>
<div id="contentWrap">
	<?php get_sidebar(); ?>
	<div id="content">
        <div id="page-title"><?php the_title(); ?></div>
    	<?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <!--div class="meta">
                    	<em>Posted on:</em> <?php the_time('F jS, Y'); ?>
                        <em>by</em> <?php the_author() ?>
                    </div-->
                    <div class="entry">
                    	<?php the_content(); ?>
                    </div>
                    <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                    <!--div class="postmetadata">
                    	<?php the_tags('Tags: ', ', ', '<br />'); ?>
                        Posted in <?php the_category(', ') ?> |
                        <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                     </div-->
                </div>
                <?php //comments_template(); ?>
                <?php endwhile; ?>
        	<?php else : ?>
            <h2>Not found</h2>
        <?php endif; ?>
	</div> <!-- end content -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
