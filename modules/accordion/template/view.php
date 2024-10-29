<?php 
		$settings           = $this->get_settings_for_display();
		$accordion_list     = $settings['advanced_accordion_list'];

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_render_attribute( 'title', 'class', 'fz-16 font-color text-uppercase mb-0 ade-ac-title' );
		$this->add_inline_editing_attributes( 'title2', 'none' );
		$this->add_render_attribute( 'title2', 'class', 'fz-16 font-color text-uppercase mb-0 ade-ac-title' );
		$this->add_inline_editing_attributes( 'title3', 'none' );
		$this->add_render_attribute( 'title3', 'class', 'font-color text-capitalize mb-0 ade-ac-title' );
		$this->add_inline_editing_attributes( 'title4', 'none' );
		$this->add_render_attribute( 'title4', 'class', 'font-color text-capitalize mb-0 ade-ac-title' );

			
?>
		<?php if($settings['style'] == 'style1') :?>
				<?php foreach ( $accordion_list as $item ) {
					$uid          = esc_attr( uniqid() );
					$show = $item['diff_show'];
					$show_class = '';
					if($show == 'yes'){
						$show_class = 'show';
					}else {
						$show_class = 'no-show';
					}
					?>
					<div class="advanced_addons_accordion type-1 <?php echo esc_attr($show_class);?>">
						<a class="advanced_addons_accordion_title" data-collapse-title="accordion<?php echo $uid; ?>">
						<?php
							printf( '<%1$s %2$s>%3$s</%1$s>',
								tag_escape( $settings['title_tag'] ),
								$this->get_render_attribute_string( 'title' ),
								esc_html($item['accordion_title'] )
							);?>
							
							<div class="accordion_icon">
								<i class="fa fa-chevron-down default"></i>
								<i class="fa fa-chevron-up showed"></i>
							</div>
						</a>
						<div class="advanced_addons_accordion_body" data-collapse-panel="accordion<?php echo $uid; ?>">
							<p class="mb-0 ade-ac-content">
								<?php echo wp_kses_post($item['accordion_content']);?>
							</p>
						</div>
					</div>
					<?php } ?>
			<?php endif;?>

			<?php if($settings['style'] == 'style2') :?>
				<?php foreach ( $accordion_list as $item ) {
						$uid          = esc_attr( uniqid() );
						$show = $item['diff_show'];
						$show_class = '';
						if($show == 'yes'){
							$show_class = 'show';
						}else {
							$show_class = 'no-show';
						}
						?>
					<div class="advanced_addons_accordion type-1 line-bordered <?php echo esc_attr($show_class);?>">
						<a class="advanced_addons_accordion_title" data-collapse-title="accordion<?php echo $uid; ?>">
							<?php
								printf( '<%1$s %2$s>%3$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$this->get_render_attribute_string( 'title2' ),
									esc_html($item['accordion_title'] )
								);?>
							
							<div class="accordion_icon">
								<i class="fa fa-chevron-down default"></i>
								<i class="fa fa-chevron-up showed"></i>
							</div>
						</a>
						<div class="advanced_addons_accordion_body" data-collapse-panel="accordion<?php echo $uid; ?>">
							<p class="mb-0 ade-ac-content">
								<?php echo wp_kses_post($item['accordion_content']);?>
							</p>
						</div>
					</div>
				<?php } ?>
			<?php endif;?>

			<?php if($settings['style'] == 'style3') :?>
				<?php foreach ( $accordion_list as $item ) {
						$uid          = esc_attr( uniqid() );
						$show = $item['diff_show'];
						$show_class = '';
						if($show == 'yes'){
							$show_class = 'show';
						}else {
							$show_class = 'no-show';
						}
						?>
					<div class="advanced_addons_accordion type-1 boxed-style line-bordered <?php echo esc_attr($show_class);?>">
						<a class="advanced_addons_accordion_title" data-collapse-title="accordion<?php echo $uid; ?>">
						<?php
							printf( '<%1$s %2$s>%3$s</%1$s>',
								tag_escape( $settings['title_tag'] ),
								$this->get_render_attribute_string( 'title3' ),
								esc_html($item['accordion_title'] )
							);?>
							<div class="accordion_icon">
								<i class="fa fa-chevron-down default"></i>
								<i class="fa fa-chevron-up showed"></i>
							</div>
						</a>
						<div class="advanced_addons_accordion_body" data-collapse-panel="accordion<?php echo $uid; ?>">
							<p class="mb-0 ade-ac-content">
								<?php echo wp_kses_post($item['accordion_content']);?>
							</p>
						</div>
					</div>
				<?php } ?>
			<?php endif;?>

			<?php if($settings['style'] == 'style4') :?>
					<?php foreach ( $accordion_list as $item ) {
						$uid          = esc_attr( uniqid() );
						$show = $item['diff_show'];
						$show_class = '';
						if($show == 'yes'){
							$show_class = 'show';
						}else {
							$show_class = 'no-show';
						}
						?>
				<div class="advanced_addons_accordion type-1 boxed-style grad line-bordered <?php echo esc_attr($show_class);?>">
						<a class="advanced_addons_accordion_title" data-collapse-title="accordion<?php echo $uid; ?>">
							<?php printf( '<%1$s %2$s>%3$s</%1$s>',
								tag_escape( $settings['title_tag'] ),
								$this->get_render_attribute_string( 'title4' ),
								esc_html($item['accordion_title'] )
							);?>
							<div class="accordion_icon">
								<i class="fa fa-chevron-down default"></i>
								<i class="fa fa-chevron-up showed"></i>
							</div>
						</a>
						<div class="advanced_addons_accordion_body" data-collapse-panel="accordion<?php echo $uid; ?>">
							<p class="mb-0 ade-ac-content">
								<?php echo wp_kses_post($item['accordion_content']);?>
							</p>
						</div>
					</div>
				<?php } ?>
			<?php endif;?>
				
	