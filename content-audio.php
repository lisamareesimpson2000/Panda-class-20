<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php the_excerpt(); ?>
    </div>
    <div class="card-footer bg-white">
        <a class="btn btn-warning btn-block" href="<?php the_permalink(); ?>">Listen to Audio</a>
        <p class="card-text"><small class="text-muted">Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></small></p>
    </div>
</div>
