<?php
/**
 * Template Name: Nosotros
 */

get_header(); ?>
  <?php if( (is_page('nosotros')) || (is_page('gallery')) ) { ?>
    <?php      
    $args = array(
        'post_type' => 'nosotros_cpt',
        'posts_per_page' => 1
    );  
    $query = new WP_Query( $args ); 
    if( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post(); 
            // vars
                $video_nosotros = get_field('video_nosotros');
                $video_nosotros_img = get_field('video_nosotros_img');
                $size = 'image-cover';
                $video_nosotros_img_out = $video_nosotros_img['sizes'][ $size ]; 
                $texto_dest_nosotros = get_field('texto_dest_nosotros');
                $texto_nosotros = get_field('texto_nosotros');
                $texto_ubicacion_nosotros = get_field('texto_ubicacion_nosotros');
                $map_nosotros = get_field('map_nosotros');
                $currentlang = get_bloginfo('language');
            ?>
            <div class="w-100 vh-100 position-relative">
                <div class="arrow-scroll nosotros position-absolute"></div>
                <div class="rev_slider_wrapper fullscreen-container" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                    <!-- the ID here will be used in the inline JavaScript below to initialize the slider -->
                    <div id="rev_slider_nosotros" class="rev_slider fullscreenbanner" data-version="5.4.5" style="display:none">
                        <ul>        
                            <li data-transition="fade">
                                <!-- required for background video, and will serve as the video's "poster/cover" image -->
                                <img src="<?php echo $video_cover_img; ?>"
                                    alt="Ocean"
                                    class="rev-slidebg"
                                    data-bgposition="center center"
                                    data-bgfit="cover"
                                    data-bgrepeat="no-repeat">
                                <!-- HTML5 BACKGROUND VIDEO LAYER -->
                                <div class="rs-background-video-layer"
                                    data-videomp4="<?php echo $video_nosotros; ?>"
                                    data-videopreload="auto"
                                    data-autoplay="true"
                                    data-volume="0" 
                                    data-forcerewind="on"
                                    data-nextslideatend="off"
                                    data-videoloop="loop">
                                </div>             
                            </li>  
                        <ul>
                    </div>
                </div>  
            </div>
            <div class="modulos-internas-wrapper">    
                <div class="content-wrapper-middle nosotros mx-auto" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                    <div class="content h1">
                        <?php echo $texto_dest_nosotros; ?>
                    </div>
                    <p class="content text-justify">
                        <?php echo $texto_nosotros; ?>
                    </p>
                </div> 
                <?php if( get_field('staff_tf') == 'si') { ?>
                    <div id="staff" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                        <h2 class="title-mod">
                            staff
                        </h2>
                        <div class="content-wrapper-middle nosotros staff mx-auto">
                            <?php if( have_rows('grupos_staff_rep') ): ?>
                                <?php while ( have_rows('grupos_staff_rep') ) : the_row(); 
                                    // vars 
                                    $nombre_del_grupo = get_sub_field('nombre_del_grupo');
                                    ?> 
                                    <div class="group-wrap"> 
                                        <h3 class="name">
                                            <?php echo $nombre_del_grupo; ?>
                                        </h3>
                                        <div class="row">                               
                                            <?php if( have_rows('integrantes_staff') ): ?>
                                                <?php while ( have_rows('integrantes_staff') ) : the_row();
                                                    // vars
                                                    $foto_staff = get_sub_field('foto_staff');
                                                    $size = 'image-staff';
                                                    $foto_staff_out = $foto_staff['sizes'][ $size ]; 
                                                    $nombre_staff = get_sub_field('nombre_staff'); 
                                                    $mail_staff = get_sub_field('mail_staff'); 
                                                    ?>
                                                        <div class="box col-12 col-sm-6 h4">
                                                            <img class="img-fluid" src="<?php echo $foto_staff_out; ?>" alt="<?php echo $nombre_staff; ?>" >
                                                            <span class="normal d-block text-lowercase">
                                                                <?php echo $nombre_staff; ?>
                                                            </span>
                                                            <a class="h4 gray transition d-inline-block text-lowercase" href="mailto:<?php echo $mail_staff; ?>">
                                                                <?php echo $mail_staff; ?>
                                                            </a>
                                                        </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div> 
                <?php } ?> 
                <div id="ubicacion" class="modulo" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="1300">
                    <h2 class="title-mod">
                    <?php if($currentlang=="es"): ?>
                            ubicación
                        <?php elseif($currentlang=="en-GB"): ?>
                            location
                        <?php endif; ?>  
                    </h2>
                    <div class="content-wrapper-middle nosotros mx-auto">
                        <p class="content">
                            <?php echo $texto_ubicacion_nosotros; ?>
                        </p>
                    </div>
                    <?php 
                    if( $map_nosotros ): ?>
                        <div class="acf-map" data-zoom="16">
                            <div class="marker" data-lat="<?php echo esc_attr($map_nosotros['lat']); ?>" data-lng="<?php echo esc_attr($map_nosotros['lng']); ?>"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>          
        <?php endwhile; 
    endif; ?>
    <script type="text/javascript">
        /* https://learn.jquery.com/using-jquery-core/document-ready/ */
        jQuery(document).ready(function() {
            /* initialize the slider based on the Slider's ID attribute */
            jQuery('#rev_slider_nosotros').show().revolution({
                /* options are 'auto', 'fullwidth' or 'fullscreen' */
                delay: 10000,
                sliderLayout: 'fullscreen',
            });
        });
        (function( $ ) {
            /**
             * initMap
             *
             * Renders a Google Map onto the selected jQuery element
             *
             * @date    22/10/19
             * @since   5.8.6
             *
             * @param   jQuery $el The jQuery element.
             * @return  object The map instance.
             */
            function initMap( $el ) {

                // Find marker elements within map.
                var $markers = $el.find('.marker');

                // Create gerenic map.
                var mapArgs = {
                    zoom        : $el.data('zoom') || 16,
                    mapTypeId   : google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    streetViewControl: false,
                    mapTypeControl: false,

                    // Snazzy Maps styles
            		styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

                };
                var map = new google.maps.Map( $el[0], mapArgs );

                // Add markers.
                map.markers = [];
                $markers.each(function(){
                    initMarker( $(this), map );
                });

                // Center map based on markers.
                centerMap( map );

                // Return map instance.
                return map;
            }

            /**
             * initMarker
             *
             * Creates a marker for the given jQuery element and map.
             *
             * @date    22/10/19
             * @since   5.8.6
             *
             * @param   jQuery $el The jQuery element.
             * @param   object The map instance.
             * @return  object The marker instance.
             */
            function initMarker( $marker, map ) {

                // Get position from marker.
                var lat = $marker.data('lat');
                var lng = $marker.data('lng');
                var latLng = {
                    lat: parseFloat( lat ),
                    lng: parseFloat( lng )
                };

                // Create marker instance.
                var marker = new google.maps.Marker({
                    position : latLng,
                    map: map,
                    icon: { 
                        url: 'https://delinfinito.com//wp-content/themes/bootstrap4/inc/icons/pin-del-infinito.svg',
                        scaledSize: new google.maps.Size(40, 40), // scaled size
                        origin: new google.maps.Point(0,0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    }
                });

                // Append to reference for later use.
                map.markers.push( marker );

                // If marker contains HTML, add it to an infoWindow.
                if( $marker.html() ){

                    // Create info window.
                    var infowindow = new google.maps.InfoWindow({
                        content: $marker.html()
                    });

                    // Show info window when marker is clicked.
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open( map, marker );
                    });
                }
            }

            /**
             * centerMap
             *
             * Centers the map showing all markers in view.
             *
             * @date    22/10/19
             * @since   5.8.6
             *
             * @param   object The map instance.
             * @return  void
             */
            function centerMap( map ) {

                // Create map boundaries from all map markers.
                var bounds = new google.maps.LatLngBounds();
                map.markers.forEach(function( marker ){
                    bounds.extend({
                        lat: marker.position.lat(),
                        lng: marker.position.lng()
                    });
                });

                // Case: Single marker.
                if( map.markers.length == 1 ){
                    map.setCenter( bounds.getCenter() );

                // Case: Multiple markers.
                } else{
                    map.fitBounds( bounds );
                }
            }

            // Render maps on page load.
            $(document).ready(function(){
                $('.acf-map').each(function(){
                    var map = initMap( $(this) );
                });
            });

            })(jQuery);
    </script>
  <?php } ?>  
<?php get_footer('newsletter'); ?>