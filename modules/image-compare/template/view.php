<?php
 $settings = $this->get_settings_for_display();
 ?>
    <!-- Image Comparison -->
         <div class="advanced_addons_image_compare_area1  pb-120">
             <div class="container">
                 <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <div class="cross2 advanced_addons_image_compare type-1" data-before-title='<?php echo esc_attr($settings['before_label']);?>' data-after-title='<?php echo esc_attr($settings['after_label']);?>'>
                            <?php if ( $settings['before_image']['url'] || $settings['before_image']['id'] ) :
                                ?>
                                 <img src="<?php echo $settings['before_image']['url'];?>">
                                <?php
                             endif;

                             if ( $settings['after_image']['url'] || $settings['after_image']['id'] ) :
                                 ?>
                                 <img src="<?php echo $settings['after_image']['url'];?>">
                                 <?php
                             endif; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     <!-- Image Comparison --