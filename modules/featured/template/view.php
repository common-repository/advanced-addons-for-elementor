<?php
$settings = $this->get_settings_for_display();

$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'fz-20 font-weight-normal text-2f2f2f aae-fetured-title' );
$this->add_render_attribute( 'title2', 'class', 'featured_title fz-22 d-block aae-fetured-title' );
$this->add_render_attribute( 'title3', 'class', 'fz-26 mb-0 text-2f2f2f text-capitalize aae-fetured-title' );



$this->add_inline_editing_attributes( 'description', 'basic' );
$this->add_render_attribute( 'description', 'class', 'ad-fetured-text  fz-14' );
$this->add_render_attribute( 'description2', 'class', 'ad-fetured-text' );
$this->add_render_attribute( 'description3', 'class', 'ad-fetured-text mb-0' );



$this->add_inline_editing_attributes( 'button_text', 'none' );
$this->add_render_attribute( 'button_text', 'class', 'ad-btn-text' );

$this->add_render_attribute( 'button', 'class', 'aae-fetured-btn ad-btn--link' );
$this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
if ( ! empty( $settings['button_link']['is_external'] ) ) {
    $this->add_render_attribute( 'button', 'target', '_blank' );
}
if ( ! empty( $settings['button_link']['nofollow'] ) ) {
    $this->set_render_attribute( 'button', 'rel', 'nofollow' );
}

$this->add_render_attribute( 'button2', 'class', 'read_more position-relative d-flex align-items-center aae-fetured-btn' );
$this->add_render_attribute( 'button2', 'href', esc_url( $settings['button_link']['url'] ) );
if ( ! empty( $settings['button_link']['is_external'] ) ) {
    $this->add_render_attribute( 'button2', 'target', '_blank' );
}
if ( ! empty( $settings['button_link']['nofollow'] ) ) {
    $this->set_render_attribute( 'button2', 'rel', 'nofollow' );
}
?>
<?php if($settings['style'] == 'style1') :?>
        <div class="advanced_addons_service bordered rounded rounded-12 type-1 bg-white">

            <i class="<?php echo esc_attr( $settings['icon'] ); ?> fz-40 text-e0e0e0 advanced_addons_icon aae-fetured-icons"></i>
            <?php
            if ( $settings['title' ] ) :
                printf( '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape( $settings['title_tag'] ),
                    $this->get_render_attribute_string( 'title' ),
                    esc_html( $settings['title' ] )
                );
            endif;
            ?>
            <?php if ( $settings['description'] ) : ?>
                <p <?php echo $this->get_render_attribute_string( 'description' ); ?>>
                    <?php echo wp_kses_data( $settings['description'] ); ?>
                </p>
            <?php endif; ?>
            <?php
            if ( $settings['button_text'] && empty( $settings['button_icon'] ) ) :
                printf( '<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                );
            elseif ( empty( $settings['button_text'] ) && $settings['button_icon'] ) :
                printf( '<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    sprintf( '<i class="%1$s"></i>', esc_attr( $settings['button_icon'] ) )
                );
            elseif ( $settings['button_text'] && $settings['button_icon'] ) :
                if ( $settings['button_icon_position'] === 'before' ) :
                    $this->add_render_attribute( 'button', 'class', 'ad-btn--icon-before' );
                    $btn_before = sprintf( '<i class="ad-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                    $btn_after = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                else :
                    $this->add_render_attribute( 'button', 'class', 'ad-btn--icon-after' );
                    $btn_before = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                    $btn_after = sprintf( '<i class="ad-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                endif;
                printf( '<a %1$s>%2$s %3$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    $btn_before,
                    $btn_after
                );
            endif;
            ?>
        </div>
<?php endif;?>

<?php if($settings['style'] == 'style2') :?>
                <div class="advanced_addons_service type-4 bg-white position-relative overflow-hidden">
						<span class="snow-dot"></span>
						<span class="snow-dot"></span>
						<span class="snow-dot"></span>
						<span class="snow-dot"></span>
						<span class="snow-dot"></span>
						<span class="snow-dot"></span>
						<span class="snow-dot"></span>
						<i class="<?php echo esc_attr( $settings['icon'] ); ?> featured_icon d-inline-block font-color aae-fetured-icons" data-font-color="6df7bc"></i>
						<div class="hover-content"></div>
                        <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title2' ),
                                    esc_html( $settings['title' ] )
                                );
                            endif;
                        ?>
						<p <?php echo $this->get_render_attribute_string( 'description2' ); ?>>
                            <?php echo wp_kses_data( $settings['description'] ); ?>
                        </p>
                        <?php
                        if ( $settings['button_text'] && empty( $settings['button_icon'] ) ) :
                            printf( '<a %1$s>%2$s</a>',
                                $this->get_render_attribute_string( 'button2' ),
                                sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                            );
                        elseif ( empty( $settings['button_text'] ) && $settings['button_icon'] ) :
                            printf( '<a %1$s>%2$s</a>',
                                $this->get_render_attribute_string( 'button2' ),
                                sprintf( '<i class="%1$s"></i>', esc_attr( $settings['button_icon'] ) )
                            );
                        elseif ( $settings['button_text'] && $settings['button_icon'] ) :
                            if ( $settings['button_icon_position'] === 'before' ) :
                                $this->add_render_attribute( 'button2', 'class', 'ad-btn--icon-before' );
                                $btn_before = sprintf( '<i class="ad-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                                $btn_after = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                            else :
                                $this->add_render_attribute( 'button2', 'class', 'ad-btn--icon-after' );
                                $btn_before = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                $btn_after = sprintf( '<i class="ad-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                            endif;
                            printf( '<a %1$s>%2$s %3$s</a>',
                                $this->get_render_attribute_string( 'button2' ),
                                $btn_before,
                                $btn_after
                            );
                        endif;?>
		        </div>
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
