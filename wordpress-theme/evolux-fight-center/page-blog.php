<?php
/**
 * Template Name: EvoLuX - Blog
 *
 * Listado de entradas del blog con el estilo editorial de EvoLuX.
 * Si aun no hay entradas publicadas, muestra tarjetas de ejemplo.
 *
 * @package evolux
 */

get_header();
?>
<section class="page-hero section-shell page-hero--compact">
	<p class="eyebrow">Blog EvoLuX</p>
	<h1><?php echo esc_html( get_the_title() ? get_the_title() : 'Contenido para entrenar mejor' ); ?></h1>
	<p>Guias, noticias del club, preparacion fisica, tecnica y respuestas claras para quienes estan empezando o quieren competir.</p>
	<a class="button primary" href="https://wa.me/<?php echo esc_attr( evx_whatsapp() ); ?>?text=Hola%20EvoluX%2C%20quiero%20resolver%20una%20duda%20sobre%20entrenamiento" target="_blank" rel="noreferrer">Preguntar por WhatsApp</a>
</section>

<section class="section-shell content-section" aria-labelledby="blog-title">
	<div class="section-heading centered">
		<p class="eyebrow">Publicaciones</p>
		<h2 id="blog-title">Dudas reales, respuestas utiles</h2>
	</div>

	<?php
	$blog_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => 12,
			'paged'          => max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) ),
		)
	);
	?>

	<?php if ( $blog_query->have_posts() ) : ?>
		<div class="editorial-grid">
			<?php
			$is_first = true;
			while ( $blog_query->have_posts() ) :
				$blog_query->the_post();
				$cats  = get_the_category();
				$badge = ! empty( $cats ) ? $cats[0]->name : 'EvoLuX';
				$class = $is_first ? 'editorial-card editorial-card--featured' : 'editorial-card';
				?>
				<article class="<?php echo esc_attr( $class ); ?>">
					<span class="content-badge"><?php echo esc_html( $badge ); ?></span>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
					<a href="<?php the_permalink(); ?>">Leer articulo</a>
				</article>
				<?php
				$is_first = false;
			endwhile;
			?>
		</div>

		<nav class="evx-pagination" aria-label="Paginacion del blog">
			<?php
			echo paginate_links(
				array(
					'total'   => $blog_query->max_num_pages,
					'current' => max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) ),
				)
			);
			?>
		</nav>
		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p class="section-heading centered">Aun no hay entradas publicadas. Crea tu primera entrada desde <strong>Entradas &rarr; Anadir nueva</strong> en el panel de WordPress.</p>
		<div class="editorial-grid">
			<article class="editorial-card editorial-card--featured">
				<span class="content-badge">Guia inicial</span>
				<h3>Que saber antes de tu primera clase de combate</h3>
				<p>Articulo pensado para principiantes: equipamiento, intensidad, seguridad y como elegir disciplina.</p>
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Agendar orientacion</a>
			</article>
			<article class="editorial-card">
				<span class="content-badge">Club</span>
				<h3>Competidores y logros EvoLuX</h3>
				<p>Espacio para registrar veladas, podios, procesos competitivos y representantes del club deportivo.</p>
			</article>
			<article class="editorial-card">
				<span class="content-badge">Entrenamiento</span>
				<h3>Boxeo, Kickboxing y MMA: diferencias principales</h3>
				<p>Contenido SEO/AEO para resolver busquedas frecuentes y guiar a nuevos alumnos.</p>
			</article>
			<article class="editorial-card">
				<span class="content-badge">Horarios</span>
				<h3>Como combinar clases grupales y personalizadas</h3>
				<p>Entrada comercial para explicar rutas de entrenamiento sin friccion y llevar al contacto.</p>
			</article>
		</div>
	<?php endif; ?>
</section>
<?php
get_footer();
