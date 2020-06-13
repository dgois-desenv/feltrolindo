<li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_switch_exclude_custom_post_types" <?php echo ($option5['sfsi_plus_icon_hover_switch_exclude_custom_post_types']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>        
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Single post pages of custom post types', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>

				<?php 
                	$args   		   = array( '_builtin' => false,'public'   => true );
					$postTypes         = array();
					$post_types 	   = get_post_types($args,'names');
					$custom_post_types = array_values($post_types);
					$defCount 		   = count($custom_post_types);

					$exSelect          = $option5['sfsi_plus_icon_hover_list_exclude_custom_post_types'];
					$exSelectCount     = is_array($exSelect) ? count($exSelect) : 0;

					$cpDisplay = ($option5['sfsi_plus_icon_hover_switch_exclude_custom_post_types']=='yes')? "display:block;": "display:none";
				?>
					<ul id="sfsi_premium_custom_social_data_post_types_ul" style="<?php echo $cpDisplay; ?>">					
						<?php foreach ($custom_post_types as $postname) {                 				
	                				$checked = '';
	                				if($exSelectCount>0){
										$checked = (in_array($postname,$exSelect)) ? 'checked=true': $checked;                			
	                				}

	                				$pt = get_post_type_object( $postname );
	                				$postDisplayName = $pt->labels->singular_name;	
							?>
	                		<li>
								<div class="radio_section tb_4_ck">
									<input data-cl="sfsi_plus_list_exclude_custom_post_types" name="sfsi_plus_icon_hover_list_exclude_custom_post_types[]" type="checkbox" value="<?php echo $postname; ?>" <?php echo esc_attr($checked); ?> class="styled"  />
									<label class="cstmdsplsub"><?php echo ucfirst($postDisplayName) ;?></label>
								</div>
							</li>
						<?php } ?>					
					</ul>
			</div>
</li>

 <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_icon_hover_switch_exclude_taxonomies" <?php echo (isset($option5['sfsi_plus_icon_hover_switch_exclude_taxonomies']) && $option5['sfsi_plus_icon_hover_switch_exclude_taxonomies']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>        
			
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Custom taxonomy pages', SFSI_PLUS_DOMAIN ); ?>
                    </span>
                </p>

				<?php 
				  $allListTaxonomies = get_taxonomies(array('_builtin' => false,'public'=>true,'show_ui'=>true),'objects','and');
				  $tListcount        = sfsiIsArrayOrObject($allListTaxonomies) ?  count($allListTaxonomies): 0;

				  $arrSfsi_plus_exl_taxonomies_for_icons = (isset($option5['sfsi_plus_icon_hover_list_exclude_taxonomies'])) ? $option5['sfsi_plus_icon_hover_list_exclude_taxonomies'] : array();
				  
				  $sExcount        = sfsiIsArrayOrObject($arrSfsi_plus_exl_taxonomies_for_icons) ? count($arrSfsi_plus_exl_taxonomies_for_icons): 0;

				  $cTDisplay 	   = ($option5['sfsi_plus_icon_hover_switch_exclude_taxonomies']=='yes')? "display:block;": "display:none";				  
				?>
					<ul id="sfsi_premium_taxonomies_ul" style="<?php echo $cTDisplay; ?>">					
	
		                  <?php if($tListcount>0) {

		                  		$lchecked = '';

		                      	foreach ($allListTaxonomies as $taxonomy) { 
		                            $lchecked = ($sExcount>0 && in_array( $taxonomy->name, $arrSfsi_plus_exl_taxonomies_for_icons)) ? 'checked=true' : $lchecked;
		                  		?> 

		                		<li>
									<div class="radio_section tb_4_ck">
										<input data-cl="sfsi_plus_list_exclude_taxonomies" name="sfsi_plus_icon_hover_list_exclude_taxonomies[]" type="checkbox" value="<?php echo $taxonomy->name;?>" class="styled" <?php echo esc_attr($lchecked); ?>  />
										<label class="cstmdsplsub"><?php _e(ucfirst($taxonomy->label),SFSI_PLUS_DOMAIN); ?></label>
									</div>
								</li>

							<?php } ?>

						<?php } ?>					
					</ul>
			</div>
</li>