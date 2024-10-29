<?php
$settings = $this->get_settings_for_display();
?>
    <?php if($settings['style'] === 'style1'):?>
        <div class="advanced_addons_quotes_card type-1 bg-2f2f2f">
            <blockquote>
                <h5 class="text-white font-weight-normal q-title q-icon">
                   <i class="fa fa-quote-right quotes-icon"></i>
                    <?php echo esc_html($settings['title']);?>
                </h5>
                <p class="q-desc">
                    <?php echo esc_html($settings['desc']);?>
                </p>
            </blockquote>
        </div>
    <?php endif;?>
    <?php if($settings['style'] === 'style2'):?>
        <div class="advanced_addons_quotes_card type-2 bg-white">
                <blockquote>
                    <h5 class="text-2f2f2f font-weight-normal fz-26 q-title q-icon">
                        <i class="fa fa-quote-right quotes-icon"></i>
                        <?php echo esc_html($settings['title']);?> 
                    </h5>
                    <p class="q-desc">
                        <?php echo esc_html($settings['desc']);?>
                    </p>
                    <span class="auth">
                        <?php echo esc_html($settings['author']);?>
                    </span>
                </blockquote>
        </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style3'):?>
	            <div class="advanced_addons_quotes_card type-3">
						<blockquote>
							<h5 class="text-2f2f2f font-weight-normal fz-26 q-title q-icon">
								<i class="fa fa-quote-right large-icon"></i>
                                <?php echo esc_html($settings['title']);?> 
							</h5>
							<p class="q-desc">
                               <?php echo esc_html($settings['desc']);?>
							</p>
							<span class="auth">
                                <?php echo esc_html($settings['author']);?>
							</span>
						</blockquote>
					</div>
    <?php endif;?>

    <?php if($settings['style'] === 'style4'):?>
                    <div class="advanced_addons_quotes_card type-4" data-color='f6f9fa'>
						<blockquote>
							<div class="advanced_addons_quotes_icon q-icon">
								<i class="fa fa-quote-right"></i>
							</div>
							<p>
                                <?php echo esc_html($settings['desc']);?>
							</p>
							<span>
                                <?php echo esc_html($settings['author']);?>
							</span>
						</blockquote>
					</div>
    <?php endif;?>
