<?php
$settings = $this->get_settings_for_display();
?>
            <!-- Start Client -->
            <div class="pt-120 pb-120">
                <div class="container">
                    <div class="advanced_addons_clients type-2 advanced_addons_slider type-1 text-center" dots='true' dotsClass="advanced_addons_dots type-1 pt-60" slidesToShow='<?php echo esc_attr($settings['slide_count']);?>'>
                    <?php
                        foreach ( $settings['clients'] as $item ) :
                            $image = $item['image']['url'];
                        ?>
                        <!-- Single Item -->
                            <div class="single_item">
                                <div class="item-image bg-f9f9f9">
                                    <img src="<?php echo esc_url($image)?>" class="img-fluid">
                                </div>
                            </div>
                        <!-- Single Item -->
                        <?php endforeach;?>
                        
                    </div>
                </div>
            </div>
    