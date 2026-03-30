console.log("profile.js読み込まれた");

document.addEventListener("DOMContentLoaded", function () {

  const toggles = document.querySelectorAll(".subject_toggle");

  toggles.forEach(function (toggle) {

    const inner = toggle.nextElementSibling; // ← 対応する中身

    console.log(toggle, inner);

    toggle.addEventListener("click", function () {

      // 開閉
      inner.classList.toggle("open");
      toggle.classList.toggle("open"); // ← 矢印回転用

    });

  });

});
