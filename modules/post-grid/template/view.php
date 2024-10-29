<?php
  $settings = $this->get_settings_for_display();
  $custom_order_ck    = $this->get_settings_for_display('custom_order');
	$orderby            = $this->get_settings_for_display('orderby');
	$postorder          = $this->get_settings_for_display('postorder');
  ?>
  <div class="row">
      <?php 
         $args = array(
                    'posts_per_page' => $settings['posts_limit'],
                      'post_status'    => 'publish',
                      'cat'            => $settings['cat_name'],
                      'order'          => $postorder
              );
              // Custom Order
              if( $custom_order_ck == 'yes' ){
                  $args['orderby']    = $orderby;
              }
      $wp_query = new \WP_Query($args);
      $user = wp_get_current_user();
	  $current_user = wp_get_current_user();
      ?>
      <?php if($settings['style'] === 'style1'):?>
        <?php while($wp_query->have_posts()):$wp_query->the_post();?>
            <div class="col-sm-6 col-lg-<?php echo esc_attr($settings['show_Column']);?>">
                <!-- Single post block -->
                <div class="advanced_addons_blog_post type-1 mb-4">
                    <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                    <a href="<?php the_permalink();?>" class="block_post_title text-2f2f2f text-uppercase">
                        <?php the_title();?>
                    </a>
                    <ul class="block_post_meta mb-0 pl-0 list-style-none d-flex">
                        <?php if($settings['show_date']):?>
                            <li>
                                <a href="#">
                                    <?php the_time('j F Y');?>
                                </a>
                            </li>
                        <?php endif;?>
                        <?php if($settings['show_author']):?>
                            <li>
                                <a href="#">
                                    <?php the_author();?>
                                </a>
                            </li>
                        <?php endif;?>
                    </ul>
                    <div class="block_post_body">
                        <p>
                        <?php echo wp_trim_words(get_the_content(),38,' ');?>
                        </p>
                    </div>
                    <div class="block_post_footer">
                        <a href="<?php the_permalink();?>">
                            <?php echo esc_html_e('Read More');?>
                        </a>
                    </div>
                </div>
                <!-- End Single post block -->
            </div>
            <?php endwhile;?>
        </div>
    <?php endif;?>

    <?php if($settings['style'] === 'style2'):?>
        <?php while($wp_query->have_posts()):$wp_query->the_post();?>
            <div class="col-md-<?php echo esc_attr($settings['show_Column']);?>">
					<div class="advanced_addons_blog_grid_post type-1 position-relative bg-white">
						<img src="<?php the_post_thumbnail_url();?>" class="blog_image img-fluid" alt="">
						<div class="blog_content">
							<a href="<?php the_permalink();?>" class="blog_title fz-22 position-relative font-color font-weight-bold" data-font-color="171f3e">
                                <?php the_title();?>
							</a>
				    		<div class="blog_body">
								<p class="font-color" data-font-color="696f86">
								    <?php echo wp_trim_words(get_the_content(),13,' ');?>
								</p>

                                <a href="<?php the_permalink();?>" class="read_more">
                                    <?php echo esc_html_e('Read More');?>
                                 </a>

							</div>
							<div class="aa-media ">
								<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" class="aa-content-1 rounded-circle" alt="load to failed">
								<div class="aa-content-2">
                                <?php if($settings['show_author']):?>
                                    <h6 class="mb-0 fz-14 font-color post-meta" data-font-color="9ea2b1"><?php echo esc_html( $current_user->user_login ); ?></h6>
                                <?php endif;?>
                                <?php if($settings['show_date']):?>
									<p class="mb-0 font-color post-meta" data-font-color="171f3e">
                                        <?php the_time('F j, Y'); ?>
                                    </p>
                                <?php endif;?>
								</div>
							</div>
						</div>
					</div>
                </div>
         <?php endwhile;?>
    <?php endif;?>

    <?php if($settings['style'] === 'style3'):?>
        <?php while($wp_query->have_posts()):$wp_query->the_post();?>
            <div class="col-md-<?php echo esc_attr($settings['show_Column']);?>">
					<div class="advanced_addons_blog_grid_post type-2 position-relative bg-white overflow-hidden">
						<div class="blog_image position-relative">
							<img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
							<a href="<?php the_permalink();?>" class="blog_title font-weight-bold fz-18 text-white">
								<?php the_title();?>
							</a>
							<div class="svg-2 position-absolute">
								<!--?xml version="1.0" encoding="utf-8"?-->
								<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 230.6" style="enable-background:new 0 0 360 230.6;" xml:space="preserve">
								<style type="text/css">
									.st0{fill:#FFFFFF;}
								</style>
								<path class="st0" d="M11.3,50.2l301.5,75c9.2,2.9,18.9-2.8,20.7-12.3L359.7,2.7c0.1-0.7,0.2-1.6,0.3-2.4c0-0.1,0-0.2,0-0.3
									c0-1,0,230.6,0,230.6H0V34.8C0,41.8,4.6,48.1,11.3,50.2z"></path>
								</svg>

							</div>
							<div class="svg-1 position-absolute">	
								<!--?xml version="1.0" encoding="utf-8"?-->
								<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 230.6" style="enable-background:new 0 0 360 230.6;" xml:space="preserve">
								<style type="text/css">
									.st0{fill:#FFFFFF;}
								</style>
								<path class="st0" d="M348.7,50.2l-301.5,75c-9.2,2.9-18.9-2.8-20.7-12.3L0.3,2.7C0.2,2,0.1,1.1,0,0.3C0,0.2,0,0.1,0,0
									c0-1,0,230.6,0,230.6h360V34.8C360,41.8,355.4,48.1,348.7,50.2z"></path>
								</svg>
							</div>
						</div>
						<div class="blog_content">
							<div class="blog_heaed  rounded-pill">
								<ul class="list-style-none mb-0 pl-0 d-flex">
                                    <?php if($settings['show_author']):?>
                                        <li>
                                            <span class="post-date post-meta">
                                                <i class="icon-paper_pencil"></i>
                                                <?php echo esc_html( $current_user->user_login ); ?>
                                            </span>
                                        </li>
                                    <?php endif;?>
                                    <?php if($settings['show_date']):?>
                                        <li>
                                            <span class="post-date post-meta">
                                                <i class="icon-calendar"></i>
                                                <?php the_time('F j, Y'); ?>
                                            </span>
                                        </li>
                                    <?php endif;?>
									
								</ul>
							</div>
							
                         <div class="blog_body text-center">
							<p class="font-color fz-14 mb-0 post-desc" data-font-color="696f86">
                                <?php echo wp_trim_words(get_the_content(),13,' ');?>
							</p>
							
						</div>
                            <div class="blog_footer text-center">
                                    <a href="<?php the_permalink();?>" class="advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill post-btn" data-color="f8f9fd">
                                        <?php echo esc_html_e('Read More');?>
                                     </a>
                            </div>
						</div>
						
					</div>
                </div>
         <?php endwhile;?>
    <?php endif;?>

    <?php if($settings['style'] === 'style4'):?>
        <?php while($wp_query->have_posts()):$wp_query->the_post();?>
                <div class="aae-parent-container col-md-<?php echo esc_attr($settings['show_Column']);?>">
					<div class="advanced_addons_blog_grid_post type-3 position-relative bg-white">
						<div class="blog_image">
							<img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
						</div>
						<div class="blog_content">
							<a href="<?php the_permalink();?>" class="blog_title font-weight-bold fz-18">
								<?php the_title();?>
							</a>
	                         <div class="blog_body">
								<p class="font-color fz-14 mb-0 post-desc" data-font-color="696f86">
                                    <?php echo wp_trim_words(get_the_content(),8,' ');?> 
								</p>
							</div>
							<div class="aa-media ">
								<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" class="aa-content-1 rounded-circle" alt="load to failed">
								<div class="aa-content-2">
                                    <?php if($settings['show_author']):?>
                                        <h6 class="mb-0 fz-14 post-meta">
                                            <?php echo esc_html( $current_user->user_login ); ?>
                                        </h6>
                                    <?php endif;?>
                                    <?php if($settings['show_date']):?>
                                        <p class="mb-0 font-color post-meta" data-font-color="171f3e">
                                            <?php the_time('F j, Y'); ?>
                                        </p>
                                    <?php endif;?>
								</div>
							</div>
						</div>
					</div>
                </div>
            <?php endwhile;?>
    <?php endif;?>

    <?php if($settings['style'] === 'style5'):?>
         <?php while($wp_query->have_posts()):$wp_query->the_post();?>
                <div class="aae-parent-container col-sm-<?php echo esc_attr($settings['show_Column']);?>">
					<div class="advanced_addons_blog_grid_post type-4 position-relative bg-white">
						<div class="hoverable_content position-absolute"></div>
						<div class="blog_content">
							<a href="#" class="blog_title fz-26 font-color font-weight-bold" data-font-color="171f3e">
								<?php the_title();?>
							</a>
							<div class="blog_heaed  rounded-pill">
								<ul class="list-style-none mb-0 pl-0 d-flex">
                                    <?php if($settings['show_author']):?>
                                        <li>
                                            <span class="post-date post-meta">
                                                <i class="icon-paper_pencil"></i>
                                                <?php echo esc_html( $current_user->user_login ); ?>
                                            </span>
                                        </li>
                                    <?php endif;?>
                                    <?php if($settings['show_date']):?>
                                        <li>
                                            <span class="post-date post-meta">
                                                <i class="icon-calendar"></i>
                                                <?php the_time('F j, Y'); ?>
                                            </span>
                                        </li>
                                    <?php endif;?>
									<li>
										<span class="post-like post-meta">
                                            <i class="icon-user_comment"></i>
											<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
										</span>
									</li>
								</ul>
							</div>
							<div class="blog_body">
								<p class="font-color fz-14 mb-0 post-desc" data-font-color="696f86">
                                    <?php echo wp_trim_words(get_the_content(),13,' ');?> 
								</p>
								<a href="<?php the_permalink();?>" class="advanced_addons_btn advanced_addons_btn_solid btn_default btn_rounded post-btn">
                                    <?php echo esc_html_e('Read More');?>
								</a>
							</div>
						</div>
					</div>
                </div>
        <?php endwhile;?>
    <?php endif;?>