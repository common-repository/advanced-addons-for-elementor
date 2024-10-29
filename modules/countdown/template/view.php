<?php
$settings = $this->get_settings_for_display();
$get_due_date =  esc_attr($settings['ad_countdown_due_time']);
$due_date = date("M d Y G:i:s", strtotime($get_due_date));
?>
    <?php if($settings['style'] === 'style1'):?>
      <div class="kounty-countdown advanced_addons_countdown type-1 d-flex align-items-center justify-content-center" data-countdown-seperator="label"  data-timer-date="<?php echo esc_attr($due_date);?>" data-day-label='<?php echo esc_attr($settings['ad_countdown_days_label']);?>'  data-hour-label='<?php echo esc_attr($settings['ad_countdown_hours_label']);?>' data-min-label='<?php echo esc_attr($settings['ad_countdown_minutes_label']);?>' data-sec-label='<?php echo esc_attr($settings['ad_countdown_seconds_label']);?>' data-countdown-message="Hurrah You are Done!">
            <?php if($settings['ad_countdown_days'] == 'yes'):?>
                <span class="countdown-days"></span>
            <?php endif;?>
            <?php if($settings['ad_countdown_hours'] == 'yes'):?>
                <span class="countdown-hours"></span>
            <?php endif;?>
            <?php if($settings['ad_countdown_minutes'] == 'yes'):?>
                <span class="countdown-minutes"></span>
            <?php endif;?>
            <?php if($settings['ad_countdown_seconds'] == 'yes'):?>
                <span class="countdown-seconds"></span>
            <?php endif;?>
       </div>
    <?php endif;?>
