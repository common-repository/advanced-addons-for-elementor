<?php
	$settings = $this->get_settings_for_display();
	$custom_order_ck    = $this->get_settings_for_display('custom_order');
	$orderby            = $this->get_settings_for_display('orderby');
	$postorder          = $this->get_settings_for_display('postorder');
  ?>
  	<div class="advanced_addons_blog_post_carousel  advanced_addons_slider type-1  "  dotsClass="advanced_addons_dots type-1 position-absolute" dots='true' slidesToShow='3 3 1' centerMode='true' enableAutoPlay='false'>
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
	  ?>
	   <?php while($wp_query->have_posts()):$wp_query->the_post();?>
<!-- post block -->
		<div>
			<div class="advanced_addons_blog_post_block">
				<img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
				<div class="blog_content bg-white">
					<div class="blog_post_head position-relative">
						<a href="<?php the_permalink();?>" class="block_post_title  "><?php the_title();?></a>
						<?php if($settings['show_date']):?>
							<span class="d-block">
								<?php the_time('h');?> hours ago
							</span>
						<?php endif;?>
						<span class="section-design type-1"></span>
					</div>
					<div class="blog_post_body">
						<p>
							<?php echo wp_trim_words(get_the_content(),13,' ');?> 
						</p>
						<a href="<?php the_permalink();?>">
							<i class="icon-arrows_slim_right"></i>
							<span class="d-inline-block">
							  <?php echo esc_html_e('Read More');?>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
<!-- post block -->
<?php endwhile;?>
<!-- post block -->
</div>