<?php
/**
 * Pagina generica (para paginas sin plantilla especifica).
 *
 * @package evolux
 */

get_header();
?>
<section class="page-hero section-shell page-hero--compact">
	<p class="eyebrow">EvoLuX Fight Center</p>
	<h1><?php the_title(); ?></h1>
</section>

<article class="section-shell content-section">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<div class="evx-post-content">
			<?php the_content(); ?>
		</div>
		<?php
	endwhile;
	?>
</article>
<?php
get_footer();
