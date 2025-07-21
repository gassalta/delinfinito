<?php
get_header(); ?>
    <style>
        header #menu-desktop-es li#menu-item-22 a,
        header #menu-desktop-en li#menu-item-835 a {
            font-family: 'Fakt Pro Normal';
        }
    </style>
    <div class="main-wrapper">
        <?php //vars
        $img_dest_ferias_big = get_field('img_dest_ferias_big');
        $size = 'image-cover';
        $size2 = 'image-cover-medium';
        $size3 = 'image-cover-mobile'; 
        $img_dest_ferias_big_out = $img_dest_ferias_big['sizes'][ $size ];
        $img_dest_ferias_big_out_2 = $img_dest_ferias_big['sizes'][ $size2 ];
        $img_dest_ferias_big_out_3 = $img_dest_ferias_big['sizes'][ $size3 ];
        $ini_date_ferias = get_field('ini_date_ferias');
        $fin_date_ferias = get_field('fin_date_ferias');
        $art_ferias = get_field('art_ferias');
        $lugar_ferias = get_field('lugar_ferias');
        $info_ferias = get_field('info_ferias');
        $info_texto_ferias = get_field('info_texto_ferias');
        $attachment_id = $img_dest_ferias_big['ID'];
        $dom_color = get_color_data( $attachment_id, 'dominant_color_hex', true );
        $currentlang = get_bloginfo('language');
        ?>
        <div class="cover-section w-100 vh-100 position-relative">
            <div class="bg w-100 vh-100 position-relative" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300" style="background: url('<?php echo $img_dest_ferias_big_out; ?>')"></div>
            <div class="arrow-scroll mobile position-absolute"></div>
            <div class="bottom-bar position-absolute d-flex w-100 justify-content-between align-items-end" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
                <div class="data">
                    <h6 class="date white normal">
                        <?php echo $lugar_ferias; ?> · <?php echo $ini_date_ferias; ?> - <?php echo $fin_date_ferias; ?>
                    </h6>
                    <h1 class="title white">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="menu d-none d-md-block text-right">
                    <a href="#info" class="scroll h4 white normal">
                        info
                    </a>
                    <a href="#stand" class="scroll h4 white normal">
                        <?php if($currentlang=="es"): ?>
                            stand
                        <?php elseif($currentlang=="en-GB"): ?>
                            booth
                        <?php endif; ?>
                    </a>
                    <?php if( get_field('prensa_ferias_tf') == 'si') { ?>
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
        <?php if ( have_rows('img_slideshow_ferias_rep') ) : ?>
            <div class="modulos-internas-wrapper">
                <div class="ext-link d-flex ext-link d-flex <?php if( get_field('rv_tf_ferias') == 'si') { ?>justify-content-between<?php } else { ?>justify-content-end<?php } ?>">
                    <?php 
                    $link_rv_ferias = get_field('link_rv_ferias');
                    $pdf_ferias = get_field('pdf_ferias');  
                    ?>
                    <?php if( get_field('rv_tf_ferias') == 'si') { ?>
                        <a href="<?php echo $link_rv_ferias; ?>" target="_blank" class="more-info">
                            <div class="icon d-inline">
                                <img src="<?php bloginfo('template_url'); ?>/inc/icons/rv-icon.svg" class="img-fluid" alt="">
                            </div>
                            <p class="d-inline normal">recorrido virtual</p>
                        </a>
                    <?php } ?>
                    <?php if( get_field('pdf_tf_ferias') == 'si') { ?>
                        <a href="<?php echo $pdf_ferias; ?>" target="_blank" class="more-info">
                            <div class="icon d-inline">
                                <img src="<?php bloginfo('template_url'); ?>/inc/icons/download-icon.svg" class="img-fluid" alt="">
                            </div>
                            <p class="d-inline normal">descargar PDF</p>
                        </a>
                    <?php } ?>
                </div>
                <div id="info" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
                    <h2 class="title-mod">
                        info
                    </h2>
                    <div class="content-wrapper-middle mx-auto">
                        <div class="content editable p text-justify">
                            <?php echo $info_ferias; ?>
                        </div> 
                        <?php if($info_texto_ferias): ?>
                            <?php if($currentlang=="es"): ?>
                                <div class="more-text content editable p text-justify">
                                    <?php echo $info_texto_ferias; ?>
                                </div>
                                <a class="read-more es" href="#">
                                    <div class="icon d-inline">
                                        <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                                    </div>
                                    <p class="d-inline normal">
                                        ver más
                                    </p>
                                </a>
                            <?php endif; ?> 
                            <?php if($currentlang=="en-GB"): ?>
                                <div class="more-text content editable p text-justify">
                                    <?php echo $info_texto_ferias; ?>
                                </div>
                                <a class="read-more en" href="#">
                                    <div class="icon d-inline">
                                        <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                                    </div>
                                    <p class="d-inline normal">
                                        view more
                                    </p>
                                </a>
                            <?php endif; ?> 
                        <?php endif; ?>                       
                    </div>
                </div>
            </div>
            <div id="stand" class="page-section" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
                <div class="modulos-internas-wrapper">
                    <div class="modulo muestra">
                        <h2 class="title-mod">
                            <?php if($currentlang=="es"): ?>
                                stand
                            <?php elseif($currentlang=="en-GB"): ?>
                                booth
                            <?php endif; ?>
                        </h2>
                    </div>
                </div>
                <div class="carousel grande" data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true, "autoPlay": false, "prevNextButtons": true }'>
                    <?php while( have_rows('img_slideshow_ferias_rep') ) : the_row();
                        // vars 
                        $img_slideshow_ferias = get_sub_field('img_slideshow_ferias');
                        $size = 'image-slideshow';
                        $size2 = 'image-slideshow-mobile';
                        $img_slideshow_ferias_out = $img_slideshow_ferias['sizes'][ $size ];
                        $img_slideshow_ferias_out_2 = $img_slideshow_ferias['sizes'][ $size2 ];
                        ?>
                        <img src="<?php echo $img_slideshow_ferias_out; ?>" />
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>                        
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
        <div class="modulos-internas-wrapper otros-posts">
            <?php $args = array (
                'post_type'              => array( 'ferias_cpt' ),
                'posts_per_page'         => -1,
                'post__not_in'           => array(get_the_ID())
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : ?>
            <div class="modulo">
                <h2 class="title-mod">
                    <?php if($currentlang=="es"): ?>
                        otras ferias
                    <?php elseif($currentlang=="en-GB"): ?>
                        other fairs
                    <?php endif; ?>
                </h2>
                <div class="carousel" data-flickity='{ "imagesLoaded": true, "groupCells": true, "groupCells": 1, "percentPosition": false, "wrapAround": true, "autoPlay": true, "prevNextButtons": false }'>
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        // vars
                        $img_dest_ferias_big = get_field('img_dest_ferias_big');
                        $size = 'thumbs-grid-mob'; 
                        $img_dest_ferias_big_out = $img_dest_ferias_big['sizes'][ $size ];
                        ?>
                        <a class="carousel-cell" href="<?php the_permalink(); ?>">
                            <div class="title position-absolute">
                                <h2 class="white">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                            <img src="<?php echo $img_dest_ferias_big_out; ?>" alt="" class="img-fluid">
                            <div class="gradient w-100 h-100 position-absolute"></div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php get_footer('newsletter'); ?>
<script>
    jQuery(document).ready(function($) {
        var $carousel_obra = $('.carousel-obra').flickity({
            cellSelector: '.carousel-cell',
            imagesLoaded: true,
            percentPosition: false,
            contain: true,
            wrapAround: true
        });
        var $caption = $('.data-obra');
        // Flickity instance
        var flkty = $carousel_obra.data('flickity');

        $carousel_obra.on('select.flickity', function() {
            // set image caption using img's alt
            $caption.text(flkty.selectedElement.alt)
        });
    });
</script> 