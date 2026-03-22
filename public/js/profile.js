console.log("profile.js読み込まれた");

document.addEventListener("DOMContentLoaded", function () {

  const toggles = document.querySelectorAll(".subject_toggle");

  toggles.forEach(function (toggle) {

    const inner = toggle.nextElementSibling; // ← 対応する中身
    const arrow = toggle.querySelector(".arrow");

    console.log(toggle, inner, arrow);

    toggle.addEventListener("click", function () {

      inner.classList.toggle("open");

      if (inner.classList.contains("open")) {
        arrow.textContent = "▲";
      } else {
        arrow.textContent = "▼";
      }

    });

  });

});
