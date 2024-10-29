<?php
$settings = $this->get_settings_for_display();

// Left button
$this->add_render_attribute( 'left_button', 'class', 'ad-dual-btn ad-dual-btn--left advanced_addons_btn advanced_addons_btn_solid btn_default' );
$this->add_render_attribute( 'left_button', 'href', esc_url( $settings['left_button_link']['url'] ) );
if ( ! empty( $settings['left_button_link']['is_external'] ) ) {
    $this->add_render_attribute( 'left_button', 'target', '_blank' );
}
if ( ! empty( $settings['left_button_link']['nofollow'] ) ) {
    $this->add_render_attribute( 'left_button', 'rel', 'nofollow' );
}
$this->add_inline_editing_attributes( 'left_button_text', 'none' );

if ( $settings['left_button_icon'] ) {
    $this->add_render_attribute( 'left_button_icon', 'class', [
        'ad-dual-btn-icon',
        'ad-dual-btn-icon--' . esc_attr( $settings['left_button_icon_position'] ),
        esc_attr( $settings['left_button_icon'] )
    ] );
}

// Button connector
$this->add_render_attribute( 'button_connector_text', 'class', 'ad-dual-btn-connector' );
if ( $settings['button_connector_type'] === 'icon' ) {
    $this->add_render_attribute( 'button_connector_text', 'class', 'ad-dual-btn-connector--icon' );
    $connector = sprintf( '<i class="%s"></i>', esc_attr( $settings['button_connector_icon'] ) );
} else {
    $this->add_render_attribute( 'button_connector_text', 'class', 'ad-dual-btn-connector--text ad-dual-btn-connector' );
    $this->add_inline_editing_attributes( 'button_connector_text', 'none' );
    $connector = esc_html( $settings['button_connector_text'] );
}

// Right button
$this->add_render_attribute( 'right_button', 'class', 'ad-dual-btn ad-dual-btn--right advanced_addons_btn advanced_addons_btn_bordered btn_default' );
$this->add_render_attribute( 'right_button', 'href', esc_url( $settings['right_button_link']['url'] ) );
if ( ! empty( $settings['right_button_link']['is_external'] ) ) {
    $this->add_render_attribute( 'right_button', 'target', '_blank' );
}
if ( ! empty( $settings['right_button_link']['nofollow'] ) ) {
    $this->add_render_attribute( 'right_button', 'rel', 'nofollow' );
}
$this->add_inline_editing_attributes( 'right_button_text', 'none' );

if ( $settings['right_button_icon'] ) {
    $this->add_render_attribute( 'right_button_icon', 'class', [
        'ad-dual-btn-icon',
        'ad-dual-btn-icon--' . esc_attr( $settings['right_button_icon_position'] ),
        esc_attr( $settings['right_button_icon'] )
    ] );
}
?>
   
                <div class="advanced_addons_button_group ">
                    <a <?php echo $this->get_render_attribute_string( 'left_button' ); ?>>
                            <?php echo esc_html( $settings['left_button_text'] ); ?>
                    </a>
                    <a <?php echo $this->get_render_attribute_string( 'right_button' ); ?>>
                           <?php echo esc_html( $settings['right_button_text'] ); ?>
                    </a>
                    <?php if ( $settings['button_connector_hide'] !== 'yes' ) : ?>
                        <span class="button_group_icon">
                           <?php echo $connector; ?>
                        </span>
                    <?php endif; ?>
                </div>