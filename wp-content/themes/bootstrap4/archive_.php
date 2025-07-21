<?php 
/**
 * Custom Taxonomies
 */
get_header('white'); ?>
<div class="main-wrapper position-relative">
    <?php if (is_tax('anios_muestras_tax')) { ?>    
        <div class="modulos-internas-wrapper">	
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
    <?php } ?>
    <?php if (is_tax('anios_ferias_tax')) { ?>    
        <div class="modulos-internas-wrapper">	
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
    <?php } ?>  
    <?php if (is_tax('anios_novedades_tax')) { ?>    
        <div class="modulos-internas-wrapper">	
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
    <?php } ?>      
</div>
<?php get_footer('newsletter'); ?>