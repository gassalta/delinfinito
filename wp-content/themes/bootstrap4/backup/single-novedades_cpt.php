<?php
get_header('white'); ?>
    <style>
        header #menu-desktop-es li#menu-item-40 a,
        header #menu-desktop-en li#menu-item-836 a {
            font-family: 'Fakt Pro Normal';
        }
    </style>
    <div class="main-wrapper position-relative single"> 
        <?php if( get_field('slideshow_novedades_tf') == 'si') { ?>
            <?php if ( have_rows('img_slideshow_novedades_rep') ) : ?>
                <div class="carousel grande" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300" data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true, "autoPlay": false, "prevNextButtons": true }'>
                    <?php while( have_rows('img_slideshow_novedades_rep') ) : the_row(); 
                            // vars 
                            $img_slideshow_novedades = get_sub_field('img_slideshow_novedades');
                            $size = 'image-slideshow';
                            $size2 = 'image-slideshow-mobile';
                            $img_slideshow_novedades_out = $img_slideshow_novedades['sizes'][ $size ];
                            $img_slideshow_novedades_out_2 = $img_slideshow_novedades['sizes'][ $size2 ];
                        ?>
                        <img src="<?php echo $img_slideshow_novedades_out; ?>" />
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php } ?>
        <div class="modulos-internas-wrapper">
            <?php 
                //vars 
                $date_novedades = get_field('date_novedades');
                $extracto_novedades = get_field('extracto_novedades');
                $texto_novedades = get_field('texto_novedades');
            ?>
            <div class="content-wrapper-middle mx-auto">
                <div class="news-data">
                    <div class="date h6 normal">
                        <?php echo $date_novedades; ?>
                    </div>
                    <h1 class="title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="content p text-justify">
                        <?php echo $extracto_novedades; ?>
                    </div>
                    <?php if( get_field('texto_novedades_tf') == 'si') { ?>
                        <div class="content p text-justify">
                            <?php echo $texto_novedades; ?>
                        </div>
                        <!-- <a class="read-more" href="#">
                            <div class="icon d-inline">
                                <img src="<?php bloginfo('template_url'); ?>/images/icon-down.svg" class="img-fluid" alt="">
                            </div>
                            <p class="d-inline normal">ver más</p>
                        </a> -->
                    <?php } ?>
                    <?php if( get_field('prensa_novedades_tf') == 'si') { ?>
                        <div class="content-wrapper-middle mx-auto">
                            <?php if( have_rows('prensa_novedades_rep') ): ?>
                                <h4 class="autor normal">
                                <?php $currentlang = get_bloginfo('language'); ?>
                                    <?php if($currentlang=="es"): ?>
                                        Prensa
                                    <?php elseif($currentlang=="en-GB"): ?>
                                        Press
                                    <?php endif; ?>                                   
                                </h4>
                                <?php while( have_rows('prensa_novedades_rep') ): the_row(); 
                                    // vars 
                                    $titulo_novedades = get_sub_field('titulo_novedades'); 
                                    $autor_novedades = get_sub_field('autor_novedades'); 
                                    $medio_novedades = get_sub_field('medio_novedades'); 
                                    $fecha_novedades = get_sub_field('fecha_novedades'); 
                                    $link_prensa_novedades = get_sub_field('link_prensa_novedades'); 
                                ?>
                                <div class="news">
                                    <a href="<?php echo $link_prensa_novedades; ?>" target="_blank" class="h4">
                                        <span class="normal">
                                            <?php echo $titulo_novedades; ?>
                                        </span>
                                        <span class="d-block">
                                            <?php echo $autor_novedades; ?> <?php echo $medio_novedades; ?> <?php echo $fecha_novedades; ?>
                                        </span>
                                    </a>
                                </div>
                                <?php endwhile; 
                            endif; ?>
                        </div>
                    <?php } ?>   
                    <?php if( get_field('video_novedades_tf') == 'si') { ?>
                        <?php
                            // Load value.
                            $iframe = get_field('video_novedades');
                            // Use preg_match to find iframe src.
                            preg_match('/src="(.+?)"/', $iframe, $matches);
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
                            $iframe = str_replace($src, $new_src, $iframe);
                            // Add extra attributes to iframe HTML.
                            $attributes = 'frameborder="0"';
                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                            // Display customized HTML.
                            echo'<div class="embed-responsive embed-responsive-16by9">';
                                echo $iframe;
                            echo'</div>';
                            ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="modulos-internas-wrapper otros-posts novedades">
            <?php $args = array (
                'post_type' => array( 'novedades_cpt' ),
                'posts_per_page' => -1,
                'post__not_in' => array(get_the_ID())
            ); 
            $currentlang = get_bloginfo('language');
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : ?>
            <div class="modulo">
                <h2 class="title-mod">
                    <?php if($currentlang=="es"): ?>
                        otras novedades
                    <?php elseif($currentlang=="en-GB"): ?>
                        other news
                    <?php endif; ?> 
                </h2>
                <div class="carousel" data-flickity='{ "imagesLoaded": true, "groupCells": true, "groupCells": 1, "percentPosition": false, "wrapAround": true, "autoPlay": true, "prevNextButtons": false }'>
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        // vars
                        $img_dest_novedades = get_field('img_dest_novedades');
                        $size = 'thumbs-grid-mob'; 
                        $img_dest_novedades_out = $img_dest_novedades['sizes'][ $size ];
                        ?>
                        <a class="carousel-cell" href="<?php the_permalink(); ?>">
                            <div class="title position-absolute">
                                <h2 class="white">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                            <img src="<?php echo $img_dest_novedades_out; ?>" alt="" class="img-fluid">
                            <div class="gradient w-100 h-100 position-absolute"></div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php get_footer('newsletter'); ?>