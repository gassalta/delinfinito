<?php
/**
 * Template Name: Pages
 */

get_header('white'); ?>
    <div class="main-wrapper position-relative">  
        <?php if( (is_page('muestras')) || (is_page('exhibitions')) ){ ?>
            <!-- MUESTRAS PAGE -->
            <div class="modulos-internas-wrapper d-none d-md-block">	
                <div class="nav-bar-years d-inline-block w-100">
                    <button class="btn-years float-left" type="button">
                        <span class="plus-years transition float-left">
                            <img class="img-fluid" src="<?php bloginfo('template_url'); ?>/inc/icons/plus-years.svg'" alt="">
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
            <div class="modulos-internas-wrapper d-block d-md-none">
                <?php $currentlang = get_bloginfo('language'); ?>
                <select class="select-years-menu-mob dropdown d-block d-md-none" name="menu_muestras" id="menu_muestras">
                    <option class="normal" selected="" value="<?php bloginfo('template_url'); ?>/muestras">
                        <?php if($currentlang=="es"): ?>
                            Años
                        <?php elseif($currentlang=="en-GB"): ?>
                            Years
                        <?php endif; ?> 
                    </option>
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
                            <option value="<?php echo esc_url( get_term_link( $term ) ) ?>">
                                <?php echo $term->name; ?>
                            </option>
                        <?php }
                    } ?>                 
                </select>
            </div>
            <div class="grid d-flex flex-wrap">
                <?php
                $args = array(
                    'post_type' => 'muestras_cpt',
                    'posts_per_page' => -1
                ); 
                $query = new WP_Query( $args ); ?>
                <?php if( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); 
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
                                <h6 class="white normal">
                                    <?php echo $art_muestras; ?> · <?php echo $ini_date_muestras; ?> - <?php echo $fin_date_muestras; ?> 
                                </h6>
                                <h1 class="title">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="backdrop-filter position-absolute w-100 h-100 d-none d-xl-block"></div>
                            <div class="gradient w-100 h-100 position-absolute"></div>
                            <div class="dom-color w-100 h-100 position-absolute" style="background-color: <?php echo $dom_color; ?>"></div>
                            <img data-src="<?php echo $img_dest_muestras_out; ?>" class="b-lazy img-fluid position-relative" alt="<?php the_title(); ?>"/>
                        </a>
                    <?php endwhile; 
                endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        <?php } ?>
        <?php if( (is_page('artistas')) || (is_page('artists')) ) { ?>
            <!-- ARTISTAS PAGE -->
            <div class="grid d-flex flex-wrap">
                <?php      
                $args = array(
                    'post_type' => 'artistas_cpt',
                    'posts_per_page' => -1
                );  
                $query = new WP_Query( $args ); ?>
                <?php if( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); 
                    // vars
                    $img_dest_artistas = get_field('img_dest_artistas');
                    $size = 'thumbs-grid';
                    $size2 = 'thumbs-grid-mob';                    
                    $img_dest_artistas_out = $img_dest_artistas['sizes'][ $size ];
                    $img_dest_artistas_out_2 = $img_dest_artistas['sizes'][ $size2 ];
                    $attachment_id = $img_dest_artistas['ID'];
                    $dom_color = get_color_data( $attachment_id, 'dominant_color_hex', true );
                    ?> 
                    <a class="thumbnails position-relative" href="<?php the_permalink(); ?>" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                        <div class="caption-cont position-absolute white">
                            <h1 class="title">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="backdrop-filter position-absolute w-100 h-100 d-none d-xl-block"></div>
                        <div class="gradient w-100 h-100 position-absolute"></div>
                        <div class="dom-color w-100 h-100 position-absolute" style="background-color: <?php echo $dom_color; ?>"></div>
                        <img data-src="<?php echo $img_dest_artistas_out; ?>" class="b-lazy img-fluid position-relative" alt="<?php the_title(); ?>"/>
                    </a>
                    <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        <?php } ?>
        <?php if( (is_page('ferias')) || (is_page('fairs')) ) { ?>
            <!-- FERIAS PAGE -->
            <div class="modulos-internas-wrapper d-none d-md-block">	
                <div class="nav-bar-years d-inline-block w-100">
                    <button class="btn-years float-left" type="button">
                        <span class="plus-years transition float-left">
                            <img class="img-fluid" src="<?php bloginfo('template_url'); ?>/inc/icons/plus-years.svg'" alt="">
                        </span>
                    </button>
                    <nav class="years-cont float-left transition" role="navigation">
                        <?php // Get the taxonomy's terms
                        $terms = get_terms(
                            array(
                                'taxonomy'   => 'anios_ferias_tax',
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
            <div class="modulos-internas-wrapper d-block d-md-none">
                <?php $currentlang = get_bloginfo('language'); ?>
                <select class="select-years-menu-mob dropdown d-block d-md-none" name="menu_ferias" id="menu_ferias">
                    <option class="normal" selected="" value="<?php bloginfo('template_url'); ?>/muestras">
                        <?php if($currentlang=="es"): ?>
                            Años
                        <?php elseif($currentlang=="en-GB"): ?>
                            Years
                        <?php endif; ?> 
                    </option>
                    <?php // Get the taxonomy's terms
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'anios_ferias_tax',
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
                $args = array(
                    'post_type' => 'ferias_cpt',
                    'posts_per_page' => -1
                ); 
                $query = new WP_Query( $args ); ?>
                <?php if( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); 
                        // vars
                        $color_ferias = get_field('color_ferias'); 
                        $art_ferias = get_field('art_ferias'); 
                        ?>  
                        <a style="background-color: <?php echo $color_ferias; ?>" class="col-12 box-color" href="<?php the_permalink(); ?>" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                            <div class="caption-cont left position-absolute white">
                                <h1 class="title">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="caption-cont right d-none d-md-block info-art-ferias position-absolute white text-right">
                                <h6 class="title normal">
                                    <?php echo $art_ferias; ?>
                                </h6>
                            </div>
                        </a>
                    <?php endwhile; 
                endif; ?>
                <?php wp_reset_query(); ?>
            </div>                                                          
        <?php } ?> 
        <?php if( (is_page('novedades')) || (is_page('news')) ) { ?>
            <div class="modulos-internas-wrapper d-none d-md-block">	
                <div class="nav-bar-years d-inline-block w-100">
                    <button class="btn-years float-left" type="button">
                        <span class="plus-years transition float-left">
                            <img class="img-fluid" src="<?php bloginfo('template_url'); ?>/inc/icons/plus-years.svg'" alt="">
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
            <div class="modulos-internas-wrapper d-block d-md-none">
                <?php $currentlang = get_bloginfo('language'); ?>
                <select class="select-years-menu-mob dropdown d-block d-md-none" name="menu_novedades" id="menu_novedades">
                    <option class="normal" selected="" value="<?php bloginfo('template_url'); ?>/muestras">
                        <?php if($currentlang=="es"): ?>
                            Años
                        <?php elseif($currentlang=="en-GB"): ?>
                            Years
                        <?php endif; ?> 
                    </option>
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
                            <option value="<?php echo esc_url( get_term_link( $term ) ) ?>">
                                <?php echo $term->name; ?>
                            </option>
                        <?php }
                    } ?>                 
                </select>
            </div>
            <?php   
            $args = array(
                'post_type' => 'novedades_cpt'
            );
            $loop = new WP_Query($args);
            if($loop->have_posts()); { ?>
                <div class="modulos-internas-wrapper news"> 
                    <?php while($loop->have_posts()) : $loop->the_post(); 
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
                                        <?php $currentlang = get_bloginfo('language');
                                        if($currentlang=="es"): ?>
                                            <p class="d-inline normal">leer más</p>
                                        <?php elseif($currentlang=="en-GB"): ?>
                                            <p class="d-inline normal">read more</p>
                                        <?php endif; ?> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php } ?>
        <?php } ?>           
    </div>
<?php get_footer('newsletter'); ?>