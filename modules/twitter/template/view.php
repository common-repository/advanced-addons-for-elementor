<?php
$settings = $this->get_settings_for_display();
//require AAE_DIR_PATH . 'inc/twitteroauth.php';
$consumer_key = ( !empty( $settings['consumer_key'] ) ) ? $settings['consumer_key'] : 'f8rgdbh1TRxnyOmKZRzVooMEQ';
$consumer_secret = ( !empty( $settings['consumer_secret'] ) ) ? $settings['consumer_secret'] : 'KQTDmHzIMig6PGElowd4KXEjeU0MDAV189vKmyTT6kvumO0giK';
$access_token = ( !empty( $settings['access_token'] ) ) ? $settings['access_token'] : '1062990223171145729-fcehRzuBPGjD2dkQi44hqgS7ApMSX2';
$access_token_secret = ( !empty( $settings['access_token_secret'] ) ) ? $settings['access_token_secret'] : '7Ip9Z5uiWP8iYZOCd8EYtOY8Wti4MaWwbUkMFuZndevEo';
$username = ( !empty( $settings['username'] ) ) ? $settings['username'] : 'advancedit';

$relative_time      = $settings['relative_time'];
$limit              = ( !empty( $settings['limit'] ) ) ? $settings['limit'] : 5;
$exclude_replies    = 'false';
$connection = new \TwitterOAuth( $consumer_key, $consumer_secret, $access_token, $access_token_secret );
$tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count='.$limit.'&exclude_replies='.$exclude_replies);
 ?>

    <div class="advanced_addons_slider advanced_addons_twitter_item pb-60 bg-fafbfd  text-center type-1"  dotsClass="advanced_addons_dots type-1" dots='true'>
        <?php
            foreach( $tweets as $tweet ):
                $tweet_link = 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str;
                $user_link = 'http://twitter.com/'.$tweet->user->screen_name;
                $tweet_short_link = $this->get_short_link( $tweet_link );
            // echo "<pre>";
            //    print_r($tweet);
            // echo "</pre>";
            ?>
                <!-- signle Items -->
                <div class="single_item">
                    <div class="advanced_addons_twitter_item text-center  pt-60 pb-60">
                        <?php if( $settings['author_image'] == 'yes' ):?>
                           <a href="<?php echo esc_url($user_link); ?>" target="_blank">
                            <img class="img-fluid" src="<?php echo $tweet->user->profile_image_url; ?>" title="<?php echo esc_attr( $tweet->user->name ); ?>" alt="<?php echo esc_attr( $tweet->user->name ); ?>">
                          </a>
                        <?php endif;?>
                        <div class="row no-gutters">
                            <div class="col-md-8 offset-md-2">
                            <?php if($settings['author_name'] == 'yes' ): ?>
                                <h4 class="t-user">
                                      <i class="fa fa-twitter"></i>
                                      <?php echo esc_html($tweet->user->name); ?>
                               </h4>
                              <?php endif;?>
                            <span class="text-c4c4c4 font-weight-normal t-date-time">
                            <?php 
                                if( $relative_time == 'yes' ){
                                     echo $this->relative_time($tweet->created_at);
                                }
                                else{
                                    echo $this->date_format( $tweet->created_at );
                                }
                                    ?>
                            </span>
                            <div class="block-body">
                                <p class="t-desc">
                                  <?php echo wp_trim_words( $tweet->text, $settings['content_length'], ' ' ); ?>
                                </p>
                                <a href="<?php echo esc_url($user_link); ?>" class="advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill t-btn">
                                  <?php echo esc_html_e('Twiter page');?>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Singtle Items -->
         <?php endforeach;?>
    </div>    
