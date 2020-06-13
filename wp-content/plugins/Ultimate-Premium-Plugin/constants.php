<?php 

define('SFSI_PLUS_DOCROOT', dirname(__FILE__));

$scheme = (is_ssl() || (stripos(get_option('siteurl'), 'https://') === 0) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' == $_SERVER['HTTP_X_FORWARDED_PROTO']) ) ? "https" : "http";

$plugurl = ("https" === $scheme) ? str_replace('http://', 'https://', plugin_dir_url(__FILE__)) : plugin_dir_url(__FILE__);

define('SFSI_PLUS_PLUGURL',    $plugurl);
define('SFSI_PLUS_WEBROOT',    str_replace(getcwd(), home_url(), dirname(__FILE__)));
define('SFSI_PLUS_PLUGINFILE', plugin_basename( __FILE__ ));
define('SFSI_PLUS_DOMAIN',	   'usm-premium-icons');
define('SFSI_PLUS_LICENSING',  SFSI_PLUS_DOCROOT.'/libs/controllers/admin/licensing/');

$wp_upload_dir = wp_upload_dir();
define('SFSI_PLUS_UPLOAD_DIR_BASEURL', trailingslashit($wp_upload_dir['baseurl']));

define('ULTIMATELYSOCIAL_LICENSING',"ultimate");
define('ULTIMATELYSOCIAL_API_URL',"https://www.ultimatelysocial.com");
define('ULTIMATELYSOCIAL_PRODUCT',"USM Premium Plugin");

define('SELLCODES_LICENSING',"sellcodes_usm");
define('SELLCODES_API_URL',"https://api.sellcodes.com/v1/licenses");
define('SELLCODES_PRODUCT',"XdHlrQnc");

define('SITEURL',home_url());
define('PLUGIN_CURRENT_VERSION',"10.1");
define('PLUGIN_ADMIN_SETTING_PAGE','sfsi-license');

define('SFSI_PLUS_ALLICONS',serialize(array("rss","email","facebook","twitter","google","share","youtube","pinterest","instagram","houzz","snapchat","whatsapp","skype","vimeo","soundcloud","yummly","flickr","reddit","tumblr","linkedin")));