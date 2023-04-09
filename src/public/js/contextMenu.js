$(document).ready(() => {
  // const contextMenu = $(".context-menu");
  const left = document.documentElement.clientWidth;
  const header = $(".header");
  function clear() {
    $(".context-menu").each((index, menu) => {
      $(menu).css({
        display: "none",
      });
    });
  }

  $(".more-option").each((index, option) => {
    $(option).on("click", function (e) {
      clear();
      const contextMenu = $(this).parent().find(".context-menu");
      contextMenu.css({
        display: "inline-block",
      });

      contextMenu.on("mouseleave", function (e) {
        $(this).css({
          transition: "all 0.25s",
          display: "none",
        });
      });
    });
  });

  // $(".context-menu").each((index, menu) => {
  //   if (menu.style.display === "inline-block") {
  //     $(document).on("click", function (e) {
  //       $(".context-menu").each((index, menu) => {
          
  //       });
  //     });
  //   }
  // });
});
