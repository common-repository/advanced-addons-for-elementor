<?php
$settings = $this->get_settings_for_display();
?>
    <?php if($settings['style'] === 'style1'):?>
        <div class="advanced_addons_funfactors_area type-1">
            <h2 class="advanced_addons_funfactors text-center fz-80 text-fff77a c-value"><?php echo esc_html($settings['value']);?></h2>
           <p class="c-title"><?php echo esc_html($settings['title']);?></p>
        </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style2'):?>
        <div class="advanced_addons_funfactors_area type-2">
            <div class="advanced_addons_funfactors_content text-center">
                <span class="blocks-icon d-inline-block c-icon">
                    <i class="<?php echo esc_attr($settings['icon']);?>"></i>
                </span>
                <h2 class="advanced_addons_funfactors text-center fz-50 text-2f2f2f c-value"><?php echo esc_html($settings['value']);?></h2>
                <span class="block-text d-inline-block c-title">
                    <?php echo esc_html($settings['title']);?>
                </span>
            </div>
        </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style3'):?>
        <div class="advanced_addons_funfactors_content type-3 text-center">
            <span class="blocks-icon c-icon">
                <i class="<?php echo esc_attr($settings['icon']);?>"></i>
            </span>
            <div class="block-content">
                    <h2 class="advanced_addons_funfactors font-weight-normal text-center fz-50 c-value"><?php echo esc_html($settings['value']);?></h2>
                <span class="block-text d-inline-block c-title">
                    <?php echo esc_html($settings['title']);?>
                </span>
            </div>
        </div>
    <?php endif;?>
    <?php if($settings['style'] === 'style4'):?>
            <div class="advanced_addons_funfactors_content type-4 text-left set-bg position-relative" style="background-image:url('<?php echo esc_url($settings['image2']['url']);?>')" >
                <div class="overlay position-absolute"></div>
                <div class="block-content">
                    <h2 class="advanced_addons_funfactors text-center fz-50 c-value"><?php echo esc_html($settings['value']);?></h2>
                </div>
                <span class="block-text c-title">
                    <?php echo esc_html($settings['title']);?>
                </span>
            </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style5'):?>

    <!-- Fun Factors -->
	<div class="advanced_addons_funfactors_area type-5 pt-60 pb-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="advanced_addons_funfactors_wrapper type-5 position-relative">
						<div class="funfactors_shape_wrapper">
							<img src="assets/dot-shape2.svg" class="svg shape-dot img-shape" alt="">
							<svg class="img-shape dot-one">
										<path fill-rule="evenodd"  fill="rgb(125, 236, 114)"
										 d="M4.500,9.000 C6.985,9.000 9.000,6.985 9.000,4.500 C9.000,2.014 6.985,-0.001 4.500,-0.001 C2.015,-0.001 -0.000,2.014 -0.000,4.500 C-0.000,6.985 2.015,9.000 4.500,9.000 Z"/>
									</svg>
											<svg class="img-shape dot-two">
												<path fill-rule="evenodd"  fill="rgb(255, 181, 106)"
												 d="M13.000,26.000 C20.180,26.000 26.000,20.179 26.000,12.999 C26.000,5.820 20.180,-0.001 13.000,-0.001 C5.820,-0.001 -0.000,5.820 -0.000,12.999 C-0.000,20.179 5.820,26.000 13.000,26.000 Z"/>
											</svg>
											<svg class="img-shape dot-three">
												<path fill-rule="evenodd"  fill="rgb(136, 217, 255)"
												 d="M4.500,8.999 C6.985,8.999 9.000,6.985 9.000,4.500 C9.000,2.014 6.985,-0.000 4.500,-0.000 C2.015,-0.000 -0.000,2.014 -0.000,4.500 C-0.000,6.985 2.015,8.999 4.500,8.999 Z"/>
											</svg>
											<svg class="img-shape dot-four">
												<path fill-rule="evenodd"  fill="rgb(255, 108, 196)"
												 d="M10.000,20.000 C15.523,20.000 20.000,15.522 20.000,10.000 C20.000,4.477 15.523,-0.000 10.000,-0.000 C4.477,-0.000 -0.000,4.477 -0.000,10.000 C-0.000,15.522 4.477,20.000 10.000,20.000 Z"/>
											</svg>
											<svg class="img-shape dot-five">
												<path fill-rule="evenodd"  fill="rgb(119, 244, 245)"
												 d="M4.500,8.999 C6.985,8.999 9.000,6.985 9.000,4.500 C9.000,2.014 6.985,-0.000 4.500,-0.000 C2.015,-0.000 -0.000,2.014 -0.000,4.500 C-0.000,6.985 2.015,8.999 4.500,8.999 Z"/>
											</svg>
											<svg class="img-shape dot-six">
												<path fill-rule="evenodd"  fill="rgb(165, 149, 255)"
												 d="M15.000,30.000 C23.284,30.000 30.000,23.284 30.000,15.000 C30.000,6.715 23.284,-0.000 15.000,-0.000 C6.716,-0.000 -0.000,6.715 -0.000,15.000 C-0.000,23.284 6.716,30.000 15.000,30.000 Z"/>
											</svg>
											<svg class="img-shape dot-seven">
												<path fill-rule="evenodd"  fill="rgb(102, 225, 158)"
												 d="M5.500,11.000 C8.537,11.000 11.000,8.537 11.000,5.500 C11.000,2.462 8.537,-0.001 5.500,-0.001 C2.462,-0.001 -0.000,2.462 -0.000,5.500 C-0.000,8.537 2.462,11.000 5.500,11.000 Z"/>
											</svg>

						</div>
						<!--  -->
						<div class="advanced_addons_funfactors_content type-5 cl-1">
							<i class="icon-basic_elaboration_folder_check position-absolute factors-icon"></i>
							<h2 class="font-weight-normal text-center">
								<span class="advanced_addons_funfactors c-value">
                                    <?php echo esc_html($settings['value']);?>
								</span>
								<span class="c-suffix">
                                    <?php echo esc_html($settings['suffix_one']);?>
								</span>
							</h2>
							<h4 class="c-title">
								<?php echo esc_html($settings['title']);?>
							</h4>
						</div>
						<!--  -->

						<!--  -->
						<div class="advanced_addons_funfactors_content type-5 cl-2">
							<i class="icon-glass_coffee position-absolute factors-icon"></i>
							<h2 class="font-weight-normal text-center">
								<span class="advanced_addons_funfactors c-value">
                                    <?php echo esc_html($settings['value_two']);?>
								</span>
								<span class="c-suffix">
                                    <?php echo esc_html($settings['suffix_two']);?>
								</span>
							</h2>
							<h4 class="c-title">
                            <?php echo esc_html($settings['title_two']);?>
							</h4>
						</div>
						<!--  -->

						<!--  -->
						<div class="advanced_addons_funfactors_content type-5 cl-3">
							<i class="icon-user position-absolute factors-icon"></i>
							<h2 class="font-weight-normal text-center">
								<span class="advanced_addons_funfactors c-value">
                                    <?php echo esc_html($settings['value_there']);?>
								</span>
								<span class="c-suffix">
									<?php echo esc_html($settings['suffix_there']);?>
								</span>
							</h2>
							<h4 class="c-title">
                                <?php echo esc_html($settings['title_there']);?>
							</h4>
						</div>
						<!--  -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fun Factors -->

    <?php endif;?>