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
   
    <button class="advanced_addons_btn advanced_addons_btn_bordered btn_default">
       <a <?php echo $this->get_render_attribute_string( 'link' ); ?> > 
        <?php
            if ( 'yes' === $settings['show_icon'] ) {?>
                 <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
          <?php  }                   
        ?>
        <?php echo esc_html($settings['text']); ?>
        </a>
    </button>
