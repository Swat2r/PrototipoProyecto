document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loginForm");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const errorMsg = document.getElementById("errorMsg");
  const showPassword = document.getElementById("showPassword");

  form.addEventListener("submit", function (e) {
    // Validación básica
    if (emailInput.value.trim() === "" || passwordInput.value.trim() === "") {
      errorMsg.textContent = "Por favor, completa todos los campos.";
      e.preventDefault(); // Evita que se envíe el formulario
    } else {
      errorMsg.textContent = "";
    }
  });

  // Mostrar u ocultar contraseña
  showPassword.addEventListener("change", function () {
    passwordInput.type = this.checked ? "text" : "password";
  });
});