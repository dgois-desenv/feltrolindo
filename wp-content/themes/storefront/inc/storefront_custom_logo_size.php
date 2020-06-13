<?php

// Add this to your theme's functions.php 
function marce_change_custom_logo_size() {
 	add_theme_support( 'custom-logo', array(
 		'height'      => 400,
 		'width'       => 400,
 		'flex-width' => true,
 	) );
 }
 add_action( 'after_setup_theme', 'marce_change_custom_logo_size', 30 );
