<?php 

	$rectSetting = (isset($option8['sfsi_plus_place_rect_shortcode']) && !empty($option8['sfsi_plus_place_rect_shortcode']) ) ? $option8['sfsi_plus_place_rect_shortcode']: 'no';

	$rectClass = ("yes" == $rectSetting) ? 'show': 'hide';

	$rectCheck = ("yes" == $rectSetting) ?  'checked="checked"' : '';
?>

<!--<ul class="sfsiplus_icn_listing8 sfsi_rectangle_ul" >-->

	<li class="sfsiplusplacethemanulywpr rectangle_icons_item_manually">
			
 			<div style="margin-top: 20px !important;" class="radio_section tb_4_ck">

 				<input name="sfsi_plus_place_rectangle_icons_item_manually" <?php echo $rectCheck; ?>  id="sfsi_plus_place_rectangle_icons_item_manually" type="checkbox" value="yes" class="styled"  />

				<span class="sfsiplus_toglepstpgspn">
            		<?php  _e( 'Placing the rectangle icons via shortcode', SFSI_PLUS_DOMAIN ); ?>
            	</span>

 			</div>
			
			<div class="sfsiplus_right_info <?php echo $rectClass ;?>">
                    
				<div class="row">
					<label>
						<?php _e('You can also place the rectangle icons not only before/after posts, but anywhere you want. ' ,SFSI_PLUS_DOMAIN); ?>
					</label>
				</div>

            	<div class="row ">
					<label>
            		<?php _e('For that, please place the following string into your theme codes: ',SFSI_PLUS_DOMAIN);?> 						
                &lt;?php echo DISPLAY_PREMIUM_RECTANGLE_ICONS(); ?&gt;
                	</label>
            	</div>

				<div class="row">
					<label><?php _e('Or use the shortcode [DISPLAY_PREMIUM_RECTANGLE_ICONS]',SFSI_PLUS_DOMAIN); ?></label>
				</div>

				<div class="row rectDisplaySetting zeropadding">
						
						<div class="col-md-6 topmargin20 zeropadding">

							<div class="col-md-2">						
								<label><?php _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></label>
							</div>

							<div class="col-md-2">

								<label><?php _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></label>

							    <input name="sfsi_plus_rectangle_icons_shortcode_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>								
							</div>

							<div class="col-md-2">
								
								<label><?php _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></label>

							   <input name="sfsi_plus_rectangle_icons_shortcode_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>								
							</div>
							
						</div>			

				</div><!-- rectDisplaySetting closes-->

			</div>			
	</li>

<!--</ul>-->