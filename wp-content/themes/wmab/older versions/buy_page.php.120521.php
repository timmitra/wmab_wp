<?php

	/* Template Name: Buy the Book - blue */

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
            	<div class="entry-image"><img src="<?php echo get_template_directory_uri(); ?>/images/book.png" width="150" /></div>
            	<div class="entry-textblock">
        		<div class="entry-title">What Makes a Baby</div>
            	<p>
            	<span class="entry-date"></span>(Hardcover Edition)
A 36-page, full color, hardcover book featuring illustrations 
by Fiona Smyth and text by Cory Silverberg. Geared to readers 
from pre-school to about 8 years old What Makes a Baby helps 
parents teach curious kids about conception, gestation, and birth 
in a way that works regardless of family make up and how the child 
came into the world and into the family.<br />
                <span class="entry-code">BK-101</span>
                <br />
                <span class="entry-price">$25</span>

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->

        	<div class="entry">
            	<div class="entry-image"><img src="<?php echo get_template_directory_uri(); ?>/images/ipad.png" width="191" /></div>
            	<div class="entry-textblock">
        		<div class="entry-title">What Makes a Baby</div>
            	<p>
            	<span class="entry-date"></span>(Digital Edition)
The full color book instantly downloadable in formats for the 
Kindle Fire, iPad, Nook Color, and many other ereaders. Please 
specify which file or device when ordering, and if you’re not sure 
if your reader will be compatible, send us an email and 
we’ll let you know.<br />
                <span class="entry-code">BK-202</span>
                <br />
                <span class="entry-price">$10</span>

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->
 
        	<div class="entry">
            	<div class="entry-image"><img src="<?php echo get_template_directory_uri(); ?>/images/stickers.png" width="149" /></div>
            	<div class="entry-textblock">
        		<div class="entry-title">What Makes a Baby Button & 
Sticker Pack </div>
            	<p>
            	<span class="entry-date"></span>Let everyone know what you know with your “I Know What Makes a 
Baby” button and share the joy with the more kid-friendly (and less 
pointy!) limited edition sticker series from the book. Stickers include 
Dancing Egg & Sperm, Butterfly, Sunflowers, and the Magic 
Magnifying Glass.<br />
                <span class="entry-code">MI-202</span>
                <br />
                <span class="entry-price">$5</span>

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->

        	<div class="entry">
            	<div class="entry-image">&nbsp;</div>
            	<div class="entry-textblock">
        		<div class="entry-title"></div>
            	<p>
            	<span class="entry-disclaimer">Retailers, agencies, community groups, organizations, 
and anyone interested in bulk purchasing should contact: 
sales@zoballpress.com</span><br />
            	<span class="entry-date"></span><br />
                <span class="entry-code"></span>
                <br />
                <span class="entry-price"></span>

				</p>
			</div><!-- entry-textblock -->	
		</div><!-- entry -->

        </div>
    </div>

	</div>
</div><!-- end contentWrap -->
<?php get_footer(); ?>
