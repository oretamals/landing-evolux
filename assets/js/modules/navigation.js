export function initMobileNavigation() {
  const menuButton = document.querySelector("[data-menu-toggle]");
  const navigation = document.querySelector("[data-nav]");

  if (!menuButton || !navigation) {
    return;
  }

  const closeMenu = () => {
    navigation.classList.remove("is-open");
    menuButton.setAttribute("aria-expanded", "false");
    document.body.classList.remove("nav-open");
  };

  const openMenu = () => {
    navigation.classList.add("is-open");
    menuButton.setAttribute("aria-expanded", "true");
    document.body.classList.add("nav-open");
  };

  menuButton.addEventListener("click", () => {
    const isOpen = navigation.classList.contains("is-open");

    if (isOpen) {
      closeMenu();
      return;
    }

    openMenu();
  });

  navigation.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", closeMenu);
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeMenu();
    }
  });

  document.addEventListener("click", (event) => {
    const target = event.target;

    if (!(target instanceof Node)) {
      return;
    }

    if (!navigation.contains(target) && !menuButton.contains(target)) {
      closeMenu();
    }
  });
}
