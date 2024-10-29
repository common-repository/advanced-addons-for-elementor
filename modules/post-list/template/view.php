<?php
	$settings = $this->get_settings_for_display();
	$custom_order_ck    = $this->get_settings_for_display('custom_order');
	$orderby            = $this->get_settings_for_display('orderby');
	$postorder          = $this->get_settings_for_display('postorder');
	
  ?>
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
		<?php if($settings['style'] == 'style1'):?>
	  <?php while($wp_query->have_posts()):$wp_query->the_post();?>
  			<div class="advanced_addons_blog_list_post type-1">
						<div class="blog_content">
							<a href="<?php the_permalink();?>">
								<h3 class="blog_title">
								<?php the_title();?>
							</h3>
							</a>
							<div class="blog_heaed bg-white rounded-pill ">
								<ul class="list-style-none mb-0 pl-0 block_post_meta">
									<?php if($settings['show_author']):?>
										<li>
											<a href="#" class="post-author aa-media">
												<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" class="aa-content-1 rounded-circle" alt="">
												<span class="aa-content-2">
												<?php echo esc_html( $current_user->user_login ); ?>
												</span>
											</a>
										</li>
									<?php endif;?>
									<?php if($settings['show_date']):?>
										<li>
											<span class="post-date">
												<i class="icon-calendar"></i>
												<?php the_time('F j, Y'); ?>
											</span>
										</li>
									<?php endif;?>
									<?php if($settings['show_comments']):?>
										<li>
											<span class="post-comments-number">
												<i class="icon-user_comment"></i>
												<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
											</span>
										</li>
									<?php endif;?>
								</ul>
							</div>
							<div class="blog_body">
								<p>
									<?php echo wp_trim_words(get_the_content(),23,' ');?>
								</p>
								<a href="<?php the_permalink();?>" class="read_more">
									<?php echo esc_html_e('Read more','aa_elementor');?>
									<span class="read_more_dots">
										<span></span>
										<span></span>
										<span></span>
									</span>
								</a>
							</div>
						</div>
						<div class="blog_image">
							<img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
						</div>
					</div>
				</div>
		<?php endwhile; endif;?>

		<?php if($settings['style'] == 'style2'): ?>
		<!-- Post List -->
				<div class="pt-100 pb-100">
					<div class="container">
						<div class="row">
							<div class="col">
							<?php while($wp_query->have_posts()):$wp_query->the_post();?>
									<div class="advanced_addons_blog_list_post type-1 dark-mode">
										<div class="blog_content">
											<a href="<?php the_permalink();?>">
												<h3 class="blog_title">
												<?php the_title();?>
											</h3>
											</a>
											<div class="blog_heaed bg-white rounded-pill">
												<ul class="list-style-none mb-0 pl-0">
													<li>
														<a href="#" class="post-author aa-media">
															<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" class="aa-content-1 " alt="">
															<span class="aa-content-2">
																<?php echo esc_html( $current_user->user_login ); ?>
															</span>
														</a>
													</li>
													<?php if($settings['show_date']):?>
														<li>
															<span class="post-date">
																<i class="icon-calendar"></i>
																<?php the_time('F j, Y'); ?>
															</span>
														</li>
													<?php endif;?>
													<?php if($settings['show_comments']):?>
														<li>
															<span class="post-comments-number">
																<i class="icon-user_comment"></i>
																	<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
															</span>
														</li>
													<?php endif;?>
												</ul>
											</div>
											<div class="blog_body" data-find="_10">
												<p>
													<?php echo wp_trim_words(get_the_content(),23,' ');?>
												</p>
												<a href="<?php the_permalink();?>" class="read_more">
													<?php echo esc_html_e('Read more','aa_elementor');?>
													<span class="read_more_dots">
														<span></span>
														<span></span>
														<span></span>
													</span>
												</a>
											</div>
										</div>
										<div class="blog_image">
											<img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
										</div>
									</div>
								<?php endwhile;?>

							</div>
						</div>
					</div>
				</div>
				<!-- Post List -->

	<?php endif;?>


	<?php if($settings['style'] == 'style3'): ?>
					<!-- Post List -->
					<div class="pt-100 pb-100">
							<div class="container">
								<div class="row">
									<div class="col">
									<?php while($wp_query->have_posts()):$wp_query->the_post();?>
										<div class="advanced_addons_blog_list_post type-1 dark-mode with-background position-relative  parallax-window  overflow-hidden mouse-move" style="background-image:url(<?php the_post_thumbnail_url();?>); background-repeat:no-repeat">
											<div class="blog_content" >
												<a href="<?php the_permalink();?>">
													<h3 class="blog_title">
													<?php the_title();?>
												</h3>
												</a>
												<div class="blog_body" >
													<p>
														<?php echo wp_trim_words(get_the_content(),23,' ');?>
													</p>
													<a href="<?php the_permalink();?>" class="read_more">
														<?php echo esc_html_e('Read more','aa_elementor');?>
														<span class="read_more_dots">
															<span></span>
															<span></span>
															<span></span>
														</span>
													</a>
												</div>
												<div class="blog_heaed bg-white rounded-pill">
													<ul class="list-style-none mb-0 pl-0">

														<li>
															<a href="#" class="post-author aa-media">
																<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" class="aa-content-1 rounded-circle" alt="">
																<span class="aa-content-2">
																<?php echo esc_html( $current_user->user_login ); ?>
																</span>
															</a>
														</li>
														<?php if($settings['show_date']):?>
															<li>
																<span class="post-date">
																	<i class="icon-calendar"></i>
																		<?php the_time('F j, Y'); ?>
																</span>
															</li>
														<?php endif;?>
														<?php if($settings['show_comments']):?>
															<li>
																<span class="post-comments-number">
																	<i class="icon-user_comment"></i>
																	<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?>
																</span>
															</li>
														<?php endif;?>
													</ul>
												</div>
											</div>
										</div>
										<?php endwhile;?>

									</div>
								</div>
							</div>
						</div>
						<!-- Post List -->
	<?php endif;?>