# Landing / sitio web EvoluX Fight Center

Prototipo local en VS Code para construir la web publica de EvoluX Fight Center antes de migrarla a WordPress.

## Objetivo

Crear un sitio corporativo/comercial con estructura compatible con WordPress, Astra, Gutenberg y Spectra. No debe depender de pegar una pagina gigante en WordPress.

## Abrir en local

Servidor local actual:

```text
http://127.0.0.1:5501/
```

Carpeta local:

```text
D:\04 - Laboral\EvoluX\Pagina Web\landing-evolux
```

## Estructura actual

```text
landing-evolux/
  index.html
  pages/
    sobre-evolux.html
    planes.html
    blog.html
    contacto.html
  styles.css
  assets/
    css/
      tokens.css
      base.css
      layout.css
      footer.css
      responsive.css
      components/
        buttons.css
        cards.css
        forms.css
        navigation.css
      pages/
        home.css
    js/
      main.js
      modules/
        forms.js
        navigation.js
    images/
      brand/          (logo, favicon)
      hero/           (banners)
      disciplinas/    (boxeo, kickboxing, grappling, wrestling, mma)
      clases/         (clases y entrenamiento)
      comunidad/      (equipo, grupo, formacion)
      instalaciones/  (gimnasio)
      galeria/        (fotos varias)
      medios-pago/    (mercadopago)
      reference/      (referencia de diseno, no se sirve)
      _originals/     (respaldo, NO subir a produccion)
      og-evolux.jpg   (imagen Open Graph)
  server.js
```

Las imagenes estan organizadas por categoria y renombradas con criterio SEO (kebab-case, prefijo `evolux-`, disciplina/contexto). Ej: `disciplinas/evolux-boxeo-sparring-01.jpg`, `comunidad/evolux-equipo-01.webp`. Todas optimizadas a max 1600px.

`index.html` queda en la raiz porque es la entrada del prototipo. Las paginas internas viven en `pages/`.

La marca del header y footer usa el logo oficial `assets/images/logos/logo-evolux-sin-fondo.png` (clase `.brand-logo`) en todas las paginas.

`styles.css` funciona como entrada temporal para VS Code mediante `@import`. En WordPress, estos archivos deben encolarse desde `functions.php` del child theme.

## Enlaces externos

- WhatsApp: `https://wa.me/56956289106`
- Club Deportivo: `https://latinoscrew.evoluxfc.cl/`
- Tienda: `https://skx.evoluxfc.cl/`

## Migracion sugerida a WordPress

1. Crear child theme de Astra.
2. Mover `assets/css`, `assets/js` y `assets/images` al child theme.
3. Encolar recursos desde `functions.php` o `inc/enqueue.php`.
4. Convertir `index.html` y `pages/*.html` a templates o paginas Gutenberg/Spectra.
5. Separar secciones reutilizables en `template-parts/sections`.
6. En una segunda etapa, convertir datos variables a ACF o bloques Gutenberg/Spectra:
   - Disciplinas
   - Horarios
   - Coaches
   - Planes
   - Club Deportivo
   - Contacto

## Pagina Sobre EvoluX

`pages/sobre-evolux.html` se reconstruyo con los componentes del sitio e incorpora la informacion real de la pagina en vivo (historia del fundador, mision, vision y valores). Incluye:

- Historia: mas de 10 anios de experiencia, +240 personas entrenadas, Preparador Fisico certificado, certificacion del Comite Olimpico de Chile.
- Mision, vision y valores.
- Nuestro equipo: Coaches (Javier Sepulveda, Sebastian Vega, Nicolas del Rio, Daniel Gutierrez, Ginger Salazar, Genesis Avello) y Staff (Oscar Retamal - Administracion y Gestion; Naomy Silva - Creadora de Contenido / Marketing).
- Competidores: Matias Acuna, Benjamin Silva, Nicolas del Rio, Valentina Troncoso, Diego Torres, Daniel Gutierrez, Genesis Avello, Jose Urzua.
- Testimonios de Google (`.testimonial-grid`) con placeholders a la espera del texto real.
- CTA final a WhatsApp.

Las fotos de personas usan un icono placeholder (no hay retratos reales en `assets/images`).

## Optimizacion (auditoria)

- Imagenes: redimensionadas a max 1600px y recomprimidas (webp q80). El set paso de ~68 MB a ~2,9 MB; el home de ~34 MB a ~1,3 MB. Los originales quedan respaldados en `assets/images/_originals/` (NO subir a produccion; excluir del deploy/git).
- `<img>` con `loading="lazy"`, `width`/`height` (evita saltos de maquetacion) y `fetchpriority="high"` en los banners del hero.
- Favicon (`assets/images/logos/favicon.svg` + `.png`), Open Graph/Twitter (imagen `assets/images/og-evolux.jpg`) y `theme-color` en las 5 paginas.
- CSS muerto eliminado (`achievement-grid`, `team-achievements`, `team-column`, `planes-hero`, `coach-grid article`).
- `@media (prefers-reduced-motion)` para accesibilidad.
- `sharp` se uso solo como herramienta local para procesar imagenes (no es dependencia del sitio).

## Pendientes

- Cargar las resenas reales de Google (texto + autor) en la seccion de testimonios de Sobre EvoluX; hoy son placeholders. Idealmente agregar el enlace al perfil de Google del negocio.
- Volver a generar `og-evolux.jpg` si cambia la imagen principal del hero.
- Reemplazar los iconos placeholder de coaches, staff y competidores por fotos reales.
- Guardar `AGENTS.md` como UTF-8 limpio; actualmente se lee con caracteres mojibakeados.
- Modularizar HTML a PHP/template-parts cuando se cree el child theme.
- Agregar direccion exacta del club.
- Revisar responsive visual en dispositivos reales.
- Revisar consola del navegador.