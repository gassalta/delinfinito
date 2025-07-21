<?php
get_header('white'); ?>
<style>
    header #menu-desktop-es li#menu-item-21 a,
    header #menu-desktop-en li#menu-item-834 a {
        font-family: 'Fakt Pro Normal';
    }
</style>
<div class="main-wrapper position-relative">
  <div class="modulos-internas-wrapper">  
    <?php // Get parent id of current post (get_the_ID() gets id of current post,
    // whicdh is the attachement, as we are in the attachment template)
    $parent_id = wp_get_post_parent_id( get_the_ID() );
    $parent_post_id = $parent_id;
    $parent_post = get_post($parent_post_id);
    $parent_post_title = $parent_post->post_title; 
    // ACF
    $titulo_obra = get_field('titulo_obra');
    $tecnica_obra = get_field('tecnica_obra');
    $ancho_obra = get_field('ancho_obra');
    $ancho_obra_en = get_field('ancho_obra_en');
    $alto_obra = get_field('alto_obra');
    $alto_obra_en = get_field('alto_obra_en');
    $profundidad_obra = get_field('profundidad_obra');
    $profundidad_obra_en = get_field('profundidad_obra_en');
    $ano_obra = get_field('ano_obra');
    $obra_img_artistas = get_sub_field('obra_img_artistas');
    $descargar_pdf_obras = get_field('descargar_pdf_obras');
    $descripcion = get_field('descripcion_artistas');
    // ACF - CONDITIONALS
    $vendido_tf_obra = get_field('vendido_tf_obra');
    $pdf_obras_tf = get_field('pdf_obras_tf');
    $poliptico_obras_tf = get_field('poliptico_obras_tf');
    $obras_com_insight_tf = get_field('obras_com_insight_tf');
    $texto_obras_tf = get_field('texto_obras_tf');
    $prensa_obras_insight_tf = get_field('prensa_obras_insight_tf');
    $titulo_art_obra = get_field('titulo_art_obra');
    $extracto_art_obra = get_field('extracto_art_obra');
    $texto_art_obra = get_field('texto_art_obra');
    // ATTACHMENT
    $image_size_form_url = wp_get_attachment_image_url( get_the_ID(), 'thumb-obra-form' );
    $image_size_works_url = wp_get_attachment_image_url( get_the_ID(), 'thumbs-works-grid-medium' );
    $image_size_large_url = wp_get_attachment_image_url( get_the_ID(), 'large' );
    $image_size_large = wp_get_attachment_image_src( get_the_ID(), 'large' );
    // $attachment = get_post( get_the_ID() );
    // $descripcion = $attachment->post_content;
    $currentlang = get_bloginfo('language');
    ?>
    <div class="ext-link d-flex justify-content-between align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1000">
      <h1>
          <?php echo $parent_post_title; ?>
      </h1>
      <button onclick="history.back()" class="more-info">
          <div class="icon d-inline">
              <img src="<?php bloginfo('template_url'); ?>/inc/icons/arrow-left.svg" class="img-fluid" alt="">
          </div>
          <p class="d-inline normal">
            <?php if($currentlang=="es"): ?>
              volver
            <?php elseif($currentlang=="en-GB"): ?>
              back
            <?php endif; ?>    
          </p>
      </button>
    </div>
    <div class="row attachment-obra-cont">
      <div class="col-12 col-md-8 text-center">
        <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
          <figure class="text-center" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
            <a class="position-relative h-100 d-inline-block insight-plus" href="<?php echo $image_size_large_url; ?>" itemprop="contentUrl" data-size="<?php echo $image_size_large[1]; ?>x<?php echo $image_size_large[2]; ?>"> 
              <img src="<?php echo $image_size_works_url; ?>" alt="" class="artwork img-fluid" itemprop="thumbnail" alt="" />
              <div class="plus-obra-icon position-absolute d-none">
                <img class="img-fluid" src="<?php bloginfo('template_url'); ?>/inc/icons/plus-obra-icon.svg" alt="">
              </div>
            </a>
          </figure>
        </div>
      </div>
      <div class="col-12 col-md-4 d-flex justify-content-between flex-column data-obra-cont">
        <div class="options">
          <?php if($vendido_tf_obra): ?>
            <div class="sold-icon-cont" data-toggle="modal" data-target="#contatc-form" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
              <div class="sold-icon d-inline">
                  <img src="<?php bloginfo('template_url'); ?>/inc/icons/sold-icon.svg" alt="" class="img-fluid">
              </div>
              <p class="d-inline normal">
                <?php if($currentlang=="es"): ?>
                    no disponible
                <?php elseif($currentlang=="en-GB"): ?>
                    sold artwork
                <?php endif; ?> 
              </p>
            </div>
          <?php endif; ?>
          <button type="button" class="more-info contact-gallery-insight" data-toggle="modal" data-target="#contatc-form" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
              <div class="icon d-inline" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
                  <img src="<?php bloginfo('template_url'); ?>/inc/icons/consutla-icon.svg" class="img-fluid" alt="">
              </div>
              <p class="d-inline normal" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
                <?php if($currentlang=="es"): ?>
                    consultar
                <?php elseif($currentlang=="en-GB"): ?>
                    enquire
                <?php endif; ?> 
              </p>
          </button>
          <?php if( get_field('pdf_obras_tf') == 'si') { ?>
            <a href="<?php echo $descargar_pdf_obras; ?>" target="_blank" class="more-info d-block" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
              <div class="icon download d-inline">
                  <img src="<?php bloginfo('template_url'); ?>/inc/icons/download-icon.svg" class="img-fluid" alt="">
              </div>
              <p class="d-inline normal" style="margin-left: 9px">
                  <?php if($currentlang=="es"): ?>
                      descargar PDF
                  <?php elseif($currentlang=="en-GB"): ?>
                      download PDF
                  <?php endif; ?> 
              </p>
            </a>
          <?php } ?> 
          <!-- The Modal -->
          <div class="modal fade" id="contatc-form">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h4 class="modal-title normal">
                              <?php if($currentlang=="es"): ?>
                                  CONTACTAR GALERÍA
                              <?php elseif($currentlang=="en-GB"): ?>
                                  CONTACT GALLERY
                              <?php endif; ?> 
                          </h4>
                          <button type="button" class="close position-absolute" data-dismiss="modal">
                              <img src="<?php bloginfo('template_url'); ?>/inc/icons/close-icon.svg" class="img-fluid" alt="">
                          </button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                          <div class="data-cont d-flex justify-content-start align-items-end w-100">
                              <div class="pict-thumb">
                                  <img class="img-fluid" src="<?php echo $image_size_form_url; ?>">
                              </div>
                              <div class="caption">
                                  <h6 class="normal">
                                      <?php echo $parent_post_title; ?>
                                  </h6>
                                  <?php if( ($titulo_obra) && ($ano_obra) ): ?>	
                                      <h6 class="data-work">
                                          <?php echo $titulo_obra; ?>
                                          <br><?php echo $ano_obra; ?>
                                      </h6>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <?php if($currentlang=="es"): ?>
                              <?php echo do_shortcode('[contact-form-7 id="551" title="Consulta Obras"]'); ?>
                          <?php elseif($currentlang=="en-GB"): ?>
                              <?php echo do_shortcode('[contact-form-7 id="1002" title="Consulta Obras - EN"]'); ?>
                          <?php endif; ?> 
                      </div>
                  </div>
              </div>
          </div>          
        </div>
        <div class="data-obra" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
          <div class="title-current-artist" data-title="<?php echo $parent_post_title; ?>"></div>
          <div class="img-current-work" data-image="<?php echo $image_size_works_url; ?>"></div>
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
        </div>
      </div>
    </div>
    <?php if($descripcion): ?>
      <div id="descripcion" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1000">
        <h2 class="title-mod">
            <?php if($currentlang=="es"): ?>
                descripción
            <?php elseif($currentlang=="en-GB"): ?>
                description
            <?php endif; ?> 
        </h2>
        <div class="content-wrapper-middle mx-auto">
          <div class="content p text-justify">
            <p><?php echo $descripcion; ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if( get_field('poliptico_obras_tf') == 'si') { ?>
      <div id="obras" class="modulo">
        <?php if( have_rows('obras_pol_insight_artistas_rep')): $p=0; ?>
          <div class="row">
            <div class="col-12 col-xl-8">
              <div class="grid-works">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <?php while( have_rows('obras_pol_insight_artistas_rep') ): the_row(); $p++; 
                  // vars
                  // ACF
                  $obra_img_artistas = get_sub_field('obra_img_artistas');
                  $size_large = 'large';
                  $size_medium = 'thumbs-works-grid-medium';
                  $size_mob = 'thumbs-works-grid-mobile';
                  $size_form = 'thumb-obra-form';
                  $obra_img_artistas_out_medium = $obra_img_artistas['sizes'][ $size_medium ];
                  $obra_img_artistas_out_mob = $obra_img_artistas['sizes'][ $size_mob ];
                  $obra_img_artistas_out_large = $obra_img_artistas['sizes'][ $size_large ];
                  $obra_img_artistas_out_form = $obra_img_artistas['sizes'][ $size_form ];
                  $width_size_large = $obra_img_artistas['sizes'][ $size_large . '-width' ];
                  $height_size_large = $obra_img_artistas['sizes'][ $size_large . '-height' ];
                  $obra_link = $obra_img_artistas['link'];
                  $attachment_id = $obra_img_artistas['ID'];
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
                  // ATTACHMENT
                  $currentlang = get_bloginfo('language');
                ?>
                  <?php if($obra_img_artistas): ?>
                    <div class="grid-item insight">
                      <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        <figure class="text-center" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                          <a class="position-relative h-100 w-100 d-inline-block img-cont" href="<?php echo $obra_img_artistas_out_large; ?>" itemprop="contentUrl" data-size="<?php echo $width_size_large; ?>x<?php echo $height_size_large; ?>"> 
                            <img src="<?php echo $obra_img_artistas_out_medium; ?>" alt="" class="artwork img-fluid" itemprop="thumbnail" alt="" />
                            <div class="bg-roll position-absolute w-100 h-100 transition">
                              <div class="inside d-flex justify-content-center align-items-center w-100 h-100">
                                <img src="<?php bloginfo('template_url'); ?>/inc/icons/plus-white-icon.svg" alt="" class="plus-icon transition img-fluid">
                              </div>
                            </div>
                          </a>
                        </figure>
                      </div>
                      <div class="data">
                        <div class="img-current-work" data-image="<?php echo $obra_img_artistas_out_medium; ?>"></div>
                        <div class="d-none title-current-artist" data-title="<?php echo $parent_post_title; ?>">
                          <?php echo $parent_post_title; ?>
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
                        <button type="button" class="more-info contact-gallery-insight-grid" data-toggle="modal" data-target="#contatc-form-<?php echo $p; ?>">
                          <div class="icon d-inline">
                              <img src="<?php bloginfo('template_url'); ?>/inc/icons/consutla-icon.svg" class="img-fluid" alt="">
                          </div>
                          <p class="d-inline normal">
                            <?php if($currentlang=="es"): ?>
                                consultar
                            <?php elseif($currentlang=="en-GB"): ?>
                                enquire
                            <?php endif; ?> 
                          </p>
                        </button>
                      </div>
                    </div>            
                  <?php endif; ?>
                  <!-- The Modal -->
                  <div class="modal fade" id="contatc-form-<?php echo $p; ?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title normal">
                                    <?php if($currentlang=="es"): ?>
                                        CONTACTAR GALERÍA
                                    <?php elseif($currentlang=="en-GB"): ?>
                                        CONTACT GALLERY
                                    <?php endif; ?> 
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
                                <?php if($currentlang=="es"): ?>
                                    <?php echo do_shortcode('[contact-form-7 id="551" title="Consulta Obras"]'); ?>
                                <?php elseif($currentlang=="en-GB"): ?>
                                    <?php echo do_shortcode('[contact-form-7 id="1002" title="Consulta Obras - EN"]'); ?>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
            </div> 
          </div>                           
        <?php endif; ?>
      </div>
    <?php } elseif( get_field('obras_com_insight_tf') == 'si') { ?>
      <div id="obras" class="modulo">
        <?php if( have_rows('obras_com_insight_artistas_rep')): $p=0; ?>
          <div class="row">
            <div class="col-12 col-xl-8">
              <div class="grid-works">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <?php while( have_rows('obras_com_insight_artistas_rep') ): the_row(); $p++; 
                  // vars
                  // ACF
                  $obras_com_insight = get_sub_field('obras_com_insight');
                  $size_large = 'large';
                  $size_medium = 'thumbs-works-grid-medium';
                  $size_mob = 'thumbs-works-grid-mobile';
                  $size_form = 'thumb-obra-form';
                  $obras_com_insight_out_medium = $obras_com_insight['sizes'][ $size_medium ];
                  $obras_com_insight_out_mob = $obras_com_insight['sizes'][ $size_mob ];
                  $obras_com_insight_out_large = $obras_com_insight['sizes'][ $size_large ];
                  $obras_com_insight_out_form = $obras_com_insight['sizes'][ $size_form ];
                  $width_size_large = $obras_com_insight['sizes'][ $size_large . '-width' ];
                  $height_size_large = $obras_com_insight['sizes'][ $size_large . '-height' ];
                  $obras_com_video_insight = get_sub_field('obras_com_video_insight');
                  $epigrafe_obras_com_video_insight = get_sub_field('epigrafe_obras_com_video_insight');
                  $obra_link = $obras_com_insight['link'];
                  $attachment_id = $obras_com_insight['ID'];
                  $autor_obra = get_field('autor_obra', $attachment_id);
                  $titulo_obra = get_field('titulo_obra', $attachment_id);
                  $tecnica_obra = get_field('tecnica_obra', $attachment_id);
                  $ancho_obra = get_field('ancho_obra', $attachment_id);
                  $alto_obra = get_field('alto_obra', $attachment_id);
                  $ancho_obra_en = get_field('ancho_obra_en', $attachment_id);
                  $alto_obra_en = get_field('alto_obra_en', $attachment_id);
                  $ano_obra = get_field('ano_obra', $attachment_id);
                  $profundidad_obra = get_field('profundidad_obra', $attachment_id);
                  $profundidad_obra_en = get_field('profundidad_obra', $attachment_id);
                  $vendido_tf_obra = get_field('vendido_tf_obra', $attachment_id);
                  // ATTACHMENT
                  $currentlang = get_bloginfo('language');
                ?>
                  <?php if($obras_com_insight): ?>
                    <div class="grid-item insight">
                      <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        <figure class="text-center" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                          <a class="position-relative h-100 w-100 d-inline-block img-cont" href="<?php echo $obras_com_insight_out_large; ?>" itemprop="contentUrl" data-size="<?php echo $width_size_large; ?>x<?php echo $height_size_large; ?>"> 
                            <img src="<?php echo $obras_com_insight_out_medium; ?>" alt="" class="img-current-work artwork img-fluid" itemprop="thumbnail" alt="" />
                            <div class="bg-roll position-absolute w-100 h-100 transition">
                              <div class="inside d-flex justify-content-center align-items-center w-100 h-100">
                                <img src="<?php bloginfo('template_url'); ?>/inc/icons/plus-white-icon.svg" alt="" class="plus-icon transition img-fluid">
                              </div>
                            </div>
                          </a>
                        </figure>
                      </div>
                      <div class="data">
                        <div class="d-none title-current-artist" data-title="<?php echo $parent_post_title; ?>">
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
                      </div>
                      <button type="button" class="more-info contact-gallery-insight-grid-comp" data-toggle="modal" data-target="#contatc-form-<?php echo $p; ?>">
                        <div class="icon d-inline">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/consutla-icon.svg" class="img-fluid" alt="">
                        </div>
                        <p class="d-inline normal">
                            <?php if($currentlang=="es"): ?>
                                consultar
                            <?php elseif($currentlang=="en-GB"): ?>
                                enquire
                            <?php endif; ?> 
                        </p>
                      </button>
                    </div>            
                  <?php endif; ?>
                  <?php if($obras_com_video_insight): ?>
                    <div class="grid-item insight">
                      <?php
                      // Use preg_match to find obra_video_artistas src.
                      preg_match('/src="(.+?)"/', $obras_com_video_insight, $matches);
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
                      $obras_com_video_insight = str_replace($src, $new_src, $obras_com_video_insight);
                      // Add extra attributes to obra_video_artistas HTML.
                      $attributes = 'frameborder="0"';
                      $obras_com_video_insight = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $obras_com_video_insight);
                      // Display customized HTML.
                      echo'<div class="embed-responsive embed-responsive-16by9">';
                          echo $obras_com_video_insight;
                      echo'</div>';
                      ?>
                      <?php if($epigrafe_obras_com_video_insight): ?>
                        <div class="data video">
                          <?php echo $epigrafe_obras_com_video_insight; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <!-- The Modal -->
                  <div class="modal fade" id="contatc-form-<?php echo $p; ?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title normal">
                                    <?php if($currentlang=="es"): ?>
                                        CONTACTAR GALERÍA
                                    <?php elseif($currentlang=="en-GB"): ?>
                                        CONTACT GALLERY
                                    <?php endif; ?> 
                                </h4>
                                <button type="button" class="close position-absolute" data-dismiss="modal">
                                    <img src="<?php bloginfo('template_url'); ?>/inc/icons/close-icon.svg" class="img-fluid" alt="">
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="data-cont d-flex justify-content-start align-items-end w-100">
                                  <div class="pict-thumb">
                                      <img class="img-fluid" src="<?php echo $obras_com_insight_out_form; ?>">
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
                                <?php if($currentlang=="es"): ?>
                                    <?php echo do_shortcode('[contact-form-7 id="551" title="Consulta Obras"]'); ?>
                                <?php elseif($currentlang=="en-GB"): ?>
                                    <?php echo do_shortcode('[contact-form-7 id="1002" title="Consulta Obras - EN"]'); ?>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
              <?php if($descripcion): ?>
                <h6 class="descripcion">
                    <?php echo $descripcion; ?>
                </h6>
              <?php endif; ?>
            </div> 
          </div>                           
        <?php endif; ?>
      </div>
    <?php } ?> 
      <?php if( get_field('texto_obras_tf') == 'si' ) { ?>
        <div id="texto" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1500" data-aos-duration="1000">
          <h2 class="title-mod">
              <?php if($currentlang=="es"): ?>
                  texto
              <?php elseif($currentlang=="en-GB"): ?>
                  text
              <?php endif; ?> 
          </h2>
          <div class="content-wrapper-middle mx-auto">
            <h1 class="title">
                <?php echo $titulo_art_obra; ?>
            </h1>
            <div class="content p text-justify">
              <?php echo $extracto_art_obra; ?>
            </div>
            <?php if($texto_art_obra): ?>
              <div class="more-text p text-justify">
                  <?php echo $texto_art_obra; ?>
              </div>
            <?php endif; ?>
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
      <?php } ?> 
      <?php if( get_field('prensa_obras_insight_tf') == 'si' ) { ?>
        <div id="prensa" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="1000">
            <h2 class="title-mod">
                <?php if($currentlang=="es"): ?>
                    prensa
                <?php elseif($currentlang=="en-GB"): ?>
                    press
                <?php endif; ?> 
            </h2>
            <div class="content-wrapper-middle mx-auto">
              <?php $i = 0; ?>
              <?php if( have_rows('prensa_obras_insight') ): 
                  while( have_rows('prensa_obras_insight') ): the_row(); $i++;
                      // vars 
                      $titulo_prensa_obras = get_sub_field('titulo_prensa_obras'); 
                      $autor_prensa_obras = get_sub_field('autor_prensa_obras'); 
                      $medio_prensa_obras = get_sub_field('medio_prensa_obras'); 
                      $fecha_prensa_obras = get_sub_field('fecha_prensa_obras'); 
                      $link_prensa_obras = get_sub_field('link_prensa_obras'); ?>          
                      <div class="news" data-index="<?php echo $i; ?>">
                          <a href="<?php echo $link_prensa_obras; ?>" target="_blank" class="h4">
                              <span class="normal">
                                  <?php echo $titulo_prensa_obras; ?>
                              </span>
                              <span class="d-block">
                                  <?php echo $autor_prensa_obras; ?> <?php echo $medio_prensa_obras; ?> <?php echo $fecha_prensa_obras; ?>
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
        <!-- <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> -->
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
  // PHOTOSWIPE 
var initPhotoSwipeFromDOM = function(gallerySelector) {

// parse slide data (url, title, size ...) from DOM elements 
// (children of gallerySelector)
var parseThumbnailElements = function(el) {
    var thumbElements = el.childNodes,
        numNodes = thumbElements.length,
        items = [],
        figureEl,
        linkEl,
        size,
        item;

    for (var i = 0; i < numNodes; i++) {

        figureEl = thumbElements[i]; // <figure> element

        // include only element nodes 
        if (figureEl.nodeType !== 1) {
            continue;
        }

        linkEl = figureEl.children[0]; // <a> element

        size = linkEl.getAttribute('data-size').split('x');

        // create slide object
        item = {
            src: linkEl.getAttribute('href'),
            w: parseInt(size[0], 10),
            h: parseInt(size[1], 10)
        };



        if (figureEl.children.length > 1) {
            // <figcaption> content
            item.title = figureEl.children[1].innerHTML;
        }

        if (linkEl.children.length > 0) {
            // <img> thumbnail element, retrieving thumbnail url
            item.msrc = linkEl.children[0].getAttribute('src');
        }

        item.el = figureEl; // save link to element for getThumbBoundsFn
        items.push(item);
    }

    return items;
};

// find nearest parent element
var closest = function closest(el, fn) {
    return el && (fn(el) ? el : closest(el.parentNode, fn));
};

// triggers when user clicks on thumbnail
var onThumbnailsClick = function(e) {
    e = e || window.event;
    e.preventDefault ? e.preventDefault() : e.returnValue = false;

    var eTarget = e.target || e.srcElement;

    // find root element of slide
    var clickedListItem = closest(eTarget, function(el) {
        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
    });

    if (!clickedListItem) {
        return;
    }

    // find index of clicked item by looping through all child nodes
    // alternatively, you may define index via data- attribute
    var clickedGallery = clickedListItem.parentNode,
        childNodes = clickedListItem.parentNode.childNodes,
        numChildNodes = childNodes.length,
        nodeIndex = 0,
        index;

    for (var i = 0; i < numChildNodes; i++) {
        if (childNodes[i].nodeType !== 1) {
            continue;
        }

        if (childNodes[i] === clickedListItem) {
            index = nodeIndex;
            break;
        }
        nodeIndex++;
    }



    if (index >= 0) {
        // open PhotoSwipe if valid index found
        openPhotoSwipe(index, clickedGallery);
    }
    return false;
};

// parse picture index and gallery index from URL (#&pid=1&gid=2)
var photoswipeParseHash = function() {
    var hash = window.location.hash.substring(1),
        params = {};

    if (hash.length < 5) {
        return params;
    }

    var vars = hash.split('&');
    for (var i = 0; i < vars.length; i++) {
        if (!vars[i]) {
            continue;
        }
        var pair = vars[i].split('=');
        if (pair.length < 2) {
            continue;
        }
        params[pair[0]] = pair[1];
    }

    if (params.gid) {
        params.gid = parseInt(params.gid, 10);
    }

    return params;
};

var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
    var pswpElement = document.querySelectorAll('.pswp')[0],
        gallery,
        options,
        items;

    items = parseThumbnailElements(galleryElement);

    // define options (if needed)
    options = {

        // define gallery index (for URL)
        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

        getThumbBoundsFn: function(index) {
            // See Options -> getThumbBoundsFn section of documentation for more info
            var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                rect = thumbnail.getBoundingClientRect();

            return { x: rect.left, y: rect.top + pageYScroll, w: rect.width };
        }

    };

    // PhotoSwipe opened from URL
    if (fromURL) {
        if (options.galleryPIDs) {
            // parse real index when custom PIDs are used 
            // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
            for (var j = 0; j < items.length; j++) {
                if (items[j].pid == index) {
                    options.index = j;
                    break;
                }
            }
        } else {
            // in URL indexes start from 1
            options.index = parseInt(index, 10) - 1;
        }
    } else {
        options.index = parseInt(index, 10);
    }

    // exit if index not found
    if (isNaN(options.index)) {
        return;
    }

    if (disableAnimation) {
        options.showAnimationDuration = 0;
    }

    // Pass data to PhotoSwipe and initialize it
    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};

// loop through all gallery elements and bind events
var galleryElements = document.querySelectorAll(gallerySelector);

for (var i = 0, l = galleryElements.length; i < l; i++) {
    galleryElements[i].setAttribute('data-pswp-uid', i + 1);
    galleryElements[i].onclick = onThumbnailsClick;
}

// Parse URL and open gallery if it contains #&pid=3&gid=1
var hashData = photoswipeParseHash();
if (hashData.pid && hashData.gid) {
    openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
}
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');
</script>