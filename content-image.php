<div class="card">
    <div class="card-body">
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('medium', ['class'=>'card-img-top img-fluid', 'alt' =>'thumbnail image for the post']); ?>
        <?php endif; ?>
    </div>
    <div class="card-footer bg-white">
        <a class="btn btn-info btn-block" href="<?php the_permalink(); ?>">View Image</a>
        <p class="card-text"><small class="text-muted">Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></small></p>
    </div>
</div>
