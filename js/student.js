document.addEventListener("DOMContentLoaded", function () {
  const popup = document.getElementById("messagePopup");
  const overlay = document.getElementById("overlay");
  const cancelBtn = document.getElementById("cancelUnenroll");
  const confirmBtn = document.getElementById("confirmUnenroll");
  const unenrollBtn = document.querySelector(".unenroll_button");
  const form = document.querySelector("form");

  unenrollBtn.addEventListener("click", function (e) {
    e.preventDefault(); // Prevent form submission
    popup.classList.add("show");
    overlay.classList.add("show");
  });

  cancelBtn.addEventListener("click", function () {
    popup.classList.remove("show");
    overlay.classList.remove("show");
  });

  confirmBtn.addEventListener("click", function () {
    form.submit(); // Proceed with submission
  });
});