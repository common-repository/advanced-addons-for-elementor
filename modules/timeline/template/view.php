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
      <div class="advanced_addons_timeline position-relative type-1">
      <?php
         $i = 0;
         foreach ( $settings['timeline'] as $item ) :
         $i++;
     ?>
       <?php if ( ( $i % 2 ) == 0 ) { ?>
                 <!-- Timeline Item -->
                 <div class="timeline_item">
                     <span class="timeline_icon">
                         <i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i>
                     </span>
                     <div>
                         <h4><?php echo esc_html($item['title']);?></h4>
                         <p>
                         <?php echo esc_html($item['desc']);?> 
                         </p>
                     </div>
                 </div>
                 <!-- Timeline Item -->
            <?php } else {?>
                 <!-- Timeline Item -->
                 <div class="timeline_item">
                     <span class="timeline_icon">
                         <i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i>
                     </span>
                     <div>
                         <h4><?php echo esc_html($item['title']);?></h4>
                         <p>
                         <?php echo esc_html($item['desc']);?> 
                         </p>
                     </div>
                 </div>
                 <!-- Timeline Item -->
         <?php } endforeach;?>
                 
     </div>