<?php
/*Plugin version setup*/
$oldVersion = get_option('sfsi_premium_pluginVersion',false);

if(false == $oldVersion || sfsi_premium_version_compare($oldVersion, PLUGIN_CURRENT_VERSION, '<')){

	add_action("init", "sfsi_plus_update_plugin");
}


//Get verification code
if(is_admin())
{	
	$code 		= sanitize_text_field(get_option('sfsi_premium_verificatiom_code'));
	$feed_id 	= sanitize_text_field(get_option('sfsi_premium_feed_id'));
	
	if(empty($code) && !empty($feed_id))
	{
		add_action("init", "sfsi_plus_getverification_code");
	}
}

function sfsi_plus_getverification_code()
{
	$feed_id = sanitize_text_field(get_option('sfsi_premium_feed_id'));
	$curl = curl_init();  
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/getVerifiedCode_plugin',
        CURLOPT_USERAGENT => 'sf get verification',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'feed_id' => $feed_id
        )
    ));
    
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	$resp = json_decode($resp);
	update_option('sfsi_premium_verificatiom_code', $resp->code);
	curl_close($curl);
}