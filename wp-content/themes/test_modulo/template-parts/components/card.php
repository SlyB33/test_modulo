<?php $category = get_the_category( $post->ID );?>
<div class="event_card">
    
    <div class="event_card_container  ">
        <a class="event_card_link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <div class="event_card_img_container">
            <?php the_post_thumbnail('medium'); ?>
            <p class="event_type"><?= $category[0]->name;?></p>
        </div>
            <h3><?php the_title(); ?></h3>
            <?php custom_parse_event_date();?>
        </a>
    </div>
</div>