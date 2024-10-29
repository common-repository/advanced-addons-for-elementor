<?php
 $settings = $this->get_settings_for_display();
 $this->add_render_attribute( 'link', 'class', 'ad-btn' );
 $this->add_render_attribute( 'link', 'href', esc_url( $settings['link']['url'] ) );
 if ( ! empty( $settings['link']['is_external'] ) ) {
     $this->add_render_attribute( 'link', 'target', '_blank' );
 }
 if ( ! empty( $settings['link']['nofollow'] ) ) {
     $this->add_render_attribute( 'link', 'rel', 'nofollow' );
 }
 $this->add_inline_editing_attributes( 'text', 'none' );
 ?>
 <?php if($settings['style'] === 'style1'):?>
     <div class="advanced_addons_social_links type-1">
         <div class="block-body">
              <div class="row">
                 <div class="col-sm-10 offset-sm-1">
                     <ul class="list-style-none pl-0 mb-0">
                         <?php
                         foreach ( $settings['profiles'] as $profile ) :
                             $icon = $profile['name'];
                             $url = esc_url( $profile['link']['url'] );

                             if ($profile['name'] === 'website') {
                                 $icon = 'globe';
                             } elseif ($profile['name'] === 'email') {
                                 $icon = 'envelope';
                                 $url = 'mailto:' . antispambot( $profile['email'] );
                             }
                             ?>
                         <li>
                             <span class="block_icon">
                                 <i class="fa fa-<?php echo esc_attr( $icon);?>"></i>
                             </span>
                             <span class="block_label s-name">
                                 <a href="<?php echo esc_url($url);?>"><?php echo esc_html($profile['name']);?></a>
                             </span>
                             <span class="block_link">
                                 <?php echo esc_url($url);?>
                             </span>
                         </li>
                       <?php endforeach; ?>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
<?php endif;?>
<?php if($settings['style'] === 'style2'):?>
     <div class="advanced_addons_social_links type-1 grad-style">
						<div class="block-body">
						    <div class="row">
						        <div class="col-sm-10 offset-sm-1">
									<ul class="list-style-none pl-0 mb-0">
                                    <?php
                                        foreach ( $settings['profiles'] as $profile ) :
                                            $icon = $profile['name'];
                                            $url = esc_url( $profile['link']['url'] );

                                            if ($profile['name'] === 'website') {
                                                $icon = 'globe';
                                            } elseif ($profile['name'] === 'email') {
                                                $icon = 'envelope';
                                                $url = 'mailto:' . antispambot( $profile['email'] );
                                            }
                                        ?>
                                            <li>
                                                <span class="block_icon">
                                                    <i class="fa fa-<?php echo esc_attr( $icon);?> font-color"></i>
                                                </span>
                                                <span class="block_label s-name">
                                                    <?php echo esc_html($profile['name']);?>
                                                </span>
                                                <span class="block_link">
                                                    <?php echo esc_url($url);?>
                                                </span>
                                            </li>
										<?php endforeach; ?>
										
									</ul>
							</div>
							</div>
						</div>
                    </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style3'):?>
            <div class="pt-120  pb-120 set-bg advanced_addons_social_links_area type-2 position-relative" data-bg="assets/images/social-link/social-link-bg-1.jpg">
                <div class="overflow position-absolute"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 pb-60">
                            <div class="advanced_addons_section_title type-1 text-center pb-60">
                                <h3 class="text-white"> Social Links</h3>
                                <p class="text-white">Lorem Ipsum is simply dummy text of the printing</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="advanced_addons_social_links type-2">
                                <!-- social link -->
                                <div class="main-content active  d-flex align-items-center position-absolute">
                                        <div class="top-shape position-absolute">
                                            <!--?xml version="1.0" encoding="utf-8"?-->
                                            <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                            <style type="text/css">
                                                .st0{fill:#FFFFFF;}
                                            </style>
                                            <path class="st0" d="M241.9,60c59.2,0-294.1,0-235.3,0S94.7,0,124.3,0C153.9,0,182.7,60,241.9,60z"></path>
                                            </svg>
                                            <div class="icon-circle position-absolute fb">
                                                <i class="fab fa-facebook-f font-color" data-font-color="4267b2"></i>
                                            </div>
                                        </div>
                                        <div class="social-link-name">
                                            <h6 class="mb-0">
                                                Twitter
                                            </h6>
                                        </div>
                                        <div class="social-link-url">
                                            <a href="#">
                                                https://www.facebook.com/shaharia
                                            </a>
                                        </div>
                                        <div class="bottom-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                            <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                            <style type="text/css">
                                                .reverse-shape1{fill:#FFFFFF;}
                                            </style>
                                            <path class="reverse-shape1" d="M241.9,0C301.1,0-52.2,0,6.6,0s88.1,60,117.7,60S182.7,0,241.9,0z"></path>
                                            </svg>
                                    </div>
                                    </div>
                                <!-- social link -->

                                <!-- social link -->
                                <div class="main-content d-flex align-items-center position-absolute">
                                        <div class="top-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0{fill:#FFFFFF;}
                                        </style>
                                        <path class="st0" d="M241.9,60c59.2,0-294.1,0-235.3,0S94.7,0,124.3,0C153.9,0,182.7,60,241.9,60z"></path>
                                        </svg>
                                        <div class="icon-circle position-absolute twt font-color" data-font-color="1da1f2">
                                            <i class="fab fa-twitter"></i>
                                        </div>
                                    </div>
                                        <div class="social-link-name">
                                            <h6 class="mb-0">
                                                Twitter
                                            </h6>
                                        </div>
                                        <div class="social-link-url">
                                            <a href="#">
                                                https://www.facebook.com/shaharia
                                            </a>
                                        </div>
                                        <div class="bottom-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                            <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                            <style type="text/css">
                                                .reverse-shape1{fill:#FFFFFF;}
                                            </style>
                                            <path class="reverse-shape1" d="M241.9,0C301.1,0-52.2,0,6.6,0s88.1,60,117.7,60S182.7,0,241.9,0z"></path>
                                            </svg>
                                    </div>
                                    </div>
                                <!-- social link -->

                                <!-- social link -->
                                <div class="main-content d-flex align-items-center position-absolute">
                                        <div class="top-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0{fill:#FFFFFF;}
                                        </style>
                                        <path class="st0" d="M241.9,60c59.2,0-294.1,0-235.3,0S94.7,0,124.3,0C153.9,0,182.7,60,241.9,60z"></path>
                                        </svg>
                                        <div class="icon-circle position-absolute inst ">
                                            <i class="fab fa-instagram font-color" data-font-color="eb5a50"></i>
                                        </div>
                                    </div>
                                        <div class="social-link-name">
                                            <h6 class="mb-0">
                                                Instagram
                                            </h6>
                                        </div>
                                        <div class="social-link-url">
                                            <a href="#">
                                                https://www.facebook.com/shaharia
                                            </a>
                                        </div>
                                        <div class="bottom-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                            <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                            <style type="text/css">
                                                .reverse-shape1{fill:#FFFFFF;}
                                            </style>
                                            <path class="reverse-shape1" d="M241.9,0C301.1,0-52.2,0,6.6,0s88.1,60,117.7,60S182.7,0,241.9,0z"></path>
                                            </svg>
                                    </div>
                                    </div>
                                <!-- social link -->

                                <!-- social link -->
                                <div class="main-content  d-flex align-items-center position-absolute">
                                        <div class="top-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                        <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0{fill:#FFFFFF;}
                                        </style>
                                        <path class="st0" d="M241.9,60c59.2,0-294.1,0-235.3,0S94.7,0,124.3,0C153.9,0,182.7,60,241.9,60z"></path>
                                        </svg>
                                        <div class="icon-circle position-absolute git">
                                            <i class="fab fa-github font-color" data-font-color="ffffff"></i>
                                        </div>
                                    </div>
                                        <div class="social-link-name">
                                            <h6 class="mb-0">
                                                Github
                                            </h6>
                                        </div>
                                        <div class="social-link-url">
                                            <a href="#">
                                                https://www.facebook.com/shaharia
                                            </a>
                                        </div>
                                        <div class="bottom-shape position-absolute">
                                        <!--?xml version="1.0" encoding="utf-8"?-->
                                            <!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 248.7 60" style="enable-background:new 0 0 248.7 60;" xml:space="preserve">
                                            <style type="text/css">
                                                .reverse-shape1{fill:#FFFFFF;}
                                            </style>
                                            <path class="reverse-shape1" d="M241.9,0C301.1,0-52.2,0,6.6,0s88.1,60,117.7,60S182.7,0,241.9,0z"></path>
                                            </svg>
                                    </div>
                                    </div>
                                <!-- social link -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif;?>