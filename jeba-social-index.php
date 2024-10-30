<?php
/*
Plugin Name: Jeba Social Slide
Plugin URI: http://prowpexpert.com
Description: This is Jeba Social Slide wordpress plugin really looking awesome social slide. Everyone can use the cute form plugin easily like other wordpress plugin. 
Author: Md Jahed
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function jeba_social_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jeba_social_wp_latest_jquery');

function plugin_function_jeba_socialform() {
    wp_enqueue_style( 'jeba-formss-css', plugins_url( 'jeba/social.slider.jquery.min.css', __FILE__ ));
}

add_action('init','plugin_function_jeba_socialform');

function plugin_function_jeba_social_form() {
    wp_enqueue_script( 'jebacuteformss-js', plugins_url( 'jeba/social.slider.jquery.min.js', __FILE__ ), true);
 
}

add_action('wp_footer','plugin_function_jeba_social_form');



function jeba_socialform_plugin_function () {?>
		
		<div id="social-slider"></div>

<?php
}

add_action('wp_footer','jeba_socialform_plugin_function');


function jeba_add_options_page(){

	 add_options_page( 'jeba_manu_title', 'jeba social menu', 'manage_options', 'jeba-option-page', 'jeba_options_page_function',8 );

			 
}
add_action('admin_menu','jeba_add_options_page');
		  
// 2. Add default value array. 
$jeba_social_options_default = array(
	'jeba_facebook_id' => 'Your facebook ID here',
	'jeba_twitter_id' => 'Your twitter ID here',
	'jeba_twitter_widget_id' => 'Your twitter widgetID here',
	'jeba_linkedin_id' => 'Your linkedin ID here',
	'jeba_google_id' => 'Your google+ ID here',
	'jeba_youtube_id' => 'Your youtube channel ID here',
);


    if ( is_admin() ) : // 3. Load only if we are viewing an admin page	

  // 4. Add setting option by used function. 
function jeba_register_setting() {
// Register settings and call sanitation functions
// 4. Add register setting. 
	register_setting( 'jeba_register_setting_option', 'jeba_social_options_default', 'jeba_setting_validate_option' );
}

add_action( 'admin_init', 'jeba_register_setting' );



 //1.2
 function jeba_options_page_function(){?>
 
 <?php // 5.1. Add settings API hook under form action.  ?>
<?php global $jeba_social_options_default;


if ( ! isset( $_REQUEST['updated'] ) )
	$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 

?>
	 
	 
   <div class="wrap">
	  <h2>Jeba Social Profile Setting</h2>
				  <?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; // 5.2. If the form has just been submitted, this shows the notification ?>	
	  
	<form action="options.php" method="post">  
	  
	  

	<?php // 6.1 Add settings API hook under form action.  ?>
<?php $settings = get_option( 'jeba_social_options_default', $jeba_social_options_default ); ?>


<?php settings_fields( 'jeba_register_setting_option' );
/* 6.2  This function outputs some hidden fields required by the form,
including a nonce, a unique number used to ensure the form has been submitted from the admin page and not somewhere else, very important for security */ ?>



		
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row"><label for="jeba_facebook_id">Facebook ID</label></th>
					<td>
						<input type="text" class="" value="<?php echo stripslashes($settings['jeba_facebook_id']); ?>" id="jeba_facebook_id" name="jeba_social_options_default[jeba_facebook_id]"/><p class="description">Input your facebook page ID or Name<br/>facebook.com/basherkellanews here input only "basherkellanews" name or page ID</p>
					</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="jeba_twitter_id">Twitter UserName</label></th>
					<td>
						<input type="text" class="" value="<?php echo stripslashes($settings['jeba_twitter_id']); ?>" id="jeba_twitter_id" name="jeba_social_options_default[jeba_twitter_id]"/><p class="description">Input your twitter username here<br/>twitter.com/abujahed19 here is 'abujahed19' twitter username.</p>
					</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="jeba_twitter_widget_id">Twitter WidgetID</label></th>
					<td>
						<input type="text" class="" value="<?php echo stripslashes($settings['jeba_twitter_widget_id']); ?>" id="jeba_twitter_widget_id" name="jeba_social_options_default[jeba_twitter_widget_id]"/><p class="description">Input twitter widget id (must required)<br/> To get your widget id search google "How do I find my Twitter Widget ID"</p>
					</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="jeba_linkedin_id">Linkedin</label></th>
					<td>
						<input type="text" class="" value="<?php echo stripslashes($settings['jeba_linkedin_id']); ?>" id="jeba_linkedin_id" name="jeba_social_options_default[jeba_linkedin_id]"/><p class="description">Input here your company linkedin id</p>
					</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="jeba_google_id">Google Plus ID</label></th>
					<td>
						<input type="text" class="" value="<?php echo stripslashes($settings['jeba_google_id']); ?>" id="jeba_google_id" name="jeba_social_options_default[jeba_google_id]"/><p class="description">Input here your google plus ID</p>
					</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="jeba_youtube_id">Youtube Channel ID</label></th>
					<td>
						<input type="text" class="" value="<?php echo stripslashes($settings['jeba_youtube_id']); ?>" id="jeba_youtube_id" name="jeba_social_options_default[jeba_youtube_id]"/><p class="description">Input here your youtube channel name.</p>
					</td>
			</tr>

		
	</tbody>

</table>

<div class="j_donate" style="margin-top:20px;">
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=Q6YCATTPN2RAJ&lc=CA&item_name=Awesome%20Plugin%20Servise&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted"><img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif"></a>

</div>

<p class="submit" style="margin-top:5px !important;">
<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
</p>

</form>
			   
</div>
	 
	 
	<?php 
	 }
	 

  // 7. Add validate options. 
function jeba_setting_validate_option( $input ) {
	global $jeba_social_options_default;

	$settings = get_option( 'jeba_social_options_default', $jeba_social_options_default );
	
	
	$input['jeba_facebook_id']=wp_filter_post_kses($input['jeba_facebook_id']);
	$input['jeba_twitter_id']=wp_filter_post_kses($input['jeba_twitter_id']);
	$input['jeba_twitter_widget_id']=wp_filter_post_kses($input['jeba_twitter_widget_id']);
	$input['jeba_linkedin_id']=wp_filter_post_kses($input['jeba_linkedin_id']);
	$input['jeba_google_id']=wp_filter_post_kses($input['jeba_google_id']);
	$input['jeba_youtube_id']=wp_filter_post_kses($input['jeba_youtube_id']);
	
	
	 // We strip all tags from the text field, to avoid vulnerablilties like XSS
	$prev=$settings['layout_only'];
	if(!array_key_exists($input['layout_only']))
	$input['layout_only']=$prev;
	

 return $input;
}

 
	endif;  //3. EndIf is_admin()	


// 8.data danamic
		
function jeba_social_activator(){?>
<?php global $jeba_social_options_default;

$bappiscroll_up_settings=get_option('jeba_social_options_default','$jeba_social_options_default'); ?>


	
	
	 <script>
	  jQuery( document ).ready(function( $ ) {
		  jQuery('#social-slider').socialslider({
			  fromTop: '40px',
			  social : {
				 facebook: '<?php echo $bappiscroll_up_settings['jeba_facebook_id']; ?>',
				 twitter: {
					 handle: '<?php echo $bappiscroll_up_settings['jeba_twitter_id']; ?>',
					 widgetId: '<?php echo $bappiscroll_up_settings['jeba_twitter_widget_id']; ?>' 
				 },
				 linkedin: '<?php echo $bappiscroll_up_settings['jeba_linkedin_id']; ?>',
				 google: '<?php echo $bappiscroll_up_settings['jeba_google_id']; ?>',
				 youtube: '<?php echo $bappiscroll_up_settings['jeba_youtube_id']; ?>'
			  }
		  });
	  });
	</script>
		
		
	
	
<?php
}

add_action('wp_footer','jeba_social_activator');



?>