 <?php 
/**
 * Template Name: Muestras Taxonomy
 */
get_header('white'); ?>

<div class="main-wrapper position-relative">
    <div class="modulos-internas-wrapper">	
        <div class="d-none d-md-block">
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
        <select class="select-years-menu-mob dropdown d-block d-md-none" name="menu_ferias" id="menu_ferias">
            <option class="normal" selected="" value="<?php bloginfo('template_url'); ?>/muestras">
                <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
                <?php // Get the taxonomy's terms
                echo $term->name; ?>
            </option>
                <?php $terms = get_terms(
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
	while ( have_posts() ) {
        the_post(); 
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
    <?php } ?>    
    </div>     
</div>
<?php get_footer('newsletter'); ?>