<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="contentWrap">
	<div id="content">
    	<?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <!--div class="meta">
                    	<em>Posted on:</em> <?php the_time('F jS, Y'); ?>
                        <em>by</em> <?php the_author() ?>
                    </div-->
                    <div class="entry">
                    	<?php the_content(); ?>
                    </div>
                    <div class="postmetadata">
                    	<?php the_tags('Tags: ', ', ', '<br />'); ?>
                        Posted in <?php the_category(', ') ?> |
                        <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                     </div>
                </article>
                <?php endwhile; ?>
        	<?php else : ?>
            <h2>Not found</h2>
        <?php endif; ?>
	</div> <!-- end content -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
