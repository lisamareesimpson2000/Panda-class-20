<?php get_header(); ?>

    <h1>This is from single-post.php</h1>

    <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post() ?>
            <div class="row">
                <div class="col-12">
                    <h2><?php the_title(); ?></h2>
                    <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
                </div>
            </div>
            <?php
                // get_template_part( 'content', get_post_format() );
                get_template_part('singlePosts/contentPost', get_post_format() );
            ?>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
