<?php
    /*
        Template Name: Two Column
        Template Post Type: page
    */
?>

<?php get_header(); ?>

    <h1>This is from two-column.php</h1>

    <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post() ?>
            <div class="">
                <h2><?php the_title(); ?></h2>
                <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
                <div class="content twoColumn">
                    <?php the_content(); ?>
                </div>
                <hr>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
