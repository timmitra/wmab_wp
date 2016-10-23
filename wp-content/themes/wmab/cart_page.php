<?php 
	//print_r($_POST);
	session_start();      // start the session
	/* a new submission */
	if ($_POST['Buy'] == "Add To Cart") {
		if ($_POST['product_id']) {
			$_SESSION['product_id'] = $_POST['product_id'];
			$_SESSION['product_price'] = $_POST['product_price'];
			$_SESSION['product_name'] = $_POST['product_name'];
			$_SESSION['product_image'] = $_POST['product_image'];
			$_SESSION['qty'] = $_SESSION['qty'] + $_POST['qty'];
		}
		if (empty($_SESSION['qty'])) {
			$_SESSION['qty'] = 1;
		}
	}
	
	/* update the cart */
	if ($_POST['submit'] == "Update") {
		//echo "updating";
		if ($_POST['quantity'] >= 11) {
			$_POST['quantity'] = 10;
			$quanityError = "Thanks for your interest in What Makes a Baby! On this site you can only order up to 10 copies. For information on bulk purchasing and discounts please email us at sales@zoballpress.com. Thanks!";
		}
		$_SESSION['qty'] = $_POST['quantity'];
	} else if ($_POST['submit'] == "Remove") {
		//echo "updating";
		$_SESSION['qty'] = 0;
	}
	if ( ($_POST['submit'] == "Ship Here") && ($_POST['country'] !== "") ) {
		$_SESSION['country'] = $_POST['country'];
	}
	if ( ($_POST['submit'] == "Reset")  ) {
		unset($_SESSION['country']);
	}
	//print_r($_SESSION);

?>
<?php

	/* Template Name: Shopping Cart Page - blue */

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
<?php if (empty($_SESSION['qty']) ) { ?>
        	<div class="entry">
            	<div class="entry-textblock">
        			<div class="entry-title">There are no items in your cart.</div>
				</div><!-- entry-textblock -->
			</div><!-- entry -->

<?php } else { ?>
        	<div class="entry">
            <div class="entry-textblock">
        	<div class="entry-title">Please review your order</div>
            	<div id="checkout_page_container">
					<table class="checkout_cart" border=1>
					<tr class="header">
						<th colspan="2" >Product</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>&nbsp;</th>
					</tr>
               
					<tr class="product_row product_row_0 alt">

					<td class="firstcol wpsc_product_image wpsc_product_image_0">
                     <img src="<?php echo $_SESSION['product_image']; ?>" width="50px" alt="What Makes a Baby" title="What Makes a Baby" class="product_image" />
					</td>

					<td class="wpsc_product_name wpsc_product_name_0">
					<?php echo $_SESSION['product_name']; ?>
					</td>

					<td class="wpsc_product_quantity wpsc_product_quantity_0">
					<form action="" method="post" class="adjustform qty">
					<input type="text" name="quantity" size="2" value="<?php echo $_SESSION['qty']; ?>" />
					<input type="hidden" name="key" value="0" />
					<input type="hidden" name="wpsc_update_quantity" value="true" />
					<input type="submit" value="Update" name="submit" />
					</form>
					</td>

       
					<td class="wpsc_product_price wpsc_product_price_0">&#036; <?php echo number_format($_SESSION['product_price'], 2, '.', ''); ?></td>
					<td class="wpsc_product_price wpsc_product_price_0">&#036; <?php echo number_format(($_SESSION['qty'] * $_SESSION['product_price']), 2, '.', ''); ?></td>

					<td class="wpsc_product_remove wpsc_product_remove_0">
					<form action="" method="post" class="adjustform remove">
					<input type="hidden" name="quantity" value="0" />
					<input type="hidden" name="key" value="0" />
					<input type="hidden" name="wpsc_update_quantity" value="true" />
					<input type="submit" value="Remove" name="submit" />
					</form>
					</td>
					</tr>
      				<?php if ($quanityError  != '') : ?>
      					<tr><td colspan="6" class="cart-msg"><?php echo $quanityError; ?></td></tr>
      				<?php endif; ?>
					</table>
					</div><!-- cart contents table close -->		
				</div><!-- entry-textblock -->
			</div><!-- entry -->

<?php $country_array = array ( "Canada", "USA", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia-Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Rep.", "Democratic Republic of Congo", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Great Britain", "Greece", "Greenland", "Grenada", "Guadeloupe (French)", "Guam (USA)", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique (French)", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia (French)", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Island", "Poland", "Polynesia (French)", "Portugal", "Puerto Rico", "Qatar", "Reunion (French)", "Romania", "Russia", "Rwanda", "Saint Helena", "Saint Kitts & Nevis Anguilla", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent & Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia & South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "U.K.", "Uganda", "Ukraine", "United Arab Emirates", "Uruguay", "USA Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (USA)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe" ); ?>

        	<div class="entry">
            <div class="entry-textblock">
        	<div class="entry-title">Where are we shipping to?</div>
            	<div id="checkout_page_container">
            		<form action="" method="post" class="shipToCountry">
					<table class="checkout_cart" border="1"> 
						<tr>
							<td>
								<select name="country">
									<option value="">Choose your country</option>
<?php foreach($country_array as $key) : ?>
<option value="<?php echo $key; ?>"
<?php echo ($_SESSION['country'] == $key) ? " SELECTED " : "" ?>
><?php echo $key; ?></option>
<?php endforeach ?>
								</select>
							</td>
							<td>
								<input type="submit" value="Ship Here" name="submit" />
							</td>
							<td>
								<input type="submit" value="Reset" name="submit" />
							</td>
						</tr>
					</table>
					</form>
					</div><!-- cart contents table close -->		
				</div><!-- entry-textblock -->
			</div><!-- entry -->

<?php if (isset($_SESSION['country'])) : ?>

        	<div class="entry">
            <div class="entry-textblock">
        	<div class="entry-title">Almost Done...</div>
            	<div id="checkout_page_container">
								<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="quantity" value="<?php echo $_SESSION['qty']; ?>">
<?php /* calculate shipping */ 
	$local_array = array (1 => 5, 2 => 7, 3 => 9, 4 => 11, 5 => 13, 6 => 15, 7 => 17, 8 => 19, 9 => 21, 10 => 23);
	$intl_array = array (1 => 20, 2 => 25, 3 => 30, 4 => 35, 5 => 40, 6 => 45, 7 => 50, 8 => 55, 9 => 60, 10 => 65);
	/* advanced field must be shipping2=1 in paypal to override shipping */
?>
<?php switch ($_SESSION['country']) {
	case "USA" :
	?>
	<input type="hidden" name="hosted_button_id" value="JRT8QG2TNYHZ2">
	<input type="hidden" name="shipping" value="<?php echo $local_array[$_SESSION['qty']]; ?>">
	<?php break;
	case "Canada" :
	?>
	<input type="hidden" name="hosted_button_id" value="UM958X9FEWX88">
	<input type="hidden" name="shipping" value="<?php echo $local_array[$_SESSION['qty']]; ?>">
	<?php break;
	default :
	?>
	<input type="hidden" name="hosted_button_id" value="3A568JY345MAG">
	<input type="hidden" name="shipping" value="<?php echo $intl_array[$_SESSION['qty']]; ?>">
	<?php break;
}
	?>
<input type="image" src="http://www.what-makes-a-baby.com/staging/wp-content/themes/wmab/images/button-checkout.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<br />
<span class="cart-msg">(this site uses PayPal to process orders)</span>

					</div><!-- cart contents table close -->		
				</div><!-- entry-textblock -->
			</div><!-- entry -->
<?php endif; /* end check country */ ?> 

<?php }  ?>
        </div><!-- end page-content -->
    </div><!-- end content -->

	</div><!-- end post -->
</div><!-- end contentWrap -->
<?php get_footer(); ?>
