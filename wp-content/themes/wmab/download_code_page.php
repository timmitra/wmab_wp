<?php

	/* Template Name: Coded Download Page */

?>

<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {
	//If there is no error, send the email
	if(!isset($hasError)) {

		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = '<br />Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = '<br />Please enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = '<br />Please enter a valid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
		
		//Check the download code
		if (get_post_meta($post->ID, 'download-code', true) === "") {
			$valid_code = "***REMOVED***";
		} else {
			$valid_code = get_post_meta($post->ID, 'download-code', true);
		}
		if(trim($_POST['download_code']) === '')  {
			$downloadError = '<br />Please enter a download code.';
			$hasError = true;
		} else if ($valid_code != $_POST['download_code']) {
			$downloadError = '<br />Sorry, that is not a valid code.';
			$hasError = true;
		}
		
		//Check to make sure format were entered	
		if(trim($_POST['format']) === '') {
			$formatError = 'You forgot to choose format.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$format = stripslashes(trim($_POST['format']));
			} else {
				$format = trim($_POST['format']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
			
			// insert into database
			$wpdb->query( $wpdb->prepare( 
			"
			INSERT INTO wmab_downloads
			(name, email, format, code, ip_address)
			VALUES ( '%s', '%s', '%s', '%s', '%s')
			", 
    	    array(
				$name, $email, $_POST['format'], $_POST['download_code'], $_SERVER['REMOTE_ADDR']
			) 
			) );


			//$emailTo = '***REMOVED***';
			//$emailTo = '***REMOVED***';
			$emailTo = '***REMOVED***';
			$subject = 'Book Downloaded by '.$name;
			//$sendCopy = trim($_POST['comments']);
			$body = "Name: $name \n\nEmail: $email \n\ndownload_code: ".$_POST['download_code']." \n\nFormat: ".$_POST['format']."\n\nIP Address: ".$_SERVER['REMOTE_ADDR'];
			$headers = 'From: WMAB <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."\n";
			//$headers .= "BCC: ***REMOVED***\n";
			
			wp_mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed Your Name';
				$headers = 'From: Your Name <noreply@what-makes-a-baby.com>';
			//	mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}

	}
} ?>

<?php get_header(); the_post(); ?>

<style type="text/css">
a {
	color: #CF3;
}
</style>

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
        	<div class="entry-title"></div>
            <p>
            <?php the_content(); ?>
			</p>
<?php 
//If the email was sent, show a thank you message
//Otherwise show form
if(isset($emailSent) && $emailSent == true) {
?>
	<div class="thanks">
		<p>Thanks, <?=$name;?></p><br />
		<p><span class="entry-title">What Makes a Baby eBook<span></p>
        <p>Your can download the file in the format you need below:<br /><br /> 
        
		<!--iBooks (iPad) format <a href="<?php //echo get_post_meta($post->ID, 'ibook', true); ?>"><br />Click Here for iBooks</a><br /><br />
		Kindle Fire format <a href="<?php //echo get_post_meta($post->ID, 'kf8', true); ?>"><br />Click Here for Kindle</a><br /><br />
		PDF format <a href="<?php //echo get_post_meta($post->ID, 'pdf', true); ?>"><br />Click Here for PDF</a><br /><br /-->
        
		<?PHP 
			switch($_REQUEST['format']) {
				case "pdf":
		?>
		PDF format <a href="<?php echo get_post_meta($post->ID, 'pdf', true); ?>"><br />Click Here for PDF</a><br /><br />
		<?php
				break;
				case "ibooks":
		?>
		iBooks (iPad) format <a href="<?php echo get_post_meta($post->ID, 'ibook', true); ?>"><br />Click Here for iBooks</a><br /><br />
		<?php
				break;
				case "kf8":
		?>
		Kindle Fire format <a href="<?php echo get_post_meta($post->ID, 'kf8', true); ?>"><br />Click Here for Kindle</a><br /><br />
		<?php
				default:
				break;
			} 
		?>
		</p>
	    <p>You may need to Right-Click or Control-Click on the link and choose "Download File as".</p>
</div>

<?php } else if($foo == "foo") { ?>
			<br />
			<form name="form1" method="post" action="<?php the_permalink(); ?>">
            	  <p>
            	    <label for="name">Your Name *</label>
            	    <input type="text" name="contactName" id="name" tabindex="1" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"
   					class="requiredField" >
					<?php if($nameError != '') { ?>
						<span class="error"><?php echo $nameError;?></span> 
					<?php } ?>            	  
				</p>
				<p>
            	    <label for="email">Your Email *</label>
            	    <input type="text" name="email" id="email" tabindex="2" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>"
  					class="requiredField email" />
					<?php if($emailError != '') { ?>
						<span class="error"><?php echo $emailError;?></span>
					<?php } ?> 
				</p>
				<p>
            	    <label>Download Code *</label>
            	      <input type="password" name="download_code" id="download_code" tabindex="3" value="<?php if(isset($_POST['download_code']))  echo $_POST['download_code'];?>">
					<?php if($downloadError != '') { ?>
						<span class="error"><?php echo $downloadError;?></span>
					<?php } ?> 
            	  </p>
            	  <p class="screenReader">
					<label for="checking" class="screenReader">Honey Pot</label>
					<input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>"
 					 />
				</p>
            	  <p>
            	        <fieldset>
            	        <ul>
            	    	<li>
            	    	Please select a format
          	          </li>
            	      <!--select name="format" id="format" tabindex="4"-->
            	        <!--option value="">Please Choose</option-->
            	        <li>
            	        	<input type="radio" name="format" value="ibooks" />iBooks
            	        </li>
            	        <li>
            	        	<input type="radio" name="format" value="pdf" />PDF
            	        </li>
            	        <li>
            	        <input type="radio" name="format" value="kf8" />Kindle Fire
            	        </li>
            	        </ul>
            	        </fieldset>
          	          <!--/select-->
					</p>
					<p><?php if($formatError != '') { ?>
						<span class="error"><?php echo $formatError;?></span>
					<?php } ?> 
                  
                  </p>
                         <br />
                         <!--p>
            	  <label class="textarea-label">Where would you like to invite Cory?</label><br />
            	    <textarea name="comments" id="inquiry" cols="70" rows="5"></textarea>
          	    
            	</p-->
                            	<p>
                            	  <input type="hidden" name="submitted" id="submitted" value="true" />
                            	  <input type="submit" name="submitb" id="submit" value="Submit">
                            	</p>
                            	<p>* denotes a required field</p>
                            	<p>* please indicate your desired format</p>
                </form>
<?php } else {
	echo "<p style=\"color:white\">Sorry, you cannot download a book here. Please feel free to contact Cory</p>";
}?>
			</div><!-- entry-textblock -->
			</div><!-- entry -->
        </div>
    </div><!-- end content -->

	</div><!-- end post -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
