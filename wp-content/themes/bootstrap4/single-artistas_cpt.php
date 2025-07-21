<?php
get_header(); ?>
    <style>
        header #menu-desktop-es li#menu-item-21 a,
        header #menu-desktop-en li#menu-item-834 a {
            font-family: 'Fakt Pro Normal';
        }
    </style>
    <div class="main-wrapper">
        <?php //vars
        $img_dest_artistas_big = get_field('img_dest_artistas_big');
        $size = 'image-cover';
        $size2 = 'image-cover-medium';
        $size3 = 'image-cover-mobile'; 
        $img_dest_artistas_big_out = $img_dest_artistas_big['sizes'][ $size ];
        $img_dest_artistas_big_out_2 = $img_dest_artistas_big['sizes'][ $size2 ];
        $img_dest_artistas_big_out_3 = $img_dest_artistas_big['sizes'][ $size3 ];
        $extracto_bio_artistas = get_field('extracto_bio_artistas');
        $texto_bio_artistas = get_field('texto_bio_artistas');
        $bio_pdf_artistas = get_field('bio_pdf_artistas');
        $pdf_tf_artistas = get_field('pdf_tf_artistas');
        $attachment_id = $img_dest_artistas_big['ID'];
        $dom_color = get_color_data( $attachment_id, 'dominant_color_hex', true );
        $currentlang = get_bloginfo('language');
        ?>
        <div class="cover-section w-100 vh-100 position-relative">
            <div class="bg w-100 vh-100 position-relative" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300" style="background: url('<?php echo $img_dest_artistas_big_out; ?>')"></div>
            <div class="arrow-scroll mobile artistas position-absolute"></div>
            <div class="bottom-bar position-absolute d-flex w-100 justify-content-between align-items-end" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                <div class="data">
                    <h1 class="title white">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="menu text-right d-none d-md-block" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                    <a href="#biografia" class="scroll h4 white normal">
                        <?php if($currentlang=="es"): ?>
                            biografía
                        <?php elseif($currentlang=="en-GB"): ?>
                            biography
                        <?php endif; ?> 
                    </a>
                    <?php if( get_field('obras_artistas_tf') == 'si') { ?>
                        <a href="#obras" class="scroll h4 white normal">
                            <?php if($currentlang=="es"): ?>
                                obras
                            <?php elseif($currentlang=="en-GB"): ?>
                                artworks
                            <?php endif; ?> 
                        </a>
                    <?php } ?> 
                    <?php if( get_field('muestras_artistas_tf') == 'si') { ?>
                        <a href="#muestras" class="scroll h4 white normal">
                            <?php if($currentlang=="es"): ?>
                                muestras
                            <?php elseif($currentlang=="en-GB"): ?>
                                exhibitions
                            <?php endif; ?> 
                        </a>
                    <?php } ?>                   
                    <?php if( get_field('prensa_artistas_tf') == 'si') { ?>
                        <a href="#prensa" class="scroll h4 white normal">
                            <?php if($currentlang=="es"): ?>
                                prensa
                            <?php elseif($currentlang=="en-GB"): ?>
                                press
                            <?php endif; ?> 
                        </a>
                    <?php } ?>     
                </div>
            </div>
            <div class="bottom-gradient position-absolute w-100"></div>
            <div class="dom-color w-100 h-100 position-absolute" style="background-color: <?php echo $dom_color; ?>"></div>
        </div>
        <div class="modulos-internas-wrapper">
            <?php if( get_field('pdf_tf_artistas') == 'si') { ?>
                <div class="ext-link d-flex ext-link d-flex justify-content-end" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                    <a href="<?php echo $bio_pdf_artistas; ?>" target="_blank" class="more-info">
                        <div class="icon d-inline">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/download-icon.svg" class="img-fluid" alt="">
                        </div>
                        <p class="d-inline normal">
                            <?php if($currentlang=="es"): ?>
                                descargar biografía completa
                            <?php elseif($currentlang=="en-GB"): ?>
                                download full biography
                            <?php endif; ?> 
                        </p>
                    </a>
                </div>
            <?php } ?>
            <div id="biografia" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                <h2 class="title-mod">
                    <?php if($currentlang=="es"): ?>
                        biografía
                    <?php elseif($currentlang=="en-GB"): ?>
                        biography
                    <?php endif; ?> 
                </h2>
                <div class="content-wrapper-middle mx-auto">
                    <div class="content p text-justify">
                        <?php echo $extracto_bio_artistas; ?>
                    </div>
                    <div class="more-text p text-justify">
                        <?php echo $texto_bio_artistas; ?>
                    </div>
                    <?php if($currentlang=="es"): ?>
                        <a class="read-more es" href="#">
                            <div class="icon d-inline">
                                <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                            </div>
                            <p class="d-inline normal">ver más</p>
                        </a>
                    <?php elseif($currentlang=="en-GB"): ?>
                        <a class="read-more en" href="#">
                            <div class="icon d-inline">
                                <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                            </div>
                            <p class="d-inline normal">view more</p>
                        </a>                        
                    <?php endif; ?>
                </div>
            </div>
            <?php if( get_field('obras_artistas_tf') == 'si') { ?>
                <div id="obras" class="modulo">
                    <h2 class="title-mod">
                        <?php if($currentlang=="es"): ?>
                            obras
                        <?php elseif($currentlang=="en-GB"): ?>
                            artworks
                        <?php endif; ?> 
                    </h2>
                    <?php if( have_rows('obras_artistas_rep')): $i=0; ?>
                        <div class="grid-works">
                            <div class="grid-sizer"></div>
                            <div class="gutter-sizer"></div>
                            <?php while( have_rows('obras_artistas_rep') ): the_row(); $i++;
                                // vars 
                                $obra_img_artistas = get_sub_field('obra_img_artistas');
                                $size_large = 'large';
                                $size_medium = 'thumbs-works-grid-medium';
                                $size_mob = 'thumbs-works-grid-mobile';
                                $size_form = 'thumb-obra-form';
                                $obra_img_artistas_out_mob = $obra_img_artistas['sizes'][ $size_mob ];
                                $obra_img_artistas_out_form = $obra_img_artistas['sizes'][ $size_form ];
                                $obra_video_artistas = get_sub_field('obra_video_artistas');
                                $attachment_id = $obra_img_artistas['ID'];
                                $obra_link = $obra_img_artistas['link'];
                                $autor_obra = get_field('autor_obra', $attachment_id);
                                $titulo_obra = get_field('titulo_obra', $attachment_id);
                                $tecnica_obra = get_field('tecnica_obra', $attachment_id);
                                $ancho_obra = get_field('ancho_obra', $attachment_id);
                                $alto_obra = get_field('alto_obra', $attachment_id);
                                $ancho_obra_en = get_field('ancho_obra_en', $attachment_id);
                                $alto_obra_en = get_field('alto_obra_en', $attachment_id);
                                $profundidad_obra = get_field('profundidad_obra', $attachment_id);
                                $profundidad_obra_en = get_field('profundidad_obra_en', $attachment_id);
                                $ano_obra = get_field('ano_obra', $attachment_id);
                                $vendido_tf_obra = get_field('vendido_tf_obra', $attachment_id);
                                $currentlang = get_bloginfo('language');
                                ?>
                                <?php if($obra_video_artistas): ?>
                                    <div class="grid-item <?php echo $i; ?>">
                                        <?php
                                        // Use preg_match to find obra_video_artistas src.
                                        preg_match('/src="(.+?)"/', $obra_video_artistas, $matches);
                                        $src = $matches[1];
                                        // Add extra parameters to src and replcae HTML.
                                        $params = array(
                                            'controls'  => 1,
                                            'hd'        => 1,
                                            'autohide'  => 1,
                                            'modestbranding' => 1,
                                            'rel' => 0,
                                            'showinfo' => 0,
                                            'byline' => 0,
                                            'title' => 0,
                                            'quality' => '1080p',
                                            'transparent' => 1
                                        );
                                        $new_src = add_query_arg($params, $src);
                                        $obra_video_artistas = str_replace($src, $new_src, $obra_video_artistas);
                                        // Add extra attributes to obra_video_artistas HTML.
                                        $attributes = 'frameborder="0"';
                                        $obra_video_artistas = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $obra_video_artistas);
                                        // Display customized HTML.
                                        echo'<div class="embed-responsive embed-responsive-16by9">';
                                            echo $obra_video_artistas;
                                        echo'</div>';
                                        ?>
                                    </div>
                                <?php endif; ?>    
                                <?php if($obra_img_artistas): ?>
                                    <div class="grid-item <?php echo $i; ?>">
                                        <a class="d-inline-block w-100 h-100" href="<?php echo $obra_link; ?>">
                                            <div class="img-cont position-relative">
                                                <div class="bg-roll position-absolute w-100 h-100 transition">
                                                    <div class="inside d-flex justify-content-center align-items-center w-100 h-100">
                                                        <img src="<?php bloginfo('template_url'); ?>/inc/icons/plus-white-icon.svg" alt="" class="plus-icon transition img-fluid">
                                                    </div>
                                                </div>
                                                <img class="img-fluid img-current-work" src="<?php echo $obra_img_artistas_out_mob; ?>">
                                            </div>
                                        </a>
                                        <div class="data">
                                            <div class="d-none title-current-artist" data-title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </div>
                                            <?php if($titulo_obra): ?>
                                                <h6 class="normal title-current-work" data-title="<?php echo $titulo_obra; ?>">
                                                    <?php echo $titulo_obra; ?>
                                                </h6>
                                            <?php endif; ?>
                                            <?php if($tecnica_obra): ?>
                                                <h6>
                                                    <?php echo $tecnica_obra; ?>
                                                </h6>
                                            <?php endif; ?>
                                            <?php if($currentlang=="es"): ?>
                                                <?php if( ($ancho_obra) && ($alto_obra) ): ?>
                                                    <h6>
                                                        <?php echo $alto_obra; ?> x <?php echo $ancho_obra; ?> <?php if($profundidad_obra): ?> x <?php echo $profundidad_obra; ?><?php endif; ?> cm
                                                    </h6>
                                                <?php endif; ?>
                                            <?php elseif($currentlang=="en-GB"): ?>
                                                <?php if( ($ancho_obra_en) && ($alto_obra_en) ): ?>
                                                    <h6>
                                                        <?php echo $alto_obra_en; ?> x <?php echo $ancho_obra_en; ?> <?php if($profundidad_obra_en): ?> x <?php echo $profundidad_obra_en; ?><?php endif; ?> in
                                                    </h6>
                                                <?php endif; ?>
                                            <?php endif; ?> 
                                            <?php if($ano_obra): ?>
                                                <h6>
                                                    <?php echo $ano_obra; ?>
                                                </h6>
                                            <?php endif; ?>
                                            <?php if($vendido_tf_obra): ?>
                                                <div class="sold-icon position-absolute">
                                                    <img src="<?php bloginfo('template_url'); ?>/inc/icons/sold-icon.svg" alt="" class="img-fluid">
                                                </div>
                                            <?php endif; ?>
                                            <button type="button" class="more-info contact-gallery" data-toggle="modal" data-target="#contatc-form-<?php echo $i; ?>">
                                                <div class="icon d-inline">
                                                    <img src="<?php bloginfo('template_url'); ?>/inc/icons/consutla-icon.svg" class="img-fluid" alt="">
                                                </div>
                                                <p class="d-inline normal">
                                                    <?php if(pll_current_language() == 'en') { ?> 
                                                        enquire
                                                    <?php } ?>
                                                    <?php if(pll_current_language() == 'es') { ?> 
                                                        consultar
                                                    <?php } ?>
                                                </p>
                                            </button>
                                            <!-- The Modal -->
                                            <div class="modal fade" id="contatc-form-<?php echo $i; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title normal">
                                                                <?php if(pll_current_language() == 'en') { ?> 
                                                                    CONTACT GALLERY
                                                                <?php } ?>
                                                                <?php if(pll_current_language() == 'es') { ?> 
                                                                    CONTACTAR GALERÍA
                                                                <?php } ?>
                                                            </h4>
                                                            <button type="button" class="close position-absolute" data-dismiss="modal">
                                                                <img src="<?php bloginfo('template_url'); ?>/inc/icons/close-icon.svg" class="img-fluid" alt="">
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="data-cont d-flex justify-content-start align-items-end w-100">
                                                                <div class="pict-thumb">
                                                                    <img class="img-fluid" src="<?php echo $obra_img_artistas_out_form; ?>">
                                                                </div>
                                                                <div class="caption">
                                                                    <h6 class="normal title-current-artist" data-title="<?php echo $autor_obra; ?>">
                                                                        <?php echo $autor_obra; ?>
                                                                    </h6>
                                                                    <?php if( ($titulo_obra) && ($ano_obra) ): ?>	
                                                                        <h6 class="data-work">
                                                                            <?php echo $titulo_obra; ?>
                                                                            <br><?php echo $ano_obra; ?>
                                                                        </h6>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <?php if(pll_current_language() == 'en') { ?> 
                                                                <?php echo do_shortcode('[contact-form-7 id="1002" title="Consulta Obras - EN"]'); ?>
                                                            <?php } ?>
                                                            <?php if(pll_current_language() == 'es') { ?> 
                                                                <?php echo do_shortcode('[contact-form-7 id="551" title="Consulta Obras"]'); ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>                            
                    <?php endif; ?>
                </div>    
            <?php } ?>
            <?php if( get_field('muestras_artistas_tf') == 'si') { ?>
                <div id="muestras" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1300">
                    <h2 class="title-mod">
                        <?php if($currentlang=="es"): ?>
                            muestras en del infinito
                        <?php elseif($currentlang=="en-GB"): ?>
                            exhibitions
                        <?php endif; ?> 
                    </h2>
                    <?php
                    $muestras_artistas = get_field('muestras_artistas');
                    if( $muestras_artistas ): ?>
                        <div class="content-wrapper-middle mx-auto">
                            <?php foreach( $muestras_artistas as $post ): 
                                // Setup this post for WP functions (variable must be named $post).
                                $ini_date_muestras = get_field('ini_date_muestras');
                                $fin_date_muestras = get_field('fin_date_muestras');
                                setup_postdata($post); ?>
                                <div class="news">
                                    <a href="<?php the_permalink(); ?>" class="h4">
                                        <span class="normal">
                                            <?php the_title(); ?>
                                        </span>
                                        <span class="d-block">
                                            <span class="normal">Del Infinito. </span><?php echo $ini_date_muestras; ?> · <?php echo $fin_date_muestras; ?>
                                        </span>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php 
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            <?php } ?>  
            <?php if( get_field('prensa_ferias_tf') == 'si' ) { ?>
                <div class="modulos-internas-wrapper">
                    <div id="prensa" class="modulo page-section">
                        <h2 class="title-mod">
                            <?php if($currentlang=="es"): ?>
                                prensa
                            <?php elseif($currentlang=="en-GB"): ?>
                                press
                            <?php endif; ?>
                        </h2>
                        <div class="content-wrapper-middle mx-auto">
                            <?php $i = 0; ?>
                            <?php if( have_rows('prensa_ferias_rep') ):
                                while( have_rows('prensa_ferias_rep') ): the_row(); $i++;
                                    // vars 
                                    $titulo_prensa_ferias = get_sub_field('titulo_prensa_ferias'); 
                                    $autor_prensa_ferias = get_sub_field('autor_prensa_ferias'); 
                                    $medio_prensa_ferias = get_sub_field('medio_prensa_ferias'); 
                                    $fecha_prensa_ferias = get_sub_field('fecha_prensa_ferias'); 
                                    $link_prensa_ferias = get_sub_field('link_prensa_ferias'); 
                                ?>
                                    <div class="news" data-index="<?php echo $i; ?>">
                                        <a href="<?php echo $link_prensa_ferias; ?>" target="_blank" class="h4">
                                            <span class="normal">
                                                <?php echo $titulo_prensa_ferias; ?>
                                            </span>
                                            <span class="d-block">
                                                <?php echo $autor_prensa_ferias; ?> <?php echo $medio_prensa_ferias; ?> <?php echo $fecha_prensa_ferias; ?>
                                            </span>
                                        </a>
                                    </div>
                                    <?php if($i == 5) { ?>
                                        <div class="more-text p text-justify">
                                            
                                    <?php } ?>
                                <?php endwhile; ?>
                                        </div>
                                        <?php if($i > 5) { ?>
                                            <?php if($currentlang=="es"): ?>
                                                <a class="read-more es" href="#">
                                                    <div class="icon d-inline">
                                                        <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                                                    </div>
                                                    <p class="d-inline normal">ver más</p>
                                                </a>
                                            <?php elseif($currentlang=="en-GB"): ?>
                                                <a class="read-more en" href="#">
                                                    <div class="icon d-inline">
                                                        <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                                                    </div>
                                                    <p class="d-inline normal">view more</p>
                                                </a>                        
                                            <?php endif; ?>
                                        <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>          
            <?php if( get_field('prensa_artistas_tf') == 'si' ) { ?>
                <div id="prensa" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1300">
                    <h2 class="title-mod">
                        <?php if($currentlang=="es"): ?>
                            prensa
                        <?php elseif($currentlang=="en-GB"): ?>
                            press
                        <?php endif; ?> 
                    </h2>
                    <div class="content-wrapper-middle mx-auto">
                        <?php $i = 0; ?>
                        <?php if( have_rows('prensa_artistas_rep') ): 
                            while( have_rows('prensa_artistas_rep') ): the_row(); $i++;
                                // vars 
                                $titulo_prensa_artistas = get_sub_field('titulo_prensa_artistas'); 
                                $autor_prensa_artistas = get_sub_field('autor_prensa_artistas'); 
                                $medio_prensa_artistas = get_sub_field('medio_prensa_artistas'); 
                                $fecha_prensa_artistas = get_sub_field('fecha_prensa_artistas'); 
                                $link_prensa_artistas = get_sub_field('link_prensa_artistas'); ?>          
                                    <div class="news" data-index="<?php echo $i; ?>">
                                        <a href="<?php echo $link_prensa_artistas; ?>" target="_blank" class="h4">
                                            <span class="normal">
                                                <?php echo $titulo_prensa_artistas; ?>
                                            </span>
                                            <span class="d-block">
                                                <?php echo $autor_prensa_artistas; ?> <?php echo $medio_prensa_artistas; ?> <?php echo $fecha_prensa_artistas; ?>
                                            </span>
                                        </a>
                                    </div>
                                    <?php if($i == 5) { ?>
                                        <div class="more-text p text-justify">
                                        
                                    <?php } ?>
                            <?php endwhile; ?> 
                                    </div>
                                    <?php if($i > 5) { ?>
                                        <?php if($currentlang=="es"): ?>
                                            <a class="read-more es" href="#">
                                                <div class="icon d-inline">
                                                    <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                                                </div>
                                                <p class="d-inline normal">ver más</p>
                                            </a>
                                        <?php elseif($currentlang=="en-GB"): ?>
                                            <a class="read-more en" href="#">
                                                <div class="icon d-inline">
                                                    <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                                                </div>
                                                <p class="d-inline normal">view more</p>
                                            </a>                        
                                        <?php endif; ?>
                                    <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="modulos-internas-wrapper otros-posts" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
            <?php $args = array (
                'post_type'              => array( 'artistas_cpt' ),
                'posts_per_page'         => -1,
                'post__not_in'           => array(get_the_ID())
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : ?>
            <div class="modulo">
                <h2 class="title-mod">
                <?php if($currentlang=="es"): ?>
                    otros artistas
                <?php elseif($currentlang=="en-GB"): ?>
                    others artists
                <?php endif; ?> 
                </h2>
                <div class="carousel" data-flickity='{ "imagesLoaded": true, "groupCells": true, "groupCells": 1, "percentPosition": false, "wrapAround": true, "autoPlay": true, "prevNextButtons": false }'>
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        // vars
                        $img_dest_artistas = get_field('img_dest_artistas');
                        $size = 'thumbs-grid-mob'; 
                        $img_dest_artistas_out = $img_dest_artistas['sizes'][ $size ];
                        ?>
                        <a class="carousel-cell" href="<?php the_permalink(); ?>">
                            <div class="title position-absolute">
                                <h2 class="white">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                            <img src="<?php echo $img_dest_artistas_out; ?>" alt="" class="img-fluid">
                            <div class="gradient w-100 h-100 position-absolute"></div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php get_footer('newsletter'); ?>