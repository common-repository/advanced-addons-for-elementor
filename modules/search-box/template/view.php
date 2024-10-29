<?php
 $settings = $this->get_settings_for_display();
 $this->add_render_attribute( 'link', 'class', 'ad-btn advanced_addons_btn advanced_addons_btn_solid' );
 $this->add_render_attribute( 'link', 'href', esc_url( $settings['link']['url'] ) );
 if ( ! empty( $settings['link']['is_external'] ) ) {
     $this->add_render_attribute( 'link', 'target', '_blank' );
 }
 if ( ! empty( $settings['link']['nofollow'] ) ) {
     $this->add_render_attribute( 'link', 'rel', 'nofollow' );
 }
 $this->add_inline_editing_attributes( 'text', 'none' );

 $this->add_render_attribute(
     'input_attr', [
         'placeholder' => $settings['placeholder'],
         'type' => 'text',
         'name' => 's',
         'title' => esc_html__( 'Search', 'htmega-addons' ),
         'value' => get_search_query(),
         'class' => 'advanced_addons_field bg-fafafa rounded-0',
     ]
 );
 ?>
     
             <div class="advanced_addons_search_box type-1 bg-white">
                 <div class="row no-gutters">
                     <div class="col-md-3">
                         <h4 class="fz-24 mb-0 mb-0"><?php echo esc_html( $settings['title'] ); ?></h4>
                         <p>
                         <?php echo wp_kses_data( $settings['description'] ); ?>
                         </p>
                     </div>
                     <div class="col-md-9 d-flex align-items-center">
                         <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="advanced_addons_form_group w-100" _lpchecked="1" method="get">
                             <input <?php echo $this->get_render_attribute_string( 'input_attr' )?>>
                             <div class="advanced_addons_prefend">
                                 <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                                      <?php echo esc_html( $settings['button_text'] ); ?>
                                 </a>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>