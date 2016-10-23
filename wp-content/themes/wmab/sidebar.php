<div id="sidebar">
	<aside id="nav">
		<img src="<?php echo get_template_directory_uri(); ?>/images/nav.png" width="268" height="635" border="0" usemap="#nav" id="nav-bubbles" />
        <map name="nav">
          <area  shape="rect" coords="135,127,251,228" href="?page_id=15" usemap="#nav" border="0" alt="buy the book">
          <area shape="rect" coords="12,235,114,315" href="?page_id=17" alt="events and workshops" title="News + Events">
          <area shape="rect" coords="149,274,256,338" href="?page_id=13" alt="Reader's Guide" title="Reader's Guide">
          <area shape="rect" coords="16,354,113,448" href="?page_id=77" alt="Invite Cory" title="Invite Cory">
          <area shape="rect" coords="163,373,246,478" href="?page_id=7" alt="About Cory and Fiona" title="About Cory + Fiona">
          <area shape="rect" coords="12,486,118,544" href="?page_id=79" alt="Contact Us" title="Contact Us">
          <area shape="rect" coords="163,525,246,598" href="?page_id=111" alt="Follow Us" title="Follow Us">
          <area shape="poly" coords="6,6, 224,6, 224,126, 132, 131, 126,213, 224,215, 6,215" href="?page_id=2" alt="Home" title="Home" >
        </map>
     </aside>
     <br />

<div class="widget-area">
	<?php if (!dynamic_sidebar( 'Sidebar Widgets') ) : ?>
	<!--aside id="search" class="widget">
		<?php search_form(); ?>
	</aside-->
	<?php endif; //end sidebar widget area ?>
</div>

 </div><!-- end sidebar -->
