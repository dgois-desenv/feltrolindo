<?php
     $option5 =  unserialize(get_option('sfsi_premium_section5_options',false)); 

     // Fetch all saved data
    $sfsi_plus_icon_hover_show_pinterest=isset($option5['sfsi_plus_icon_hover_show_pinterest'])?$option5['sfsi_plus_icon_hover_show_pinterest']:'no';
    $sfsi_plus_icon_hover_type=isset($option5['sfsi_plus_icon_hover_type'])?$option5['sfsi_plus_icon_hover_type']:'square';
    $sfsi_plus_icon_hover_language=isset($option5['sfsi_plus_icon_hover_language'])?$option5['sfsi_plus_icon_hover_language']:'en_US';
    $sfsi_plus_icon_hover_placement=isset($option5['sfsi_plus_icon_hover_placement'])?$option5['sfsi_plus_icon_hover_placement']:'top-left';
    $sfsi_plus_icon_hover_width=isset($option5['sfsi_plus_icon_hover_width'])?$option5['sfsi_plus_icon_hover_width']:'20';
    $sfsi_plus_icon_hover_height=isset($option5['sfsi_plus_icon_hover_height'])?$option5['sfsi_plus_icon_hover_height']:'20';
    $sfsi_plus_icon_hover_desktop=isset($option5['sfsi_plus_icon_hover_desktop'])?$option5['sfsi_plus_icon_hover_desktop']:'no';
    $sfsi_plus_icon_hover_mobile=isset($option5['sfsi_plus_icon_hover_mobile'])?$option5['sfsi_plus_icon_hover_mobile']:'no';
    $sfsi_plus_icon_hover_on_all_pages=isset($option5['sfsi_plus_icon_hover_on_all_pages'])?$option5['sfsi_plus_icon_hover_on_all_pages']:'yes';
    

    $sfsi_plus_icon_hover_exclude_home=isset($option5['sfsi_plus_icon_hover_exclude_home'])?$option5['sfsi_plus_icon_hover_exclude_home']:'no';
    $sfsi_plus_icon_hover_exclude_page=isset($option5['sfsi_plus_icon_hover_exclude_page'])?$option5['sfsi_plus_icon_hover_exclude_page']:'no';
    $sfsi_plus_icon_hover_exclude_post=isset($option5['sfsi_plus_icon_hover_exclude_post'])?$option5['sfsi_plus_icon_hover_exclude_post']:'no';
    $sfsi_plus_icon_hover_exclude_tag=isset($option5['sfsi_plus_icon_hover_exclude_tag'])?$option5['sfsi_plus_icon_hover_exclude_tag']:'no';
    $sfsi_plus_icon_hover_exclude_category=isset($option5['sfsi_plus_icon_hover_exclude_category'])?$option5['sfsi_plus_icon_hover_exclude_category']:'no';
    $sfsi_plus_icon_hover_exclude_date_archive=isset($option5['sfsi_plus_icon_hover_exclude_date_archive'])?$option5['sfsi_plus_icon_hover_exclude_date_archive']:'no';
    $sfsi_plus_icon_hover_exclude_author_archive=isset($option5['sfsi_plus_icon_hover_exclude_author_archive'])?$option5['sfsi_plus_icon_hover_exclude_author_archive']:'no';
    $sfsi_plus_icon_hover_exclude_search=isset($option5['sfsi_plus_icon_hover_exclude_search'])?$option5['sfsi_plus_icon_hover_exclude_search']:'no';
    $sfsi_plus_icon_hover_exclude_url=isset($option5['sfsi_plus_icon_hover_exclude_url'])?$option5['sfsi_plus_icon_hover_exclude_url']:'no';
    $sfsi_plus_icon_hover_urlKeywords=isset($option5['sfsi_plus_icon_hover_urlKeywords'])?$option5['sfsi_plus_icon_hover_urlKeywords']:array();
    $sfsi_plus_icon_hover_swtich_exclude_custom_post_types=isset($option5['sfsi_plus_icon_hover_swtich_exclude_custom_post_types'])?$option5['sfsi_plus_icon_hover_swtich_exclude_custom_post_types']:'no';
    $sfsi_plus_icon_hover_swtich_exclude_taxonomies=isset($option5['sfsi_plus_icon_hover_swtich_exclude_taxonomies'])?$option5['sfsi_plus_icon_hover_swtich_exclude_taxonomies']:'no';

    $sfsi_plus_icon_hover_include_home=isset($option5['sfsi_plus_icon_hover_include_home'])?$option5['sfsi_plus_icon_hover_include_home']:'no';
    $sfsi_plus_icon_hover_include_page=isset($option5['sfsi_plus_icon_hover_include_page'])?$option5['sfsi_plus_icon_hover_include_page']:'no';
    $sfsi_plus_icon_hover_include_post=isset($option5['sfsi_plus_icon_hover_include_post'])?$option5['sfsi_plus_icon_hover_include_post']:'no';
    $sfsi_plus_icon_hover_exlude_tag=isset($option5['sfsi_plus_icon_hover_exlude_tag'])?$option5['sfsi_plus_icon_hover_exlude_tag']:'no';
    $sfsi_plus_icon_hover_include_category=isset($option5['sfsi_plus_icon_hover_include_category'])?$option5['sfsi_plus_icon_hover_include_category']:'no';
    $sfsi_plus_icon_hover_include_date_archive=isset($option5['sfsi_plus_icon_hover_include_date_archive'])?$option5['sfsi_plus_icon_hover_include_date_archive']:'no';
    $sfsi_plus_icon_hover_include_author_archive=isset($option5['sfsi_plus_icon_hover_include_author_archive'])?$option5['sfsi_plus_icon_hover_include_author_archive']:'no';
    $sfsi_plus_icon_hover_include_search=isset($option5['sfsi_plus_icon_hover_include_search'])?$option5['sfsi_plus_icon_hover_include_search']:'no';
    $sfsi_plus_icon_hover_include_url=isset($option5['sfsi_plus_icon_hover_include_url'])?$option5['sfsi_plus_icon_hover_include_url']:'no';
    $sfsi_plus_icon_hover_urlKeywords=isset($option5['sfsi_plus_icon_hover_urlKeywords'])?$option5['sfsi_plus_icon_hover_urlKeywords']:array();
    $sfsi_plus_icon_hover_switch_include_custom_post_types=isset($option5['sfsi_plus_icon_hover_switch_include_custom_post_types'])?$option5['sfsi_plus_icon_hover_switch_include_custom_post_types']:'no';
    $sfsi_plus_icon_hover_swtich_include_taxonomies=isset($option5['sfsi_plus_icon_hover_swtich_include_taxonomies'])?$option5['sfsi_plus_icon_hover_swtich_include_taxonomies']:'no';

    if($sfsi_plus_icon_hover_show_pinterest==='no'){
        $sfsi_plus_icon_hover_type='no';
    }

    ?>


<div class="row sfsi_premium_on_hover" id="custom_social_on_hover">

    <div class="row noborder noMariginPaddintTop sfsi_custom_social_data_section_heading"><?php _e("Show a Pinterest icon on images on mouse-over", SFSI_PLUS_DOMAIN); ?></div>

    <div class="container-fluid">


        <div class="row noborder noMariginPaddintTop">
            <span class="sfsi_premium_"><?php _e('Show',SFSI_PLUS_DOMAIN);?></span>
            <select name="sfsi_plus_icon_hover_type" value="$sfsi_plus_icon_hover_type" class="sfsi_plus_img_on_hover_input" >
                <option value="no" <?php echo $sfsi_plus_icon_hover_type=="no"?'selected=selected':''?> ><?php _e('no',SFSI_PLUS_DOMAIN);?></option>
                <option value="small-rectangle" <?php echo $sfsi_plus_icon_hover_type=="small-rectangle"?'selected=selected':''?> ><?php _e('a small rectangle',SFSI_PLUS_DOMAIN);?></option>
                <option value="large-rectangle" <?php echo $sfsi_plus_icon_hover_type=="large-rectangle"?'selected=selected':''?> ><?php _e('a large rectangle',SFSI_PLUS_DOMAIN);?></option>
                <option value="square" <?php echo $sfsi_plus_icon_hover_type=="square"?'selected=selected':''?> ><?php _e('a square',SFSI_PLUS_DOMAIN);?></option>
            </select>
            <span class="sfsi_premium_icon"><?php _e(' Pinterest icon',SFSI_PLUS_DOMAIN);?></span>
            <span class="sfsi_premium_no_icon" style="<?php echo$sfsi_plus_icon_hover_type!=='no'?'display:none':''; ?>" ><?php _e('  on my images on mouse-over',SFSI_PLUS_DOMAIN);?></span>
            <span class="sfsi_premium_show_icon" style="<?php echo $sfsi_plus_icon_hover_type==='no'?'display:none':''; ?>" >
                <span class="sfsi_premium_icon_rectangle" style="<?php echo ($sfsi_plus_icon_hover_type==='small-rectangle' || $sfsi_plus_icon_hover_type==='large-rectangle' )?'':'display:none'; ?>"  >
                    <?php _e('in',SFSI_PLUS_DOMAIN);?>
                    <select name="sfsi_plus_icon_hover_language" id="sfsi_plus_icon_hover_language" class="language sfsi_plus_img_on_hover_input">
                        <option value="ar_AR" <?php echo ($sfsi_plus_icon_hover_language=='ar_AR') ?  'selected="selected"' : '' ;?>>
                            العربية 
                        </option>
                        <option value="az_AZ" <?php echo ($sfsi_plus_icon_hover_language=='az_AZ') ?  'selected="selected"' : '' ;?>>
                            Azərbaycan dili
                        </option>
                        <option value="af_ZA" <?php echo ($sfsi_plus_icon_hover_language=='af_ZA') ?  'selected="selected"' : '' ;?>>
                            Afrikaans
                        <option value="bg_BG" <?php echo ($sfsi_plus_icon_hover_language=='bg_BG') ?  'selected="selected"' : '' ;?>>
                            Български
                        </option>
                        <option value="ms_MY" <?php echo ($sfsi_plus_icon_hover_language=='ms_MY') ?  'selected="selected"' : '' ;?>>
                            Bahasa Melayu‎
                        </option>
                        <option value="bn_IN" <?php echo ($sfsi_plus_icon_hover_language=='bn_IN') ?  'selected="selected"' : '' ;?>>
                            বাংলা
                        </option>
                        <option value="bs_BA" <?php echo ($sfsi_plus_icon_hover_language=='bs_BA') ?  'selected="selected"' : '' ;?>>
                            Bosanski
                        </option>
                        <option value="ca_ES" <?php echo ($sfsi_plus_icon_hover_language=='ca_ES') ?  'selected="selected"' : '' ;?>>
                            Català
                        </option>
                        <option value="cy_GB" <?php echo ($sfsi_plus_icon_hover_language=='cy_GB') ?  'selected="selected"' : '' ;?>>
                            Cymraeg
                        </option>
                        <option value="da_DK" <?php echo ($sfsi_plus_icon_hover_language=='da_DK') ?  'selected="selected"' : '' ;?>>
                            Dansk
                        </option>
                        <option value="de_DE" <?php echo ($sfsi_plus_icon_hover_language=='de_DE') ?  'selected="selected"' : '' ;?>>
                            Deutsch
                        </option>
                        <option value="en_US" <?php echo ($sfsi_plus_icon_hover_language=='en_US') ?  'selected="selected"' : '' ;?>>
                            English (United States)
                        </option>
                        <option value="el_GR" <?php echo ($sfsi_plus_icon_hover_language=='el_GR') ?  'selected="selected"' : '' ;?>>
                            Ελληνικά
                        </option>
                        <option value="eo_EO" <?php echo ($sfsi_plus_icon_hover_language=='eo_EO') ?  'selected="selected"' : '' ;?>>
                            Esperanto
                        </option>
                        <option value="es_ES" <?php echo ($sfsi_plus_icon_hover_language=='es_ES') ?  'selected="selected"' : '' ;?>>
                            Español
                        </option>
                        <option value="et_EE" <?php echo ($sfsi_plus_icon_hover_language=='et_EE') ?  'selected="selected"' : '' ;?>>
                            Eesti
                        </option>
                        <option value="eu_ES" <?php echo ($sfsi_plus_icon_hover_language=='eu_ES') ?  'selected="selected"' : '' ;?>>
                            Euskara
                        </option>
                        <option value="fa_IR" <?php echo ($sfsi_plus_icon_hover_language=='fa_IR') ?  'selected="selected"' : '' ;?>>
                            فارسی
                        </option>
                        <option value="fi_FI" <?php echo ($sfsi_plus_icon_hover_language=='fi_FI') ?  'selected="selected"' : '' ;?>>
                            Suomi
                        </option>
                        <option value="fr_FR" <?php echo ($sfsi_plus_icon_hover_language=='fr_FR') ?  'selected="selected"' : '' ;?>>
                            Français
                        </option>
                        <option value="gl_ES" <?php echo ($sfsi_plus_icon_hover_language=='gl_ES') ?  'selected="selected"' : '' ;?>>
                            Galego
                        </option>
                        <option value="he_IL" <?php echo ($sfsi_plus_icon_hover_language=='he_IL') ?  'selected="selected"' : '' ;?>>
                            עִבְרִית
                        </option>
                        <option value="hi_IN" <?php echo ($sfsi_plus_icon_hover_language=='hi_IN') ?  'selected="selected"' : '' ;?>>
                            हिन्दी
                        </option>
                        <option value="hr_HR" <?php echo ($sfsi_plus_icon_hover_language=='hr_HR') ?  'selected="selected"' : '' ;?>>
                            Hrvatski
                        </option>
                        <option value="hu_HU" <?php echo ($sfsi_plus_icon_hover_language=='hu_HU') ?  'selected="selected"' : '' ;?>>
                            Magyar
                        </option>
                        <option value="hy_AM" <?php echo ($sfsi_plus_icon_hover_language=='hy_AM') ?  'selected="selected"' : '' ;?>>
                            Հայերեն
                        </option>
                        <option value="id_ID" <?php echo ($sfsi_plus_icon_hover_language=='id_ID') ?  'selected="selected"' : '' ;?>>
                            Bahasa Indonesia
                        </option>
                        <option value="is_IS" <?php echo ($sfsi_plus_icon_hover_language=='is_IS') ?  'selected="selected"' : '' ;?>>
                            Íslenska
                        </option>
                        <option value="it_IT" <?php echo ($sfsi_plus_icon_hover_language=='it_IT') ?  'selected="selected"' : '' ;?>>
                            Italiano
                        </option>
                        <option value="ja_JP" <?php echo ($sfsi_plus_icon_hover_language=='ja_JP') ?  'selected="selected"' : '' ;?>>
                            日本語
                        </option>
                        <option value="ko_KR" <?php echo ($sfsi_plus_icon_hover_language=='ko_KR') ?  'selected="selected"' : '' ;?>>
                            한국어
                        </option>
                        <option value="lt_LT" <?php echo ($sfsi_plus_icon_hover_language=='lt_LT') ?  'selected="selected"' : '' ;?>>
                            Lietuvių kalba
                        </option>
                        <option value="my_MM" <?php echo ($sfsi_plus_icon_hover_language=='my_MM') ?  'selected="selected"' : '' ;?>>
                            ဗမာစာ
                        </option>
                        <option value="nl_NL" <?php echo ($sfsi_plus_icon_hover_language=='nl_NL') ?  'selected="selected"' : '' ;?>>
                            Nederlands
                        </option>
                        <option value="nn_NO" <?php echo ($sfsi_plus_icon_hover_language=='nn_NO') ?  'selected="selected"' : '' ;?>>
                            Norsk nynorsk
                        </option>
                        <option value="pl_PL" <?php echo ($sfsi_plus_icon_hover_language=='pl_PL') ?  'selected="selected"' : '' ;?>>
                            Polski
                        </option>
                        <option value="ps_AF" <?php echo ($sfsi_plus_icon_hover_language=='ps_AF') ?  'selected="selected"' : '' ;?>>
                            پښتو
                        </option>
                        <option value="pt_BR" <?php echo ($sfsi_plus_icon_hover_language=='pt_BR') ?  'selected="selected"' : '' ;?>>
                            Português do Brasil
                        </option>
                        <option value="ro_RO" <?php echo ($sfsi_plus_icon_hover_language=='ro_RO') ?  'selected="selected"' : '' ;?>>
                            Română
                        </option>
                        <option value="ru_RU" <?php echo ($sfsi_plus_icon_hover_language=='ru_RU') ?  'selected="selected"' : '' ;?>>
                            Русский
                        </option>
                        <option value="sk_SK" <?php echo ($sfsi_plus_icon_hover_language=='sk_SK') ?  'selected="selected"' : '' ;?>>
                            Slovenčina
                        </option>
                        <option value="sl_SI" <?php echo ($sfsi_plus_icon_hover_language=='sl_SI') ?  'selected="selected"' : '' ;?>>
                            Slovenščina
                        </option>
                        <option value="sq_AL" <?php echo ($sfsi_plus_icon_hover_language=='sq_AL') ?  'selected="selected"' : '' ;?>>
                            Shqip
                        </option>
                        <option value="sr_RS" <?php echo ($sfsi_plus_icon_hover_language=='sr_RS') ?  'selected="selected"' : '' ;?>>
                            Српски језик
                        </option>
                        <option value="sv_SE" <?php echo ($sfsi_plus_icon_hover_language=='sv_SE') ?  'selected="selected"' : '' ;?>>
                            Svenska
                        </option>
                        <option value="th_TH" <?php echo ($sfsi_plus_icon_hover_language=='th_TH') ?  'selected="selected"' : '' ;?>>
                            ไทย
                        </option>
                        <option value="tl_PH" <?php echo ($sfsi_plus_icon_hover_language=='tl_PH') ?  'selected="selected"' : '' ;?>>
                            Tagalog
                        </option>
                        <option value="tr_TR" <?php echo ($sfsi_plus_icon_hover_language=='tr_TR') ?  'selected="selected"' : '' ;?>>
                            Türkçe
                        </option>
                        <option value="ug_CN" <?php echo ($sfsi_plus_icon_hover_language=='ug_CN') ?  'selected="selected"' : '' ;?>>
                            Uyƣurqə
                        </option>
                        <option value="uk_UA" <?php echo ($sfsi_plus_icon_hover_language=='uk_UA') ?  'selected="selected"' : '' ;?>>
                            Українська
                        </option>
                        <option value="vi_VN" <?php echo ($sfsi_plus_icon_hover_language=='vi_VN') ?  'selected="selected"' : '' ;?>>
                            Tiếng Việt
                        </option>
                        <option value="zh_CN" <?php echo ($sfsi_plus_icon_hover_language=='zh_CN') ?  'selected="selected"' : '' ;?>>
                            简体中文
                        </option>
                        <option value="cs_CZ" <?php echo ($sfsi_plus_icon_hover_language=='cs_CZ') ?  'selected="selected"' : '' ;?>>
                            Čeština
                        </option>
                        <option value="ur_PK" <?php echo ($sfsi_plus_icon_hover_language=='ur_PK') ?  'selected="selected"' : '' ;?>>
                            اردو‎
                        </option>
                    </select>
                </span>
                <?php _e('  on the ',SFSI_PLUS_DOMAIN);?>
                <select name="sfsi_plus_icon_hover_placement" class="sfsi_plus_img_on_hover_input" >
                    <option value="top-left" <?php echo $sfsi_plus_icon_hover_placement=="top-left"?'selected=selected':''?>  >top left</option>
                    <option value="top-right" <?php echo $sfsi_plus_icon_hover_placement=="top-right"?'selected=selected':''?>  >top right</option>
                    <option value="bottom-left"  <?php echo $sfsi_plus_icon_hover_placement=="bottom-left"?'selected=selected':''?>  >bottom left</option>
                    <option value="bottom-right" <?php echo $sfsi_plus_icon_hover_placement=="bottom-right"?'selected=selected':''?>  >bottom right</option>
                </select>
                <?php _e('  of my images',SFSI_PLUS_DOMAIN);?>
                <span class="sfsi_premium_square_icon"   >
                    <?php _e('  which are at least',SFSI_PLUS_DOMAIN);?>
                    <input type="number" name="sfsi_plus_icon_hover_width" class="sfsi_plus_img_on_hover_input number" value="<?php echo $sfsi_plus_icon_hover_width; ?>">
                    <?php _e('  pixels high and ',SFSI_PLUS_DOMAIN);?>
                    <input type="number" name="sfsi_plus_icon_hover_height" class="sfsi_plus_img_on_hover_input number" value="<?php echo $sfsi_plus_icon_hover_height; ?>">
                    <?php _e('  pixels wide',SFSI_PLUS_DOMAIN);?>
                </span>
            </span>.
            <br>
            <div class="sfsi_premium_show_icon" style="<?php echo $sfsi_plus_icon_hover_type==='no'?'display:none':''; ?>" >
                <span><?php _e('Show it on',SFSI_PLUS_DOMAIN) ?></span>
                <select name="sfsi_plus_icon_hover_device" class="sfsi_plus_img_on_hover_input">
                    <!-- <option value="no" <?php echo (($sfsi_plus_icon_hover_desktop==='no')&&($sfsi_plus_icon_hover_mobile==='no'))?'selected=selected':''; ?> >No</option> -->
                    <option value="desktop" <?php echo (($sfsi_plus_icon_hover_desktop==='yes')&&($sfsi_plus_icon_hover_mobile==='no'))?'selected=selected':''; ?> >Desktop</option>
                    <option value="mobile" <?php echo (($sfsi_plus_icon_hover_desktop==='no')&&($sfsi_plus_icon_hover_mobile==='yes'))?'selected=selected':''; ?> >Mobile</option>
                    <option value="mobile-desktop" <?php echo (($sfsi_plus_icon_hover_desktop==='yes')&&($sfsi_plus_icon_hover_mobile==='yes'))?'selected=selected':''; ?> >Desktop and Mobile</option>
                </select>
                <?php _e(' on',SFSI_PLUS_DOMAIN);?>
                <select name="sfsi_plus_icon_hover_on_all_pages" class="sfsi_plus_img_on_hover_input">
                    <option value="yes" <?php echo ($sfsi_plus_icon_hover_on_all_pages==='yes')?'selected=selected':''; ?> > <?php _e('all pages',SFSI_PLUS_DOMAIN) ?></option>
                    <option value="include" <?php echo ($sfsi_plus_icon_hover_on_all_pages==='include')?'selected=selected':''; ?> ><?php _e('the following pages',SFSI_PLUS_DOMAIN) ?></option>
                    <option value="exclude" <?php echo ($sfsi_plus_icon_hover_on_all_pages==='exclude')?'selected=selected':''; ?> ><?php _e('all pages except the following',SFSI_PLUS_DOMAIN) ?></option>
                </select>
            </div>
            <div class="sfsi_plus_page_exclude" style="<?php echo $sfsi_plus_icon_hover_on_all_pages!=="exclude" || $sfsi_plus_icon_hover_type=="no"?'display:none':false; ?>">
                <?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_option_view6_exclude_icons_onhover.php'); ?>

            </div>
            <div class="sfsi_plus_page_include" style="<?php echo $sfsi_plus_icon_hover_on_all_pages!=="include"|| $sfsi_plus_icon_hover_type=="no"?'display:none':false; ?>">
                <?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_option_view6_include_icons_onhover.php'); ?>
                
            </div>
            <div class="text-subscript">
                <?php _e('Note: in addition to the above rule(s), you can also prevent the pinterest icon to show on images if you add the attributes nopin="nopin" to it, eg.',SFSI_PLUS_DOMAIN) ?> <?php echo htmlentities('<img src="https://your-url/your-pic-name.jpg" alt="My Pic" nopin="nopin" />');?>
            </div>
        </div> 
    </div> 
</div>