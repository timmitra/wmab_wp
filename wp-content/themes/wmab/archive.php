<?php get_header(); ?>
<div id="contentWrap">
	<div id="content">
    	<?php if ( have_posts() ) : ?>
        	<?php if (is_category()) { ?>
            	<h2 id="archiveTitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
            <?php } elseif (is_tag()) { ?>
            	<h2 id="archiveTitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
            <?php } elseif (is_day()) { ?>
            	<h2 id="archiveTitle">Archive for <?php the_time('F jS, Y'); ?></h2>
            <?php } elseif (is_month()) { ?>
            	<h2 id="archiveTitle">Archive for <?php the_time('F, Y'); ?></h2>
            <?php } elseif (is_year()) { ?>
            	<h2 id="archiveTitle">Archive for <?php the_time('Y'); ?></h2>
            <?php } elseif (is_author()) { ?>
            	<h2 id="archiveTitle">Author Archive</h2>
            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            	<h2 id="archiveTitle">Archives</h2>
            <?php } ?>
        	<?php while ( have_posts() ) : the_post(); ?>
            	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="meta">
                    	<em>Posted on:</em> <?php the_time('F jS, Y'); ?>
                        <em>by</em> <?php the_author() ?>
                    </div>
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
    <?php get_sidebar(); ?>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
