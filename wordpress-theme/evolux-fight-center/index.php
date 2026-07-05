<?php
/**
 * Plantilla de respaldo (requerida por WordPress).
 * Se usa para el listado de entradas cuando no aplica otra plantilla.
 *
 * @package evolux
 */

get_header();
?>
<section class="page-hero section-shell page-hero--compact">
	<p class="eyebrow">Blog EvoLuX</p>
	<h1><?php echo esc_html( is_archive() ? get_the_archive_title() : 'Blog' ); ?></h1>
</section>

<section class="section-shell content-section">
	<?php if ( have_posts() ) : ?>
		<div class="editorial-grid">
			<?php
			$is_first = true;
			while ( have_posts() ) :
				the_post();
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

		<nav class="evx-pagination" aria-label="Paginacion">
			<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
		</nav>
	<?php else : ?>
		<p class="section-heading centered">No hay contenido disponible por ahora.</p>
	<?php endif; ?>
</section>
<?php
get_footer();
