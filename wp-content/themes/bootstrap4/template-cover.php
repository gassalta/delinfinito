<?php
/**
 * Template Name: Cover
 */
get_header(); ?>
<div class="rev_slider_wrapper fullscreen-container">
    <!-- the ID here will be used in the inline JavaScript below to initialize the slider -->
    <div id="rev_slider_1" class="rev_slider fullscreenbanner" data-version="5.4.5" style="display: none">
        <?php      
        $args = array(
            'post_type' => 'slideshow_inicio',
            'posts_per_page' => 1
        );  
        $query = new WP_Query( $args ); 
        if( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post(); 
                if ( have_rows( 'img_vid_fc' ) ) : ?>
                    <ul>
                        <?php while ( have_rows('img_vid_fc' ) ) : the_row(); ?>
                            <?php if ( get_row_layout() == 'videos' ) :
                                // vars
                                $video_cover = get_sub_field('video_cover'); 
                                $titulo_cover = get_sub_field('titulo_cover');
                                $subtitulo_cover = get_sub_field('subtitulo_cover');
                                $link_cover = get_sub_field('link_cover');
                                ?>
                                <li data-transition="fade" data-link="<?php echo $link_cover; ?>">
                                    <div class="rs-background-video-layer"
                                        data-videomp4="<?php echo $video_cover; ?>"
                                        data-videopreload="auto"
                                        data-autoplay="true"
                                        data-volume="mute" 
                                        data-forcerewind="on"
                                        data-nextslideatend="true">
                                    </div>
                                    <div class="tp-caption" data-width="90%" data-basealign="slide" data-x="['left']" data-paddingleft="[50]" data-y="['bottom']" data-paddingbottom="[50]" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-actions='[{"event": "click", "action": "simplelink", "target": "_self", "url": "<?php echo $link_cover; ?>"}]' style="z-index: 999; cursor: pointer">
                                        <h6 class="white normal d-flex flex-wrap" style="white-space: initial">
                                            <?php echo $subtitulo_cover; ?>
                                        </h6>
                                        <h1 class="white d-flex flex-wrap" style="white-space: initial">
                                            <?php echo $titulo_cover; ?>
                                        </h1>
                                    </div>
                                </li>  
                            <?php endif; ?>
                            <?php if ( get_row_layout() == 'imagenes' ) : 
                                $imagen_cover = get_sub_field('imagen_cover');
                                $size = 'image-cover';
                                $imagen_cover_out = $imagen_cover['sizes'][$size]; 
                                $titulo_cover = get_sub_field('titulo_cover');
                                $subtitulo_cover = get_sub_field('subtitulo_cover');
                                $link_cover = get_sub_field('link_cover');
                                ?>
                                <li data-transition="fade" data-link="<?php echo $link_cover; ?>">
                                    <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                                    <img src="<?php echo $imagen_cover_out; ?>" alt="" class="rev-slidebg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-kenburns="on" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-duration="8000">
                                    <!-- LINK -->
                                    <div class="tp-caption" data-width="90%" data-basealign="slide" data-x="['left']" data-paddingleft="[50]" data-y="['bottom']" data-paddingbottom="[50]" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-actions='[{"event": "click", "action": "simplelink", "target": "_self", "url": "<?php echo $link_cover; ?>"}]' style="z-index: 999; cursor: pointer">
                                        <h6 class="white normal d-flex flex-wrap" style="white-space: initial">
                                            <?php echo $subtitulo_cover; ?>
                                        </h6>
                                        <h1 class="white d-flex flex-wrap" style="white-space: initial">
                                            <?php echo $titulo_cover; ?>
                                        </h1>
                                    </div>
                                    <!-- GRADIENT -->
                                    <div class="tp-caption" data-blendmode="multiply" data-frames='[{"delay": 100, "speed": 300, "from": "opacity: 0", "to": "opacity: 1"}, {"delay": "wait", "speed": 300, "to": "opacity: 0"}]' data-x="['left']" data-y="['bottom']" data-hoffset="0" data-voffset="0" data-width="100%" data-height="200" data-basealign="slide" style="background: linear-gradient(180deg, rgb(0 0 0 / 0%) 0%, #0000009c 100%)"><div>
                                </li>
                            <?php endif; ?>    
                        <?php endwhile; ?>
                    <ul>
                <?php endif;
            endwhile; 
        endif; ?>
    </div>
</div>                                      
<script type="text/javascript">
    /* https://learn.jquery.com/using-jquery-core/document-ready/ */
    jQuery(document).ready(function() {
        /* initialize the slider based on the Slider's ID attribute */
        jQuery('#rev_slider_1').show().revolution({
            /* sets the Slider's default timeline */
            delay: 10000,
            /* options are 'auto', 'fullwidth' or 'fullscreen' */
            sliderLayout: 'fullscreen',
            /* basic navigation arrows and bullets */
            navigation: {
                onHoverStop: 'off',
                bullets: {
                    enable: true,
                    style: 'hermes',
                    hide_onleave: false,
                    h_align: 'right',
                    v_align: 'bottom',
                    h_offset: 40,
                    v_offset: 40,
                    space: 15
                },
                touch: {
                    touchenabled: 'on',
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: 'horizontal',
                    drag_block_vertical: false
                }
            }
        });
    });
</script>
<?php get_footer(); ?>