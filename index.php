<?php get_header(); ?>

<h1>This is from our index.php file</h1>

<?php if( have_posts() ): ?>
    <?php while( have_posts() ): the_post() ?>
        <div class="">
            <h2><?php the_title(); ?></h2>
            <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <a class="btn btn-primary" href="<?php the_permalink(); ?>">View Post</a>
            <hr>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>There is no post</p>
<?php endif; ?>








<?php get_footer(); ?>
