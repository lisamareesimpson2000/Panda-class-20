<?php get_header(); ?>

    <h1>This is from single-post.php</h1>

    <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post() ?>
            <div class="row">
                <div class="col-12">
                    <h2><?php the_title(); ?></h2>
                    <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>

                    <!-- echo $location; -->
                    <?php 
                    if(get_post_meta(get_the_ID(),'location', true)){
                        $location = get_post_meta(get_the_ID(),'location', true);
                    }
                    ?>
                    <?php if (isset($location)): ?>
                    <p>Posted from <?= location; //<?= is a short hand key for echo?> </p> 
                    <?php endif; ?>
                    
                    <?php 
                    if(get_post_meta(get_the_ID(),'price', true)){
                        $price = get_post_meta(get_the_ID(),'price', true);
                    }
                    ?>
                    <?php if (isset($price)): ?>
                    <p>Posted from <?= price;?> </p> 
                    <?php endif; ?>
                    
                    <?php
                        if (get_post_meta(get_the_ID(),'extra_content', true)){
                            $extra_content = get_post_meta(get_the_ID(),'extra_content', true);
                        }
                    ?>
                    <?php if (isset($extra_content)): ?>
                    <p>Posted from <?= extra_content;?> </p> 
                    <?php endif; ?>


                </div>
            </div>
            <?php
                // get_template_part( 'content', get_post_format() );
                get_template_part('singlePosts/contentPost', get_post_format() );
            ?>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
