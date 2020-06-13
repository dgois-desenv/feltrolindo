<?php
/////////////////////////////////////// ADMIN VIEW HELPER FUNCTIONS ///////////////////////////////////////////

if(!function_exists('sfsi_shallDisplayIcon')){

    function sfsi_shallDisplayIcon($iconName,$isDesktop=true,$option1=false){

        $display = false;

        if(isset($iconName) && !empty($iconName)){
    
            $option1  =  false != $option1 ? $option1: unserialize(get_option('sfsi_premium_section1_options',false)); 

            if("fb" == $iconName){
                $iconName = "facebook";
            }

            $key      = false != $isDesktop ? 'sfsi_plus_'.$iconName.'_display': 'sfsi_plus_'.$iconName.'_mobiledisplay';
            $display  = isset($option1[$key]) && !empty($option1[$key]) && "yes" == $option1[$key] ? true : false;

        }

        return $display;
    }
}  

if(!function_exists('sfsi_shallDisplayCustomIconOnMobile')){

    function sfsi_shallDisplayCustomIconOnMobile($customElementIndex,$option1=false){

        $display = false;
    
        $option1  =  false != $option1 ? $option1: unserialize(get_option('sfsi_premium_section1_options',false)); 

        $customMIcons = isset($option1['sfsi_custom_mobile_icons'])  && !empty($option1['sfsi_custom_mobile_icons']) ? unserialize($option1['sfsi_custom_mobile_icons']) : false;

        $display = false != $customMIcons ? in_array($customMIcons[$customElementIndex],$customMIcons) : false;

        return $display;
    }
}  

if(!function_exists('sfsi_getOldDesktopIconOrder')){

    function sfsi_getOldDesktopIconOrder($iconName,$defaultIndex,$option5){

        $oldOrder = $defaultIndex;

        if(isset($iconName) && !empty($iconName)){

            $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));

            $key = ("fb"== $iconName) ? 'sfsi_plus_facebookIcon_order': 'sfsi_plus_'.$iconName.'Icon_order';

            $oldOrder = isset($option5[$key]) && !empty($option5[$key]) ? intval($option5[$key]) : $defaultIndex;

        }

        return $oldOrder;
    }
}

if(!function_exists('sfsi_premium_admin_default_icons_order')){

    function sfsi_premium_admin_default_icons_order($option1=false,$isDesktop=true){

        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
        
        $arrDefaultIconsOrder = array(

        array("iconName" => "rss",       "index"  => 1),
        array("iconName" => "email",     "index"  => 2), 
        array("iconName" => "fb",        "index"  => 3),
        array("iconName" => "google" ,   "index"  => 4),
        array("iconName" => "twitter" ,  "index"  => 5),
        array("iconName" => "share"   ,  "index"  => 6),
        array("iconName" => "youtube"  , "index"  => 7),
        array("iconName" => "pinterest", "index"  => 8),
        array("iconName" => "linkedin" , "index"  => 9),
        array("iconName" => "instagram", "index"  => 10),
        array("iconName" => "houzz"    , "index"  => 11),
        array("iconName" => "snapchat" , "index"  => 12),
        array("iconName" => "whatsapp" , "index"  => 13),
        array("iconName" => "skype"    , "index"  => 14),
        array("iconName" => "vimeo"    , "index"  => 15),
        array("iconName" => "soundcloud","index"  => 16),
        array("iconName" => "yummly"  ,  "index"  => 17),
        array("iconName" => "flickr"  ,  "index"  => 18),
        array("iconName" => "reddit"  ,  "index"  => 19),
        array("iconName" => "tumblr"  ,  "index"  => 20)
      
      );

      return $arrDefaultIconsOrder;

    }
}  

if(!function_exists('sfsi_premium_desktop_icons_order')){

    function sfsi_premium_desktop_icons_order($option5=false,$option1=false){

        $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));
        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));

        $customIcons   = array();
        $customDIcons  = array();

        // Get all custom icons

        if(isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files']) ){

            $sfsi_custom_files = $option1['sfsi_custom_files'];

            if( is_string($sfsi_custom_files) ){
                $customIcons = unserialize($sfsi_custom_files);
            }

            else if( is_array($sfsi_custom_files) ){
                $customIcons = $sfsi_custom_files;
            }
        } 

        $customIcons = array_filter($customIcons);

        // Get active custom icons for desktop
        if( isset($option1['sfsi_custom_desktop_icons'])  && !empty($option1['sfsi_custom_desktop_icons']) ){

            $sfsi_custom_desktop_icons = $option1['sfsi_custom_desktop_icons'];

            if( is_array($sfsi_custom_desktop_icons) ){
                $customDIcons = $sfsi_custom_desktop_icons;
            }
        
            else if( is_string($sfsi_custom_desktop_icons) ){
                $customDIcons = unserialize($sfsi_custom_desktop_icons);
            }

        } 

        $customDIcons = array_filter($customDIcons);

        $desktopIconOrder   = array();

        if(isset($option5['sfsi_order_icons_desktop'])  && !empty($option5['sfsi_order_icons_desktop']) ){

            $sfsi_order_icons_desktop = $option5['sfsi_order_icons_desktop'];

            if( is_string($sfsi_order_icons_desktop) ){
                $desktopIconOrder = unserialize($sfsi_order_icons_desktop);
            }

            else if( is_array($sfsi_order_icons_desktop) ){
                $desktopIconOrder = $sfsi_order_icons_desktop;
            }
        } 

        if(isset($desktopIconOrder) && !empty($desktopIconOrder)){

            $arrSavedOrderForDCustomIcons = array_column($desktopIconOrder, 'customElementIndex');

                if(isset($customIcons) && !empty($customIcons)){

                    foreach ($customIcons as $key => $value) {

                        if(!empty($arrSavedOrderForDCustomIcons) && !in_array($key,$arrSavedOrderForDCustomIcons)){ 
                        
                            if(!empty($customDIcons) && isset($customDIcons[$key]) && !empty($customDIcons[$key]) 
                                && $customDIcons[$key] == $value){
                                $iconData = array();
                                $iconData['iconName']           = 'custom';
                                $iconData['index']              = count($desktopIconOrder)+1;
                                $iconData['customElementIndex'] = $key;
                                $desktopIconOrder[] = $iconData;
                            }
                        }
                    }
                }

            array_multisort(array_column($desktopIconOrder, 'index'), SORT_ASC, $desktopIconOrder);

        }

        else{

            $desktopIconOrder = sfsi_premium_admin_default_icons_order($option1);

            if(isset($customIcons) && !empty($customIcons)){

                foreach ($customIcons as $key => $value) {
                    
                    $iconData = array();

                    $iconData['iconName']           = 'custom';
                    $iconData['index']              = count($desktopIconOrder)+1;
                    $iconData['customElementIndex'] = $key;

                    $desktopIconOrder[] = $iconData;

                }

            }

            array_multisort(array_column($desktopIconOrder, 'index'), SORT_ASC, $desktopIconOrder);            
        }

        return $desktopIconOrder;

    }
}   

if(!function_exists('sfsi_premium_mobile_icons_order')){

    function sfsi_premium_mobile_icons_order($option5=false,$option1=false,$returnCustomOrder=true){

        $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));
        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
       
        $customMIcons   = array();

        // Get active custom icons for mobile
        if( isset($option1['sfsi_custom_mobile_icons'])  && !empty($option1['sfsi_custom_mobile_icons']) ){

            $sfsi_custom_mobile_icons = $option1['sfsi_custom_mobile_icons'];

            if( is_array($sfsi_custom_mobile_icons) ){
                $customMIcons = $sfsi_custom_mobile_icons;
            }
        
            else if( is_string($sfsi_custom_mobile_icons) ){
                $customMIcons = unserialize($sfsi_custom_mobile_icons);
            }

        } 

        $customMIcons = array_filter($customMIcons);

        $mobileIconOrder = array();
        
        // Get saved custom order of icons        
        if(isset($option5['sfsi_order_icons_mobile'])  && !empty($option5['sfsi_order_icons_mobile']) ){

            $sfsi_order_icons_mobile = $option5['sfsi_order_icons_mobile'];

            if( is_array($sfsi_order_icons_mobile) ){
                $mobileIconOrder = $sfsi_order_icons_mobile;
            }

            else if( is_string($sfsi_order_icons_mobile) ) {
                $mobileIconOrder = unserialize($sfsi_order_icons_mobile);
            }

        }

        if(false != $returnCustomOrder && isset($mobileIconOrder) && !empty($mobileIconOrder)){

            array_multisort(array_column($mobileIconOrder, 'index'), SORT_ASC, $mobileIconOrder);

        }
        // Get saved default order of icons        
        else{

            $mobileIconOrder = sfsi_premium_admin_default_icons_order($option1,false);

            if(isset($customMIcons) && !empty($customMIcons)){

                foreach ($customMIcons as $key => $value) {
                    
                    $iconData = array();

                    $iconData['iconName']           = 'custom';
                    $iconData['index']              = count($mobileIconOrder)+1;
                    $iconData['customElementIndex'] = $key;

                    $mobileIconOrder[] = $iconData;

                }

            }

            array_multisort(array_column($mobileIconOrder, 'index'), SORT_ASC, $mobileIconOrder);  
        }

        return $mobileIconOrder;

    }
} 

if(!function_exists('sfsi_premium_get_icons_order')){

    function sfsi_premium_get_icons_order($option5=false,$option1=false){

        $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));
        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));

        // Question 6 setting
        $isSetDifferentOrderForMobile = "no";

        if(isset($option5['sfsi_plus_mobile_icons_order_setting']) && !empty($option5['sfsi_plus_mobile_icons_order_setting']))
        {       
          $isSetDifferentOrderForMobile = $option5['sfsi_plus_mobile_icons_order_setting'];
        }

        // Question 1 setting
        $isSetDifferentIconsForMobile = "no";

        if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
        {       
          $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
        }

        $arrOrderIcons = array();

        // Default load Desktop icons
        if(wp_is_mobile()){

            if("no" == $isSetDifferentOrderForMobile) 
            {
                switch ($isSetDifferentIconsForMobile) {
                    
                    case 'yes':
                        // Load default icons order of mobile icons 
                        $arrOrderIcons = sfsi_premium_mobile_icons_order($option5,$option1,false);                   
                    
                    break;
                    
                    case 'no':
                        // Load selected icons order of desktop icons 
                        $arrOrderIcons = sfsi_premium_desktop_icons_order($option5,$option1);
                    break;
                }
            }

            // Loading different icons for mobile
            else
            {
                $arrOrderIcons = sfsi_premium_mobile_icons_order($option5,$option1);
            }

        }

        else{
            
            $arrOrderIcons = sfsi_premium_desktop_icons_order($option5,$option1);            
        }

        return $arrOrderIcons;
         
    }
}

if(!function_exists('sfsi_premium_get_icons_html')){

    function sfsi_premium_get_icons_html($arrOrderIcons,$option1=false,$addLiMarkup=false,$is_front=0){

        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
        $option5 = unserialize(get_option('sfsi_premium_section5_options',false));

        $isSetDifferentIconsForMobile = "no";

        if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
        {       
          $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
        }

        $isSetDifferentOrderForMobile = "no";

        if(isset($option5['sfsi_plus_mobile_icons_order_setting']) && !empty($option5['sfsi_plus_mobile_icons_order_setting']))
        {       
          $isSetDifferentOrderForMobile = $option5['sfsi_plus_mobile_icons_order_setting'];
        }

        $icons      = "";
        $iconsCount = 0;

        if( !empty($arrOrderIcons) ){

            foreach($arrOrderIcons  as $index => $icn):

                if(!empty($icn['index'])):                                        

                    $iconName = $icn['iconName'];

                    if("fb" == $iconName){
                        $iconName = "facebook";
                    }

                    elseif("custom" == $iconName){
                        $iconName = intval($icn['customElementIndex']);             
                    }           

                    $iconsHtml = "";
                        
                    if(!is_int($iconName)){

                         if(wp_is_mobile()){

                            switch ($isSetDifferentIconsForMobile) {

                                case 'yes':
                                    
                                    if("yes" == $option1['sfsi_plus_'.$iconName.'_mobiledisplay']){
                                        $iconsHtml  = sfsi_plus_prepairIcons($iconName,$is_front);
                                        $iconsCount = $iconsCount + 1;
                                    }

                                break;
                                
                                case 'no':
                                    
                                    if("yes" == $option1['sfsi_plus_'.$iconName.'_display']){
                                        $iconsHtml= sfsi_plus_prepairIcons($iconName,$is_front);
                                        $iconsCount = $iconsCount + 1;        
                                    }

                                break;
                            }
                         }

                         else{

                                if("yes" == $option1['sfsi_plus_'.$iconName.'_display']){
                                    $iconsHtml= sfsi_plus_prepairIcons($iconName,$is_front);
                                    $iconsCount = $iconsCount + 1;        
                                }
                         }

                    }
                    // Custom icons
                    else{                    
                        $iconsHtml = sfsi_plus_prepairIcons($iconName,$is_front);
                        $iconsCount = $iconsCount + 1;
                    }

                    if(!empty($iconsHtml)){
                        $icons.= (false != $addLiMarkup) ? "<li>".$iconsHtml."</li>" : $iconsHtml;                    
                    }

                endif;

            endforeach;
        }

        return array("count" => $iconsCount, "html" => $icons);
        //return $icons;        
    }
}

if(!function_exists('sfsi_premium_is_any_standard_icon_selected')){

    function sfsi_premium_is_any_standard_icon_selected(){

        $option1       = unserialize(get_option('sfsi_premium_section1_options',false));
        $sfsi_section5 = unserialize(get_option('sfsi_premium_section5_options',false));  

        $custom_i      = array();

        $isSetDifferentIconsForMobile = "no";

        if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
        {       
          $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
        }

        if(isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files'])){
            $custom_i   = unserialize($option1['sfsi_custom_files']);
            $custom_i   = is_array($custom_i) ? $custom_i : array();
        }
    
        $arrIcons = array("rss","email","facebook","twitter","google","share","youtube","pinterest","instagram","houzz","snapchat","whatsapp","skype","vimeo","soundcloud","yummly","flickr","reddit","tumblr","linkedin");

        $is_any_standard_icon_selected = false;

        foreach ($arrIcons as $iconName):

            $keyName = wp_is_mobile() && "yes" == $isSetDifferentIconsForMobile ? 'sfsi_plus_'.$iconName.'_mobiledisplay' : 'sfsi_plus_'.$iconName.'_display';

            $cond = isset($option1[$keyName]) && !empty($option1[$keyName]) && "yes" == $option1[$keyName];

            if($cond){
                
                $is_any_standard_icon_selected = true;
                break;
            }

        endforeach;


        if(!empty($custom_i)){
            $is_any_standard_icon_selected = true;
        }

        return $is_any_standard_icon_selected;
    }
}
?>