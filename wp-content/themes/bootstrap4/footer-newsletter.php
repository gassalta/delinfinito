        <footer class="modulos-internas-wrapper">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <h2>
                        <?php if(pll_current_language() == 'en') { ?> 
                            subscribe to our newsletter
                        <?php } ?>
                        <?php if(pll_current_language() == 'es') { ?> 
                            suscribite a nuestro newsletter
                        <?php } ?>
                    </h2>
                    <?php if(pll_current_language() == 'es') { ?>
                        <?php echo do_shortcode('[contact-form-7 id="552" title="Newsletter"]'); ?>
                    <?php } ?>
                    <?php if(pll_current_language() == 'en') { ?>
                        <?php echo do_shortcode('[contact-form-7 id="1372" title="Newsletter - EN"]'); ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="row"> 
            <?php if( (is_page('nosotros')) || (is_page('gallery')) ) { ?>
                <div class="col-12">         
                    <div class="redes float-md-right">
                        <a href="https://www.facebook.com/del.infinito" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/facebook.svg" alt="" class="img-fluid"> 
                        </a>
                        <a href="https://twitter.com/del_infinito" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/twitter.svg" alt="" class="img-fluid"> 
                        </a>
                        <a href="https://instagram.com/delinfinito/" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/instagram.svg" alt="" class="img-fluid"> 
                        </a>
                        <a href="https://www.artsy.net/partner/del-infinito" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/artsy-logo.png" alt="" class="img-fluid artsy"> 
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="line w-100"></div>
                </div>
                <div class="col-12 col-md-4">
                    <h6>    
                        <a class="mail" href="mailto:galeria@delinfinito.com">galeria@delinfinito.com</a>
                        <br>av. quintana 325 pb
                        <br>C1014CD buenos aires argentina
                        <br>tel +5411 48138828 
                    </h6>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="d-flex w-100 h-100 justify-content-md-center align-items-end logo-fundacion-cont">
                        <img src="<?php bloginfo('template_url'); ?>/images/fondo-met-logo.svg" alt="" class="img-fluid" style="width: 150px">
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="d-flex w-100 h-100 align-items-end justify-content-md-end">
                    <h6>© 2020 - Del Infinito. Todos los derechos reservados.</h6>
                </div> 
            <?php } else { ?>                
                <div class="col-12">         
                    <div class="redes float-md-right">
                        <a href="https://www.facebook.com/del.infinito" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/facebook.svg" alt="" class="img-fluid"> 
                        </a>
                        <a href="https://twitter.com/del_infinito" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/twitter.svg" alt="" class="img-fluid"> 
                        </a>
                        <a href="https://instagram.com/delinfinito/" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/instagram.svg" alt="" class="img-fluid"> 
                        </a>
                        <a href="https://www.artsy.net/partner/del-infinito" target="_blank">
                            <img src="<?php bloginfo('template_url'); ?>/inc/icons/artsy-logo.png" alt="" class="img-fluid artsy"> 
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="line w-100"></div>
                </div>
                <div class="col-12 col-md-6">
                    <h6>    
                        <a class="mail" href="mailto:galeria@delinfinito.com">galeria@delinfinito.com</a>
                        <br>av. quintana 325 pb
                        <br>C1014CD buenos aires argentina
                        <br>tel +5411 48138828 
                    </h6>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex w-100 h-100 align-items-end justify-content-md-end">
                    <h6>© 2020 - Del Infinito. Todos los derechos reservados.</h6>
                </div> 
            <?php } ?>                  
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
