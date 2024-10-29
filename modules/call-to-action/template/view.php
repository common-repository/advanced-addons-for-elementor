<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title1', 'none' );
$this->add_render_attribute( 'title1', 'class', 'ade-title' );

$this->add_inline_editing_attributes( 'sub1', 'basic' );
$this->add_render_attribute( 'sub1', 'class', 'ade-sub' );

$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'ade-title' );

$this->add_inline_editing_attributes( 'sub', 'basic' );
$this->add_render_attribute( 'sub', 'class', 'ade-sub' );

$this->add_inline_editing_attributes( 'button_text', 'none' );
$this->add_render_attribute( 'button_text', 'class', 'ad-btn-text' );

$this->add_render_attribute( 'button1', 'class', 'advanced_addons_btn advanced_addons_btn_bordered btn_default btn_pill ade-btn' );
$this->add_render_attribute( 'button1', 'href', esc_url( $settings['button_link']['url'] ) );
if ( ! empty( $settings['button_link']['is_external'] ) ) {
    $this->add_render_attribute( 'button1', 'target', '_blank' );
}
if ( ! empty( $settings['button_link']['nofollow'] ) ) {
    $this->set_render_attribute( 'button1', 'rel', 'nofollow' );
}

$this->add_render_attribute( 'button2', 'class', 'advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill ade-btn2' );
$this->add_render_attribute( 'button2', 'href', esc_url( $settings['button_link2']['url'] ) );
if ( ! empty( $settings['button_link2']['is_external'] ) ) {
    $this->add_render_attribute( 'button2', 'target', '_blank' );
}
if ( ! empty( $settings['button_link2']['nofollow'] ) ) {
    $this->set_render_attribute( 'button2', 'rel', 'nofollow' );
}

$this->add_render_attribute( 'button3', 'class', 'advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill ade-btn' );
$this->add_render_attribute( 'button3', 'href', esc_url( $settings['button_link']['url'] ) );
if ( ! empty( $settings['button_link']['is_external'] ) ) {
    $this->add_render_attribute( 'button3', 'target', '_blank' );
}
if ( ! empty( $settings['button_link']['nofollow'] ) ) {
    $this->set_render_attribute( 'button3', 'rel', 'nofollow' );
}
 ?>
<?php if($settings['style'] === 'style1'):?>
        <!-- End Promo Box -->
        <div class="ade-cal pt-100 pb-100 set-bg position-relative advanced_addons_callto_action_area type-2" style="background-image: url('<?php echo esc_url($settings['image2']['url']);?>')">
            <div class="overlay position-absolute"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="advanced_addons_callto_action type-2 text-center style1">
                        <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title1' ),
                                    esc_html( $settings['title' ] )
                                );
                            endif;
                        ?>
                            <?php if ( $settings['sub_title'] ) : ?>
                                <p <?php echo $this->get_render_attribute_string( 'sub1' ); ?>>
                                <?php echo wp_kses_data( $settings['sub_title'] ); ?>
                                </p>
                            <?php endif; ?>
                            <div>
                                <?php
                                    printf( '<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string( 'button1' ),
                                        sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                                    );
                                ?>
                                <?php
                                    printf( '<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string( 'button2' ),
                                        sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text2'] ) )
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
        <!-- End Promo Box -->
    <?php endif;?>
    <?php if($settings['style'] === 'style2'):?>
            <div class="ade-cal advanced_addons_callto_action type-2 promo-box text-left ">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-7">
                     <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    esc_html( $settings['title' ] )
                                );
                            endif;
                        ?>
                            <?php if ( $settings['sub_title'] ) : ?>
                                <p <?php echo $this->get_render_attribute_string( 'sub' ); ?>>
                                <?php echo wp_kses_data( $settings['sub_title'] ); ?>
                                </p>
                            <?php endif; ?>
                            <div>
                            <?php
                                    printf( '<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string( 'button3' ),
                                        sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                                    );
                                ?>
                            </div>
                    </div>
                    <div class="col-md-5">
                        <img src="<?php echo esc_url($settings['image']['url']);?>" class="img-fluid">
                    </div>
                </div>
            </div>
    <?php endif;?>
     <?php if($settings['style'] === 'style3'):?>
            <!-- Promo Box -->
            <div class="ade-cal pt-120 pb-120 set-bg " style="background-image: url('<?php echo esc_url($settings['image2']['url']);?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class=" advanced_addons_callto_action type-2 promo-box transparent text-left position-relative overflow-hidden ">
                                <span class="bg-icon position-absolute">
                                    <i class="far fa-heart"></i>
                                </span>
                                <?php
                                    if ( $settings['title' ] ) :
                                        printf( '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape( $settings['title_tag'] ),
                                            $this->get_render_attribute_string( 'title' ),
                                            esc_html( $settings['title' ] )
                                        );
                                    endif;
                                ?>
                                <?php if ( $settings['sub_title'] ) : ?>
                                    <p <?php echo $this->get_render_attribute_string( 'sub' ); ?>>
                                    <?php echo wp_kses_data( $settings['sub_title'] ); ?>
                                    </p>
                                <?php endif; ?>
                                    <div>
                                        <?php
                                            printf( '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string( 'button3' ),
                                                sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                                            );
                                        ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Promo Box -->
    <?php endif;?>

    