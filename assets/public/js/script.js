(function ($) {
  "use strict";
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/bwduf-unfoldcontent.default",
      function onePageNav() {

        const navList = document.querySelector(".bwdopn-onepage-nav-container");
        const links = navList.querySelectorAll("a");
        console.log(navList);

        links.forEach((link) => {
          link.addEventListener("click", (e) => {
            e.preventDefault();

            const targetId = link.getAttribute("href");

            const targetElement = document.querySelector(targetId);

            const offsetTop = targetElement.offsetTop;

            window.scrollTo({
              top: offsetTop,
              behavior: "smooth",
            });
          });
        });
      }
    );
  });
})(jQuery);
