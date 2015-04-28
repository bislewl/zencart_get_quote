<?php
/**
* @package page template
* @copyright Copyright 2003-2006 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* @version $Id: Define Generator v0.1 $
*/

// THIS FILE IS SAFE TO EDIT! This is the template page for your new page 

?>
<!-- bof tpl_get_quote_default.php -->
	<div class='centerColumn' id='get_quote'>
		
<h1 class="back"><?php echo HEADING_TITLE;?></h1>
<div class="alert forward" id="required-information"><?php echo FORM_REQUIRED_INFORMATION; ?></div>

<?php 
	if (DEFINE_CONTACT_US_STATUS >= '1' and DEFINE_CONTACT_US_STATUS <= '2') { 
		echo '<div class="clearBoth contact-us-intro">';
			require($define_page);
		echo '</div>';
	} 
?>

<?php echo zen_draw_form('contact_us', zen_href_link(FILENAME_DEFINE_GET_QUOTE, 'action=send'),'post',' enctype="multipart/form-data" '); ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>
<!-- 
	/*
	 *  Code changed on: May 26, 2014;
	 * 	Fixed issue: Layout for success message;
	*/
 -->
<div id="contact-form-wrapper" class="back">
	<p><?php echo TEXT_SUCCESS; ?></p>
	<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
</div><!--EOF #contact-form-wrapper-->

<!-- 
	/*
	 *  End Code changed on: May 26, 2014;
	*/
-->

<?php
  } else {
?>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

<!--
<?php
// show dropdown if set
    if (CONTACT_US_LIST !=''){
?>
<label class="inputLabel" for="send-to"><?php echo SEND_TO_TEXT; ?></label>
<?php echo zen_draw_pull_down_menu('send_to',  $send_to_array, 0, 'id="send-to"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />
<?php
    }
?>
-->

<div id="contact-form-wrapper" class="back">

	<div id="contact-col-left" class="back">

		<label class="inputLabel" for="contactname"><?php echo ENTRY_NAME; ?> <?php echo '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
		<?php echo zen_draw_input_field('contactname', $name, ' size="40" id="contactname"'); ?>
		
		<label class="inputLabel" for="email-address"><?php echo ENTRY_EMAIL; ?> <?php echo '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
		<?php echo zen_draw_input_field('email', ($email_address), ' size="40" id="email-address"'); ?>
		
		<label class="inputLabel" for="subject" ><?php echo ENTRY_SUBJECT; ?> <?php echo '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
		<?php echo zen_draw_input_field('subject', ($email_subject), ' size="40" id="subject"'); ?>
		
	</div><!--EOF #contact-col-left-->
	
	<div id="contact-col-right" class="forward">
	
		<label for="enquiry"><?php echo ENTRY_ENQUIRY . ' <span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
		<?php echo zen_draw_textarea_field('enquiry', '30', '7', $enquiry, 'id="enquiry"'); ?>
		<?php echo zen_draw_input_field('should_be_empty', '', ' size="40" id="CUAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>
	</div><!--EOF #contact-col-right-->
		<div class="clearBoth"></div>
        <div id="contact-col-both" class="back">
            <label class="inputLabel" for="quote_file" ><?php echo ENTRY_UPLOAD_FILE; ?> <?php echo '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
		<?php echo zen_draw_file_field('quote_file'); ?>
        </div>
	<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
	
	
	<div class="clearBoth"></div>
</div><!--EOF #contact-form-wrapper-->

<?php
  }
?>

<div id="store-details-wrapper" class="forward">
	
	<div class="clearBoth"></div>
	<div class="back contact-icon" id="business-icon">&#xe002;</div>
	<?php if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>
	<address class="back contact-info"><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
	<?php } ?>
	<div class="clearBoth"></div>

</div><!--EOF #store-details-wrapper-->

</form>

		
	</div>
<!-- eof tpl_get_quote_default.php -->
