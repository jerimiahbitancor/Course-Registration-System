document.addEventListener("DOMContentLoaded", function () {
  const popup = document.getElementById("messagePopup");
  const overlay = document.getElementById("overlay");
  const closeBtn = document.getElementById("closePopup");

  if (popup && overlay && closeBtn) {
    closeBtn.addEventListener("click", function () {
      popup.classList.remove("show");
      overlay.classList.remove("show");
    });
  }
});