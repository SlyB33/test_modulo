<div class="content_home">
    <?php the_content($the_post->ID ); ?>
</div>
<div class="events_futurs">
    <div class="events_futurs_title">
        <h2>Événements à venir</h2>
        <a href="<?= the_permalink( 30 )?>">Voir tous les évènements</a>
    </div>
    <div class="events_display">
        <?php
            $current_date= date('Ymd');
            $params = array(
                'post_type' => 'evenement',
                'posts_per_page' => 6,
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
            $req = new WP_Query( $params );

            if ( $req->have_posts() ) {
                while ( $req->have_posts() ) {
                    $req->the_post();
                   include 'components/card.php';
                }
            } wp_reset_postdata();?>
    </div>
</div>