<?php
 $settings = $this->get_settings_for_display();
 ?>
 <?php if($settings['style'] == 'style1'):?>
     <!-- single tab item -->
     <div class="bg-f7f7f7 pb-120 pt-60 section-parent">
         <div class="row no-gutters">
             <div class="col-md-10 offset-md-1">
                 <div class="row no-gutters">
                     <div class="col-md-8 offset-md-2">
                         <div class="advanced_addons_tab_item row no-gutters set-bg type-1 d-flex align-items-center">
                             
                             <?php
                             $totalnumber = count($settings['testimonial']);
                             
                             
                                 foreach ( $settings['testimonial'] as $index => $item ) :
                                     $title  = $item['title'];
                                     $desc  = $item['desc'];
                                     $tab_count = $index + 1;
                                     $iconHTMl = (isset($item['icon_type']) && $item['icon_type'] == 'icon' && $item['title_icon'] != '') ?
                 '<i class="'.$item['title_icon'].'  inline-block advanced_addons_tab_item_icon"></i>' : '';
                                     $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                    // $tab_id    = 'advanced-tab-'. $tab_count;
                             ?>
                             <a href="#<?php echo $tab_id?>" class="tab-link col text-center  <?php echo ($settings['active_number'] - 1) == $index && ( $settings['active_number'] > 0) && ( $settings['active_number'] <=  $totalnumber) ? 'active' : ''?>">
                                 <?php echo $iconHTMl;?>
                                 <?php echo esc_html($title);?>
                             </a>
                             <?php
                             $i= 0;
                              endforeach;

                              ?>
                         </div>
                     </div>
                 </div>
                 <div class="advanced_addons_tab_content type-1 section-parent">
                     <?php
                      $totalnumber = count($settings['testimonial']);
                             if($i <= $totalnumber){
                                 $i= 1;
                             }
                                 foreach ( $settings['testimonial'] as $index => $item ) :
                                     $title  = $item['title'];
                                     $desc  = $item['desc'];
                                     $tab_count = $index + 1;
                                     $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                    // $tab_id    = 'advanced-tab-'. $tab_count;
                             ?>
                     <div class="block-content <?php echo $i == 1 ? 'active' : ''?>" id="<?php echo $tab_id?>">
                         <p class="mb-0">
                             <?php echo esc_html($desc);?>
                         </p>
                     </div>
                     <?php
                     $i= 0;
                      endforeach; ?>
                 </div>
             </div>
         </div>
     </div>
<?php endif;?>


        <?php if($settings['style'] == 'style2'):?>
                <div class="section-paren">
                            <div class="advanced_addons_tab type-2 bg-f7f7f7 ">
								<div class="row no-gutters">
									<div class="col-md-8 offset-md-2">
										<div class="advanced_addons_tab_item row no-gutters type-1 d-flex align-items-center">
                                        <?php
                                            $totalnumber = count($settings['testimonial']);
                                            foreach ( $settings['testimonial'] as $index => $item ) :
                                                $title  = $item['title'];
                                                $desc  = $item['desc'];
                                                $tab_count = $index + 1;
                                                $iconHTMl = (isset($item['icon_type']) && $item['icon_type'] == 'icon' && $item['title_icon'] != '') ?
                                                '<i class="'.$item['title_icon'].'  inline-block advanced_addons_tab_item_icon"></i>' : '';
                                                $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                                // $tab_id    = 'advanced-tab-'. $tab_count;
                                             ?>
                                            <a href="#<?php echo $tab_id?>" class="tab-link col text-center  <?php echo ($settings['active_number'] - 1) == $index && ( $settings['active_number'] > 0) && ( $settings['active_number'] <=  $totalnumber) ? 'active' : ''?>">
                                                 <?php echo $iconHTMl;?>
                                                <?php echo esc_html($title);?>
                                            </a>
                                            <?php
                                                 $i= 0;
                                                endforeach;

                                                ?>
										</div>
									</div>
								</div>
								<div class="advanced_addons_tab_content type-1">
                                    <?php
                                    $totalnumber = count($settings['testimonial']);
                                    if($i <= $totalnumber){
                                        $i= 1;
                                    }
                                    foreach ( $settings['testimonial'] as $index => $item ) :
                                        $title  = $item['title'];
                                        $desc  = $item['desc'];
                                        $tab_count = $index + 1;
                                        $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                        // $tab_id    = 'advanced-tab-'. $tab_count;
                                    ?>
									<div class="block-content <?php echo $i == 1 ? 'active' : ''?>" id="<?php echo $tab_id?>">
										
										<p class="mb-0">
                                            <?php echo esc_html($desc);?>
										</p>
									</div>
									<?php
                                         $i= 0;
                                    endforeach; ?>
									
									
								</div>
							</div>
                    </div>
        <?php endif;?>


        <?php if($settings['style'] == 'style3'):?>
                <div class="advanced_addons_tab type-2 heading-bg bg-white section-parent">
								<div class="advanced_addons_tab_head pt-100 set-bg position-relative">
									<div class="row no-gutters">
										<div class="col-md-8 offset-md-2">
											<div class="advanced_addons_tab_item row no-gutters type-1 d-flex align-items-center">
                                            <?php
                                                $totalnumber = count($settings['testimonial']);
                                                foreach ( $settings['testimonial'] as $index => $item ) :
                                                    $title  = $item['title'];
                                                    $desc  = $item['desc'];
                                                    $tab_count = $index + 1;
                                                    $iconHTMl = (isset($item['icon_type']) && $item['icon_type'] == 'icon' && $item['title_icon'] != '') ?
                                                    '<i class="'.$item['title_icon'].'  inline-block advanced_addons_tab_item_icon"></i>' : '';
                                                    $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                                    // $tab_id    = 'advanced-tab-'. $tab_count;
                                                ?>
                                                <a href="#<?php echo $tab_id?>" class="tab-link col text-center <?php echo ($settings['active_number'] - 1) == $index && ( $settings['active_number'] > 0) && ( $settings['active_number'] <=  $totalnumber) ? 'active' : ''?>">
                                                    <?php echo $iconHTMl;?>
                                                    <?php echo esc_html($title);?>
                                                </a>
                                                <?php
                                                 $i= 0;
                                                endforeach;
                                                ?>
											</div>
										</div>
									</div>
								</div>
								<div class="advanced_addons_tab_content type-1">
                                <?php
                                    $totalnumber = count($settings['testimonial']);
                                    if($i <= $totalnumber){
                                        $i= 1;
                                    }
                                    foreach ( $settings['testimonial'] as $index => $item ) :
                                        $title  = $item['title'];
                                        $desc  = $item['desc'];
                                        $tab_count = $index + 1;
                                        $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                        // $tab_id    = 'advanced-tab-'. $tab_count;
                                    ?>
									<div class="block-content <?php echo $i == 1 ? 'active' : ''?>" id="<?php echo $tab_id?>">
										
										<p class="mb-0">
                                            <?php echo esc_html($desc);?>
										</p>
									</div>
									<?php
                                         $i= 0;
                                    endforeach; ?>
									
								</div>
							</div>
                    <?php endif;?>

                    <?php if($settings['style'] == 'style4'):?>
                        <div class="advanced_addons_tab type-3 vertical  section-parent ">
								<div class="advanced_addons_tab_head   position-relative">
									<div class="advanced_addons_tab_item row no-gutters type-1 d-flex ">
                                        <?php
                                                $totalnumber = count($settings['testimonial']);
                                                foreach ( $settings['testimonial'] as $index => $item ) :
                                                    $title  = $item['title'];
                                                    $desc  = $item['desc'];
                                                    $tab_count = $index + 1;
                                                    $iconHTMl = (isset($item['icon_type']) && $item['icon_type'] == 'icon' && $item['title_icon'] != '') ?
                                                    '<i class="'.$item['title_icon'].'  inline-block advanced_addons_tab_item_icon"></i>' : '';
                                                    $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                                    // $tab_id    = 'advanced-tab-'. $tab_count;
                                                ?>
                                            <a href="#<?php echo $tab_id?>" class="tab-link col <?php echo ($settings['active_number'] - 1) == $index && ( $settings['active_number'] > 0) && ( $settings['active_number'] <=  $totalnumber) ? 'active' : ''?>">
                                                    <?php echo $iconHTMl;?>
                                                    <?php echo esc_html($title);?>
                                            </a>
										<?php
                                                 $i= 0;
                                                endforeach;
                                                ?>
									</div>
                                </div>
                                
								<div class="advanced_addons_tab_content type-1">
                                    <?php
                                    $totalnumber = count($settings['testimonial']);
                                    if($i <= $totalnumber){
                                        $i= 1;
                                    }
                                    foreach ( $settings['testimonial'] as $index => $item ) :
                                        $title  = $item['title'];
                                        $desc  = $item['desc'];
                                        $tab_count = $index + 1;
                                        $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                        // $tab_id    = 'advanced-tab-'. $tab_count;
                                    ?>
									<div class="block-content <?php echo $i == 1 ? 'active' : ''?>" id="<?php echo $tab_id?>">
										<p class="mb-0">
                                         <?php echo esc_html($desc);?>
										</p>
										
									</div>
									<?php
                                         $i= 0;
                                    endforeach; ?>
									
									
								</div>
							</div>
                    <?php endif;?>