<?php
$settings = $this->get_settings_for_display();
?>
<?php if($settings['style'] === 'style1'):?>
       <?php 
            if ( ! empty( $settings['alert_type'] ) ) {
               $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_alert advanced_addons_primary advanced_addons_alert_bordered mb-2 advanced_addons_' . $settings['alert_type'] );
           }
       ?>

       <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
           <span class="alert-icon">
               <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
           </span>
           <p>
               <strong><?php echo esc_html($settings['pre_title']); ?></strong>
               <?php echo esc_html($settings['alert_title']); ?>
           </p>
       </div> 
   <?php endif;?>
   <?php if($settings['style'] === 'style2'):?>
       <div class="advanced_addons_alert_area">
           <?php 
            if ( ! empty( $settings['alert_type'] ) ) {
               $this->add_render_attribute( 'wrapper', 'class', ' advanced_addons_alert advanced_addons_alert_grad mb-2 advanced_addons_' . $settings['alert_type'] );
           }
       ?>

       <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
           <span class="alert-icon">
               <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
           </span>
           <p>
               <strong><?php echo esc_html($settings['pre_title']); ?></strong>
               <?php echo esc_html($settings['alert_title']); ?>
           </p>
       </div> 
       </div>
   <?php endif;?>
    <?php if($settings['style'] === 'style3'):?>
       <?php 
            if ( ! empty( $settings['alert_type'] ) ) {
               $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_alert advanced_addons_alert_grad capsul mb-2   advanced_addons_' . $settings['alert_type'] );
           }
       ?>

       <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
           <span class="alert-icon">
                   <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                   <strong><?php echo esc_html($settings['pre_title']); ?></strong>
               </span>
           <p>
               <?php echo esc_html($settings['alert_title']); ?>
           </p>
       </div> 
   <?php endif;?>
    <?php if($settings['style'] === 'style4'):?>
        <div class="advanced_addons_alert_area" data-color="faffff" >
            <?php 
            if ( ! empty( $settings['alert_type'] ) ) {
               $this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_alert   advanced_addons_alert_underlined  mb-2 advanced_addons_' . $settings['alert_type'] );
           }
       ?>

           <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
               <span class="alert-icon">
                       <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                   </span>
               <p>
                   <strong><?php echo esc_html($settings['pre_title']); ?></strong>
                   <?php echo esc_html($settings['alert_title']); ?>
               </p>
           </div> 
        </div>
       
   <?php endif;?>