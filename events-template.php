<?php
    /*
        Template Name: Events Template
    */
?>

<?php get_header(); ?>

<?php if( have_posts() ): ?>
    <?php while( have_posts() ): the_post() ?>
        <div class="row">
            <div class="col">
                <h2><?php the_title(); ?></h2>
                <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <?php
            $args = array(
                'post_type' => 'event',
                'posts_per_page' => -1
            );
            $allEvents = new WP_Query($args);
            // var_dump($allEvents);
            // die();
         ?>
         <?php if( $allEvents->have_posts() ): ?>
             <div class="row">
                 <div class="col">
                     <div class="accordion" id="accordionExample">
                         <?php $cardNumber = 1; ?>
                         <?php while( $allEvents->have_posts() ): $allEvents->the_post(); ?>
                             <div class="card">
                               <div class="card-header" id="heading<?php echo $cardNumber; ?>">
                                 <h2 class="mb-0">
                                   <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $cardNumber; ?>">
                                       <?php the_title(); ?>
                                   </button>
                                 </h2>
                               </div>
                               <div id="collapse<?php echo $cardNumber; ?>" class="collapse"  data-parent="#accordionExample">
                                 <div class="card-body">
                                     <?php the_content(); ?>
                                 </div>
                               </div>
                             </div>

                             <?php $cardNumber++; ?>
                         <?php endwhile; ?>
                     </div>
                 </div>
             </div>
         <?php endif; ?>






    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
