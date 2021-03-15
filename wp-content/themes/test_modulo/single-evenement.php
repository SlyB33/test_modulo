<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package test_modulo
 */

get_header();
$category = get_the_category( $post->ID );
$orga = get_post_meta($post->ID, 'promoter',true);
?>

<main id="primary" class="site-main">

    <div class="single_event_content_container container_flex">
        <div class="col-6">
            <span class="event_type"><?= $category[0]->name;?></span>
            <?php custom_parse_event_date() ;?>
            <h1><?php the_title();?></h1>
            <?php if($orga) {?>
            <p class="event_promoter">Événement organisé par <span class="event_promoter_name"><?php echo $orga;?></span></p>
            <?php } 
            if(get_field('description')) {
            the_field('description', $post->ID);
        }
        ?>
        </div>
        <div class="col-6">
            <?php the_post_thumbnail( 'large' );?>
        </div>
    </div>
    <div class="events_futurs_related">
        <div class="events_futurs_related_title">
            <h2>Autres événements organisés par <span class="event_promoter_name"><?php echo $orga;?></span></h2>
        </div>
        <div class="events_display events_related">
            <?php
                $params = array(
                    'post_type' => 'evenement',
                    'posts_per_page' => 3,
                    'post_status ' => 'published',
                    "meta_key" => 'promoter',
                    "meta_value" => $orga,
                    'post__not_in' => array( $post->ID ),
                    'order' => 'ASC',
                    'orderby' => 'ID'
                );
                $req = new WP_Query( $params );

                if ( $req->have_posts() ) {
                    while ( $req->have_posts() ) {
                        $req->the_post();
                        include 'template-parts/components/card.php';
                }
                } wp_reset_postdata();
            ?>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();
