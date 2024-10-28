var openTrigger = document.getElementById("open-trigger");
var closeTrigger = document.getElementById("close-trigger");
var menuMobile = document.querySelector("nav.menu-mobile");

openTrigger.addEventListener("click", () => {
  menuMobile.classList.add("open-menuMobile");
});

closeTrigger.addEventListener("click", () => {
  menuMobile.classList.remove("open-menuMobile");
});
