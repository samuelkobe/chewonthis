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
