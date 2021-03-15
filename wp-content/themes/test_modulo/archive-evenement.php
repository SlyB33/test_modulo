<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Archives des évènements
 * @package test_modulo
 */

get_header();
?>

	<main id="primary" class="site-main">
    <div class="events_futurs_">
        <div class="events_display">
        <?php
            $current_date= date('Ymd');
            $params = array(
                'post_type' => 'evenement',
                'posts_per_page' => -1,
                'post_status ' => 'published',
                'meta_query' => array(
                    array(
                        'key' => 'date_de_debut',
                        'compare' => '>=',
                        'value'   => $current_date,
                    )
                ),
                'order' => 'ASC',
                'orderby' => 'date_de_debut'
            );
            $month_temp = '';
            $req = new WP_Query( $params );
            if ( $req->have_posts() ) {
                while ( $req->have_posts() ) {
                    $req->the_post();
                    setlocale(LC_TIME, "");
                    setlocale(LC_TIME, "fr_FR.utf8");
                    $display_month =  ucwords(utf8_encode(strftime('%B %G',strtotime(get_field('date_de_debut',$post->ID)))));
                    if($display_month !== $month_temp) { ?>
                        <div class="archive_month_title">
                            <h2 ><?php echo $display_month;?></h2>
                        </div>
                    <?php }
                    $month_temp = $display_month;
                    include 'template-parts/components/card.php';
                }
            } wp_reset_postdata();
        ?>
        </div>
    </div>
	</main><!-- #main -->

<?php

get_footer();