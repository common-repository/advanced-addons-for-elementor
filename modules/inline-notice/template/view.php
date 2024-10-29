<?php
$settings = $this->get_settings_for_display();
//       if ( ! empty( $settings['alert_type'] ) ) {
      //  $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice type-1 mb-60 notice_' . $settings['alert_type'] );
      // }
      ?>
      <?php if($settings['style'] === 'style1'):?>
             <div data-color="ffffff"   class="pt-60 pb-60 content-bg">
                  <?php 
                  if ( ! empty( $settings['alert_type'] ) ) {
                              $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice type-1 mb-60 notice_' . $settings['alert_type'] );
                          }
              ?>

              <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
                  <h3>
                      <?php
                      echo($settings['icon'] && $settings['icon'] !== ''  ? 
                      '<i class=" inline-block ' . esc_html( $settings['icon']) . '"></i>' : 
                      '<i class="fa fa-check"></i>')
                      ?>
                      <?php echo esc_html($settings['title']);?>
                      </h3>
                      <div class="advanced_addons_inline_body bg-white  rounded-0">
                          <?php echo esc_html($settings['desc']);?>
                      </div>
                  </div> 
              </div>
          <?php endif;?>
          <?php if($settings['style'] === 'style2'):?>
               <div data-color="106aea"   class="pt-60 pb-60 content-bg">
                  <?php 
                  if ( ! empty( $settings['alert_type'] ) ) {
                              $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice type-1 header-gap mb-60 notice_' . $settings['alert_type'] );
                          }
              ?>
              <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
                  <h3>
                      <?php
                      echo($settings['icon'] && $settings['icon'] !== ''  ? 
                      '<i class=" inline-block ' . esc_html( $settings['icon']) . '"></i>' : 
                      '<i class="fa fa-check"></i>')
                      ?>
                          <?php echo esc_html($settings['title']);?>
                      </h3>
                      <div class="advanced_addons_inline_body bg-white rounded-0">
                          <?php echo esc_html($settings['desc']);?>
                      </div>
              </div> 
              <div/>
          <?php endif;?>
          <?php if($settings['style'] === 'style3'):?>
               <div data-color="ff7293"   class="pt-60 pb-60 content-bg">
                  <?php 
                  if ( ! empty( $settings['alert_type'] ) ) {
                              $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice  rounded-0 bg-white type-2 mb-60 notice_' . $settings['alert_type'] );
                          }
              ?>
              <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
                  <h3>
                         <?php
                          echo($settings['icon'] && $settings['icon'] !== ''  ? 
                          '<i class=" inline-block ' . esc_html( $settings['icon']) . '"></i>' : 
                          '<i class="fa fa-check"></i>')
                      ?>
                          <?php echo esc_html($settings['title']);?>
                      </h3>
                      <div class="advanced_addons_inline_body  rounded-0">
                          <?php echo esc_html($settings['desc']);?>
                      </div>
              </div> 
                        
          <?php endif;?>