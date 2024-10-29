<?php
$settings = $this->get_settings_for_display();
?>
    <?php if($settings['style'] === 'style1'):?>
        <div class="advanced_addons_progressbar_container type-1">
            <?php
                foreach ( $settings['progressbar'] as $progressbar ) : ?>
                    <!-- Progressbar Block -->
                    <div class="advanced_block_progressbar_block type-1 elementor-repeater-item-<?php echo $progressbar['_id']; ?>" data-progress-parcent="<?php echo esc_attr($progressbar['persentage']);?>%">
                        <span class="progressbar-label p-name"><?php echo esc_html($progressbar['name']);?></span>
                        <span class="parcent p-parcent"><?php echo esc_html($progressbar['persentage']);?>%</span>
                        <div class="progress p-bar"></div>
                    </div>
                    <!-- Progressbar Block -->
            
                <!-- Progressbar Block -->
                <?php endforeach;?>
            </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style2'):?>
        <?php foreach ( $settings['progressbar'] as $progressbar ) : ?>
                <div class="advanced_block_progressbar_block type-2 position-relative elementor-repeater-item-<?php echo $progressbar['_id']; ?>" data-progress-parcent="<?php echo esc_attr($progressbar['persentage']);?>%">
                    <div class="block-content">
                        <span class="progressbar-label  p-name"><?php echo esc_html($progressbar['name']);?></span>
                        <span class="parcent p-parcent"><?php echo esc_html($progressbar['persentage']);?>%</span>
                    </div>
                    <div class="progress p-bar"></div>
                </div>
        <?php endforeach;?>
    <?php endif;?>

    <?php if($settings['style'] === 'style3'):?>
            <?php
                foreach ( $settings['progressbar'] as $progressbar ) : ?>
            <!-- Progressbar Block -->
                <div class="advanced_block_progressbar_block type-3 position-relative elementor-repeater-item-<?php echo $progressbar['_id']; ?>" data-progress-parcent="<?php echo esc_html($progressbar['persentage']);?>%">
                    <div class="block-content">
                        <span class="progressbar-label p-name"><?php echo esc_html($progressbar['name']);?></span>
                        <span class="parcent p-parcent"><?php echo esc_html($progressbar['persentage']);?>%</span>
                    </div>
                    <div class="progress bar-1 p-bar"></div>
                </div>
            <!-- Progressbar Block -->
        <?php endforeach;?>
    <?php endif;?>

    <?php if($settings['style'] === 'style4'):?>
        <?php
                foreach ( $settings['progressbar'] as $progressbar ) : ?>
           <!-- Progressbar Block -->
            <div class="advanced_block_progressbar_block type-3 bar-1 grad position-relative elementor-repeater-item-<?php echo $progressbar['_id']; ?>" data-progress-parcent="<?php echo esc_html($progressbar['persentage']);?>%">
                    <div class="block-content">
                        <span class="progressbar-label p-name"><?php echo esc_html($progressbar['name']);?></span>
                        <span class="parcent p-parcent"><?php echo esc_html($progressbar['persentage']);?>%</span>
                    </div>
                    <div class="progress p-bar" ></div>
                </div>
                <!-- Progressbar Block -->
            <?php endforeach;?>
    <?php endif;?>