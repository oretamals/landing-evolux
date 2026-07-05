const EVOLUX_WHATSAPP_NUMBER = "56956289106";

function buildLeadMessage(formData) {
  const name = String(formData.get("name") ?? "").trim();
  const phone = String(formData.get("phone") ?? "").trim();
  const email = String(formData.get("email") ?? "").trim();
  const discipline = String(formData.get("discipline") ?? "").trim();
  const goals = String(formData.get("goals") ?? "").trim();

  return [
    "Hola EvoluX, quiero agendar una clase de prueba.",
    name ? `Nombre: ${name}` : "",
    phone ? `Telefono: ${phone}` : "",
    email ? `Correo: ${email}` : "",
    discipline ? `Disciplina de interes: ${discipline}` : "",
    goals ? `Objetivos: ${goals}` : ""
  ].filter(Boolean).join("\n");
}

export function initLeadForm() {
  const leadForm = document.querySelector("[data-lead-form]");

  if (!leadForm) {
    return;
  }

  leadForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const formData = new FormData(leadForm);
    const message = buildLeadMessage(formData);
    const whatsappUrl = `https://wa.me/${EVOLUX_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;

    window.open(whatsappUrl, "_blank", "noopener,noreferrer");
  });
}