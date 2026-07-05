<?php
/**
 * Pagina 404.
 *
 * @package evolux
 */

get_header();
?>
<section class="page-hero section-shell page-hero--compact">
	<p class="eyebrow">Error 404</p>
	<h1>Pagina no encontrada</h1>
	<p>La pagina que buscas no existe o cambio de direccion. Vuelve al inicio o escribenos por WhatsApp.</p>
	<div class="hero-actions">
		<a class="button primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Ir al inicio</a>
		<a class="button ghost" href="https://wa.me/<?php echo esc_attr( evx_whatsapp() ); ?>" target="_blank" rel="noreferrer">Escribir por WhatsApp</a>
	</div>
</section>
<?php
get_footer();
