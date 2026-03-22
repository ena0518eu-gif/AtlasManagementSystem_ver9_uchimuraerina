document.addEventListener("DOMContentLoaded", function () {

  const categories = document.querySelectorAll(".main_categories");

  categories.forEach(category => {
    category.querySelector(".main_category_header").addEventListener("click", () => {

      // 開閉トグル
      category.classList.toggle("active");

      // 矢印の切り替え
      const arrow = category.querySelector(".arrow");
      const subCategories = category.querySelector(".sub_categories");

      if (category.classList.contains("active")) {
        // 開く
        $(subCategories).slideDown(300);
        arrow.classList.add("open");
      } else {
        // 閉じる
        $(subCategories).slideUp(300);
        arrow.classList.remove("open");
      }

    });
  });

});
