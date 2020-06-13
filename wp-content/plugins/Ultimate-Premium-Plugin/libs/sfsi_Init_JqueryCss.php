<?php 

function sfsi_is_rectangle_icons_shortcode_showing_on_front(){
	
	$option8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($option8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile']) && $option8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile'] == 'yes');

	$isDisplayingOnDesktop = (isset($option8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop']) && $option8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop'] == 'yes');
	
	$isDisplayingRectangleIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingRectangleIconsOnFront;
}

function sfsi_is_widget_showing_on_front(){

	$option8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($option8['sfsi_plus_widget_show_on_mobile']) && $option8['sfsi_plus_widget_show_on_mobile'] == 'yes');

	$isDisplayingOnDesktop = (isset($option8['sfsi_plus_widget_show_on_desktop']) && $option8['sfsi_plus_widget_show_on_desktop'] == 'yes');
	
	$isDisplayingWidgetIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingWidgetIconsOnFront;
}

function sfsi_is_floating_icons_showing_on_front(){

	$option8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($option8['sfsi_plus_float_show_on_mobile']) && $option8['sfsi_plus_float_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($option8['sfsi_plus_float_show_on_desktop']) && $option8['sfsi_plus_float_show_on_desktop'] == 'yes');
	
	$isDisplayingFloatIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingFloatIconsOnFront;
}

function sfsi_is_shortcode_icons_showing_on_front(){

	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_shortcode_show_on_mobile']) && $sfsi_section8['sfsi_plus_shortcode_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_shortcode_show_on_desktop']) && $sfsi_section8['sfsi_plus_shortcode_show_on_desktop'] == 'yes');
	
	$isDisplayingShortCodeIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingShortCodeIconsOnFront;
}

function sfsi_is_beforeafterposts_icons_showing_on_front(){

	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile']) && $sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile'] == 'yes');

	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop']) && $sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop'] == 'yes');
	
	$isDisplayingBeforeafterPostsIconsOnFront = $isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingBeforeafterPostsIconsOnFront;
}


function sfsi_is_icons_showing_on_front(){

	$isIconsDisplayingOnFront = false;

	$options8 = unserialize(get_option("sfsi_premium_section8_options"));
	$options7 = unserialize(get_option("sfsi_premium_section7_options"));

	if((false != sfsi_is_widget_showing_on_front()) && (false != isset($options8['sfsi_plus_show_via_widget'])) && ("yes"== $options8['sfsi_plus_show_via_widget']) ){
		$isIconsDisplayingOnFront = true;
	} 

	if((false != sfsi_is_floating_icons_showing_on_front()) && (false != isset($options8['sfsi_plus_float_on_page'])) && ("yes"== $options8['sfsi_plus_float_on_page']) ){
		$isIconsDisplayingOnFront = true;
	} 

	if((false != sfsi_is_shortcode_icons_showing_on_front()) && (false != isset($options8['sfsi_plus_place_item_manually'])) && ("yes"== $options8['sfsi_plus_place_item_manually']) ){
		$isIconsDisplayingOnFront = true;
	} 

	if((false != sfsi_is_beforeafterposts_icons_showing_on_front()) && (false != isset($options8['sfsi_plus_show_item_onposts'])) && ("yes"== $options8['sfsi_plus_show_item_onposts']) ){
		$isIconsDisplayingOnFront = true;
	} 
			
	// Check if rectangle icons are displayed using shortcode on any location from Question 3
	 if(false != sfsi_is_rectangle_icons_shortcode_showing_on_front() && (false != isset($options8['sfsi_plus_place_rect_shortcode'])) && ("yes"== $options8['sfsi_plus_place_rect_shortcode'])){
		$isIconsDisplayingOnFront = true;
	 }	

	// Check if popup is displayed from Question 7
	if(false != isset($options7['sfsi_plus_Show_popupOn']) && "none" != $options7['sfsi_plus_Show_popupOn']){
		$isIconsDisplayingOnFront = true;
	}

	return $isIconsDisplayingOnFront;	
}

function sfsi_premium_is_icon_placement_active($option8=false){

	$option8 = false != $option8 && is_array($option8) && !empty($option8) ? $option8 :unserialize(get_option('sfsi_premium_section8_options',false));

	$arrIconPlacementSettingActive = array();

	if("yes" == $option8['sfsi_plus_show_via_widget']){
		array_push($arrIconPlacementSettingActive, 1);
	}

	if("yes" == $option8['sfsi_plus_float_on_page']){
		array_push($arrIconPlacementSettingActive, 2);
	}

	if("yes" == $option8['sfsi_plus_place_item_manually']){
		array_push($arrIconPlacementSettingActive, 3);
	}

	if("yes" == $option8['sfsi_plus_show_item_onposts']){
		array_push($arrIconPlacementSettingActive, 4);
	}	
	
	if(isset($option8['sfsi_plus_place_rect_shortcode']) && !empty($option8['sfsi_plus_place_rect_shortcode']) && "yes" == $option8['sfsi_plus_place_rect_shortcode']){
		array_push($arrIconPlacementSettingActive, 5);
	}

	return $arrIconPlacementSettingActive;
}

/*  instalation of javascript and css  */
function sfsiplus_plugin_back_enqueue_script()
{		
	if(isset($_GET['page']) && 'sfsi-plus-options' == $_GET['page'])
	{
		wp_enqueue_style('thickbox');
		wp_enqueue_style("SFSIPLUSmainCss", SFSI_PLUS_PLUGURL . 'css/sfsi-style.css' );
		
		wp_enqueue_style("SFSIPLUSJqueryCSS", SFSI_PLUS_PLUGURL . 'css/jquery-ui-1.10.4/jquery-ui-min.css' );
		wp_enqueue_style("wp-color-picker");

		wp_register_style( 'bootstrap.min', SFSI_PLUS_PLUGURL . 'css/bootstrap.min.css' );
		wp_enqueue_style('bootstrap.min');

		/* include CSS for backend */
		wp_enqueue_style("SFSIPLUSmainadminCss", SFSI_PLUS_PLUGURL . 'css/sfsi-admin-style.css' );


		wp_enqueue_script('jquery');
		wp_enqueue_script("jquery-migrate");
		
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		
		wp_enqueue_script("jquery-ui-accordion");	
		wp_enqueue_script("wp-color-picker");
		wp_enqueue_script("jquery-effects-core");
		wp_enqueue_script("jquery-ui-sortable");
			
		wp_enqueue_media();

		wp_register_script('SFSIPLUSJqueryFRM', SFSI_PLUS_PLUGURL . 'js/jquery.form-min.js', '', '', true);
		wp_enqueue_script("SFSIPLUSJqueryFRM");
		
		wp_register_script('SFSIPLUSCustomFormJs', SFSI_PLUS_PLUGURL . 'js/custom-form-min.js', '', '', true);
		wp_enqueue_script("SFSIPLUSCustomFormJs");
		
		wp_register_script('SFSIPLUSCustomJs', SFSI_PLUS_PLUGURL . 'js/custom-admin.js', '', '', true);

		//Bootstrap Scripts
		wp_register_script('bootstrap.min', SFSI_PLUS_PLUGURL.'js/bootstrap.min.js');
		wp_enqueue_script('bootstrap.min');

		
		// Localize the script with new data
		$translation_array = array(
			'Re_ad'                 => __('Read more',SFSI_PLUS_DOMAIN),
			'Sa_ve'                 => __('Save',SFSI_PLUS_DOMAIN),
			'Sav_ing'               => __('Saving',SFSI_PLUS_DOMAIN),
			'Sa_ved'                => __('Saved',SFSI_PLUS_DOMAIN)
		);
		$translation_array1 = array(
			'Coll_apse'             => __('Collapse',SFSI_PLUS_DOMAIN),
			'Save_All_Settings'     => __('Save All Settings',SFSI_PLUS_DOMAIN),
			'Upload_a'    			=> __('Upload a custom icon if you have other accounts/websites you want to link to.',SFSI_PLUS_DOMAIN),
			'It_depends'     		=> __('It depends',SFSI_PLUS_DOMAIN)
		);
		
		wp_localize_script( 'SFSIPLUSCustomJs', 'object_name', $translation_array );
		wp_localize_script( 'SFSIPLUSCustomJs', 'object_name1', $translation_array1 );
		wp_enqueue_script("SFSIPLUSCustomJs");
		
		wp_register_script('SFSIPLUSCustomValidateJs', SFSI_PLUS_PLUGURL . 'js/customValidate-min.js', '', '', true);
		wp_enqueue_script("SFSIPLUSCustomValidateJs");
		/* end cusotm js */
		
		/* initilaize the ajax url in javascript */
		wp_localize_script( 'SFSIPLUSCustomJs', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		wp_localize_script( 'SFSIPLUSCustomJs', 'wp_upload_dir_object', wp_upload_dir() );

		wp_localize_script( 'SFSIPLUSCustomValidateJs', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'plugin_url'=> SFSI_PLUS_PLUGURL) );
	}
}
add_action( 'admin_enqueue_scripts', 'sfsiplus_plugin_back_enqueue_script' );

function sfsiplus_plugin_front_enqueue_script()
{
	if(sfsi_is_icons_showing_on_front() && false!= License_Manager::validate_license()){
		
		wp_enqueue_style("SFSIPLUSmainCss", SFSI_PLUS_PLUGURL . 'css/sfsi-style.css' );
		
		$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
		
		if($option5['sfsi_plus_disable_floaticons'] == 'yes')
		{
			wp_enqueue_style("disable_sfsiplus", SFSI_PLUS_PLUGURL . 'css/disable_sfsi.css' );
		}
		
		$sfsi_plus_loadjquery  = isset($option5['sfsi_plus_loadjquery']) && !empty($option5['sfsi_plus_loadjquery']) ? sanitize_text_field($option5['sfsi_plus_loadjquery']): "yes";

		if("yes" == $sfsi_plus_loadjquery){
			wp_enqueue_script('jquery');
	 		wp_enqueue_script("jquery-migrate");			
		}
		
		wp_enqueue_script('jquery-ui-core');	
		
		wp_register_script('SFSIPLUSjqueryModernizr', SFSI_PLUS_PLUGURL . 'js/shuffle/modernizr.custom.min.js', '','',true);
		wp_enqueue_script("SFSIPLUSjqueryModernizr");
		
		wp_register_script('SFSIPLUSjqueryShuffle', SFSI_PLUS_PLUGURL . 'js/shuffle/jquery.shuffle.min.js', '','',true);
		wp_enqueue_script("SFSIPLUSjqueryShuffle");
		
		wp_register_script('SFSIPLUSjqueryrandom-shuffle', SFSI_PLUS_PLUGURL . 'js/shuffle/random-shuffle-min.js', '','',true);
		wp_enqueue_script("SFSIPLUSjqueryrandom-shuffle");
		
		wp_register_script('SFSIPLUSCustomJs', SFSI_PLUS_PLUGURL . 'js/custom.js', '', '', true);
		wp_enqueue_script("SFSIPLUSCustomJs");
		/* end cusotm js */

		/* initilaize the ajax url in javascript */
		wp_localize_script( 'SFSIPLUSCustomJs', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'plugin_url'=> SFSI_PLUS_PLUGURL) );
	}
}
add_action( 'wp_enqueue_scripts', 'sfsiplus_plugin_front_enqueue_script' );

/* add all external javascript to wp_footer */        
function sfsi_plus_footer_script()
{
	$sfsi_section8 =  unserialize(get_option('sfsi_premium_section8_options',false));

	$arrIconPlacementSettingActive = sfsi_premium_is_icon_placement_active($sfsi_section8);

	if(!empty($arrIconPlacementSettingActive) && sfsi_is_icons_showing_on_front() && false!= License_Manager::validate_license()){

		$sfsi_section1 =  unserialize(get_option('sfsi_premium_section1_options',false));
		$sfsi_section2 =  unserialize(get_option('sfsi_premium_section2_options',false));
		$sfsi_section5 =  unserialize(get_option('sfsi_premium_section5_options',false));
		
		if(
			isset($sfsi_section5['sfsi_plus_icons_language']) &&
			!empty($sfsi_section5['sfsi_plus_icons_language'])
		)
		{
			$icons_language = $sfsi_section5['sfsi_plus_icons_language'];
		}
		else
		{
			$icons_language = "en_US";
		}

		if(!isset($sfsi_section8['sfsi_plus_show_item_onposts']))
		{
			$sfsi_section8['sfsi_plus_show_item_onposts'] = 'no';
		}		
		if(!isset($sfsi_section8['sfsi_plus_rectsub']))
		{
			$sfsi_section8['sfsi_plus_rectsub'] = 'no';
		}
		if(!isset($sfsi_section8['sfsi_plus_recttwtr']))
		{
			$sfsi_section8['sfsi_plus_recttwtr'] = 'no';
		}
		if(!isset($sfsi_section8['sfsi_plus_rectpinit']))
		{
			$sfsi_section8['sfsi_plus_rectpinit'] = 'no';
		}
		if(!isset($sfsi_section8['sfsi_plus_rectfbshare']))
		{
			$sfsi_section8['sfsi_plus_rectfbshare'] = 'no';
		}

		if(!isset($sfsi_section8['sfsi_plus_rectfb']))
		{
			$sfsi_section8['sfsi_plus_rectfb'] = 'yes';
		}
		if(!isset($sfsi_section8['sfsi_plus_rectgp']))
		{
			$sfsi_section8['sfsi_plus_rectgp'] = 'yes';
		}
		if(!isset($sfsi_section8['sfsi_plus_rectshr']))
		{
			$sfsi_section8['sfsi_plus_rectshr'] = 'no';
		}

		$isBeforeAfterPostSettingActive = ("yes" == $sfsi_section8['sfsi_plus_show_item_onposts'])
		&& 
		(
			("yes" == $sfsi_section8['sfsi_plus_display_before_posts']) 	|| 
			("yes" == $sfsi_section8['sfsi_plus_display_after_posts'])  	|| 
			("yes" == $sfsi_section8['sfsi_plus_display_before_blogposts']) ||
			("yes" == $sfsi_section8['sfsi_plus_display_after_blogposts'])  ||
			("yes" == $sfsi_section8['sfsi_plus_display_before_pageposts']) ||
			("yes" == $sfsi_section8['sfsi_plus_display_after_pageposts'])
		);

		$isRoundIconSettingActive = true;

		if(count($arrIconPlacementSettingActive)==1 && 4 == $arrIconPlacementSettingActive[0] ) {

			$isRoundIconSettingActive = $isBeforeAfterPostSettingActive && ("normal_button" == $sfsi_section8['sfsi_plus_display_button_type']); 			
		}

		$isRectangleIconSettingActive =  $isBeforeAfterPostSettingActive && ("standard_buttons" == $sfsi_section8['sfsi_plus_display_button_type']); 

		$isUsingDifferentIconsForMobile = "yes" == $sfsi_section1['sfsi_plus_icons_onmobile'];	

		// Facebook
		$isFbIconDisplayed = ("yes" == $sfsi_section1['sfsi_plus_facebook_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_facebook_mobiledisplay']);

		$isFbRoundIconLikeOrShareFeatureActive = ("yes" ==$sfsi_section2['sfsi_plus_facebookLike_option']) || ("yes" ==$sfsi_section2['sfsi_plus_facebookShare_option']);

		$isFbRectIconLikeOrShareFeatureActive = ("yes" ==$sfsi_section8['sfsi_plus_rectfb']) || ("yes" == $sfsi_section8['sfsi_plus_rectfbshare']);

		if(
			($isRoundIconSettingActive && $isFbIconDisplayed && $isFbRoundIconLikeOrShareFeatureActive)

			||	
				 		
			($isRectangleIconSettingActive && $isFbRectIconLikeOrShareFeatureActive ) 
					
		)
		{ 
			?>
			<!--facebook like and share js -->                   
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo $icons_language;?>/sdk.js#xfbml=1&version=v3.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		<?php
		}
		
		// Google & Youtube
		$isGplusIconDisplayed = ("yes" == $sfsi_section1['sfsi_plus_google_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_google_mobiledisplay']);

		$isGplusLikeOrShareOrFollowFeatureActive = ("yes" ==$sfsi_section2['sfsi_plus_googleLike_option']) || ("yes" ==$sfsi_section2['sfsi_plus_googleShare_option']) || ("yes" == $sfsi_section2['sfsi_plus_googleFollow_option']);

		$isGplusRectFeatureActive = $isRectangleIconSettingActive && ("yes" == $sfsi_section8['sfsi_plus_rectgp']);

		$isYoutubeIconDisplayed = ("yes" == $sfsi_section1['sfsi_plus_youtube_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_youtube_mobiledisplay']);

		$isYoutubeFollowFeatureActive = ("yes" == $sfsi_section2['sfsi_plus_youtube_follow']) && 
		
		(isset($sfsi_section2['sfsi_plus_youtubeusernameorid']) && !empty($sfsi_section2['sfsi_plus_youtubeusernameorid']) ) && 	 		
		
		( "name" == $sfsi_section2['sfsi_plus_youtubeusernameorid'] && isset($sfsi_section2['sfsi_plus_ytube_user']) && !empty($sfsi_section2['sfsi_plus_ytube_user']) ) 
		||
		
		("id" == $sfsi_section2['sfsi_plus_youtubeusernameorid'] && isset($sfsi_section2['sfsi_plus_ytube_chnlid']) && !empty($sfsi_section2['sfsi_plus_ytube_chnlid']) ) ;

		if(
			($isRoundIconSettingActive && $isGplusIconDisplayed && $isGplusLikeOrShareOrFollowFeatureActive )
			||
			($isYoutubeIconDisplayed && $isYoutubeFollowFeatureActive) ||

			$isGplusRectFeatureActive
		)
		{ 
			?>
			<!--google share and  like and e js -->
			<script type="text/javascript">
				window.___gcfg = {
				  lang: '<?php echo $icons_language;?>',
				  parsetags: 'onload'
				};
				(function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';po.defer = true;
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				})();
			</script>
		
	        <!-- google share -->
	        <script type="text/javascript">
	            (function() {
	                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	                po.src = 'https://apis.google.com/js/platform.js';po.defer = true;
	                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	            })();
	        </script>
	        <?php
		}

		// LinkedIn
		$isLinkedInDisplayed = ("yes" == $sfsi_section1['sfsi_plus_linkedin_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_linkedin_mobiledisplay']);

		$isLinkedInRectDisplayed = $isRectangleIconSettingActive && ("yes" == $sfsi_section8['sfsi_plus_rectlinkedin']);

		$isLinkedInFollowFeatureActive = (isset($sfsi_section2['sfsi_plus_linkedin_follow']) && !empty($sfsi_section2['sfsi_plus_linkedin_follow']) && ("yes" == $sfsi_section2['sfsi_plus_linkedin_follow'])
		&& isset($sfsi_section2['sfsi_plus_linkedin_followCompany']) && !empty($sfsi_section2['sfsi_plus_linkedin_followCompany']));

		$isLinkedInShareFeatureActive = (isset($sfsi_section2['sfsi_plus_linkedin_SharePage']) && !empty($sfsi_section2['sfsi_plus_linkedin_SharePage']) && ("yes" == $sfsi_section2['sfsi_plus_linkedin_SharePage']));

		$isLinkedInRecommnedFeatureActive = (isset($sfsi_section2['sfsi_plus_linkedin_recommendBusines']) && !empty($sfsi_section2['sfsi_plus_linkedin_recommendBusines']) && ("yes" == $sfsi_section2['sfsi_plus_linkedin_recommendBusines']) 
			&& isset($sfsi_section2['sfsi_plus_linkedin_recommendProductId']) && !empty($sfsi_section2['sfsi_plus_linkedin_recommendProductId'])
			&& isset($sfsi_section2['sfsi_plus_linkedin_recommendCompany']) && !empty($sfsi_section2['sfsi_plus_linkedin_recommendCompany']));

		if( 
			(
				$isRoundIconSettingActive && $isLinkedInDisplayed && ($isLinkedInFollowFeatureActive || $isLinkedInShareFeatureActive || $isLinkedInRecommnedFeatureActive) 
			)

			|| $isLinkedInRectDisplayed
		)
		{ 
			if($icons_language == 'ar_AR')
			{
				$icons_language = 'ar_AE';
			}
			?>	
	        <!-- linkedIn share and  follow js -->
	        <script src="//platform.linkedin.com/in.js" type="text/javascript">lang: <?php echo $icons_language;?></script>

			<?php
		}
		
		// Addthis Share
		$isAddthisShareDisplayed = ("yes" == $sfsi_section1['sfsi_plus_share_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_share_mobiledisplay']);

		$isAddthisRectDisplayed = $isRectangleIconSettingActive && ("yes" == $sfsi_section8['sfsi_plus_rectshr']);

		if($isAddthisShareDisplayed || $isAddthisRectDisplayed) { ?>		

			<!-- Addthis js -->
	        <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-558ac14e7f79bff7"></script>

			<?php
		}

		$isPinterestDisplayed = ("yes" == $sfsi_section1['sfsi_plus_pinterest_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_pinterest_mobiledisplay']);

		$isPinterestRectDisplayed = $isRectangleIconSettingActive && ("yes" == $sfsi_section8['sfsi_plus_rectpinit']);

		$isPinterestFeatureActive = (isset($sfsi_section2['sfsi_plus_pinterest_pingBlog']) && !empty($sfsi_section2['sfsi_plus_pinterest_pingBlog']) && ("yes" == $sfsi_section2['sfsi_plus_pinterest_pingBlog']));

		if(	
			($isRoundIconSettingActive && $isPinterestDisplayed && $isPinterestFeatureActive) || $isPinterestRectDisplayed
		) 

		{ ?>

			<!--pinit js -->		
			<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

		<?php
		}

		$isTwitterDisplayed = ("yes" == $sfsi_section1['sfsi_plus_twitter_display']) || 		
			($isUsingDifferentIconsForMobile && "yes" ==$sfsi_section1['sfsi_plus_twitter_mobiledisplay']);

		$isTwitterFeatureActive = (isset($sfsi_section2['sfsi_plus_twitter_aboutPage']) && !empty($sfsi_section2['sfsi_plus_twitter_aboutPage']) && ("yes" == $sfsi_section2['sfsi_plus_twitter_aboutPage']));

		$isTwitterRectDisplayed = $isRectangleIconSettingActive && ("yes" == $sfsi_section8['sfsi_plus_recttwtr']);

		if( ($isRoundIconSettingActive && $isTwitterDisplayed && $isTwitterFeatureActive) || $isTwitterRectDisplayed ) { ?>
			
			<!-- twitter JS End -->
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	
		<?php
		}
		
		/* activate footer credit link */
		if(get_option('sfsi_premium_footer_sec')=="yes")
		{
		    if(!is_admin())
		    {
	            $footer_link='<div class="sfsiplus_footerLnk" style="margin: 0 auto;z-index:1000; absolute; text-align: center;">Social media & sharing icons powered by  <a href="https://www.ultimatelysocial.com/" target="_new">UltimatelySocial</a> ';
		    	$footer_link.="</div>";
		    	echo $footer_link;
		    }
		}    

		if(!wp_is_mobile()){ ?>

			<script type="text/javascript">

			// Code to show flip effect on mouseover of icon STARTS //
			(function ($) {

				$(document).ready(function(){

				    var allIcons = $(".sfsiplus_inerCnt");

				    $.each( allIcons, function( i, elem ) {
				        
				        var currElem = $(elem);

				        var othericoneffect = currElem.attr("data-othericoneffect");

				        if("string" === typeof othericoneffect && othericoneffect.length>0)
				        {

				            var backElem = currElem.find('.sciconback');

				            if(backElem.length==1){

				                switch(othericoneffect){

				                    case "noeffect":

				                        var frontElem = currElem.find('.sciconfront');
				                        
				                        currElem.hover(function(){

				                            if(frontElem.hasClass("sfsihide")){
				                                frontElem.removeClass("sfsihide").addClass('sfsishow');
				                                backElem.removeClass("sfsishow").addClass('sfsihide');
				                            }
				                           else if(frontElem.hasClass("sfsishow")){
				                                frontElem.removeClass("sfsishow").addClass('sfsihide');
				                                backElem.removeClass("sfsihide").addClass('sfsishow');
				                            }                            

				                        });

				                    break;

				                    case "flip":

				                        currElem.hover(function(){
				                            $(this).trigger("click");
				                        });

				                        var frontElem = currElem.find('.sciconfront');

				                        currElem.flip({

				                          axis    : 'x',
				                          trigger : 'click',
				                          reverse : true,
				                          front   : frontElem,
				                          back    : backElem,
				                          autoSize: true
				                        },function(){

				                            //alert("asd");

				                        });               
				                    
				                    break;

				                }

				            }

				        }

				    });

				});

			})(jQuery);

			// Code to show flip effect on mouseover of icon STARTS //
			</script>

	    <?php } 
	
	}
}

/* update footer for frontend and admin both */ 
if(!is_admin())
{
	if(false != sfsi_is_icons_showing_on_front()){		 
		global $post;
		add_action('wp_footer','sfsi_plus_footer_script' );	
		add_action('wp_footer','sfsi_plus_check_PopUp');
		add_action('wp_footer','sfsi_plus_frontFloter');		
	}	 	     
}
		 				    
if(is_admin() && isset($_GET['page']) && 'sfsi-plus-options' == $_GET['page'])
{
	//add_action('in_admin_footer', 'sfsi_plus_footer_script');	
}

?>