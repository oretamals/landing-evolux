<?php
/**
 * Entrada individual del blog.
 *
 * @package evolux
 */

get_header();
?>
<section class="page-hero section-shell page-hero--compact">
	<?php
	$cats = get_the_category();
	if ( ! empty( $cats ) ) :
		?>
		<p class="eyebrow"><?php echo esc_html( $cats[0]->name ); ?></p>
	<?php else : ?>
		<p class="eyebrow">Blog EvoLuX</p>
	<?php endif; ?>
	<h1><?php the_title(); ?></h1>
	<p><?php echo esc_html( get_the_date() ); ?><?php echo get_the_author() ? ' &middot; ' . esc_html( get_the_author() ) : ''; ?></p>
</section>

<article class="section-shell content-section">
	<?php
	while ( have_posts() ) :
		the_post();

		if ( has_post_thumbnail() ) :
			echo '<div class="evx-post-content">';
			the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) );
			echo '</div>';
		endif;
		?>
		<div class="evx-post-content">
			<?php the_content(); ?>
		</div>
		<?php
		wp_link_pages(
			array(
				'before' => '<nav class="evx-pagination">',
				'after'  => '</nav>',
			)
		);
	endwhile;
	?>

	<div class="centered action-strip">
		<a class="button primary" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">&larr; Volver al blog</a>
	</div>
</article>
<?php
get_footer();
