import { initLeadForm } from "./modules/forms.js";
import { initMobileNavigation } from "./modules/navigation.js";
import { initPlanBuilder } from "./modules/plan-builder.js";
import { initPromoBanner } from "./modules/promo-banner.js";
import { initMobileCardSliders } from "./modules/mobile-card-slider.js";

document.addEventListener("DOMContentLoaded", () => {
  initMobileNavigation();
  initLeadForm();
  initPlanBuilder();
  initPromoBanner();
  initMobileCardSliders();
});
