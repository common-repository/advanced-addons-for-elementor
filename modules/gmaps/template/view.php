<?php 
		$settings           = $this->get_settings_for_display();
	
			
?>
		<?php if($settings['style'] == 'style1') :?>
			<div class="advanced_addons_maps_area">
					<div class="advanced_addons_maps_1 advanced_addons_maps" data-lat='<?php echo esc_attr($settings['marker_lat']);?>' data-lang='<?php echo esc_attr($settings['marker_lang']);?>' data-locatorImage='<?php echo esc_url($settings['image']['url']);?>' data-mapStyle='style-1'></div>
			</div>
	<!-- Google Maps  -->
			<?php endif;?>

			<?php if($settings['style'] == 'style2') :?>
			<div class="advanced_addons_maps_area mt-4">
				<div class="advanced_addons_maps_1 advanced_addons_maps" data-mapStyle='style-2' data-locatorImage='<?php echo esc_url($settings['image']['url']);?>' data-lat='<?php echo esc_attr($settings['marker_lat']);?>' data-lang='<?php echo esc_attr($settings['marker_lang']);?>'></div>
			</div>
			<?php endif;?>

			<?php if($settings['style'] == 'style3') :?>
				<div class="advanced_addons_maps_area mt-4">
					<div class="advanced_addons_maps_1 advanced_addons_maps" data-locatorImage='<?php echo esc_url($settings['image']['url']);?>' data-lat='<?php echo esc_attr($settings['marker_lat']);?>' data-lang='<?php echo esc_attr($settings['marker_lang']);?>' data-mapStyle='style-3'></div>
				</div>

			<?php endif;?>

		
				
	