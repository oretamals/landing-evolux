	</main>

	<footer class="site-footer">
		<div class="footer-top">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="brand-logo" src="<?php echo evx_asset( 'images/brand/evolux-logo.png' ); ?>" alt="EvoLuX Fight Center" width="800" height="400" decoding="async"></a>
			<div class="footer-pay">
				<span>Medios de pago</span>
				<img src="<?php echo evx_asset( 'images/medios-pago/mercadopago.webp' ); ?>" alt="MercadoPago" width="453" height="129" decoding="async" loading="lazy">
			</div>
		</div>
		<small class="footer-copy">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> EvoLuX Fight Center. Todos los derechos reservados.</small>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
