<?php
/**
 * Cabecera del sitio.
 *
 * @package evolux
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="site-header" data-header>
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="EvoLuX Fight Center">
			<img class="brand-logo" src="<?php echo evx_asset( 'images/brand/evolux-logo.png' ); ?>" alt="EvoLuX Fight Center" width="800" height="400" decoding="async">
		</a>

		<button class="menu-toggle" type="button" aria-label="Abrir menu" aria-controls="main-navigation" aria-expanded="false" data-menu-toggle>
			<span></span><span></span><span></span>
		</button>

		<nav class="main-nav" id="main-navigation" aria-label="Navegacion principal" data-nav>
			<a class="<?php echo esc_attr( trim( evx_active( 'inicio' ) ) ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
			<a class="<?php echo esc_attr( trim( evx_active( 'sobre-evolux' ) ) ); ?>" href="<?php echo esc_url( home_url( '/sobre-evolux/' ) ); ?>">Sobre Evolux</a>
			<a class="<?php echo esc_attr( trim( evx_active( 'planes' ) ) ); ?>" href="<?php echo esc_url( home_url( '/planes/' ) ); ?>">Planes</a>
			<a href="https://latinoscrew.evoluxfc.cl/" target="_blank" rel="noreferrer">Club Deportivo</a>
			<a href="https://skx.evoluxfc.cl/" target="_blank" rel="noreferrer">Tienda</a>
			<a class="<?php echo esc_attr( trim( evx_active( 'blog' ) ) ); ?>" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
			<a class="<?php echo esc_attr( trim( evx_active( 'contacto' ) ) ); ?>" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contacto</a>
		</nav>

		<div class="header-actions">
			<div class="header-social">
				<a class="social-link" href="https://www.instagram.com/evolux_fightcenter/" target="_blank" rel="noreferrer" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.9" fill="currentColor" stroke="none"/></svg></a>
				<a class="social-link" href="https://www.tiktok.com/@evoluxfightcenter" target="_blank" rel="noreferrer" aria-label="TikTok"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.6 5.8a4.3 4.3 0 0 1-1-2.8h-3.1v11.9a2.3 2.3 0 1 1-1.6-2.2V9.5a5.4 5.4 0 1 0 4.7 5.4V8.9a7 7 0 0 0 4 1.3V7a4.2 4.2 0 0 1-2-1.2z"/></svg></a>
				<a class="social-link" href="https://www.facebook.com/share/1CtwgqxWbV/" target="_blank" rel="noreferrer" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.3l.4-2.9h-2.7V8.3c0-.8.3-1.4 1.5-1.4h1.3V4.3c-.6-.1-1.4-.2-2.3-.2-2.3 0-3.8 1.4-3.8 3.9v2.1H7.7V13h2.2v8z"/></svg></a>
			</div>
			<a class="header-cta" href="https://wa.me/<?php echo esc_attr( evx_whatsapp() ); ?>?text=Hola%20EvoluX%2C%20quiero%20hacer%20una%20consulta" target="_blank" rel="noreferrer">Cont&aacute;ctanos</a>
		</div>
	</header>

	<main>
