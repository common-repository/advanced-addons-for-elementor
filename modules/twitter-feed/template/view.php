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
$connection         = new \TwitterOAuth( $consumer_key, $consumer_secret, $access_token, $access_token_secret );
$tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count='.$limit.'&exclude_replies='.$exclude_replies);
 ?>

    <div class="row">
        <?php
            foreach( $tweets as $tweet ):
                $tweet_link = 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str;
                $user_link = 'http://twitter.com/'.$tweet->user->screen_name;
                $tweet_short_link = $this->get_short_link( $tweet_link );
            // echo "<pre>";
            //    print_r($tweet);
            // echo "</pre>";
            ?>
            <div class="col-md-<?php echo esc_attr($settings['show_Column']);?>">
                <div class="advanced_addons_twitter_feed type-1 bg-white">
						<div class="advanced_addons_head">
							<div class="aa-media position-relative">
								<div class="aa-content1 rounded-circle">
                                    <?php if( $settings['author_image'] == 'yes' ):?>
                                        <img class="rounded-circle" src="<?php echo $tweet->user->profile_image_url; ?>" title="<?php echo esc_attr( $tweet->user->name ); ?>" alt="<?php echo esc_attr( $tweet->user->name ); ?>">
                                    <?php endif;?>
								</div>
								<div class="aa-content2">
									<h4 class="mb-0 username"> <?php echo esc_html($tweet->user->name); ?></h4>
									<ul class="list-style-none m-0 p-0">
                                    <?php if($settings['author_name'] == 'yes' ): ?>
										<li>
											<a href="<?php echo esc_url($user_link); ?>" class="username">
												@<?php echo esc_html($tweet->user->name); ?>
											</a>
                                        </li>
                                    <?php endif;?>

										<li>
											<a href="<?php echo esc_url($user_link); ?>" class="date">
                                                <?php 
                                                    if( $relative_time == 'yes' ){
                                                        echo $this->relative_time($tweet->created_at);
                                                    }
                                                    else{
                                                        echo $this->date_format( $tweet->created_at );
                                                    }
                                                ?>
											</a>
											
										</li>
									</ul>
								</div>
								<span class="aae-varify position-absolute">
												
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="15" height="15" viewBox="0 0 15 15">
									  <image xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAxlBMVEUAAAAcnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnescnesAAAAogTyAAAAAQHRSTlMABQ5Z+AIBo/u9+q7uoeDmA5/fyYcEB/f9phm3/lvPY7FpiPRDzWh1e059Mm9uzHJluxcGk9Tqq+nTqva8kUkYR75XYwAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAACcSURBVAjXPU7nGoIwEIsiirhHaXGAiHsr7nnv/1SWtpofd8l9+XIBgEwWVs6CnYdGwSm65JbKFaOrpFFLDfVGk35otRk8boTw5egAXS17fQQUAKFDNBBEEYZE8QjSPsaEppilLo65PCywxEplrIGN3FvsVMgeOCjiC7XiBMnx9P9/vjDZyL4aebN13/vjKYgH9DL9mYeIv/FJJP8C58EgWBKJyLkAAAAASUVORK5CYII=" width="15" height="15"></image>
									</svg>

								</span>
							</div>
						</div>
						<div class="advanced_addons_body">
							<p class="textc">
                                <?php echo wp_trim_words( $tweet->text, $settings['content_length'], ' ' ); ?>
							</p>
						</div>
						
						<div class="advanced_addons_footer">
							<ul class="pl-0 mb-0 d-flex list-style-none meta">
                                <li>
                                    <a href="https://twitter.com/intent/favorite?tweet_id=<?php echo esc_attr__( $tweet->id_str ); ?>" target="_blank"><i class="fa fa-heart"></i></a>
                                </li>
                                <li>
                                     <a href="https://twitter.com/intent/retweet?tweet_id=<?php echo esc_attr__( $tweet->id_str ); ?>"><i class="fa fa-repeat"></i></a>
                                </li>
                                <li>
                                     <a href="https://twitter.com/intent/tweet?in_reply_to=<?php echo esc_attr__( $tweet->id_str ); ?>" target="_blank"><i class="fa fa-reply"></i></a>
                                </li>
							</ul>
						</div>
                    </div>
                </div>
         <?php endforeach;?>
    </div>
      
