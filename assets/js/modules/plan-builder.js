const EVOLUX_WHATSAPP_NUMBER = "56956289106";
// TODO: reemplazar por el correo real de EvoluX cuando este disponible.
const EVOLUX_EMAIL = "contacto@evoluxfc.cl";

function buildPlanMessage(form) {
  const formData = new FormData(form);
  const name = String(formData.get("name") ?? "").trim();
  const contact = String(formData.get("contact") ?? "").trim();
  const notes = String(formData.get("notes") ?? "").trim();
  const grupales = formData.getAll("grupal");
  const personalizadas = formData.getAll("personalizada");

  return [
    "Hola EvoluX, quiero armar mi plan a medida.",
    name ? `Nombre: ${name}` : "",
    contact ? `Contacto: ${contact}` : "",
    grupales.length ? `Grupales: ${grupales.join(", ")}` : "",
    personalizadas.length ? `Personalizadas: ${personalizadas.join(", ")}` : "",
    notes ? `Comentarios: ${notes}` : ""
  ].filter(Boolean).join("\n");
}

function openWhatsapp(message) {
  const url = `https://wa.me/${EVOLUX_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
  window.open(url, "_blank", "noopener,noreferrer");
}

function openEmail(message) {
  const subject = encodeURIComponent("Consulta: armar mi plan en EvoluX");
  window.location.href = `mailto:${EVOLUX_EMAIL}?subject=${subject}&body=${encodeURIComponent(message)}`;
}

export function initPlanBuilder() {
  const planForm = document.querySelector("[data-plan-form]");

  if (!planForm) {
    return;
  }

  planForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const channel = event.submitter?.dataset.channel ?? "whatsapp";
    const message = buildPlanMessage(planForm);

    if (channel === "email") {
      openEmail(message);
      return;
    }

    openWhatsapp(message);
  });
}
