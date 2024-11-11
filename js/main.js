document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("navbar-toggle");
  const menu = document.getElementById("navbar-sticky");
  menu.classList.add("hidden");

  button.addEventListener("click", function () {
    menu.classList.toggle("hidden");
  });

  window.onscroll = function () {
    if (
      document.body.scrollTop > 50 ||
      document.documentElement.scrollTop > 50
    ) {
      document.getElementById("headerImg").classList.remove("h-20");
      document.getElementById("headerImg").classList.add("h-12");
    } else {
      document.getElementById("headerImg").classList.remove("h-12");
      document.getElementById("headerImg").classList.add("h-20");
    }
  };

  // dialog show/hide
  const dialog = document.querySelector("#customDialog");
  const openDialogModals = document.querySelectorAll(".openDialog");
  const closeDialogModal = document.querySelector(".closeDialog");

  openDialogModals.forEach((openDialogModal) => {
    openDialogModal.addEventListener("click", () => {
      var filename = openDialogModal.getAttribute("data-filename");
      var content = "ERROR";
      loadHTML(filename, "docLinks");

      document.getElementById("docLinks").innerHTML = content;
      dialog.showModal();
      document.getElementById("closeDialog").focus();
    });
  });

  closeDialogModal.addEventListener("click", () => {
    document.getElementById("docLinks").innerHTML = ``;
    dialog.close();
  });

  function loadHTML(fileName, elementID) {
    fetch(fileName)
      .then((response) => response.text())
      .then((text) => (document.getElementById(elementID).innerHTML = text));
  }
});
