// Dark mode system
const checkbox = document.getElementById("checkbox");
const header = document.querySelector("header");
const navBar = document.querySelector(".nav");
const logo = document.getElementById("logo")
const main = document.querySelector("main");
const mainPage = document.querySelector(".home");
const footer = document.querySelector("footer")
const footerContent = document.querySelector(".footer-container")
const popUp = document.querySelector(".popup-container")
const popupContainer = document.getElementById("popup-container");
const popup = document.getElementById("popup");

checkbox.addEventListener("change", () => {
    document.body.classList.toggle("dark");
    if(document.body.classList.contains("dark")){
      logo.src = "./assets/Tinkery__1_.png"
    }else{
      logo.src = "./assets/Tinkery_1.png"
    }
    header.classList.toggle("dark");
    navBar.classList.toggle("dark");
    main.classList.toggle("dark");
    mainPage.classList.toggle("dark");
    footer.classList.toggle("dark")
    footerContent.classList.toggle("dark")
    popUp.classList.toggle("dark")
});


// function untuk show pop up Contact
function showPopup() {
  const popupContainer = document.getElementById("popup-container");
  popupContainer.style.display = "flex";
}

// function untuk hide pop up contact
function hidePopup() {
  const popupContainer = document.getElementById("popup-container");
  popupContainer.style.display = "none";
}

// event listener untuk mencegah tindakan default pop up
const contactLink = document.getElementById("contact-link");
contactLink.addEventListener("click", function (e) {
    e.preventDefault();
    showPopup();
});

// Jquery Alert
$(document).ready(function() {
  $("#catalog-link").click(function(event) {
      event.preventDefault();
      alert("Maaf, Catalog belum tersedia.");
  });
});