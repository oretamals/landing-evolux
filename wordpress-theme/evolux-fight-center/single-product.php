<?php
/**
 * Ficha de producto de WooCommerce.
 *
 * Existe para que los productos NO hereden el single.php del blog
 * (que mostraba "Blog EvoLuX", la fecha, el autor y "Volver al blog").
 * Renderiza el contenido estandar de WooCommerce dentro del contenedor
 * del sitio (el wrapper .section-shell lo agrega functions.php).
 *
 * @package evolux
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * woocommerce_before_main_content  -> abre el contenedor .section-shell
 * (enganchado en functions.php)
 */
do_action( 'woocommerce_before_main_content' );

while ( have_posts() ) :
	the_post();
	wc_get_template_part( 'content', 'single-product' );
endwhile;

/**
 * woocommerce_after_main_content -> cierra el contenedor
 */
do_action( 'woocommerce_after_main_content' );

get_footer();
