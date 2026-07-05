# AGENTS.md — Reglas de desarrollo para EvoluX Fight Center

## 1. Propósito de este archivo

Este documento define las reglas obligatorias que deben seguir Codex, Claude Code y cualquier desarrollador que trabaje en el proyecto web de **EvoluX Fight Center**.

El objetivo es mantener un código:

- Limpio.
- Modular.
- Seguro.
- Fácil de entender.
- Fácil de mantener.
- Compatible con WordPress.
- Preparado para crecer sin convertirse en un código gigante.
- Independiente de una sola persona o herramienta de IA.

Estas reglas se aplican a todo cambio realizado dentro del proyecto.

---

# 2. Contexto del proyecto

## 2.1 Sitio

- Marca: EvoluX Fight Center.
- Tipo de proyecto: sitio web corporativo y comercial.
- CMS final: WordPress.
- Hosting: HostGator.
- Desarrollo: Visual Studio Code.
- Asistentes de programación: Codex y Claude Code.
- Tecnologías principales:
  - HTML.
  - CSS.
  - JavaScript.
  - PHP.
  - WordPress.
- Tema base: Astra.
- Editor: Gutenberg.
- Bloques complementarios: Spectra.

## 2.2 Flujo general

El código se diseña y prueba en VS Code, pero debe construirse desde el inicio pensando en su integración correcta con WordPress.

No se debe crear una página estática gigantesca para después pegarla completa dentro de WordPress.

Flujo esperado:

```text
VS Code
→ desarrollo local
→ control de versiones
→ staging
→ pruebas
→ respaldo
→ producción
```

---

# 3. Principios obligatorios

Todo cambio debe cumplir los siguientes principios:

1. Una responsabilidad por archivo.
2. Una responsabilidad por función.
3. Reutilizar antes de duplicar.
4. Separar estructura, estilos, interacción y lógica.
5. No modificar WordPress Core.
6. No modificar directamente Astra.
7. No introducir dependencias innecesarias.
8. No exponer secretos en frontend.
9. No subir cambios directamente a producción.
10. Mantener compatibilidad con WordPress.
11. Priorizar accesibilidad.
12. Priorizar seguridad por defecto.
13. Eliminar código muerto.
14. Documentar decisiones no evidentes.
15. Mantener el código entendible para otro programador.

---

# 4. Límites de edición

## 4.1 Está permitido modificar

- Child theme de EvoluX.
- Plugins propios del proyecto.
- Archivos de componentes.
- Templates personalizados.
- CSS personalizado.
- JavaScript personalizado.
- Configuración de linting.
- Documentación.
- Pruebas.
- Scripts de desarrollo.

## 4.2 No está permitido modificar

- WordPress Core.
- Archivos internos de Astra.
- Archivos internos de Spectra.
- Plugins de terceros.
- Archivos del servidor sin documentar el cambio.
- `wp-config.php` sin autorización.
- Base de datos directamente desde scripts improvisados.
- Producción sin respaldo previo.
- Credenciales, tokens o claves dentro del repositorio.

## 4.3 Regla ante dudas

Si una modificación puede resolverse en el child theme o en un plugin propio, no se debe tocar código de terceros.

---

# 5. Arquitectura recomendada

```text
evolux-child/
├── style.css
├── functions.php
├── screenshot.png
├── assets/
│   ├── css/
│   │   ├── tokens.css
│   │   ├── base.css
│   │   ├── layout.css
│   │   ├── utilities.css
│   │   ├── components/
│   │   │   ├── buttons.css
│   │   │   ├── cards.css
│   │   │   ├── forms.css
│   │   │   ├── modal.css
│   │   │   └── navigation.css
│   │   └── pages/
│   │       ├── home.css
│   │       ├── disciplinas.css
│   │       ├── horarios.css
│   │       ├── planes.css
│   │       └── contacto.css
│   ├── js/
│   │   ├── main.js
│   │   ├── modules/
│   │   │   ├── navigation.js
│   │   │   ├── modal.js
│   │   │   ├── accordion.js
│   │   │   ├── schedule-filter.js
│   │   │   └── forms.js
│   │   ├── utils/
│   │   │   ├── dom.js
│   │   │   ├── validation.js
│   │   │   └── accessibility.js
│   │   └── config/
│   │       └── selectors.js
│   ├── images/
│   ├── icons/
│   └── fonts/
├── components/
│   ├── discipline-card.php
│   ├── coach-card.php
│   ├── membership-card.php
│   ├── schedule-table.php
│   ├── testimonial-card.php
│   └── call-to-action.php
├── template-parts/
│   ├── header/
│   ├── footer/
│   ├── sections/
│   └── forms/
├── page-templates/
│   ├── template-home.php
│   ├── template-planes.php
│   ├── template-horarios.php
│   └── template-disciplinas.php
├── inc/
│   ├── enqueue.php
│   ├── setup.php
│   ├── security.php
│   ├── helpers.php
│   └── customizer.php
├── tests/
├── docs/
└── README.md
```

No es obligatorio crear todos estos archivos desde el inicio. Se deben crear solamente cuando exista una responsabilidad clara.

---

# 6. Separación de responsabilidades

## HTML

Responsable de:

- Estructura.
- Semántica.
- Contenido.
- Jerarquía.
- Accesibilidad básica.

No debe incluir:

- Estilos inline.
- JavaScript inline.
- Lógica de negocio.
- Secretos.
- Consultas directas a base de datos.

## CSS

Responsable de:

- Presentación visual.
- Layout.
- Responsive.
- Estados visuales.
- Animaciones.
- Variables de diseño.

No debe utilizarse para:

- Ocultar errores de estructura.
- Resolver lógica.
- Reemplazar validaciones.
- Corregir conflictos con uso indiscriminado de `!important`.

## JavaScript

Responsable de:

- Interacciones.
- Estados dinámicos.
- Validación de experiencia de usuario.
- Comportamientos de componentes.
- Consumo de endpoints autorizados.

No debe contener:

- Credenciales.
- Contraseñas.
- Tokens privados.
- Lógica crítica de autorización.
- Validaciones de seguridad como único control.
- Datos sensibles.

## PHP

Responsable de:

- Integración con WordPress.
- Renderizado del servidor.
- Hooks.
- Filtros.
- Validación.
- Sanitización.
- Escape.
- Autorización.
- Nonces.
- Acceso seguro a datos.

---

# 7. Reglas para archivos

## 7.1 Tamaño de referencia

Estos límites no son absolutos, pero obligan a revisar la arquitectura:

| Tipo de archivo | Revisar si supera |
|---|---:|
| JavaScript | 300 líneas |
| CSS de componente | 350 líneas |
| CSS de página | 500 líneas |
| Template PHP | 300 líneas |
| Función JavaScript | 40 líneas |
| Función PHP | 40 líneas |
| Componente PHP | 200 líneas |

Si un archivo supera el límite:

1. Revisar si contiene más de una responsabilidad.
2. Extraer componentes.
3. Extraer utilidades.
4. Eliminar duplicación.
5. Eliminar código muerto.
6. Reducir condicionales anidados.

## 7.2 Un archivo no debe convertirse en contenedor universal

Evitar archivos como:

```text
main.js
custom.css
functions.php
helpers.php
utils.js
```

con miles de líneas y responsabilidades mezcladas.

Estos archivos pueden existir, pero deben actuar como puntos de entrada o agrupación, no como depósitos de código.

---

# 8. Reglas para nombres

## 8.1 Nombres descriptivos

Evitar:

```js
const x = {};
const el = document.querySelector('.box');

function run() {}
function processData() {}
function doThing() {}
```

Preferir:

```js
const membershipForm = document.querySelector('[data-membership-form]');
const selectedDiscipline = getSelectedDiscipline();

function openMobileNavigation() {}
function validateContactForm() {}
function filterScheduleByDiscipline() {}
```

## 8.2 Convenciones

JavaScript:

```text
camelCase
```

PHP:

```text
snake_case
```

Clases CSS:

```text
kebab-case
```

Constantes:

```text
UPPER_SNAKE_CASE
```

Archivos:

```text
kebab-case.ext
```

---

# 9. Reglas para HTML

## 9.1 HTML semántico

Usar cuando corresponda:

```html
<header>
<nav>
<main>
<section>
<article>
<aside>
<footer>
```

Evitar construir toda la página únicamente con `<div>`.

## 9.2 Jerarquía de títulos

- Un `h1` principal por página.
- `h2` para secciones principales.
- `h3` para subsecciones o componentes.
- No saltar niveles sin razón.
- No elegir títulos solo por tamaño visual.

## 9.3 Botones y enlaces

Usar `<button>` para acciones:

```html
<button type="button">Abrir menú</button>
```

Usar `<a>` para navegación:

```html
<a href="/planes/">Ver planes</a>
```

No utilizar:

```html
<div onclick="openMenu()">Menú</div>
```

## 9.4 Atributos para JavaScript

Separar estilo y comportamiento:

```html
<button
  class="button button--primary"
  data-modal-trigger="membership-modal"
>
  Ver plan
</button>
```

- La clase controla la apariencia.
- `data-*` controla el comportamiento.

## 9.5 Accesibilidad mínima

Todo componente debe considerar:

- Navegación por teclado.
- Foco visible.
- `alt` correcto en imágenes.
- Labels en formularios.
- Contraste suficiente.
- `aria-expanded` en componentes desplegables.
- `aria-controls` cuando corresponda.
- Mensajes de error claros.
- Reducción de movimiento.
- Lectores de pantalla.

Ejemplo:

```html
<button
  type="button"
  aria-expanded="false"
  aria-controls="mobile-navigation"
  data-mobile-menu-button
>
  <span class="screen-reader-text">Abrir menú principal</span>
</button>
```

---

# 10. Reglas para CSS

## 10.1 Variables globales

Todos los valores repetidos deben centralizarse:

```css
:root {
  --color-primary: #00a86b;
  --color-primary-dark: #087f56;
  --color-background: #0b0b0b;
  --color-surface: #171717;
  --color-text: #ffffff;
  --color-text-muted: #b7b7b7;
  --color-border: #2b2b2b;

  --font-family-heading: "Poppins", sans-serif;
  --font-family-body: "Inter", sans-serif;

  --spacing-xs: 0.5rem;
  --spacing-sm: 0.75rem;
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;
  --spacing-xl: 2rem;

  --radius-sm: 6px;
  --radius-md: 12px;
  --radius-lg: 20px;

  --container-width: 1200px;
}
```

No repetir colores, radios o espaciados sin justificación.

## 10.2 Convención BEM simplificada

```css
.membership-card {}
.membership-card__header {}
.membership-card__price {}
.membership-card__features {}
.membership-card--featured {}
```

Formato:

```text
block__element--modifier
```

## 10.3 Selectores

Evitar:

```css
body .site .main-content .section .container .card h3 span {}
```

Preferir:

```css
.membership-card__title {}
```

## 10.4 `!important`

No utilizar `!important` salvo que:

1. Exista un conflicto documentado con una dependencia externa.
2. No sea posible resolverlo mediante arquitectura.
3. Se incluya un comentario explicando el motivo.

## 10.5 Mobile-first

Los estilos deben comenzar por móvil:

```css
.schedule-grid {
  display: grid;
  grid-template-columns: 1fr;
}

@media (min-width: 768px) {
  .schedule-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
```

No diseñar primero escritorio para después intentar corregir móvil.

## 10.6 Evitar duplicación

Antes de crear un nuevo estilo:

1. Buscar si ya existe un componente.
2. Buscar si puede reutilizarse una utilidad.
3. Buscar si existe una variable.
4. Crear una variante antes de copiar el componente completo.

---

# 11. Reglas para JavaScript

## 11.1 JavaScript modular

Cada módulo debe exportar una función de inicialización:

```js
export function initMobileNavigation() {
  const menuButton = document.querySelector('[data-mobile-menu-button]');
  const navigation = document.querySelector('[data-mobile-navigation]');

  if (!menuButton || !navigation) {
    return;
  }

  menuButton.addEventListener('click', () => {
    const isOpen = menuButton.getAttribute('aria-expanded') === 'true';

    menuButton.setAttribute('aria-expanded', String(!isOpen));
    navigation.hidden = isOpen;
  });
}
```

Punto de entrada:

```js
import { initMobileNavigation } from './modules/navigation.js';
import { initModals } from './modules/modal.js';
import { initForms } from './modules/forms.js';

document.addEventListener('DOMContentLoaded', () => {
  initMobileNavigation();
  initModals();
  initForms();
});
```

## 11.2 Validación de elementos

No asumir que un elemento existe:

```js
const scheduleFilter = document.querySelector('[data-schedule-filter]');

if (!scheduleFilter) {
  return;
}
```

## 11.3 No usar JavaScript inline

Evitar:

```html
<button onclick="openModal()">Abrir</button>
```

## 11.4 No mezclar responsabilidades

Una función no debe:

- Leer el DOM.
- Validar datos.
- Transformar datos.
- Enviar una petición.
- Mostrar mensajes.
- Cerrar un modal.

Todo al mismo tiempo.

Separar:

```js
function getFormData() {}
function validateFormData() {}
function submitFormData() {}
function renderFormErrors() {}
function renderSuccessMessage() {}
```

## 11.5 Manejo de errores

Toda operación asíncrona debe manejar errores:

```js
async function submitContactForm(payload) {
  try {
    const response = await fetch('/wp-json/evolux/v1/contact', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(payload),
    });

    if (!response.ok) {
      throw new Error(`Request failed with status ${response.status}`);
    }

    return await response.json();
  } catch (error) {
    console.error('Contact form submission failed', error);
    throw error;
  }
}
```

No mostrar al usuario detalles internos del error.

## 11.6 No guardar secretos

Nunca incluir:

```js
const API_KEY = 'secret';
const DATABASE_PASSWORD = 'password';
const PRIVATE_TOKEN = 'token';
```

Todo lo enviado al navegador es público.

---

# 12. Reglas para PHP y WordPress

## 12.1 Protección directa

Todo archivo PHP ejecutable debe comenzar con:

```php
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
```

## 12.2 Carga de recursos

No insertar manualmente `<link>` o `<script>` dentro de templates.

Usar:

```php
wp_enqueue_style();
wp_enqueue_script();
```

Ejemplo:

```php
function evolux_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'evolux-base',
		get_stylesheet_directory_uri() . '/assets/css/base.css',
		array(),
		$theme_version
	);

	wp_enqueue_script(
		'evolux-main',
		get_stylesheet_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);
}

add_action( 'wp_enqueue_scripts', 'evolux_enqueue_assets' );
```

## 12.3 Carga condicional

No cargar recursos en todas las páginas si solo se utilizan en una:

```php
if ( is_page( 'horarios' ) ) {
	wp_enqueue_script(
		'evolux-schedule',
		get_stylesheet_directory_uri() . '/assets/js/modules/schedule-filter.js',
		array(),
		'1.0.0',
		true
	);
}
```

## 12.4 Prefijos

Toda función, constante, clase, hook o identificador propio debe utilizar el prefijo:

```text
evolux_
```

Ejemplo:

```php
function evolux_register_menus() {}
```

## 12.5 Templates reutilizables

No duplicar tarjetas ni secciones.

Usar:

```php
get_template_part(
	'components/membership-card',
	null,
	array(
		'name'  => $plan_name,
		'price' => $plan_price,
	)
);
```

---

# 13. Seguridad obligatoria

## 13.1 Regla central

Toda entrada debe:

1. Validarse.
2. Sanitizarse.
3. Autorizarse.
4. Procesarse.
5. Escaparse al imprimir.

## 13.2 Sanitización

```php
$name = isset( $_POST['name'] )
	? sanitize_text_field( wp_unslash( $_POST['name'] ) )
	: '';

$email = isset( $_POST['email'] )
	? sanitize_email( wp_unslash( $_POST['email'] ) )
	: '';

$message = isset( $_POST['message'] )
	? sanitize_textarea_field( wp_unslash( $_POST['message'] ) )
	: '';
```

## 13.3 Validación

```php
if ( ! is_email( $email ) ) {
	return new WP_Error(
		'invalid_email',
		'El correo electrónico no es válido.'
	);
}
```

## 13.4 Escape

Usar según contexto:

```php
esc_html()
esc_attr()
esc_url()
wp_kses_post()
```

Ejemplo:

```php
<h2><?php echo esc_html( $title ); ?></h2>
```

## 13.5 Nonces

Toda acción que cambie datos debe usar nonce:

```php
wp_nonce_field( 'evolux_contact_action', 'evolux_contact_nonce' );
```

Validación:

```php
if (
	! isset( $_POST['evolux_contact_nonce'] ) ||
	! wp_verify_nonce(
		sanitize_text_field(
			wp_unslash( $_POST['evolux_contact_nonce'] )
		),
		'evolux_contact_action'
	)
) {
	wp_die( 'Solicitud no válida.' );
}
```

## 13.6 Capacidades

Ocultar un botón no protege una acción.

Toda acción sensible debe verificar permisos:

```php
if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( 'No tienes permisos para realizar esta acción.' );
}
```

## 13.7 Consultas SQL

Nunca concatenar datos en consultas:

```php
$query = "SELECT * FROM wp_members WHERE email = '$email'";
```

Usar APIs de WordPress o consultas preparadas:

```php
$query = $wpdb->prepare(
	"SELECT * FROM {$wpdb->prefix}members WHERE email = %s",
	$email
);
```

## 13.8 Formularios públicos

Todo formulario público debe considerar:

- Validación cliente.
- Validación servidor.
- Nonce.
- Honeypot.
- Rate limiting.
- Protección antispam.
- Mensajes de error genéricos.
- Registro mínimo de datos.
- Consentimiento cuando corresponda.

## 13.9 Archivos subidos

No permitir archivos salvo necesidad real.

Si se habilita:

- Limitar tamaño.
- Limitar extensión.
- Verificar MIME.
- Renombrar.
- Bloquear archivos ejecutables.
- No confiar en el nombre.
- Utilizar APIs de WordPress.

## 13.10 Credenciales

No incluir credenciales en:

- JavaScript.
- CSS.
- HTML.
- Repositorio.
- Comentarios.
- README.
- Issues.
- Commits.

Usar variables de entorno o configuración del servidor.

---

# 14. Dependencias

Antes de agregar una librería o plugin, responder:

1. ¿Existe una solución nativa?
2. ¿La funcionalidad ya está disponible?
3. ¿La dependencia sigue mantenida?
4. ¿Es compatible con WordPress?
5. ¿Agrega riesgos de seguridad?
6. ¿Agrega peso innecesario?
7. ¿Puede reemplazarse con código pequeño?
8. ¿Quién será responsable de mantenerla?

No agregar dependencias por conveniencia.

Toda dependencia nueva debe documentarse en `README.md`.

---

# 15. Reglas para agentes de IA

Codex y Claude Code deben seguir este procedimiento antes de modificar código.

## 15.1 Antes de editar

1. Leer este archivo completo.
2. Revisar la estructura existente.
3. Buscar componentes reutilizables.
4. Buscar funciones equivalentes.
5. Revisar dependencias.
6. Identificar los archivos afectados.
7. Evitar cambios fuera del alcance.
8. Revisar riesgos de seguridad.
9. No asumir que un archivo debe reescribirse completo.
10. Preservar convenciones existentes si son correctas.

## 15.2 Durante la edición

1. Hacer el cambio mínimo necesario.
2. No duplicar código.
3. Mantener funciones pequeñas.
4. Separar responsabilidades.
5. No introducir deuda técnica sin señalarla.
6. No renombrar archivos sin necesidad.
7. No cambiar diseño ajeno al requerimiento.
8. No agregar nuevas funciones no solicitadas.
9. No modificar plugins o temas de terceros.
10. Mantener compatibilidad responsive.
11. Mantener accesibilidad.
12. Mantener seguridad.

## 15.3 Después de editar

1. Revisar errores de sintaxis.
2. Ejecutar linting.
3. Revisar consola del navegador.
4. Revisar errores PHP.
5. Probar móvil.
6. Probar escritorio.
7. Probar teclado.
8. Probar formularios.
9. Revisar duplicación.
10. Revisar código muerto.
11. Revisar cambios no intencionales.
12. Documentar cambios.
13. Informar riesgos pendientes.

## 15.4 Prohibiciones para agentes

No:

- Reescribir todo el proyecto para resolver un problema pequeño.
- Crear versiones paralelas del mismo componente.
- Duplicar archivos con sufijos como `new`, `final`, `fixed`, `v2`.
- Agregar `!important` para ocultar un problema sin investigar.
- Desactivar validaciones.
- Desactivar seguridad.
- Ignorar errores.
- Insertar credenciales.
- Cambiar configuraciones de producción.
- Eliminar código sin revisar referencias.
- Inventar endpoints.
- Inventar variables de entorno.
- Inventar funciones de WordPress.
- Declarar una tarea terminada sin validarla.

---

# 16. Refactorización

Refactorizar solo cuando:

- Existe duplicación.
- Un archivo tiene responsabilidades múltiples.
- Una función es difícil de entender.
- El cambio actual aumenta complejidad.
- Existe código muerto.
- Existe riesgo de seguridad.
- El componente se reutilizará.

No hacer refactorizaciones masivas dentro de una tarea pequeña sin justificarlo.

Toda refactorización debe preservar comportamiento.

---

# 17. Código muerto

Antes de eliminar código:

1. Buscar referencias.
2. Revisar templates.
3. Revisar hooks.
4. Revisar JavaScript dinámico.
5. Revisar clases CSS generadas.
6. Revisar bloques Gutenberg.
7. Revisar dependencias externas.
8. Revisar producción o staging.

No eliminar una clase CSS solo porque no aparece en el HTML estático.

Puede ser generada por:

- WordPress.
- Gutenberg.
- Spectra.
- JavaScript.
- PHP.
- Plugins.
- Shortcodes.

---

# 18. Comentarios

No comentar lo obvio.

Evitar:

```js
// Abrir el menú
openMenu();
```

Comentar:

- Decisiones arquitectónicas.
- Restricciones técnicas.
- Compatibilidad.
- Motivos de una excepción.
- Soluciones temporales.
- Riesgos.
- Dependencias externas.

Ejemplo:

```js
// Se conserva este retraso porque Astra recalcula la altura
// del encabezado después de aplicar su clase de navegación móvil.
```

---

# 19. Git

## 19.1 Ramas

```text
main
develop
feature/*
fix/*
refactor/*
security/*
```

No trabajar directamente en `main`.

## 19.2 Commits

Formato recomendado:

```text
feat: agrega sección de disciplinas
fix: corrige navegación móvil
refactor: separa lógica del filtro de horarios
security: sanitiza formulario de contacto
docs: actualiza reglas del proyecto
```

Cada commit debe representar un cambio coherente.

## 19.3 No subir

- Contraseñas.
- Tokens.
- `wp-config.php`.
- Backups.
- Dumps de base de datos.
- Archivos temporales.
- Logs de producción.
- Credenciales FTP.
- Claves privadas.
- Archivos de sistema.

---

# 20. Staging y producción

## 20.1 Nunca probar directamente en producción

Todo cambio debe pasar por:

1. Desarrollo local.
2. Revisión.
3. Staging.
4. Pruebas.
5. Respaldo.
6. Producción.

## 20.2 Pruebas mínimas

Antes de publicar:

- Chrome.
- Firefox.
- Safari cuando sea posible.
- Android.
- iPhone.
- Escritorio.
- Tablet.
- Menú.
- Formularios.
- Enlaces.
- Botones.
- Modales.
- Filtros.
- Accesibilidad.
- Rendimiento.
- Consola.
- Errores PHP.
- Caché.
- Compatibilidad con Astra.
- Compatibilidad con Gutenberg.
- Compatibilidad con Spectra.

## 20.3 Respaldo

Antes de publicar:

- Base de datos.
- Child theme.
- Plugins propios.
- Medios relevantes.
- Configuración necesaria.

---

# 21. Rendimiento

## 21.1 Obligatorio

- Optimizar imágenes.
- Usar formatos modernos.
- Definir dimensiones de imágenes.
- Usar lazy loading cuando corresponda.
- Evitar librerías pesadas.
- Cargar scripts solo donde se usan.
- Evitar CSS duplicado.
- Evitar JavaScript duplicado.
- Evitar animaciones innecesarias.
- Evitar múltiples constructores visuales.

## 21.2 No optimizar prematuramente

No minificar ni combinar archivos manualmente durante desarrollo si dificulta depuración.

La optimización final debe realizarse en build, plugin de caché o infraestructura.

---

# 22. SEO técnico mínimo

Todo template debe permitir:

- Un `h1` correcto.
- Títulos jerárquicos.
- Meta title.
- Meta description.
- URLs limpias.
- Canonical.
- Open Graph.
- Datos estructurados cuando correspondan.
- Imágenes con `alt`.
- Enlaces internos.
- Rendimiento adecuado.
- Contenido indexable.
- No duplicar contenido.

No hardcodear metadatos que deberían administrarse desde WordPress.

---

# 23. Definition of Done

Una tarea solo se considera terminada cuando:

- Cumple el requerimiento.
- No agrega funciones no solicitadas.
- No rompe otras páginas.
- No contiene errores de sintaxis.
- No genera errores en consola.
- No genera warnings PHP.
- Funciona en móvil.
- Funciona en escritorio.
- Es accesible por teclado.
- No duplica código.
- No incluye código muerto.
- No expone secretos.
- Valida y sanitiza entradas.
- Escapa salidas.
- Verifica permisos.
- Usa nonces cuando corresponde.
- Está documentada.
- Puede ser entendida por otro programador.

---

# 24. Formato de respuesta esperado de Codex y Claude Code

Después de realizar una tarea, el agente debe informar:

## Cambios realizados

- Archivos modificados.
- Componentes creados.
- Funciones agregadas.
- Código eliminado.

## Decisiones técnicas

- Motivo de la solución.
- Componentes reutilizados.
- Dependencias utilizadas.
- Compatibilidad considerada.

## Validaciones realizadas

- Linting.
- Sintaxis.
- Responsive.
- Accesibilidad.
- Seguridad.
- Consola.
- PHP.

## Riesgos o pendientes

- Limitaciones.
- Pruebas no ejecutadas.
- Dependencias externas.
- Riesgos detectados.
- Deuda técnica existente.

No afirmar que algo fue probado si no se ejecutó la prueba.

---

# 25. Instrucción final

Antes de crear, modificar, eliminar o refactorizar código:

1. Leer este archivo.
2. Respetar la arquitectura existente.
3. Buscar reutilización.
4. Aplicar seguridad.
5. Hacer el cambio mínimo necesario.
6. Validar.
7. Documentar.

La prioridad es que la web de EvoluX sea mantenible, segura, escalable y comprensible para cualquier desarrollador que continúe el proyecto.
