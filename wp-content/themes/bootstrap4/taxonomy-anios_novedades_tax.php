 <?php 
/**
 * Template Name: Muestras Taxonomy
 */
get_header('white'); ?>

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
                            'taxonomy'   => 'anios_novedades_tax',
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
        <select class="select-years-menu-mob dropdown d-block d-md-none" name="menu_muestras" id="menu_muestras">
            <option class="normal" selected="" value="<?php bloginfo('template_url'); ?>/muestras">
                <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
                <?php // Get the taxonomy's terms
                echo $term->name; ?>
            </option>
                <?php $terms = get_terms(
                    array(
                        'taxonomy'   => 'anios_novedades_tax',
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
    <div class="modulos-internas-wrapper news"> 
        <?php while ( have_posts() ) {
            the_post(); 
            // vars 
            $img_dest_novedades = get_field('img_dest_novedades');
            $size = 'thumbs-grid';
            $size2 = 'thumbs-grid-mob';
            $img_dest_novedades_out = $img_dest_novedades['sizes'][ $size ];
            $img_dest_novedades_out_2 = $img_dest_novedades['sizes'][ $size2 ];
            $date_novedades = get_field('date_novedades');
            $extracto_novedades = get_field('extracto_novedades'); ?>
            <div class="row" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                <a href="<?php the_permalink(); ?>" class="col-12 col-md-12 col-lg-6">
                    <img class="img-fluid" src="<?php echo $img_dest_novedades_out; ?>" alt="">
                </a>
                <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                    <div class="news-data">
                        <div class="date h6 normal">
                            <?php echo $date_novedades; ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="title h1">
                            <?php the_title(); ?>
                        </a>
                        <div class="extract">
                            <p>
                                <?php echo $extracto_novedades; ?>
                            </p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="more-info">
                            <div class="icon d-inline">
                                <img src="<?php bloginfo('template_url'); ?>/inc/icons/read-more-icon.svg" class="img-fluid" alt="">
                            </div>
                            <p class="d-inline normal">leer más</p>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?> 
    </div>
</div>
<?php get_footer('newsletter'); ?>