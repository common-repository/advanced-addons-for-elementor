<?php
$settings = $this->get_settings_for_display();
$image_class = '';
if($settings['img_style'] == 'circle'){
    $image_class = 'img-fluid rounded-circle';
}
if($settings['img_style'] == 'rounded'){
    $image_class = 'rounded';
}

?>
    <div class="advanced_addons_testimonial_slider  advanced_addons_slider type-1 text-center" dotsClass="advanced_addons_dots type-1" arrows='true' dots='true' nextArrow='<i class="fa fa-chevron-right"></i>' prevArrow='<i class="fa fa-chevron-left"></i>'>
    <?php
        foreach ( $settings['testimonial'] as $item ) :
            $name  = $item['name'];
            $desc  = $item['desc'];
            $image = $item['image']['url'];
    ?>
                <!-- single_item -->
                <div class="single_item">
                    <div class="row no-gutters">
                        <div class="col-md-8 offset-md-2" >
                            <div class="advanced_addons_testimonial_card type-1 position-relative pb-60">
                                <img src="<?php echo esc_url($image);?>" class="<?php echo esc_attr($image_class);?>" alt="">
                                <div class="block-body position-relative">
                                <p>
                                    <i>
                                    <?php echo esc_html($desc);?>
                                    </i>
                                </p>
                                                    
                            </div>
                            <h6 class="position-relative d-inline-block mb-0 client">
                                <?php echo esc_html($name);?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single_item -->
                <?php endforeach; ?>
            </div>