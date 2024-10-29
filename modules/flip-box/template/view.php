<?php
$settings = $this->get_settings_for_display();

?>
<?php if($settings['style'] == 'style1') :?>
     <?php 
              if ( ! empty( $settings['select_animation'] ) ) {
                          $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_flip_box  type-1 mt-3 mb-3 aae-' . $settings['select_animation'] );
                      }
              ?>
    <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
        <div class="advanced_addons_flip_box_front">
            <?php
                if($settings['aa_flipbox_img_or_icon'] === 'icon' &&  $settings['aa_flipbox_icon_new'] ){?>
                    <i class="<?php echo esc_html($settings['aa_flipbox_icon_new']);?>"></i>
               <?php }
            ?>
            <?php
                if($settings['aa_flipbox_img_or_icon'] === 'img' &&  $settings['aa_flipbox_image']['url'] ){
                    $this->add_render_attribute( 'image', 'src', $settings['aa_flipbox_image']['url'] );
                    ?>
                    <img src="<?php echo $settings['aa_flipbox_image']['url'];?>">
               <?php }
            ?>
            
            
            <?php
                if(!empty( $settings['aae_flipbox_front_title'])){?>
                    <h3 class="flip_title">
                        <?php echo esc_html($settings['aae_flipbox_front_title']);?>
                    </h3>
               <?php }
            ?>
           <p>
                <?php echo esc_html($settings['aae_flipbox_front_text']);?>
           </p>
        </div>
        <div class="advanced_addons_flip_box_back">
           <?php
                if($settings['aa_flipbox_img_or_icon_back'] === 'icon' &&  $settings['aa_flipbox_icon_back_new'] ){?>
                    <i class="<?php echo esc_html($settings['aa_flipbox_icon_back_new']);?>"></i>
               <?php }
            ?>

             <?php
                if($settings['aa_flipbox_img_or_icon_back'] === 'img' &&  $settings['aa_flipbox_image_back']['url'] ){
                    $this->add_render_attribute( 'image', 'src', $settings['aa_flipbox_image_back']['url'] );
                    ?>
                    <img src="<?php echo $settings['aa_flipbox_image_back']['url'];?>">
               <?php }
            ?>
            
            <?php
                if(!empty( $settings['aae_flipbox_back_title'])){?>
                   <h3 class="flip_title">
                        <?php echo esc_html($settings['aae_flipbox_back_title']);?>
                   </h3>
               <?php }
            ?>
            <p>
                <?php echo esc_html($settings['aae_flipbox_back_text']);?>
            </p>
        </div>
    </div>
<?php endif;?>

<?php if($settings['style'] == 'style2') :?>
                
<?php endif;?>

        <?php if($settings['style'] == 'style3') :?>
                <div class="advanced_addons_service type-5 position-relative fluid-hover tilt-parallax mb-4" data-tilt="" data-tilt-glare="true" data-tilt-max="3" data-tilt-speed="1000">
						<img src="<?php echo esc_url($settings['image']['url']);?>" class="img-fluid" alt="Load to failed">
						<div class="hoverable_block position-absolute fluid-content bg-white ">
							<a href="#">
                            <?php
                                if ( $settings['title' ] ) :
                                    printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title3' ),
                                        esc_html( $settings['title' ] )
                                    );
                                endif;
                                ?>
								<p <?php echo $this->get_render_attribute_string( 'description3' ); ?>>
                                    <?php echo wp_kses_data( $settings['description'] ); ?> 
								</p>
							</a>
						</div>
				</div>
        <?php endif;?>
