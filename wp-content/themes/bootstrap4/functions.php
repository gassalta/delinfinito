<?php
/* /////////////////////////////////////////////////////////////////////////////////////// */
// CSS & JS ROOTS
/* /////////////////////////////////////////////////////////////////////////////////////// */

function custom_scripts_styles() {
  // nos aseguramos que no estamos en el area de administracion
    // registramos nuestro script con el nombre "mi-script" y decimos que es dependiente de jQuery para que wordpress se asegure de incluir jQuery antes de este archivo
    // en adicion a las dependencias podemos indicar que este aarchivo debe ser insertado en el footer del sitio, en el lugar donde se encuente la funcion wp_footer
    wp_register_style('bootstrap_css', get_bloginfo('template_directory'). '/inc/bootstrap/bootstrap.min.css');
    wp_register_style('style_css', get_bloginfo('template_directory'). '/style.css');
	wp_register_style('aos_css', get_bloginfo('template_directory'). '/inc/aos/aos.css'); 

	wp_register_script('bootstrap_js', get_bloginfo('template_directory'). '/inc/bootstrap/bootstrap.min.js', array('jquery'), '', true );
	wp_register_script('blazy_js', get_bloginfo('template_directory'). '/inc/js/blazy.min.js', array('jquery'), '', true );
	wp_register_script('aos_js', get_bloginfo('template_directory'). '/inc/aos/aos.min.js', array('jquery'), '', true );

	if(is_page('inicio') || (is_page('home')) || (is_page('nosotros') || (is_page('gallery')) ) ) {
		wp_register_style('rs_1_css', get_bloginfo('template_directory'). '/inc/sliders/revolution/css/settings.css');
		wp_register_style('rs_2_css', get_bloginfo('template_directory'). '/inc/sliders/revolution/css/layers.css');
		wp_register_style('rs_3_css', get_bloginfo('template_directory'). '/inc/sliders/revolution/css/navigation.css');
		wp_register_script('rs_1_js', get_bloginfo('template_directory'). '/inc/sliders/revolution/js/jquery.themepunch.tools.min.js', array('jquery'), '', true );
		wp_register_script('rs_2_js', get_bloginfo('template_directory'). '/inc/sliders/revolution/js/jquery.themepunch.revolution.min.js', array('jquery'), '', true );
		wp_register_script('rs_ext_1_js', get_bloginfo('template_directory'). '/inc/sliders/revolution/js/extensions/revolution.extension.kenburn.min.js', array('jquery'), '', true );
		wp_enqueue_style('rs_1_css');
		wp_enqueue_style('rs_2_css');
		wp_enqueue_style('rs_3_css');
		wp_enqueue_script('rs_1_js');
		wp_enqueue_script('rs_2_js');
		wp_enqueue_script('rs_ext_1_js');
	}

	if(is_attachment() || (is_singular('muestras_cpt') || (is_singular('ferias_cpt')) || (is_singular('novedades_cpt'))) ) {
		wp_register_style('photoswipe_css', get_bloginfo('template_directory'). '/inc/photoswipe/photoswipe.css'); 
		wp_register_style('photoswipe_skin_css', get_bloginfo('template_directory'). '/inc/photoswipe/default-skin.css'); 
		wp_register_script('photoswipe_js', get_bloginfo('template_directory'). '/inc/photoswipe/photoswipe.min.js', array('jquery'), true );
		wp_register_script('photoswipe_default_js', get_bloginfo('template_directory'). '/inc/photoswipe/photoswipe-ui-default.min.js', array('jquery'), true );

		wp_enqueue_style('photoswipe_css');
		wp_enqueue_style('photoswipe_skin_css');
		wp_enqueue_script('photoswipe_js');
		wp_enqueue_script('photoswipe_default_js');
	}	
	
	if(is_page('nosotros') || (is_page('gallery')) ) {
		wp_register_script('gmaps_api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBdOVfi-2lCYqe9VDUxB6tESrpQMINfqgE', array('jquery'), '1', true );
		wp_enqueue_script('gmaps_api');
	}
	wp_register_style('flickity_css', get_bloginfo('template_directory'). '/inc/sliders/flickity/flickity.min.css');
	wp_register_script('flickity_js', get_bloginfo('template_directory'). '/inc/sliders/flickity/flickity.pkgd.min.js', array('jquery'), '', true );
	wp_register_script('img_loaded_js', get_bloginfo('template_directory'). '/inc/js/imagesloaded.pkgd.min.js', array('jquery'), '', true );
	wp_register_script('masonry_js', get_bloginfo('template_directory'). '/inc/js/masonry.pkgd.min.js', array('jquery'), '', true );
	wp_register_script('script_site', get_bloginfo('template_directory'). '/inc/js/script-site.js', array('jquery'), '', true );

    wp_enqueue_style('bootstrap_css');
    wp_enqueue_style('style_css');
	wp_enqueue_style('flickity_css');
	wp_enqueue_style('aos_css');

	wp_enqueue_script('bootstrap_js');
	wp_enqueue_script('blazy_js');
	wp_enqueue_script('flickity_js');
	wp_enqueue_script('img_loaded_js');
	wp_enqueue_script('masonry_js');
	wp_enqueue_script('aos_js');
    wp_enqueue_script('script_site');
}
add_action('wp_enqueue_scripts', 'custom_scripts_styles');

function hide_attachments_fields(){
    ?>
    <style type="text/css">
        /* .attachment-details [data-setting="title"], */
        .attachment-details [data-setting="caption"],
        /* .attachment-details [data-setting="alt"], */
        .attachment-details [data-setting="description"],
        div.attachment-display-settings,
		.wp_attachment_details.edit-form-section
        {
            display:none
        }
    </style>
    <?php
}

add_action('admin_head-post.php', 'hide_attachments_fields' );
add_action('admin_head-post-new.php', 'hide_attachments_fields' );

/* /////////////////////////////////////////////////////////////////////////////////////// */
// REGISTER MENUS 

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
	  array(
		'main_menu' => 'Main Menu',
		'resp_menu' => 'Responsive Menu'
	  )
	);
}

function wp_get_attachment_image_no_srcset($attachment_id, $size = 'thumbnail', $icon = false, $attr = '') {
	// add a filter to return null for srcset
	add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
	// get the srcset-less img html
	$html = wp_get_attachment_image($attachment_id, $size, $icon, $attr);
	// remove the above filter
	remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
	return $html;
  }
add_action( 'after_setup_theme','wp_get_attachment_image_no_srcset' );
  

/* /////////////////////////////////////////////////////////////////////////////////////// */
// BORRA IMAGEN SIN EDITAR 

function replace_uploaded_image($image_data) {
	// if there is no large image : return
	if (!isset($image_data['sizes']['large'])) return $image_data;
	// paths to the uploaded image and the large image
	$upload_dir = wp_upload_dir();
	$uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
	$large_image_filename = $image_data['sizes']['large']['file'];
	// Do what wordpress does in image_downsize() ... just replace the filenames ;)
	$image_basename = wp_basename($uploaded_image_location);
	$large_image_location = str_replace($image_basename, $large_image_filename, $uploaded_image_location);
	// delete the uploaded image
	unlink($uploaded_image_location);
	// rename the large image
	rename($large_image_location, $uploaded_image_location);
	// update image metadata and return them
	$image_data['width'] = $image_data['sizes']['large']['width'];
	$image_data['height'] = $image_data['sizes']['large']['height'];
	unset($image_data['sizes']['large']);
	// Check if other size-configurations link to the large-file
	foreach($image_data['sizes'] as $size => $sizeData) {
		if ($sizeData['file'] === $large_image_filename)
			unset($image_data['sizes'][$size]);
	}
	return $image_data;
}
add_filter('wp_generate_attachment_metadata', 'replace_uploaded_image');	


/* /////////////////////////////////////////////////////////////////////////////////////// */
// API GOOGLE MAPS

// Method 1: Filter.
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyBdOVfi-2lCYqe9VDUxB6tESrpQMINfqgE';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// // Method 2: Setting.
// function my_acf_init() {
// 	acf_update_setting('google_api_key', 'xxx');
// }
// add_action('acf/init', 'my_acf_init');

/* /////////////////////////////////////////////////////////////////////////////////////// */
// SETTINGS ROW-OFFSET

add_filter('acf/settings/row_index_offset', '__return_zero');

/* /////////////////////////////////////////////////////////////////////////////////////// */
// WYSIWYG toolbars Custom 

function my_toolbars( $toolbars )
{
	// Uncomment to view format of $toolbars
	/*
	echo '< pre >';
		print_r($toolbars);
	echo '< /pre >';
	die;
	*/

	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline', 'link', 'removeformat' );

	// Edit the "Full" toolbar and remove 'code'
	// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
	if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

	// remove the 'Basic' toolbar completely
	unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );


/* /////////////////////////////////////////////////////////////////////////////////////// */
// REMOVE DEFAULT IMAGES SIZES

function prefix_remove_default_images( $sizes ) {
	unset( $sizes['small']); // 150px
	unset( $sizes['medium']); // 300px
	//unset( $sizes['large']); // 1024px
	unset( $sizes['medium_large']); // 768px
	unset( $sizes['1536x1536']); // 1536x1536px
	unset( $sizes['2048x2048']); // 2048x2048px
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );

/* /////////////////////////////////////////////////////////////////////////////////////// */
// CUSTOM IMAGES SIZES
	add_theme_support('post-thumbnails');
	add_image_size('large', 2500, 9999, false );
	add_image_size('image-cover', 2500, 1440, true );
	add_image_size('image-cover-medium', 1920, 1080, true );
	add_image_size('image-cover-mobile', 768, 432, true );
	add_image_size('image-slideshow', 9999, 900, false );
	add_image_size('image-slideshow-mobile', 9999, 432, false );
	add_image_size('thumbs-grid', 1440, 760, true );
	add_image_size('thumbs-grid-mob', 768, 405, true );
	add_image_size('image-staff', 200, 200, true );
	add_image_size('thumb-obra-form', 200, 9999, false );
	add_image_size('thumbs-works-grid-medium', 1440, 9999, false );
	add_image_size('thumbs-works-grid-mobile', 768, 9999, false );

/* /////////////////////////////////////////////////////////////////////////////////////// */
// EXCERPT LENGTH

	function my_excerpt_length($length){
		return 200;
	}
	add_filter('excerpt_length', 'my_excerpt_length');

/* /////////////////////////////////////////////////////////////////////////////////////// */
// REGISTERED CUSTOM POST TYPES

function new_custom_post_types() {
	$labels = array(
		'name'                  => _x( 'Slideshow Inicio', 'slideshow_ini_mod' ),
		'singular_name'         => _x( 'Slideshow Inicio', 'slideshow_ini_mod' ),
		'menu_name'             => __( 'Slideshow Inicio', 'slideshow_ini_mod' ),
		'name_admin_bar'        => __( 'Slideshow Inicio', 'slideshow_ini_mod' ),
		'archives'              => __( 'Item Archives', 'slideshow_ini_mod' ),
		'attributes'            => __( 'Item Attributes', 'slideshow_ini_mod' ),
		'parent_item_colon'     => __( 'Parent Item:', 'slideshow_ini_mod' ),
		'all_items'             => __( 'Todos los Slides', 'slideshow_ini_mod' ),
		'add_new_item'          => __( 'Add New Item', 'slideshow_ini_mod' ),
		'add_new'               => __( 'Add New', 'slideshow_ini_mod' ),
		'new_item'              => __( 'New Item', 'slideshow_ini_mod' ),
		'edit_item'             => __( 'Editar Slides', 'slideshow_ini_mod' ),
		'update_item'           => __( 'Actualizar Slideshow', 'slideshow_ini_mod' ),
		'view_item'             => __( 'View Item', 'slideshow_ini_mod' ),
		'view_items'            => __( 'View Items', 'slideshow_ini_mod' ),
		'search_items'          => __( 'Search Item', 'slideshow_ini_mod' ),
		'not_found'             => __( 'Not found', 'slideshow_ini_mod' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'slideshow_ini_mod' ),
		/*'featured_image'        => __( 'Featured Image', 'slideshow_ini_mod' ),
		'set_featured_image'    => __( 'Set featured image', 'slideshow_ini_mod' ),
		'remove_featured_image' => __( 'Remove featured image', 'slideshow_ini_mod' ),
		'use_featured_image'    => __( 'Use as featured image', 'slideshow_ini_mod' ),
		'insert_into_item'      => __( 'Insert into item', 'slideshow_ini_mod' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'slideshow_ini_mod' ),
		'items_list'            => __( 'Items list', 'slideshow_ini_mod' ),
		'items_list_navigation' => __( 'Items list navigation', 'slideshow_ini_mod' ),
		'filter_items_list'     => __( 'Filter items list', 'slideshow_ini_mod' ),*/
	);
	$args = array(
		'label'                 => __( 'Slideshow Inicio', 'slideshow_ini_mod' ),
		'description'           => __( 'Imágenes en el Front de la Single Page', 'slideshow_ini_mod' ),
		'labels'                => $labels,
		'supports'              => array(''),
		//'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		//'show_in_menu' 	  	 	=> 'home',
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		//"rewrite" => array( "slug" => "work", "with_front" => true ),
		"rewrite" => false,
		'capabilities' => array(
			'create_posts' => false,
			'delete_published_posts' => false,
			), 
		'map_meta_cap' => true
	);
	register_post_type( 'slideshow_inicio', $args );	

	$labels = array(
		'name'                  => _x( 'Muestras', 'muestras_mod' ),
		'singular_name'         => _x( 'Muestra', 'muestras_mod' ),
		'menu_name'             => __( 'Muestras', 'muestras_mod' ),
		'name_admin_bar'        => __( 'Muestras', 'muestras_mod' ),
		'archives'              => __( 'Item Archives', 'muestras_mod' ),
		'attributes'            => __( 'Item Attributes', 'muestras_mod' ),
		'parent_item_colon'     => __( 'Parent Item:', 'muestras_mod' ),
		'all_items'             => __( 'Todas las Muestras', 'muestras_mod' ),
		'add_new_item'          => __( 'Agregar nueva Muestra', 'muestras_mod' ),
		'add_new'               => __( 'Agregar nueva', 'muestras_mod' ),
		'new_item'              => __( 'Nueva Muestra', 'muestras_mod' ),
		'edit_item'             => __( 'Editar Muestra', 'muestras_mod' ),
		'update_item'           => __( 'Actualizar Muestra', 'muestras_mod' ),
		'view_item'             => __( 'Ver Muestra', 'muestras_mod' ),
		'view_items'            => __( 'Ver Muestras', 'muestras_mod' ),
		'search_items'          => __( 'Buscar Muestras', 'muestras_mod' ),
		'not_found'             => __( 'No se encontraron', 'muestras_mod' ),
		'not_found_in_trash'    => __( 'No se encontraron Muetras en la Papelera', 'muestras_mod' ),
		/*'featured_image'        => __( 'Featured Image', 'muestras_mod' ),
		'set_featured_image'    => __( 'Set featured image', 'muestras_mod' ),
		'remove_featured_image' => __( 'Remove featured image', 'muestras_mod' ),
		'use_featured_image'    => __( 'Use as featured image', 'muestras_mod' ),
		'insert_into_item'      => __( 'Insert into item', 'muestras_mod' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'muestras_mod' ),
		'items_list'            => __( 'Items list', 'muestras_mod' ),
		'items_list_navigation' => __( 'Items list navigation', 'muestras_mod' ),
		'filter_items_list'     => __( 'Filter items list', 'muestras_mod' ),*/
	);
	$args = array(
		'label'                 => __( 'Muestras', 'muestras_mod' ),
		'description'           => __( '', 'muestras_mod' ),
		'labels'                => $labels,
		'supports'              => array('title'),
		'taxonomies'            => array( 'anios_muestras_tax' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		//'show_in_menu' 	  	 	=> 'home',
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		"rewrite" => array( "slug" => "muestras", "with_front" => true ),
	);
	register_post_type( 'muestras_cpt', $args );
	
	$labels = array(
		'name'                  => _x( 'Artistas', 'artistas_mod' ),
		'singular_name'         => _x( 'Artista', 'artistas_mod' ),
		'menu_name'             => __( 'Artistas', 'artistas_mod' ),
		'name_admin_bar'        => __( 'artistas', 'artistas_mod' ),
		'archives'              => __( 'Item Archives', 'artistas_mod' ),
		'attributes'            => __( 'Item Attributes', 'artistas_mod' ),
		'parent_item_colon'     => __( 'Parent Item:', 'artistas_mod' ),
		'all_items'             => __( 'Todos los Artistas', 'artistas_mod' ),
		'add_new_item'          => __( 'Agregar nuevo Artista', 'artistas_mod' ),
		'add_new'               => __( 'Agregar nuevo', 'artistas_mod' ),
		'new_item'              => __( 'Nueva Artista', 'artistas_mod' ),
		'edit_item'             => __( 'Editar Artista', 'artistas_mod' ),
		'update_item'           => __( 'Actualizar Artista', 'artistas_mod' ),
		'view_item'             => __( 'Ver Artista', 'artistas_mod' ),
		'view_items'            => __( 'Ver artistas', 'artistas_mod' ),
		'search_items'          => __( 'Buscar artistas', 'artistas_mod' ),
		'not_found'             => __( 'No se encontraron', 'artistas_mod' ),
		'not_found_in_trash'    => __( 'No se encontraron artistas en la Papelera', 'artistas_mod' ),
		/*'featured_image'        => __( 'Featured Image', 'artistas_mod' ),
		'set_featured_image'    => __( 'Set featured image', 'artistas_mod' ),
		'remove_featured_image' => __( 'Remove featured image', 'artistas_mod' ),
		'use_featured_image'    => __( 'Use as featured image', 'artistas_mod' ),
		'insert_into_item'      => __( 'Insert into item', 'artistas_mod' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'artistas_mod' ),
		'items_list'            => __( 'Items list', 'artistas_mod' ),
		'items_list_navigation' => __( 'Items list navigation', 'artistas_mod' ),
		'filter_items_list'     => __( 'Filter items list', 'artistas_mod' ),*/
	);
	$args = array(
		'label'                 => __( 'artistas', 'artistas_mod' ),
		'description'           => __( '', 'artistas_mod' ),
		'labels'                => $labels,
		'supports'              => array('title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		//'show_in_menu' 	  	 	=> 'home',
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		"rewrite" => array( "slug" => "artistas", "with_front" => true ),
	);
	register_post_type( 'artistas_cpt', $args );
	
	$labels = array(
		'name'                  => _x( 'Ferias', 'ferias_mod' ),
		'singular_name'         => _x( 'Feria', 'ferias_mod' ),
		'menu_name'             => __( 'Ferias', 'ferias_mod' ),
		'name_admin_bar'        => __( 'Ferias', 'ferias_mod' ),
		'archives'              => __( 'Item Archives', 'ferias_mod' ),
		'attributes'            => __( 'Item Attributes', 'ferias_mod' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ferias_mod' ),
		'all_items'             => __( 'Todas las Ferias', 'ferias_mod' ),
		'add_new_item'          => __( 'Agregar nueva Feria', 'ferias_mod' ),
		'add_new'               => __( 'Agregar nueva', 'ferias_mod' ),
		'new_item'              => __( 'Nueva Feria', 'ferias_mod' ),
		'edit_item'             => __( 'Editar Feria', 'ferias_mod' ),
		'update_item'           => __( 'Actualizar Feria', 'ferias_mod' ),
		'view_item'             => __( 'Ver Feria', 'ferias_mod' ),
		'view_items'            => __( 'Ver Ferias', 'ferias_mod' ),
		'search_items'          => __( 'Buscar Ferias', 'ferias_mod' ),
		'not_found'             => __( 'No se encontraron', 'ferias_mod' ),
		'not_found_in_trash'    => __( 'No se encontraron ferias en la Papelera', 'ferias_mod' ),
		/*'featured_image'        => __( 'Featured Image', 'ferias_mod' ),
		'set_featured_image'    => __( 'Set featured image', 'ferias_mod' ),
		'remove_featured_image' => __( 'Remove featured image', 'ferias_mod' ),
		'use_featured_image'    => __( 'Use as featured image', 'ferias_mod' ),
		'insert_into_item'      => __( 'Insert into item', 'ferias_mod' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ferias_mod' ),
		'items_list'            => __( 'Items list', 'ferias_mod' ),
		'items_list_navigation' => __( 'Items list navigation', 'ferias_mod' ),
		'filter_items_list'     => __( 'Filter items list', 'ferias_mod' ),*/
	);
	$args = array(
		'label'                 => __( 'ferias', 'ferias_mod' ),
		'description'           => __( '', 'ferias_mod' ),
		'labels'                => $labels,
		'supports'              => array('title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		//'show_in_menu' 	  	 	=> 'home',
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		"rewrite" => array( "slug" => "ferias", "with_front" => true ),
	);
	register_post_type( 'ferias_cpt', $args );	
	
	$labels = array(
		'name'                  => _x( 'Novedades', 'novedades_mod' ),
		'singular_name'         => _x( 'Novedad', 'novedades_mod' ),
		'menu_name'             => __( 'Novedades', 'novedades_mod' ),
		'name_admin_bar'        => __( 'Novedades', 'novedades_mod' ),
		'archives'              => __( 'Item Archives', 'novedades_mod' ),
		'attributes'            => __( 'Item Attributes', 'novedades_mod' ),
		'parent_item_colon'     => __( 'Parent Item:', 'novedades_mod' ),
		'all_items'             => __( 'Todas las Novedades', 'novedades_mod' ),
		'add_new_item'          => __( 'Agregar nueva Novedad', 'novedades_mod' ),
		'add_new'               => __( 'Agregar nueva', 'novedades_mod' ),
		'new_item'              => __( 'Nueva Novedad', 'novedades_mod' ),
		'edit_item'             => __( 'Editar Novedad', 'novedades_mod' ),
		'update_item'           => __( 'Actualizar Novedad', 'novedades_mod' ),
		'view_item'             => __( 'Ver Novedad', 'novedades_mod' ),
		'view_items'            => __( 'Ver Novedades', 'novedades_mod' ),
		'search_items'          => __( 'Buscar Novedades', 'novedades_mod' ),
		'not_found'             => __( 'No se encontraron', 'novedades_mod' ),
		'not_found_in_trash'    => __( 'No se encontraron novedades en la Papelera', 'novedades_mod' ),
		/*'featured_image'        => __( 'Featured Image', 'novedades_mod' ),
		'set_featured_image'    => __( 'Set featured image', 'novedades_mod' ),
		'remove_featured_image' => __( 'Remove featured image', 'novedades_mod' ),
		'use_featured_image'    => __( 'Use as featured image', 'novedades_mod' ),
		'insert_into_item'      => __( 'Insert into item', 'novedades_mod' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'novedades_mod' ),
		'items_list'            => __( 'Items list', 'novedades_mod' ),
		'items_list_navigation' => __( 'Items list navigation', 'novedades_mod' ),
		'filter_items_list'     => __( 'Filter items list', 'novedades_mod' ),*/
	);
	$args = array(
		'label'                 => __( 'Novedades', 'novedades_mod' ),
		'description'           => __( '', 'novedades_mod' ),
		'labels'                => $labels,
		'supports'              => array('title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		//'show_in_menu' 	  	 	=> 'home',
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		"rewrite" => array( "slug" => "novedades", "with_front" => true ),
	);
	register_post_type( 'novedades_cpt', $args );	

	$labels = array(
		'name'                  => _x( 'Nosotros', 'nosotros_mod' ),
		'singular_name'         => _x( 'Nosotros', 'nosotros_mod' ),
		'menu_name'             => __( 'Nosotros', 'nosotros_mod' ),
		'name_admin_bar'        => __( 'Nosotros', 'nosotros_mod' ),
		'archives'              => __( 'Item Archives', 'nosotros_mod' ),
		'attributes'            => __( 'Item Attributes', 'nosotros_mod' ),
		'parent_item_colon'     => __( 'Parent Item:', 'nosotros_mod' ),
		'all_items'             => __( 'Todos los Slides', 'nosotros_mod' ),
		'add_new_item'          => __( 'Add New Posts', 'nosotros_mod' ),
		'add_new'               => __( 'Add New', 'nosotros_mod' ),
		'new_item'              => __( 'New Item', 'nosotros_mod' ),
		'edit_item'             => __( 'Editar Nosotros', 'nosotros_mod' ),
		'update_item'           => __( 'Actualizar Slideshow', 'nosotros_mod' ),
		'view_item'             => __( 'View Item', 'nosotros_mod' ),
		'view_items'            => __( 'View Items', 'nosotros_mod' ),
		'search_items'          => __( 'Search Item', 'nosotros_mod' ),
		'not_found'             => __( 'Not found', 'nosotros_mod' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nosotros_mod' ),
		/*'featured_image'        => __( 'Featured Image', 'nosotros_mod' ),
		'set_featured_image'    => __( 'Set featured image', 'nosotros_mod' ),
		'remove_featured_image' => __( 'Remove featured image', 'nosotros_mod' ),
		'use_featured_image'    => __( 'Use as featured image', 'nosotros_mod' ),
		'insert_into_item'      => __( 'Insert into item', 'nosotros_mod' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'nosotros_mod' ),
		'items_list'            => __( 'Items list', 'nosotros_mod' ),
		'items_list_navigation' => __( 'Items list navigation', 'nosotros_mod' ),
		'filter_items_list'     => __( 'Filter items list', 'nosotros_mod' ),*/
	);
	$args = array(
		'label'                 => __( 'Nosotros', 'nosotros_mod' ),
		'description'           => __( 'Imágenes en el Front de la Single Page', 'nosotros_mod' ),
		'labels'                => $labels,
		'supports'              => array(''),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		//'show_in_menu' 	  	 	=> 'home',
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capabilities' => array(
			'create_posts' => false,
			'delete_published_posts' => false,
			), 
		'map_meta_cap' => true,
		"rewrite" => false
	);
	register_post_type( 'nosotros_cpt', $args );	
}
add_action( 'init', 'new_custom_post_types', 0 );	


/* /////////////////////////////////////////////////////////////////////////////////////// */
// REGISTERED TAXONOMIES

function anios_muestras_taxonomy() {
		$labels = array(
		'name' => _x( 'Muestras Años', 'anios_muestras' ),
		'singular_name' => _x( 'Año', 'anios_muestras' ),
		'search_items' =>  __( 'Buscar Años' ),
		'all_items' => __( 'Todos los Años' ),
		// 'parent_item' => __( 'Parent Topic' ),
		// 'parent_item_colon' => __( 'Parent Topic:' ),
		'edit_item' => __( 'Editar Años' ), 
		'update_item' => __( 'Actualizar Años' ),
		'add_new_item' => __( 'Agregar nuevo Año' ),
		'new_item_name' => __( 'Nuevo Año' ),
		'menu_name' => __( 'Años' )
	);    
	// Now register the taxonomy
	register_taxonomy('anios_muestras_tax', 'muestras_cpt', 
	array(
		'hierarchical' => false,
		'has_archive' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'public' => true,
		'rewrite' => array( 'slug' => 'muestras-years' )
));	 
}
add_action( 'init', 'anios_muestras_taxonomy', 0 );	

function anios_ferias_taxonomy() {
	$labels = array(
	'name' => _x( 'Ferias Años', 'anios_ferias' ),
	'singular_name' => _x( 'Año', 'anios_ferias' ),
	'search_items' =>  __( 'Buscar Años' ),
	'all_items' => __( 'Todos los Años' ),
	// 'parent_item' => __( 'Parent Topic' ),
	// 'parent_item_colon' => __( 'Parent Topic:' ),
	'edit_item' => __( 'Editar Años' ), 
	'update_item' => __( 'Actualizar Años' ),
	'add_new_item' => __( 'Agregar nuevo Año' ),
	'new_item_name' => __( 'Nuevo Año' ),
	'menu_name' => __( 'Años' )
);    
// Now register the taxonomy
register_taxonomy('anios_ferias_tax', array('ferias_cpt'), array(
	'hierarchical' => false,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'ferias-years' )
));	 
}
add_action( 'init', 'anios_ferias_taxonomy', 0 );	

function anios_novedades_taxonomy() {
	$labels = array(
	'name' => _x( 'Años Novedades', 'anios_novedades' ),
	'singular_name' => _x( 'Año', 'anios_novedades' ),
	'search_items' =>  __( 'Buscar Años' ),
	'all_items' => __( 'Todos los Años' ),
	// 'parent_item' => __( 'Parent Topic' ),
	// 'parent_item_colon' => __( 'Parent Topic:' ),
	'edit_item' => __( 'Editar Años' ), 
	'update_item' => __( 'Actualizar Años' ),
	'add_new_item' => __( 'Agregar nuevo Año' ),
	'new_item_name' => __( 'Nuevo Año' ),
	'menu_name' => __( 'Años' )
);    
// Now register the taxonomy
register_taxonomy('anios_novedades_tax', array('novedades_cpt'), array(
	'hierarchical' => false,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'novedades-years' )
));	 
}
add_action( 'init', 'anios_novedades_taxonomy', 0 );

// EDITOR BACKEND

function change_toolbar($wp_toolbar) {
	if( !current_user_can( 'administrator' ) ):
		global $current_user;
		$wp_toolbar->remove_node('wp-logo'); 
		$wp_toolbar->remove_node('comments');
		$wp_toolbar->remove_node('new-content');
	endif;
 } 
 add_action('admin_bar_menu', 'change_toolbar', 999);

function editor_backend() {
if( !current_user_can( 'administrator' ) ):
	remove_menu_page('edit.php');  // Entradas
	remove_menu_page('link-manager.php'); // Enlaces
	remove_menu_page('edit.php?post_type=page'); // Páginas
	remove_menu_page('edit-comments.php'); // Comentarios
	remove_menu_page('profile.php'); // Profile
	remove_menu_page( 'wpcf7' ); // Contact Form 7
	remove_menu_page('tools.php'); // Herramientas
	remove_menu_page('admin.php?page=aioseo&notifications=true#');
	// echo'<style>.notice.elementor-message, #pll-duplicate, .pll-sync-column { display: none!important; }</style>';
	echo'<style>#dashboard-widgets-wrap, #screen-options-link-wrap { display: none!important }</style>';
	endif;
}
add_action( 'admin_head', 'editor_backend');

// CUSTOM MENU ORDER

function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(
		'index.php', // Dashboard
		'separator1', // First separator
    	'edit.php?post_type=slideshow_inicio', // Slideshow Inicio
		'edit.php?post_type=muestras_cpt', // Muestras
		'edit.php?post_type=artistas_cpt', // Artistas
		'edit.php?post_type=ferias_cpt', // Ferias
		'edit.php?post_type=novedades_cpt', // Novedades
      	'edit.php?post_type=nosotros_cpt', // Nosotros
		'edit.php', // Posts
		'upload.php', // Media
		'link-manager.php', // Links
		'separator2', // Second separator
		'themes.php', // Appearance
		'users.php', // Users
		'options-general.php', // Settings
		'separator-last', // Last separator
	);
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

// HIDE UPDATE MESSAGES FOR NON ADMIN USERS

function hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users');

?>