<?php

	/* Template Name: Follow Us Page - orange */

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
        	<div class="entry-title">Subscribe to our newsletter</div>
				<p> <!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup">
						<form action="http://what-makes-a-baby.us4.list-manage2.com/subscribe/post?u=530cebd1c7ca6cbd0abca2d22&amp;id=2ab3359ef8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
						<div class="mc-field-group">
							<label for="mce-EMAIL">Email Address </label>
							<input value="" name="EMAIL" class="required email" id="mce-EMAIL" type="email" />
							<br />
							<input class="wpsc_buy_button" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" type="submit" />
						</div>
						</form>
					</div>
				</p>
				<!--End mc_embed_signup-->
				</div><!-- entry-textblock -->
			</div><!-- entry -->
        	<div class="entry">
            <div class="entry-textblock">
        	<div class="entry-title">Follow us on Facebook</div>
				<p> <!-- facebook -->
					<a href="http://www.facebook.com/whatmakesababy" target="_blank">What makes a baby - on Facebook</a>
				</p>
				<!--End facebook-->
				</div><!-- entry-textblock -->
			</div><!-- entry -->
        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
