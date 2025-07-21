 <?php 
/**
 * Template Name: Muestras Taxonomy
 */
get_header('white'); ?>
<style>
    header #menu-desktop-es li#menu-item-20 a,
    header #menu-desktop-en li#menu-item-833 a {
        font-family: 'Fakt Pro Normal';
    }
</style>
<div class="main-wrapper position-relative">
    <div class="modulos-internas-wrapper">	
        <div class="d-none d-md-block">
            <div class="nav-bar-years d-inline-block w-100">
                <?php 
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
                <button class="btn-years float-left" type="button">
                    <h4 class="normal float-left">
                        <?php echo $term->name; ?>
                    </h4>
                    <span class="arrow-years transition float-left">
                        <img class="img-fluid" src="<?php bloginfo('template_url'); ?>/inc/icons/arrow-right.svg'" alt="">
                    </span>
                </button>
                <nav class="years-cont float-left transition" role="navigation">
                    <?php // Get the taxonomy's terms
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'anios_muestras_tax',
                            'hide_empty' => true
                        )
                    );
                    // Check if any term exists
                    if ( ! empty( $terms ) && is_array( $terms ) ) {
                        // Run a loop and print them all
                        foreach ( $terms as $term ) { ?>
                            <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="year transition h4">
                                <?php echo $term->name; ?>
                            </a>
                        <?php }
                    } ?>
                </nav>
            </div>
        </div>
        <select class="select-years-menu-mob dropdown d-block d-md-none" name="menu-novedades" id="menu-novedades">
            <option class="normal" selected="" value="<?php bloginfo('template_url'); ?>/muestras">
                <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
                <?php // Get the taxonomy's terms
                echo $term->name; ?>
            </option>
                <?php $terms = get_terms(
                    array(
                        'taxonomy'   => 'anios_muestras_tax',
                        'hide_empty' => true
                    )
                );
                // Check if any term exists
                if ( ! empty( $terms ) && is_array( $terms ) ) {
                    // Run a loop and print them all
                    foreach ( $terms as $term ) { ?>
                        <option value="<?php echo esc_url( get_term_link( $term ) ) ?>">
                            <?php echo $term->name; ?>
                        </option>
                    <?php }
                } ?>                
        </select>
    </div>
    <div class="grid d-flex flex-wrap">
    <?php
	while ( have_posts() ) {
        the_post(); 
        // vars
        $img_dest_muestras = get_field('img_dest_muestras');
        $size = 'thumbs-grid';
        $size2 = 'thumbs-grid-mob';
        $img_dest_muestras_out = $img_dest_muestras['sizes'][ $size ];
        $img_dest_muestras_out_2 = $img_dest_muestras['sizes'][ $size2 ];
        $ini_date_muestras = get_field('ini_date_muestras');
        $fin_date_muestras = get_field('fin_date_muestras');
        $attachment_id = $img_dest_muestras['ID'];
        $dom_color = get_color_data( $attachment_id, 'dominant_color_hex', true );
        $art_muestras = get_field('art_muestras');
        ?>
        <a class="thumbnails position-relative" href="<?php the_permalink(); ?>" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
            <div class="caption-cont position-absolute white">
                <h6 class="white text-uppercase normal">
                    <?php echo $art_muestras; ?> · <?php echo $ini_date_muestras; ?> - <?php echo $fin_date_muestras; ?> 
                </h6>
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="backdrop-filter position-absolute w-100 h-100 d-none d-xl-block"></div>
            <div class="gradient w-100 h-100 position-absolute"></div>
            <img data-src="<?php echo $img_dest_muestras_out; ?>" class="b-lazy img-fluid" alt="<?php the_title(); ?>"/>
            <div class="dom-color w-100 h-100 position-absolute" style="background-color: <?php echo $dom_color; ?>"></div>
        </a>
    <?php } ?>    
    </div>     
</div>
<?php get_footer('newsletter'); ?>