<?php
$settings = $this->get_settings_for_display();
?>
<?php if($settings['style'] === 'style1'):?>
    <div class="advanced_addons_testimonial_card type-1 text-center position-relative single-testi">
                        <?php
                            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                            ?>
                           <img src="<?php echo $settings['image']['url'];?>" alt="<?php echo $settings['team_name'];?>">
                    
                        <div class="block-body position-relative">
                            <i class="fa fa-quote-left section-icon left position-absolute"></i>
                            <i class="fa fa-quote-right section-icon right position-absolute"></i>
                        <p>
                        <div class="block-body position-relative">
                            <p class="ad-desc">
                                <?php echo esc_html($settings['desc']);?>
                            </p>
                        </div>
        <h6 class="position-relative d-inline-block mb-0 client ad-client"><?php echo esc_html($settings['client_name']);?></h6>
    </div>
<?php endif;?>
    <?php if($settings['style'] === 'style2'):?>
            <div class="advanced_addons_testimonial_card type-2 rounded-20 text-center position-relative bg-white ">
                <i class="fa fa-quote-left section-icon left position-absolute"></i>
                   <i class="fa fa-quote-right section-icon right position-absolute"></i>
                <div class="block-body position-relative">
                    <p class="mb-0 text-left ad-desc">
                        <?php echo esc_html($settings['desc']);?>
                    </p>
                </div>
                <div class="block-footer position-absolute">
                    <img src="<?php echo esc_url($settings['image']['url']);?>" class="img-fluid rounded-circle" alt="">
                    <h6 class="position-relative fz-20  mb-0 ad-client"><?php echo esc_html($settings['client_name']);?> </h6>
                    <span class="text-6e6e6e ad-c-p"><?php echo esc_html($settings['position']);?></span>
                </div>
                
            </div>
    <?php endif;?>
    <?php if($settings['style'] === 'style3'):?>
        <div class="advanced_addons_testimonial_card type-2 bg-fafafa boxed  rounded-0 text-center position-relative mb-100 ">
                <i class="fa fa-quote-left section-icon left position-absolute"></i>
                   <i class="fa fa-quote-right section-icon right position-absolute"></i>
                <div class="block-body position-relative">
                    <p class="mb-0 text-left ad-desc">
                      <?php echo esc_html($settings['desc']);?>
                    </p>
                </div>
                <div class="block-footer position-absolute">
                    <img src="<?php echo esc_url($settings['image']['url']);?>" class="img-fluid rounded-circle" alt="">
                    <div>
                        <h6 class="position-relative fz-20  mb-0 ad-client"><?php echo esc_html($settings['client_name']);?></h6>
                        <span class="text-uppercase text-6e6e6e ad-c-p"><?php echo esc_html($settings['position']);?></span>
                    </div>
                </div>
            </div>
    <?php endif;?>
<?php if($settings['style'] === 'style4'):?>
    <!-- Testimonial Blocks -->
    <div class=" pt-120 pb-120 advanced_addons_testimonial_card_area type-2 transparent set-bg position-relative" data-bg='<?php echo esc_url($settings['image2']['url']);?>'>
        <div class="overlay position-absolute"></div>
        <div class="container">
            <div class="row" data-find="_5">
                <div class="col-md-10 offset-md-1" data-find="_4">
                    <div class="advanced_addons_testimonial_card type-2 shadow-none  boxed transparent  text-left position-relative  " data-find="_3">
                        <i class="fa fa-quote-left section-icon left position-absolute"></i>
                           <i class="fa fa-quote-right section-icon right position-absolute"></i>
                        <div class="block-body position-relative" data-find="_2">
                            <p class="mb-0 text-left ad-desc" data-find="_1">
                                <?php echo esc_html($settings['desc']);?>
                            </p>
                        </div>
                        <div class="block-footer position-absolute">
                            <img src="<?php echo esc_url($settings['image']['url']);?>" class="img-fluid rounded-circle" alt="">
                            <div>
                                <h6 class="position-relative fz-20 m-0  mb-0 ad-client"><?php echo esc_html($settings['client_name']);?></h6>
                                <span class="text-6e6e6e ad-c-p"><?php echo esc_html($settings['position']);?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Blocks -->
 <?php endif;?>
<?php if($settings['style'] === 'style5'):?>
    <!-- Testimonial Blocks -->
        <div class="set-bg position-relative"  style="background-image:url('<?php echo esc_url($settings['image2']['url']) ?>');" data-bg='<?php echo esc_url($settings['image2']['url']);?>'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="advanced_addons_testimonial_card type-3   text-center position-relative pt-120 pb-120">
                        <i class="fa fa-quote-left section-icon left position-absolute"></i>
                           <i class="fa fa-quote-right section-icon right position-absolute"></i>
                        <div class="block-body position-relative">
                                <div class="row no-gutters">
                                    <div class="col-md-10 offset-md-1">
                                        <img src="<?php echo esc_url($settings['image']['url']);?>" class="img-fluid rounded-circle" alt="">
                                        <p class="mb-0 text-center ad-desc"><?php echo esc_html($settings['desc']);?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="block-footer ">
                                <h6 class="position-relative fz-20  mb-0 ad-client"><?php echo esc_html($settings['client_name']);?></h6>
                                    <span class="text-6e6e6e ad-c-p"><?php echo esc_html($settings['position']);?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Testimonial Blocks -->
    <?php endif;?>