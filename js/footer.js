// document.addEventListener("DOMContentLoaded", function () {
//   const submitSpan = document.querySelector(
//     ".formkit-submit.formkit-submit span"
//   );

//   if (submitSpan) {
//     submitSpan.innerHTML = "submit";
//   } else {
//     console.error("Element not found.");
//   }
// });

const mobileSocialMediaWrapper = document.getElementById(
  "mobile_social_media_wrapper"
);

const mobileMenuUl = document.getElementById("mobile_menu_ul");

// Create a new element
const newElement = document.createElement("li");
newElement.appendChild(mobileSocialMediaWrapper);

// Append the new element to the end of the <ul>
mobileMenuUl.appendChild(newElement);

// Display the "Back to Tours" button only on the single-tour page
const tourDetailsButton = document.querySelector(".back-to-tours");

if (document.body.classList.contains("single-tour")) {
  tourDetailsButton.style.display = "inline-block";
} else {
  tourDetailsButton.style.display = "none";
}
// Display the "See Available Experiences" button when not on the single-tour page
const availableToursButton = document.querySelector(".open-zaui");

if (document.body.classList.contains("single-tour")) {
  availableToursButton.style.display = "none";
} else {
  availableToursButton.style.display = "inline-block";
}

// Scroll event for the "Back to Top" button
window.addEventListener("scroll", function () {
  const scrollButtons = document.querySelector(".scroll-buttons");

  if (window.scrollY > 200) {
    scrollButtons.style.display = "block";
  } else {
    scrollButtons.style.display = "none";
  }
});

// Click event for the "Back to Top" button
document.querySelector(".back-to-top").addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// Click event for the "Back to Tours" button
document.querySelector(".back-to-tours").addEventListener("click", () => {
  window.location.href = "/tours";
});

//mobile sub-menu toggle
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll("#mobile_menu_ul > li > a.mobile-menu-anchor")
    .forEach((anchor) => {
      const subMenu = anchor.parentElement.querySelector(".sub-menu");
      if (anchor.getAttribute("href") === "#" && subMenu) {
        // Add '+' beside the anchor if it has a sub-menu
        if (!anchor.querySelector(".submenu-toggle")) {
          const plus = document.createElement("span");
          plus.textContent = " +";
          plus.className = "submenu-toggle";
          anchor.appendChild(plus);
        }
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          subMenu.classList.toggle("active");
        });
      }
    });
});

//desktop sub-menu toggle
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll(".desktop-menu > li > a.menu-anchor")
    .forEach((anchor) => {
      const subMenu = anchor.parentElement.querySelector(".sub-menu");
      if (anchor.getAttribute("href") == "#" && subMenu) {
        // Add '+' beside the anchor if it has a sub-menu
        if (!anchor.querySelector(".submenu-toggle")) {
          const plus = document.createElement("span");
          plus.textContent = " +";
          plus.className = "submenu-toggle";
          anchor.appendChild(plus);
        }
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          subMenu.classList.toggle("active");
        });
      }
    });
});
