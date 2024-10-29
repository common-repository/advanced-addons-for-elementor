<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'font-weight-normal text-2f2f2f fz-20 ad-title');
?>
    <div class="advanced_addons_devider type-1 position-relative">
        <?php 
            if ( $settings['title'] ) :
             printf( '<%1$s %2$s>%3$s</%1$s>',
                tag_escape( $settings['title_tag'] ),
                $this->get_render_attribute_string( 'title' ),
                esc_html( $settings['title'] )
             );
        endif; ?>
        <p class="mb-0 aae-desc">
            <?php echo wp_kses_post($settings['description']);?>
        </p>
         <div class="advanced_addons_devider_line"></div>
    </div>