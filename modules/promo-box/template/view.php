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

    <div class="advanced_addons_promo_box type-1 d-flex align-items-center justify-content-between">
        <div>
            <h5 class="text-2f2f2f  fz-24 font-weight-normal text-uppercase"><?php echo esc_html( $settings['title'] ); ?></h5>
            <p class="mb-0">
                 <?php echo wp_kses_data( $settings['description'] ); ?>
            </p>
        </div>
        <div>
            <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                <button class="advanced_addons_btn advanced_addons_btn_solid btn_default">
                    <?php echo esc_html( $settings['button_text'] ); ?>
                </button>
            </a>
        </div>
    </div>