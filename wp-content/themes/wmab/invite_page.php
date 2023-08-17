<?php

	/* Template Name: Invite Cory Page */

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
			
		//Check to make sure comments were entered	
	/*	if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
	*/		
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = '***REMOVED***';
			$subject = 'Invite Form Submission from '.$name;
			$sendCopy = trim($_POST['comments']);
			$body = "Name: $name \n\nEmail: $email \n\nPhone: ".$_POST['phone']." \n\nQuestion: ".$_POST['question']."\n\nComments: ".$_POST['comments'];
			$headers = 'From: WMAB <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."\n";
			$headers .= "BCC: tim@example\n";
			
			mail($emailTo, $subject, $body, $headers);

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
		<p>Thanks, <?=$name;?></p>
		<p>Your email was successfully sent. I will be in touch soon.</p>
	</div>

<?php } else { ?>
			<br />
			<form name="form1" method="post" action="<?php the_permalink(); ?>">
            	  <p>
            	    <label for="name">Your Name *</label>
            	    <input type="text" name="contactName" id="name" tabindex="1" value="
            	    <?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"
   					class="requiredField" >
					<?php if($nameError != '') { ?>
						<span class="error"><?php echo $nameError;?></span> 
					<?php } ?>            	  
				</p>
				<p>
            	    <label for="email">Your Email *</label>
            	    <input type="text" name="email" id="email" tabindex="2" value="
  					<?php if(isset($_POST['email']))  echo $_POST['email'];?>"
  					class="requiredField email" />
					<?php if($emailError != '') { ?>
						<span class="error"><?php echo $emailError;?></span>
					<?php } ?> 
				</p>
				<p>
            	    <label>Your Phone Number</label>
            	      <input type="text" name="phone" id="phone" tabindex="3">
          	      
            	  </p>
            	  <p class="screenReader">
					<label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label>
					<input type="text" name="checking" id="checking" class="screenReader" value="
					  <?php if(isset($_POST['checking']))  echo $_POST['checking'];?>"
 					 />
				</p>
            	  <!--p>
            	    <label>What is your question regarding?</label>
            	      <select name="question" id="question" tabindex="4">
            	        <option value="">Please Choose</option>
            	        <option value="sales">Sales</option>
            	        <option value="speaking">Speaking Event</option>
            	        <option value="marketing">Marketing/Publicity</option>
            	        <option value="other">Other</option>
          	          </select>
          	      
                  
                  </p-->
                         <br />
                         <p>
            	  <label class="textarea-label">Where would you like to invite Cory?</label><br />
            	    <textarea name="comments" id="inquiry" cols="70" rows="5"></textarea>
          	    
            	</p>
                            	<p>
                            	  <input type="hidden" name="submitted" id="submitted" value="true" />
                            	  <input type="submit" name="submit" id="submit" value="Submit">
                            	</p>
                            	<p>* denotes a required field</p>
                </form>
<?php } ?>
			</div><!-- entry-textblock -->
			</div><!-- entry -->
        </div>
    </div><!-- end content -->

	</div><!-- end post -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
