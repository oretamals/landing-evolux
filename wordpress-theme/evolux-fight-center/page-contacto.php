<?php
/**
 * Template Name: EvoLuX - Contacto
 *
 * @package evolux
 */
get_header();
?>
<section class="page-hero page-hero--banner">
        <img class="page-hero-bg" src="<?php echo evx_asset('images/comunidad/evolux-equipo-03.jpg'); ?>" alt="Comunidad EvoluX Fight Center" width="1600" height="1067" decoding="async" fetchpriority="high">
        <span class="page-hero-overlay" aria-hidden="true"></span>
        <div class="section-shell">
          <p class="eyebrow">Contacto</p>
          <h1>Da el primer paso</h1>
          <p>Escr&iacute;benos y agenda tu clase de prueba. Te orientamos seg&uacute;n tu objetivo, nivel y horario disponible.</p>
          <a class="button primary" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20hacer%20una%20consulta" target="_blank" rel="noreferrer">Agendar por WhatsApp</a>
        </div>
      </section>

      <section class="section-shell contact-section contact-section--page" aria-labelledby="contact-form-title">
        <div class="contact-card">
          <p class="eyebrow">Formulario rapido</p>
          <h2 id="contact-form-title">Enviar consulta por WhatsApp</h2>
          <p class="form-intro">Completa lo basico y abriremos WhatsApp con el mensaje listo para enviar.</p>
          <form class="lead-form" data-lead-form>
            <label>
              <span>Nombre completo</span>
              <input name="name" type="text" autocomplete="name" required>
            </label>
            <label>
              <span>Telefono / WhatsApp</span>
              <input name="phone" type="tel" autocomplete="tel" required>
            </label>
            <label>
              <span>Correo electronico</span>
              <input name="email" type="email" autocomplete="email">
            </label>
            <label>
              <span>Que quieres entrenar</span>
              <select name="discipline">
                <option>Kickboxing</option>
                <option>Boxeo</option>
                <option>Grappling</option>
                <option>Wrestling</option>
                <option>MMA</option>
                <option>No estoy seguro/a</option>
              </select>
            </label>
            <label class="full">
              <span>Cuentanos tus objetivos</span>
              <textarea name="goals" rows="4" placeholder="Ej: quiero mejorar condicion fisica, aprender boxeo o preparar una competencia."></textarea>
            </label>
            <button class="button primary" type="submit">Enviar por WhatsApp</button>
          </form>
        </div>

        <aside class="visit-card contact-aside">
          <p class="eyebrow">Canales</p>
          <h2>Hablemos</h2>
          <div class="visit-lines">
            <div class="visit-row">
              <span class="visit-icon"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.5 14.4c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.77-.72 2.02-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35z"/></svg></span>
              <div><strong>WhatsApp</strong><a href="https://wa.me/56956289106" target="_blank" rel="noreferrer">+56 9 5628 9106</a></div>
            </div>
            <div class="visit-row">
              <span class="visit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18 15 15 0 0 1 0-18z"/></svg></span>
              <div><strong>Web Club Deportivo</strong><a href="https://latinoscrew.evoluxfc.cl/" target="_blank" rel="noreferrer">latinoscrew.evoluxfc.cl</a></div>
            </div>
            <div class="visit-row">
              <span class="visit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></span>
              <div><strong>Tienda</strong><a href="https://skx.evoluxfc.cl/" target="_blank" rel="noreferrer">skx.evoluxfc.cl</a></div>
            </div>
          </div>
          <div class="social-links">
            <a class="social-link" href="https://www.instagram.com/evolux_fightcenter/" target="_blank" rel="noreferrer" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.9" fill="currentColor" stroke="none"/></svg></a>
            <a class="social-link" href="https://www.tiktok.com/@evoluxfightcenter" target="_blank" rel="noreferrer" aria-label="TikTok"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.6 5.8a4.3 4.3 0 0 1-1-2.8h-3.1v11.9a2.3 2.3 0 1 1-1.6-2.2V9.5a5.4 5.4 0 1 0 4.7 5.4V8.9a7 7 0 0 0 4 1.3V7a4.2 4.2 0 0 1-2-1.2z"/></svg></a>
            <a class="social-link" href="https://www.facebook.com/share/1CtwgqxWbV/" target="_blank" rel="noreferrer" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.3l.4-2.9h-2.7V8.3c0-.8.3-1.4 1.5-1.4h1.3V4.3c-.6-.1-1.4-.2-2.3-.2-2.3 0-3.8 1.4-3.8 3.9v2.1H7.7V13h2.2v8z"/></svg></a>
          </div>
          <div class="map-placeholder" role="img" aria-label="Mapa referencial pendiente de reemplazo por ubicacion exacta">
            <span>Ubicacion</span>
            <small>Agregar direccion exacta en WordPress</small>
          </div>
        </aside>
      </section>
<?php
get_footer();
