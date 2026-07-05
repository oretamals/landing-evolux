<?php
/**
 * EvoLuX Fight Center - functions del tema
 *
 * @package evolux
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EVX_VERSION', '1.0.0' );

/**
 * Devuelve la URL de un archivo dentro de /assets del tema.
 */
function evx_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

/**
 * Numero de WhatsApp del club (sin +, formato wa.me).
 */
function evx_whatsapp() {
	return '56956289106';
}

/**
 * URL de compra de un plan en WooCommerce a partir de su SKU.
 *
 * Devuelve la ficha del producto si WooCommerce esta activo y existe un
 * producto con ese SKU; si no, devuelve '' para que el boton "Inscribirme
 * y pagar" simplemente no se muestre (queda solo "Consultar" por WhatsApp).
 *
 * SKUs esperados (se definen al crear cada producto en WooCommerce):
 *   plan-s, plan-m, plan-l, plan-xl, plan-mma,
 *   individual-s, individual-m, individual-l
 */
function evx_plan_url( $sku ) {
	if ( ! function_exists( 'wc_get_product_id_by_sku' ) ) {
		return '';
	}
	$id = wc_get_product_id_by_sku( $sku );
	if ( ! $id ) {
		return '';
	}
	return esc_url( get_permalink( $id ) );
}

/* ==========================================================================
   Planes: seleccion de Disciplina + Horario en la ficha del producto.
   Aplica a: plan-s, plan-m, plan-l, individual-s, individual-m, individual-l
   (Plan XL incluye todas las disciplinas y Plan MMA tiene estructura fija).
   ========================================================================== */

/**
 * Mapa Disciplina => horarios disponibles, por DIA especifico (calendario semanal).
 */
function evx_plan_horarios() {
	return array(
		'Boxeo'      => array(
			'Lunes 07:00-08:00',
			'Lunes 20:00-21:00',
			'Martes 17:30-19:00 (juvenil)',
			'Martes 19:00-20:00',
			'Miercoles 07:00-08:00',
			'Miercoles 20:00-21:00',
			'Jueves 17:30-19:00 (juvenil)',
			'Jueves 19:00-20:00',
			'Viernes 07:00-08:00',
			'Viernes 20:00-21:00',
		),
		'Kickboxing' => array(
			'Lunes 13:00-14:00 (enfoque MMA)',
			'Martes 13:00-14:00',
			'Martes 18:00-19:00',
			'Miercoles 13:00-14:00 (enfoque MMA)',
			'Jueves 13:00-14:00',
			'Jueves 18:00-19:00',
			'Viernes 13:00-14:00 (enfoque MMA)',
		),
		'Grappling'  => array(
			'Lunes 11:00-12:00',
			'Miercoles 11:00-12:00',
			'Viernes 11:00-12:00',
		),
		'Wrestling'  => array(
			'Lunes 17:00-18:00',
			'Miercoles 17:00-18:00',
			'Viernes 17:00-18:00',
		),
		'MMA'        => array(
			'Lunes 18:00-19:00',
			'Miercoles 18:00-19:00',
			'Viernes 18:00-19:00',
		),
	);
}

/**
 * Cuantos horarios (dias por semana) elige cada plan grupal.
 * Los planes individuales (1:1) coordinan el horario aparte -> 0.
 */
function evx_plan_slots( $sku ) {
	$map = array(
		'plan-s' => 1,
		'plan-m' => 2,
		'plan-l' => 3,
	);
	return isset( $map[ $sku ] ) ? $map[ $sku ] : 0;
}

/**
 * SKUs de planes que requieren elegir disciplina y horario.
 */
function evx_plan_needs_options( $product ) {
	if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
		return false;
	}
	return in_array(
		$product->get_sku(),
		array( 'plan-s', 'plan-m', 'plan-l', 'individual-s', 'individual-m', 'individual-l' ),
		true
	);
}

/**
 * Campos de Disciplina + Horario(s) en la ficha.
 * Se muestran tantos horarios como veces por semana tenga el plan (Plan S = 1,
 * Plan M = 2, Plan L = 3); cada horario es un dia especifico y se filtra segun
 * la disciplina elegida. Los planes individuales (1:1) solo eligen disciplina.
 */
function evx_plan_option_fields() {
	global $product;
	if ( ! evx_plan_needs_options( $product ) ) {
		return;
	}
	$map   = evx_plan_horarios();
	$slots = evx_plan_slots( $product->get_sku() );
	?>
	<div class="evx-plan-options">
		<div class="evx-field">
			<label for="evx_disciplina">Disciplina</label>
			<select id="evx_disciplina" name="evx_disciplina" required>
				<option value="">Elige una disciplina</option>
				<?php foreach ( array_keys( $map ) as $disc ) : ?>
					<option value="<?php echo esc_attr( $disc ); ?>"><?php echo esc_html( $disc ); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php if ( $slots > 0 ) : ?>
			<?php for ( $i = 1; $i <= $slots; $i++ ) : ?>
				<div class="evx-field">
					<label for="evx_horario_<?php echo esc_attr( $i ); ?>"><?php echo ( $slots > 1 ) ? 'Horario ' . intval( $i ) : 'Horario'; ?></label>
					<select id="evx_horario_<?php echo esc_attr( $i ); ?>" class="evx-horario" name="evx_horario[]" required disabled>
						<option value="">Primero elige la disciplina</option>
					</select>
				</div>
			<?php endfor; ?>
		<?php else : ?>
			<p class="evx-note">El horario de tus clases 1:1 se coordina de forma personalizada por WhatsApp.</p>
		<?php endif; ?>
	</div>
	<?php if ( $slots > 0 ) : ?>
	<script>
	( function () {
		var map = <?php echo wp_json_encode( $map ); ?>;
		var d = document.getElementById( 'evx_disciplina' );
		var hs = Array.prototype.slice.call( document.querySelectorAll( '.evx-horario' ) );
		if ( ! d || ! hs.length ) { return; }
		function refreshDisabled() {
			var chosen = hs.map( function ( h ) { return h.value; } ).filter( Boolean );
			hs.forEach( function ( h ) {
				Array.prototype.forEach.call( h.options, function ( op ) {
					if ( ! op.value ) { return; }
					op.disabled = ( chosen.indexOf( op.value ) !== -1 && op.value !== h.value );
				} );
			} );
		}
		function repop() {
			var opts = map[ d.value ] || [];
			hs.forEach( function ( h ) {
				var cur = h.value;
				h.innerHTML = '';
				if ( ! opts.length ) {
					h.disabled = true;
					h.appendChild( new Option( 'Primero elige la disciplina', '' ) );
					return;
				}
				h.disabled = false;
				h.appendChild( new Option( 'Elige un horario', '' ) );
				opts.forEach( function ( o ) {
					var op = new Option( o, o );
					if ( o === cur ) { op.selected = true; }
					h.appendChild( op );
				} );
			} );
			refreshDisabled();
		}
		d.addEventListener( 'change', repop );
		hs.forEach( function ( h ) { h.addEventListener( 'change', refreshDisabled ); } );
	} )();
	</script>
	<?php endif; ?>
	<?php
}
add_action( 'woocommerce_before_add_to_cart_button', 'evx_plan_option_fields' );

/**
 * Validacion: disciplina y horario son obligatorios en esos planes.
 */
function evx_plan_validate( $passed, $product_id ) {
	$product = wc_get_product( $product_id );
	if ( ! evx_plan_needs_options( $product ) ) {
		return $passed;
	}
	if ( empty( $_POST['evx_disciplina'] ) ) {
		wc_add_notice( 'Elige una disciplina para este plan.', 'error' );
		$passed = false;
	}
	$slots = evx_plan_slots( $product->get_sku() );
	if ( $slots > 0 ) {
		$hor = isset( $_POST['evx_horario'] ) ? (array) wp_unslash( $_POST['evx_horario'] ) : array();
		$hor = array_values( array_filter( array_map( 'sanitize_text_field', $hor ) ) );
		if ( count( $hor ) < $slots ) {
			wc_add_notice( sprintf( 'Elige %d horario(s) para este plan.', $slots ), 'error' );
			$passed = false;
		} elseif ( count( array_unique( $hor ) ) < count( $hor ) ) {
			wc_add_notice( 'Los horarios deben ser en dias u horas diferentes.', 'error' );
			$passed = false;
		}
	}
	return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'evx_plan_validate', 10, 2 );

/**
 * Guarda las elecciones en el item del carrito.
 */
function evx_plan_cart_data( $cart_item_data ) {
	if ( ! empty( $_POST['evx_disciplina'] ) ) {
		$cart_item_data['evx_disciplina'] = sanitize_text_field( wp_unslash( $_POST['evx_disciplina'] ) );
	}
	if ( ! empty( $_POST['evx_horario'] ) ) {
		$hor = array_filter( array_map( 'sanitize_text_field', (array) wp_unslash( $_POST['evx_horario'] ) ) );
		if ( $hor ) {
			$cart_item_data['evx_horario'] = implode( ' | ', $hor );
		}
	}
	return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'evx_plan_cart_data', 10, 1 );

/**
 * Muestra Disciplina/Horario en el carrito y checkout.
 */
function evx_plan_item_data( $item_data, $cart_item ) {
	if ( ! empty( $cart_item['evx_disciplina'] ) ) {
		$item_data[] = array(
			'key'   => 'Disciplina',
			'value' => $cart_item['evx_disciplina'],
		);
	}
	if ( ! empty( $cart_item['evx_horario'] ) ) {
		$item_data[] = array(
			'key'   => 'Horario',
			'value' => $cart_item['evx_horario'],
		);
	}
	return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'evx_plan_item_data', 10, 2 );

/**
 * Guarda Disciplina/Horario en la linea del pedido (admin + emails).
 */
function evx_plan_order_meta( $item, $cart_item_key, $values ) {
	if ( ! empty( $values['evx_disciplina'] ) ) {
		$item->add_meta_data( 'Disciplina', $values['evx_disciplina'], true );
	}
	if ( ! empty( $values['evx_horario'] ) ) {
		$item->add_meta_data( 'Horario', $values['evx_horario'], true );
	}
}
add_action( 'woocommerce_checkout_create_order_line_item', 'evx_plan_order_meta', 10, 3 );

/**
 * Limpieza de la ficha de producto:
 * - Oculta el bloque SKU / categorias / etiquetas (se veia amontonado).
 * - Quita las pestanas "Informacion adicional" y "Valoraciones".
 * (Si mas adelante quieres volver a mostrarlos, se quitan estos hooks.)
 */
function evx_wc_product_tweaks() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}
add_action( 'init', 'evx_wc_product_tweaks' );

function evx_wc_product_tabs( $tabs ) {
	unset( $tabs['additional_information'] );
	unset( $tabs['reviews'] );
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'evx_wc_product_tabs', 98 );

/**
 * Configuracion basica del tema.
 */
function evx_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 400,
			'width'       => 800,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'evolux' ),
		)
	);

	// Soporte de WooCommerce (tienda, ficha, carrito, checkout).
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	load_theme_textdomain( 'evolux', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'evx_setup' );

/**
 * Envuelve las paginas de WooCommerce en el contenedor del sitio (.section-shell)
 * para que respeten el ancho y los margenes del diseno.
 */
function evx_wc_wrapper_start() {
	echo '<div class="section-shell woocommerce-shell">';
}
function evx_wc_wrapper_end() {
	echo '</div>';
}
add_action( 'after_setup_theme', function () {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_before_main_content', 'evx_wc_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'evx_wc_wrapper_end', 10 );
} );

/**
 * Carga de estilos y scripts.
 *
 * Se respeta el mismo orden del prototipo original (styles.css con @imports):
 * tokens -> base -> layout -> componentes -> paginas -> footer -> responsive.
 */
function evx_assets() {
	$uri = get_template_directory_uri();
	$v   = EVX_VERSION;

	wp_enqueue_style( 'evolux-tokens', $uri . '/assets/css/tokens.css', array(), $v );
	wp_enqueue_style( 'evolux-base', $uri . '/assets/css/base.css', array( 'evolux-tokens' ), $v );
	wp_enqueue_style( 'evolux-layout', $uri . '/assets/css/layout.css', array( 'evolux-base' ), $v );
	wp_enqueue_style( 'evolux-nav', $uri . '/assets/css/components/navigation.css', array( 'evolux-layout' ), $v );
	wp_enqueue_style( 'evolux-buttons', $uri . '/assets/css/components/buttons.css', array( 'evolux-nav' ), $v );
	wp_enqueue_style( 'evolux-cards', $uri . '/assets/css/components/cards.css', array( 'evolux-buttons' ), $v );
	wp_enqueue_style( 'evolux-forms', $uri . '/assets/css/components/forms.css', array( 'evolux-cards' ), $v );
	wp_enqueue_style( 'evolux-home', $uri . '/assets/css/pages/home.css', array( 'evolux-forms' ), $v );
	wp_enqueue_style( 'evolux-planes', $uri . '/assets/css/pages/planes.css', array( 'evolux-home' ), $v );
	wp_enqueue_style( 'evolux-content', $uri . '/assets/css/pages/content-pages.css', array( 'evolux-planes' ), $v );
	wp_enqueue_style( 'evolux-footer', $uri . '/assets/css/footer.css', array( 'evolux-content' ), $v );
	wp_enqueue_style( 'evolux-responsive', $uri . '/assets/css/responsive.css', array( 'evolux-footer' ), $v );

	// Estilos de WooCommerce (solo si el plugin esta activo).
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'evolux-woocommerce', $uri . '/assets/css/woocommerce.css', array( 'evolux-responsive' ), $v );
	}

	// style.css raiz (cabecera del tema + ajustes del blog).
	wp_enqueue_style( 'evolux-style', get_stylesheet_uri(), array( 'evolux-responsive' ), $v );

	// JS principal (modulos ES). Se marca type="module" mas abajo.
	wp_enqueue_script( 'evolux-main', $uri . '/assets/js/main.js', array(), $v, true );
}
add_action( 'wp_enqueue_scripts', 'evx_assets' );

/**
 * El bundle principal usa import de modulos ES: hay que servirlo como modulo.
 */
function evx_module_type( $tag, $handle, $src ) {
	if ( 'evolux-main' === $handle ) {
		return '<script type="module" src="' . esc_url( $src ) . '"></script>' . "\n";
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'evx_module_type', 10, 3 );

/**
 * Metadatos SEO por pagina (title, description y OG), fieles al prototipo.
 * Se puede desactivar si luego se instala Yoast/RankMath (ver README del tema).
 */
function evx_seo_meta() {
	if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return; // Un plugin SEO ya se encarga de esto.
	}

	$site = 'EvoLuX Fight Center';
	$desc = 'Entrena en EvoLuX Fight Center. Clases grupales y personalizadas de Boxeo, Kickboxing, Grappling, Wrestling y MMA.';

	if ( is_front_page() ) {
		$desc = 'Entrena en EvoLuX Fight Center. Clases grupales y personalizadas de Boxeo, Kickboxing, Grappling, Wrestling y MMA en Concepcion.';
	} elseif ( is_page( 'planes' ) ) {
		$desc = 'Planes grupales mensuales, clases personalizadas y planes a medida de Boxeo, Kickboxing, Grappling, Wrestling y MMA en EvoLuX Fight Center.';
	} elseif ( is_page( 'sobre-evolux' ) ) {
		$desc = 'Conoce EvoLuX Fight Center: nuestra historia, mision, coaches y staff, competidores del club y lo que dicen nuestros alumnos.';
	} elseif ( is_page( 'contacto' ) ) {
		$desc = 'Contacta a EvoLuX Fight Center por WhatsApp y agenda tu clase de prueba.';
	} elseif ( is_page( 'blog' ) || is_home() || is_archive() ) {
		$desc = 'Consejos, noticias, competidores y contenido educativo de EvoLuX Fight Center.';
	} elseif ( is_singular() ) {
		$desc = wp_strip_all_tags( get_the_excerpt() );
	}

	$title = wp_get_document_title();
	$img   = evx_asset( 'images/og-evolux.jpg' );
	$url   = ( is_front_page() ) ? home_url( '/' ) : get_permalink();

	echo "\n";
	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta name="theme-color" content="#03070c">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( $site ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $img ) . '">' . "\n";
	echo '<meta property="og:image:width" content="1200">' . "\n";
	echo '<meta property="og:image:height" content="630">' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action( 'wp_head', 'evx_seo_meta', 1 );

/**
 * Favicon del tema (por si no se define uno en Ajustes del sitio).
 */
function evx_favicon() {
	if ( has_site_icon() ) {
		return;
	}
	echo '<link rel="icon" type="image/svg+xml" href="' . evx_asset( 'images/brand/favicon.svg' ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" href="' . evx_asset( 'images/brand/favicon.png' ) . '">' . "\n";
}
add_action( 'wp_head', 'evx_favicon', 2 );

/**
 * JSON-LD SportsActivityLocation (datos estructurados del negocio).
 */
function evx_schema() {
	if ( ! is_front_page() ) {
		return;
	}
	?>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "SportsActivityLocation",
		"name": "EvoLuX Fight Center",
		"url": "<?php echo esc_url( home_url( '/' ) ); ?>",
		"telephone": "+56956289106",
		"sport": ["Kickboxing", "Boxeo", "Grappling", "Wrestling", "MMA"],
		"description": "Centro de entrenamiento de deportes de combate con clases grupales y personalizadas en Concepcion."
	}
	</script>
	<?php
}
add_action( 'wp_head', 'evx_schema', 5 );

/**
 * Clase activa del menu principal (para el <nav> hardcodeado en header.php).
 */
function evx_active( $slug ) {
	$active = false;
	if ( 'inicio' === $slug && is_front_page() ) {
		$active = true;
	} elseif ( 'blog' === $slug && ( is_page( 'blog' ) || is_home() || is_singular( 'post' ) || is_archive() ) ) {
		$active = true;
	} elseif ( is_page( $slug ) ) {
		$active = true;
	}
	return $active ? ' is-active' : '';
}
