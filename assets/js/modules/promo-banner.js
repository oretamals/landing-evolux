const PROMO_STORAGE_KEY = "evolux-promo-dismissed";

export function initPromoBanner() {
  const banner = document.querySelector("[data-promo-banner]");
  const closeButton = document.querySelector("[data-promo-close]");

  if (!banner || !closeButton) {
    return;
  }

  if (readDismissed()) {
    banner.hidden = true;
    return;
  }

  closeButton.addEventListener("click", () => {
    banner.hidden = true;
    saveDismissed();
  });
}

function readDismissed() {
  try {
    return window.localStorage.getItem(PROMO_STORAGE_KEY) === "true";
  } catch (error) {
    return false;
  }
}

function saveDismissed() {
  try {
    window.localStorage.setItem(PROMO_STORAGE_KEY, "true");
  } catch (error) {
    // El almacenamiento puede estar bloqueado; el cierre sigue funcionando en la sesion.
  }
}
