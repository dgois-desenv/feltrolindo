      <ul class="sfsiplus_icn_listing8 sfsi_plus_closerli sfsi_exclude_ul ">

    	<li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_home" <?php echo ($option5['sfsi_plus_icon_hover_include_home']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Homepage', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_page" <?php echo ($option5['sfsi_plus_icon_hover_include_page']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Other internal pages (not homepage, ...)', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>

        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_post" <?php echo ($option5['sfsi_plus_icon_hover_include_post']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Single posts pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_tag" <?php echo ($option5['sfsi_plus_icon_hover_include_tag']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Tag pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_category" <?php echo ($option5['sfsi_plus_icon_hover_include_category']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Category pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_date_archive" <?php echo ($option5['sfsi_plus_icon_hover_include_date_archive']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Date based archives pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_include_search" <?php echo ($option5['sfsi_plus_icon_hover_include_search']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Search results pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <!-- Exclude rules for Post Types & Taxonomies  STARTS  here -->
        	<?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_option_view6_include_postTypes_taxonomies_onhover.php'); ?>
        <!-- Exclude rules for Post Types & Taxonomies  CLOSES  here -->

        <li class="">
			<div class="radio_section tb_4_ck sfsi_plus_icon_hover_include_url_checkSec">
            	<input name="sfsi_plus_icon_hover_include_url" <?php echo ($option5['sfsi_plus_icon_hover_include_url']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Urls which contain at least one of the following strings:', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
            <div class="sfsi_plus_keywords_container includecontainter_icon_hover" style="width:100%; display:<?php echo ($option5['sfsi_plus_icon_hover_include_url']=='yes') ?  'inline-block' : 'none';?>">
            	
            	<?php
					
					if(isset($option5['sfsi_plus_icon_hover_include_urlKeywords']) && !empty($option5['sfsi_plus_icon_hover_include_urlKeywords']) && is_array($option5['sfsi_plus_icon_hover_include_urlKeywords']))
					{
						$count = count($option5['sfsi_plus_icon_hover_include_urlKeywords']);
						for($i = 0; $i < $count; $i++)
						{
							$serial = $i+1;
							echo '<fieldset>
								<label>String '.$serial.':</label>
								<input type="text" name="sfsi_plus_icon_hover_include_urlKeywords[]" value="'.sanitize_text_field($option5['sfsi_plus_icon_hover_include_urlKeywords'][$i]).'" />
								<a href="javascript:" class="sfsi_plus_icon_hover_icon_hover_include_deleteKeywordField">Delete</a>
							</fieldset>';
						}
					}
					else
					{
						$count = 1; ?>
	                    <fieldset>
	                        <label>String 1:</label>
	                        <input type="text" name="sfsi_plus_icon_hover_include_urlKeywords[]" value="" />
	                        <!--<a href="javascript:" class="sfsi_plus_deleteKeywordField">Delete</a>-->
	                    </fieldset>

                <?php } ?>

            </div>
            
            <a href="javascript:" class="sfsi_plus_icon_hover_include_addAnotherFiled" data-count="<?php echo $count; ?>"
            	style="width:100%; display:<?php echo ($option5['sfsi_plus_icon_hover_include_url']=='yes') ?  'inline-block' : 'none';?>">
            	Add another one
            </a>
		</li>
        
    </ul>