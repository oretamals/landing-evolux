const MOBILE_SLIDER_QUERY = "(max-width: 860px)";
const SLIDER_SELECTOR = ".coach-grid, .coach-row, .discipline-grid, .plan-slider, .price-grid, .week-grid, .testimonial-grid";

function setupSlider(slider, mediaQuery) {
  const resetScroll = () => {
    slider.scrollLeft = 0;
  };

  resetScroll();

  if (typeof mediaQuery.addEventListener === "function") {
    mediaQuery.addEventListener("change", resetScroll);
  }
}

export function initMobileCardSliders() {
  const sliders = document.querySelectorAll(SLIDER_SELECTOR);

  if (!sliders.length) {
    return;
  }

  const mediaQuery = window.matchMedia(MOBILE_SLIDER_QUERY);

  sliders.forEach((slider) => {
    if (slider.children.length < 2) {
      return;
    }

    setupSlider(slider, mediaQuery);
  });
}
