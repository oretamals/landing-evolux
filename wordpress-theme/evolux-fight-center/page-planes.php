<?php
/**
 * Template Name: EvoLuX - Planes
 *
 * @package evolux
 */
get_header();
?>
<aside class="promo-banner" data-promo-banner>
        <strong>Promo de temporada</strong>
        <span>Espacio reservado para tu campa&ntilde;a o descuento vigente.</span>
        <a href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20aprovechar%20la%20promoci%C3%B3n" target="_blank" rel="noreferrer">Quiero aprovecharla</a>
        <button class="promo-close" type="button" aria-label="Cerrar promoci&oacute;n" data-promo-close>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
      </aside>

      <section class="page-hero page-hero--banner">
        <img class="page-hero-bg" src="<?php echo evx_asset('images/hero/evolux-boxeo-banner-01.webp'); ?>" alt="Entrenamiento de boxeo en EvoLuX Fight Center" width="1600" height="1067" decoding="async" fetchpriority="high">
        <span class="page-hero-overlay" aria-hidden="true"></span>
        <div class="section-shell">
          <p class="eyebrow">Planes</p>
          <h1>Arma tu <span>plan</span></h1>
          <p>Grupales, personalizadas o una combinaci&oacute;n de ambas. Elige el formato que mejor se adapta a tu nivel, tu ritmo y tus objetivos.</p>
          <a class="button primary" href="#arma-tu-plan">Arma tu plan a medida</a>
        </div>
      </section>

            <section class="section-shell modalities-nav">
        <div class="section-heading centered">
          <p class="eyebrow">Modalidades de entrenamiento</p>
          <h2>Elige tu modalidad</h2>
        </div>
        <div class="modality-links">
          <a class="modality-link" href="#planes-grupales">
            <span class="modality-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
            <span class="modality-text"><strong>Grupales</strong><span>Entrena en comunidad</span></span>
            <span class="modality-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg></span>
          </a>
          <a class="modality-link" href="#personalizadas">
            <span class="modality-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
            <span class="modality-text"><strong>Personalizadas</strong><span>Atenci&oacute;n 1:1</span></span>
            <span class="modality-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg></span>
          </a>
          <a class="modality-link" href="#arma-tu-plan">
            <span class="modality-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>
            <span class="modality-text"><strong>A tu medida</strong><span>Combina y arma tu plan</span></span>
            <span class="modality-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg></span>
          </a>
        </div>
      </section>

      <section class="section-shell planes-block" id="planes-grupales">
        <div class="section-heading centered">
          <p class="eyebrow">Planes grupales mensuales</p>
          <h2>Elige tu frecuencia</h2>
        </div>
                <div class="plan-slider plan-slider--4">
          <article class="price-card">
            <span class="price-card__badge">Plan S</span>
            <h3>Plan S</h3>
            <p class="price-card__freq">1 vez por semana</p>
            <p class="price-card__price">$30.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Elige una disciplina.</li><li>Elige un horario.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'plan-s' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20Plan%20S%20grupal" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
          <article class="price-card price-card--featured">
            <span class="price-card__tag">Popular</span>
            <span class="price-card__badge">Plan M</span>
            <h3>Plan M</h3>
            <p class="price-card__freq">2 veces por semana</p>
            <p class="price-card__price">$45.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Elige una disciplina.</li><li>Elige dos horarios.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'plan-m' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20Plan%20M%20grupal" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
          <article class="price-card">
            <span class="price-card__badge">Plan L</span>
            <h3>Plan L</h3>
            <p class="price-card__freq">3 veces por semana</p>
            <p class="price-card__price">$60.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Elige una disciplina.</li><li>Elige tres horarios.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'plan-l' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20Plan%20L%20grupal" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
          <article class="price-card price-card--featured">
            <span class="price-card__badge">Plan XL</span>
            <h3>Plan XL</h3>
            <p class="price-card__freq">Full Premium &middot; ilimitado</p>
            <p class="price-card__price">$79.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Acceso a todas las clases.</li><li>Todas las disciplinas.</li><li>Todos los horarios.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'plan-xl' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20Plan%20XL%20Full%20Premium" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
        </div>
        <article class="mma-card">
          <div class="mma-card__info">
            <span class="price-card__badge">Plan MMA</span>
            <h3>Plan MMA</h3>
            <p class="price-card__freq">6 sesiones por semana</p>
            <p class="price-card__price">$69.000 <small>/ mes</small></p>
          </div>
          <ul class="clean-list mma-card__features"><li>2 horarios de suelo (Wrestling o Grappling).</li><li>2 horarios de striking (Boxeo o Kickboxing).</li><li>2 horarios de MMA.</li></ul>
          <div class="mma-card__cta plan-cta">
            <?php $b = evx_plan_url( 'plan-mma' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
            <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20Plan%20MMA" target="_blank" rel="noreferrer">Consultar</a>
          </div>
        </article>
      </section>

      <section class="section-shell planes-block" id="personalizadas">
        <div class="section-heading centered">
          <p class="eyebrow">Clases personalizadas</p>
          <h2>Entrenamiento individual</h2>
        </div>
        <div class="price-grid">
          <article class="price-card">
            <span class="price-card__badge">Individual S</span>
            <h3>Individual S</h3>
            <p class="price-card__freq">4 clases al mes</p>
            <p class="price-card__price">$75.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Sesiones 1:1.</li><li>Plan seg&uacute;n tu objetivo.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'individual-s' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20plan%20Individual%20S" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
          <article class="price-card price-card--featured">
            <span class="price-card__badge">Individual M</span>
            <h3>Individual M</h3>
            <p class="price-card__freq">8 clases al mes</p>
            <p class="price-card__price">$139.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Sesiones 1:1.</li><li>Seguimiento t&eacute;cnico continuo.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'individual-m' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20plan%20Individual%20M" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
          <article class="price-card">
            <span class="price-card__badge">Individual L</span>
            <h3>Individual L</h3>
            <p class="price-card__freq">12 clases al mes</p>
            <p class="price-card__price">$179.000 <small>/ mes</small></p>
            <ul class="clean-list"><li>Sesiones 1:1.</li><li>M&aacute;xima progresi&oacute;n mensual.</li></ul>
            <div class="plan-cta">
              <?php $b = evx_plan_url( 'individual-l' ); if ( $b ) : ?><a class="button primary" href="<?php echo $b; ?>">Inscribirme y pagar</a><?php endif; ?>
              <a class="button ghost" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20el%20plan%20Individual%20L" target="_blank" rel="noreferrer">Consultar</a>
            </div>
          </article>
        </div>
      </section>

      <section class="section-shell planes-block" id="arma-tu-plan">
        <div class="section-heading centered">
          <p class="eyebrow">Arma tu plan a medida</p>
          <h2>Dise&ntilde;a tu entrenamiento</h2>
        </div>
        <div class="builder-card">
          <form class="plan-builder" data-plan-form>
            <p class="builder-intro">Selecciona las disciplinas y modalidades que te interesan. Te ayudamos a armar el plan ideal y te enviamos la propuesta.</p>
            <div class="builder-groups">
              <fieldset class="builder-group">
                <legend>Clases grupales</legend>
                <label class="check-option"><input type="checkbox" name="grupal" value="Boxeo"> Boxeo</label>
                <label class="check-option"><input type="checkbox" name="grupal" value="Kickboxing"> Kickboxing</label>
                <label class="check-option"><input type="checkbox" name="grupal" value="Grappling"> Grappling</label>
                <label class="check-option"><input type="checkbox" name="grupal" value="Wrestling"> Wrestling</label>
                <label class="check-option"><input type="checkbox" name="grupal" value="MMA"> MMA</label>
              </fieldset>
              <fieldset class="builder-group">
                <legend>Clases personalizadas</legend>
                <label class="check-option"><input type="checkbox" name="personalizada" value="Individual S (4/mes)"> Individual S &middot; 4 clases al mes</label>
                <label class="check-option"><input type="checkbox" name="personalizada" value="Individual M (8/mes)"> Individual M &middot; 8 clases al mes</label>
                <label class="check-option"><input type="checkbox" name="personalizada" value="Individual L (12/mes)"> Individual L &middot; 12 clases al mes</label>
              </fieldset>
            </div>
            <div class="builder-fields">
              <label><span>Nombre completo</span><input name="name" type="text" autocomplete="name" required></label>
              <label><span>Tel&eacute;fono / Correo</span><input name="contact" type="text" autocomplete="tel" required></label>
              <label class="full"><span>Comentarios (opcional)</span><textarea name="notes" rows="3"></textarea></label>
            </div>
            <div class="builder-actions">
              <button class="button primary" type="submit" data-channel="whatsapp">
                <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.5 14.4c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.77-.72 2.02-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35zM12 2a10 10 0 0 0-8.6 15.1L2 22l4.99-1.31A10 10 0 1 0 12 2z"/></svg>
                Enviar por WhatsApp
              </button>
              <button class="button ghost" type="submit" data-channel="email">Enviar por correo</button>
            </div>
          </form>
        </div>
      </section>
      
      <section class="section-shell schedule-section" id="horarios">
        <div class="section-heading centered"><p class="eyebrow">Calendario semanal</p><h2>Horarios</h2></div>
        <div class="week-grid">
          <article class="day-card">
            <h3 class="day-name">Lunes</h3>
            <ul class="day-slots">
              <li><time>07:00 - 08:00</time><span>Boxeo</span></li>
              <li><time>11:00 - 12:00</time><span>Grappling</span></li>
              <li><time>13:00 - 14:00</time><span>Kickboxing enfocado en MMA</span></li>
              <li><time>17:00 - 18:00</time><span>Wrestling</span></li>
              <li><time>18:00 - 19:00</time><span>MMA</span></li>
              <li><time>20:00 - 21:00</time><span>Boxeo</span></li>
            </ul>
          </article>
          <article class="day-card">
            <h3 class="day-name">Martes</h3>
            <ul class="day-slots">
              <li><time>13:00 - 14:00</time><span>Kickboxing</span></li>
              <li><time>17:30 - 19:00</time><span>Boxeo juvenil</span></li>
              <li><time>18:00 - 19:00</time><span>Kickboxing</span></li>
              <li><time>19:00 - 20:00</time><span>Boxeo</span></li>
            </ul>
          </article>
          <article class="day-card">
            <h3 class="day-name">Mi&eacute;rcoles</h3>
            <ul class="day-slots">
              <li><time>07:00 - 08:00</time><span>Boxeo</span></li>
              <li><time>11:00 - 12:00</time><span>Grappling</span></li>
              <li><time>13:00 - 14:00</time><span>Kickboxing enfocado en MMA</span></li>
              <li><time>17:00 - 18:00</time><span>Wrestling</span></li>
              <li><time>18:00 - 19:00</time><span>MMA</span></li>
              <li><time>20:00 - 21:00</time><span>Boxeo</span></li>
            </ul>
          </article>
          <article class="day-card">
            <h3 class="day-name">Jueves</h3>
            <ul class="day-slots">
              <li><time>13:00 - 14:00</time><span>Kickboxing</span></li>
              <li><time>17:30 - 19:00</time><span>Boxeo juvenil</span></li>
              <li><time>18:00 - 19:00</time><span>Kickboxing</span></li>
              <li><time>19:00 - 20:00</time><span>Boxeo</span></li>
            </ul>
          </article>
          <article class="day-card">
            <h3 class="day-name">Viernes</h3>
            <ul class="day-slots">
              <li><time>07:00 - 08:00</time><span>Boxeo</span></li>
              <li><time>11:00 - 12:00</time><span>Grappling</span></li>
              <li><time>13:00 - 14:00</time><span>Kickboxing enfocado en MMA</span></li>
              <li><time>17:00 - 18:00</time><span>Wrestling</span></li>
              <li><time>18:00 - 19:00</time><span>MMA</span></li>
              <li><time>20:00 - 21:00</time><span>Boxeo</span></li>
            </ul>
          </article>
          <article class="day-card day-card--rest">
            <h3 class="day-name">S&aacute;bado</h3>
            <p class="day-rest">Sin clases programadas</p>
          </article>
          <article class="day-card day-card--rest">
            <h3 class="day-name">Domingo</h3>
            <p class="day-rest">Descanso</p>
          </article>
        </div>
      </section>


      <section class="section-shell">
        <div class="cta-band">
          <p class="eyebrow">&iquest;Listo para empezar?</p>
          <h2>Da el primer paso hoy</h2>
          <p>Escr&iacute;benos y te ayudamos a elegir el plan perfecto para tu nivel y tus metas.</p>
          <a class="button primary" href="https://wa.me/56956289106?text=Hola%20EvoluX%2C%20quiero%20entrenar%20con%20ustedes" target="_blank" rel="noreferrer">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.5 14.4c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.77-.72 2.02-1.42.25-.7.25-1.29.17-1.42-.07-.13-.27-.2-.57-.35zM12 2a10 10 0 0 0-8.6 15.1L2 22l4.99-1.31A10 10 0 1 0 12 2z"/></svg>
            Escr&iacute;benos por WhatsApp
          </a>
        </div>
      </section>
<?php
get_footer();
