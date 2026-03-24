document.addEventListener("DOMContentLoaded", function () {

  // ▼カテゴリ開閉
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
  // ▲カテゴリ開閉

  // ▼いいね処理
  // いいねボタン（未いいね → いいね）
  document.querySelectorAll(".like_btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      const post_id = this.getAttribute("post_id");

      fetch("/like/post/" + post_id, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({ post_id: post_id })
      })
        .then(response => response.json())
        .then(() => {
          // ハートを赤（いいね済み）に切り替え
          this.classList.remove("like_btn");
          this.classList.add("un_like_btn");

          // いいね数を+1
          const countSpan = document.querySelector(".like_counts" + post_id);
          countSpan.textContent = parseInt(countSpan.textContent) + 1;
        });
    });
  });

  // いいね解除ボタン（いいね済み → 解除）
  document.querySelectorAll(".un_like_btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      const post_id = this.getAttribute("post_id");

      fetch("/unlike/post/" + post_id, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({ post_id: post_id })
      })
        .then(response => response.json())
        .then(() => {
          // ハートを白（未いいね）に切り替え
          this.classList.remove("un_like_btn");
          this.classList.add("like_btn");

          // いいね数を-1
          const countSpan = document.querySelector(".like_counts" + post_id);
          countSpan.textContent = parseInt(countSpan.textContent) - 1;
        });
    });
  });
  // ▲いいね処理

});
