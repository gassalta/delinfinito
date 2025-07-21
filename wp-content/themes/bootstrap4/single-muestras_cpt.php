<?php
get_header(); ?>
    <style>
        header #menu-desktop-es li#menu-item-20 a,
        header #menu-desktop-en li#menu-item-833 a {
            font-family: 'Fakt Pro Normal';
        }
    </style>
    <div class="main-wrapper">
        <?php //vars
        $img_dest_muestras_big = get_field('img_dest_muestras_big');
        $size = 'image-cover';
        $size2 = 'image-cover-medium';
        $size3 = 'image-cover-mobile'; 
        $img_dest_muestras_big_out = $img_dest_muestras_big['sizes'][ $size ];
        $img_dest_muestras_big_out_2 = $img_dest_muestras_big['sizes'][ $size2 ];
        $img_dest_muestras_big_out_3 = $img_dest_muestras_big['sizes'][ $size3 ];
        $ini_date_muestras = get_field('ini_date_muestras');
        $fin_date_muestras = get_field('fin_date_muestras');
        $art_muestras = get_field('art_muestras');
        $attachment_id = $img_dest_muestras_big['ID'];
        $dom_color = get_color_data( $attachment_id, 'dominant_color_hex', true );
        $currentlang = get_bloginfo('language');
        ?>
        <div class="cover-section w-100 vh-100 position-relative">
            <div class="bg w-100 vh-100 position-relative" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300" style="background: url('<?=$img_dest_muestras_big_out;?>')"> 
            </div>
            <div class="arrow-scroll mobile position-absolute"></div>
            <div class="bottom-bar position-absolute d-flex w-100 justify-content-between align-items-end transition" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                <div class="data">
                    <h6 class="date white normal">
                        <?php echo $art_muestras; ?> · <?php echo $ini_date_muestras; ?> - <?php echo $fin_date_muestras; ?>
                    </h6>
                    <h1 class="title white">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="menu d-none d-md-block text-right">
                    <?php if( get_field('texto_tf_rep') == 'si') { ?>
                        <a href="#texto" class="scroll h4 white normal">
                            <?php if($currentlang=="es"): ?>
                                texto curatorial
                            <?php elseif($currentlang=="en-GB"): ?>
                                curatorial text
                            <?php endif; ?> 
                        </a>
                    <?php } ?>
                    <a href="#muestra" class="scroll h4 white normal">
                        <?php if($currentlang=="es"): ?>
                            muestra
                        <?php elseif($currentlang=="en-GB"): ?>
                            exhibition
                        <?php endif; ?>                   
                    </a>
                    <?php if( get_field('prensa_muestras_tf') == 'si') { ?>
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
        <!-- EXTERNALS LINKS -->  
        <div class="modulos-internas-wrapper" style="padding-bottom: 0">
            <div class="ext-link d-flex ext-link d-flex <?php if( get_field('rv_tf_muestras') == 'si') { ?>justify-content-between<?php } else { ?>justify-content-end<?php } ?>" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                <?php 
                $link_rv_muestras = get_field('link_rv_muestras');
                $pdf_muestras = get_field('pdf_muestras');  
                ?>
                <?php if( get_field('rv_tf_muestras') == 'si') { ?>
                    <a href="<?php echo $link_rv_muestras; ?>" target="_blank" class="more-info">
                        <div class="icon d-inline">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/rv-icon.svg" class="img-fluid" alt="">
                        </div>
                        <p class="d-inline normal">recorrido virtual</p>
                    </a>
                <?php } ?>
                <?php if( get_field('pdf_tf_muestras') == 'si') { ?>
                    <a href="<?php echo $pdf_muestras; ?>" target="_blank" class="more-info">
                        <div class="icon d-inline">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/download-icon.svg" class="img-fluid" alt="">
                        </div>
                        <p class="d-inline normal">
                            <?php if($currentlang=="es"): ?>
                                descargar PDF
                            <?php elseif($currentlang=="en-GB"): ?>
                                download PDF
                            <?php endif; ?> 
                        </p>
                    </a>
                <?php } ?>
            </div>
        </div>       
        <!-- TEXTO CURATORIAL -->                
        <?php if( get_field('texto_tf_rep') == 'si' ) { ?>
            <div class="modulos-internas-wrapper" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300" style="padding-top: 0">
                <?php 
                // vars
                $texto_curatorial_muestras = get_field('texto_curatorial_muestras');
                if( have_rows('texto_curatorial_muestras') ):
                    while( have_rows('texto_curatorial_muestras') ): the_row(); 
                        // vars
                        $autor_texto_cur_muestras = get_sub_field('autor_texto_cur_muestras');
                        $titulo_cur_muestras = get_sub_field('titulo_cur_muestras');
                        $extracto_muestras = get_sub_field('extracto_muestras');
                        $texto_cur_muestras = get_sub_field('texto_cur_muestras');
                        ?>
                        <div id="texto" class="modulo">
                            <h2 class="title-mod">
                                <?php if($currentlang=="es"): ?>
                                    texto curatorial
                                <?php elseif($currentlang=="en-GB"): ?>
                                    curatorial text
                                <?php endif; ?> 
                            </h2>
                            <div class="content-wrapper-middle mx-auto">
                                <h4 class="autor normal">
                                    <?php echo $autor_texto_cur_muestras; ?>
                                </h4>
                                <h1 class="title">
                                    <?php echo $titulo_cur_muestras; ?>
                                </h1>
                                <div class="content p text-justify">
                                    <?php echo $extracto_muestras; ?>
                                </div> 
                                <?php if($texto_cur_muestras): ?>
                                    <?php if($currentlang=="es"): ?>
                                        <div class="more-text content editable p text-justify">
                                            <?php echo $texto_cur_muestras; ?>
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
                                            <?php echo $texto_cur_muestras; ?>
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
                    <?php endwhile; 
                endif; ?>
            </div>
        <?php } ?>
        <!-- MUESTRA -->
        <?php if ( have_rows('img_slideshow_muestras_rep') ) : ?>    
            <div id="muestra" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                <div class="modulos-internas-wrapper">
                    <div class="modulo muestra">
                        <h2 class="title-mod">
                            <?php if($currentlang=="es"): ?>
                                muestra
                            <?php elseif($currentlang=="en-GB"): ?>
                                exhibition
                            <?php endif; ?>  
                        </h2>
                    </div>
                </div>
                <div class="carousel grande gallery" data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true, "autoPlay": false, "prevNextButtons": true }'>
                <?php 
                $acumulado = [];
                while( have_rows('img_slideshow_muestras_rep') ) : the_row();
                    // vars 
                    $img_slideshow_muestras = get_sub_field('img_slideshow_muestras');
                    $size = 'image-slideshow';
                    $size2 = 'image-slideshow-mobile';
                    $sizefull = 'large';
                    $img_slideshow_muestras_out = $img_slideshow_muestras['sizes'][ $size ];
                    $img_slideshow_muestras_out_2 = $img_slideshow_muestras['sizes'][ $size2 ];
                    $img_slideshow_muestras_out_large = $img_slideshow_muestras['sizes'][ $sizefull ];
                    ?>
                    <div class="gallery-cell">
                    <a href="<?php echo $img_slideshow_muestras_out_large; ?>" data-rel=”lightbox-gallery” >
                        <img 
                        src="<?php echo $img_slideshow_muestras_out; ?>" alt="" data-src="<?php echo $img_slideshow_muestras_out_large; ?>"/>
                    </a>        
                    </div>
                <?php endwhile;?>
            </div>
        <?php endif; ?>         
        <!-- PRENSA -->
        <?php if( get_field('prensa_muestras_tf') == 'si' ) { ?>
            <div class="modulos-internas-wrapper" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300" style="padding-bottom: 0">
                <div id="prensa" class="modulo">
                    <h2 class="title-mod">
                        <?php if($currentlang=="es"): ?>
                            prensa
                        <?php elseif($currentlang=="en-GB"): ?>
                            press
                        <?php endif; ?>  
                    </h2>
                    <div class="content-wrapper-middle mx-auto">
                        <?php $i = 0; ?>
                        <?php if( have_rows('prensa_muestras_rep') ):
                            while( have_rows('prensa_muestras_rep') ): the_row(); $i++;
                                // vars 
                                $titulo_prensa_muestras = get_sub_field('titulo_prensa_muestras'); 
                                $autor_prensa_muestras = get_sub_field('autor_prensa_muestras'); 
                                $medio_prensa_muestras = get_sub_field('medio_prensa_muestras'); 
                                $fecha_prensa_muestras = get_sub_field('fecha_prensa_muestras'); 
                                $link_prensa_muestras = get_sub_field('link_prensa_muestras'); ?>
                                <div class="news" data-index="<?php echo $i; ?>">
                                    <a href="<?php echo $link_prensa_muestras; ?>" target="_blank" class="h4">
                                        <span class="normal">
                                            <?php echo $titulo_prensa_muestras; ?>
                                        </span>
                                        <span class="d-block">
                                            <?php echo $autor_prensa_muestras; ?> <?php echo $medio_prensa_muestras; ?> <?php echo $fecha_prensa_muestras; ?>
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
                'post_type'              => array( 'muestras_cpt' ),
                'posts_per_page'         => -1,
                'post__not_in'           => array(get_the_ID())
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : ?>
            <div class="modulo">
                <h2 class="title-mod">
                    <?php if($currentlang=="es"): ?>
                        otras muestras
                    <?php elseif($currentlang=="en-GB"): ?>
                        other exhibitions
                    <?php endif; ?>
                </h2>
                <div class="carousel" data-flickity='{ "imagesLoaded": true, "groupCells": true, "groupCells": 1, "percentPosition": false, "wrapAround": true, "autoPlay": true, "prevNextButtons": false }'>
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        // vars
                        $img_dest_muestras = get_field('img_dest_muestras');
                        $size = 'thumbs-grid-mob'; 
                        $img_dest_muestras_out = $img_dest_muestras['sizes'][ $size ];
                        $ini_date_muestras = get_field('ini_date_muestras');
                        $fin_date_muestras = get_field('fin_date_muestras');
                        $art_muestras = get_field('art_muestras');
                        ?>
                        <a class="carousel-cell" href="<?php the_permalink(); ?>">
                            <div class="title position-absolute">
                                <h6 class="white normal">
                                    <?php echo $art_muestras; ?> · <?php echo $ini_date_muestras; ?> - <?php echo $fin_date_muestras; ?> 
                                </h6>
                                <h2 class="white">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                            <img src="<?php echo $img_dest_muestras_out; ?>"  alt="" class="img-fluid"><!-- src="http://localhost:10004/wp-content/themes/bootstrap4/images/img-provisoria.jpg"-->
                            <div class="gradient w-100 h-100 position-absolute"></div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>
    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">
        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('newsletter'); ?>
<script>
    jQuery(document).ready(function($ ) {
        // Flickity
        // --------- /
        var $gallery = $('.gallery').flickity({
            imagesLoaded: true,
            groupCells: true,
            groupCells: 1,
            percentPosition: false,
            wrapAround: true,
            pageDots: true,
            prevNextButtons: true
        });
        $gallery.on('staticClick', function(event, pointer, cellElement, cellIndex) {
    if (!cellElement) {
      return;
    }
    
    // Photoswipe functions
    var openPhotoSwipe = function() {
      var pswpElement = document.querySelectorAll('.pswp')[0];

      // build items array

      var items = $.map($(".gallery-cell").find("img"), function(el) {
        return {          
          "src": el.getAttribute('data-src'),
          "w":   el.width,
          "h":   el.height
        }
      });
  
      var options = {  
      	history: false,
        index: cellIndex
      };
   
      var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
      gallery.init();
    
    };

    openPhotoSwipe();
  });
    });
</script>