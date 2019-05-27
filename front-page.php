<?php get_header(); ?>

    <h1>This is from front-page.php</h1>
<!-- featured post -->
    <!-- <h3><?php //echo get_theme_mod('featured_post_setting'); ?></h3> Displays the number -->

    <?php 
        $featuredPostID = get_theme_mod('featured_post_setting');
        if($featuredPostID):
    ?>
    <?php 
        $args = array(
            'p' => $featuredPostID
        );
        $featuredPost = new WP_Query($args);

    ?>
<?php if($featuredPost->have_posts()): ?>
             <?php while( $featuredPost->have_posts() ): $featuredPost->the_post(); ?>
                 <div class="row">
                     <div class="col-12">
                         <h4>Featured Post</h4>
                     </div>
                 </div>
                 <div class="row mb-5">
                     <div class="col-12">
                         <div class="card">
                             <h4><?php the_title(); ?></h4>
                             <div class="">
                                 <?php the_excerpt(); ?>
                             </div>
                             <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">Check out the featured Post</a>
                         </div>
                     </div>
                 </div>
             <?php endwhile; ?>
         <?php endif; ?>

     <?php endif; ?>

<!-- sidebar -->

    <h3><?php echo get_theme_mod('sidebar_position'); ?></h3>

    <?php
        $side = get_theme_mod('sidebar_position');
        if($side === 'left'){
            $sidebarOrder = 'order-0';
            $contentorder = 'order-1';
        } else {
            $sidebarOrder = 'order-1';
            $contentorder = 'order-0';
        }
     ?>

    <!-- <div class="row mb-5">

        <?php //if( have_posts() ): ?>
            <div class="col <?php //echo $contentorder; ?>">
                <div class="row">
                    <?php //while( have_posts() ): the_post() ?>
                        <?php //get_template_part( 'content', get_post_format() ); ?>
                    <?php //endwhile; ?>
                </div>
           

                <?php
                    // $totalPosts = wp_count_posts('post')->publish;
                    // $maxToShow = get_option('posts_per_page');
                ?>
                <?php //if($totalPosts > $maxToShow): ?>
                <!-- <button id="showMore" type="button" name="button" class="btn btn-block btn-primary">Show more Posts</button>
            </div> -->
        <?php //endif; ?>

        <?php //if( is_active_sidebar('sidebar-1') ): ?>
            <!-- <div class="col-3 <?php //echo $sidebarOrder; ?> ">
                <div class="card bg-light p-3"> -->
                    <!-- <?php //dynamic_sidebar('sidebar-1'); ?> -->
                </div>
            </div>
        <?php //endif; ?>
    </div>
    <div class="row mb-5">
        <?php if( have_posts() ): ?>
            <div class="col <?php echo $contentorder; ?>">
                <div class="row">
                    <?php while( have_posts() ): the_post() ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                </div>
                <?php
                    $totalPosts = wp_count_posts('post')->publish;
                    $maxToShow = get_option('posts_per_page');
                ?>
                <?php if($totalPosts > $maxToShow):  ?>
                    <button id="showMore" type="button" name="button" class="btn btn-block btn-primary">Show more Posts</button>
                <?php endif; ?>
            </div>

        <?php endif; ?>

        <?php if( is_active_sidebar('sidebar-1') ): ?>
            <div class="col-3 <?php echo $sidebarOrder; ?> ">
                <div class="card bg-light p-3">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>





    <?php
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => 2,
            'order' => 'ASC',
            'orderby' => 'date'
        );
        $allEvents = new WP_Query($args);
     ?>
     <?php if( $allEvents->have_posts() ): ?>
         <div class="row mb-5">
             <div class="col-12">
                 <h2>Next two events</h2>
             </div>
             <?php while( $allEvents->have_posts() ): $allEvents->the_post(); ?>
                 <div class="col">
                     <div class="card">
                         <div class="card-body">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <div class="">
                                <?php the_excerpt(); ?>
                            </div>
                            <a class="btn btn-info btn-block" href="<?php the_permalink(); ?>">View Event</a>
                         </div>
                     </div>
                 </div>
             <?php endwhile; ?>
         </div>
     <?php endif; ?>


     <?php
         $args = array(
             'post_type' => 'staff',
             'posts_per_page' => -1,
             'order' => 'ASC',
             'orderby' => 'title'
         );
         $allStaff = new WP_Query($args);
      ?>

      <?php if( $allStaff->have_posts() ): ?>
          <div class="row mb-5">
              <div class="col-12">
                  <h2>All our Staff</h2>
              </div>
              <?php while( $allStaff->have_posts() ): $allStaff->the_post(); ?>
                  <div class="col-3">
                      <div class="card">
                          <div class="card-body">
                              <?php if(has_post_thumbnail()): ?>
                                  <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt' =>'thumbnail image for the post']); ?>
                              <?php endif; ?>
                             <h3 class="card-title"><?php the_title(); ?></h3>
                             <a class="btn btn-warning btn-block" href="<?php the_permalink(); ?>">View Staff Memeber</a>
                          </div>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
      <?php endif; ?>

      <!-- employee of the month post -->
<h3><?php //echo get_theme_mod('employee_ofmonth_setting'); ?></h3>
<?php 
        $topEmployeeID = get_theme_mod('employee_ofmonth_setting');
        if($topEmployeeID):
    ?>
    <?php 
        $args = array(
            'p' => get_theme_mod('employee_ofmonth_setting'),
            'post_type' => 'staff',
        );
        $topEmployeeID = new WP_Query($args);
        $posts_array = get_posts( $args );
    ?>
<?php if($allStaff->have_posts()): ?>
             <?php while( $topEmployeeID->have_posts() ): $topEmployeeID->the_post(); ?>
                 <div class="row">
                     <div class="col-12">
                         <h4>Employee of the Month</h4>
                     </div>
                 </div>
                 <div class="row mb-5">
                     <div class="col-3">
                         <div class="card">
                            <div class="card-body">
                                <?php if(has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt' =>'thumbnail image for the post']); ?>
                                <?php endif; ?>
                                <h3 class="card-title"><?php the_title(); ?></h3>
                                <a class="btn btn-warning btn-block" href="<?php the_permalink(); ?>">Check out the Employee of the month</a>
                            </div>
                             <!-- <h4><?php //the_title(); ?></h4>
                             <div class="">
                                 <?php //the_excerpt(); ?>
                             </div>
                             <a href="<?php //the_permalink(); ?>" class="btn btn-primary btn-block">Check out the Employee of the month</a> -->
                         </div>
                     </div>
                 </div>
             <?php endwhile; ?>
         <?php endif; ?>

     <?php endif; ?>



<?php get_footer(); ?>