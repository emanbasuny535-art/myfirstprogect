// Mobile navigation
const menuToggle = document.getElementById("menuToggle");
const mainNav = document.getElementById("mainNav");

menuToggle.addEventListener("click", function () {
  mainNav.classList.toggle("show");
  const isOpen = mainNav.classList.contains("show");
  menuToggle.setAttribute("aria-expanded", isOpen);
  menuToggle.textContent = isOpen ? "✕" : "☰";
});

// Close the mobile menu after clicking a navigation link
const navLinks = document.querySelectorAll(".nav a");
navLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    mainNav.classList.remove("show");
    menuToggle.setAttribute("aria-expanded", "false");
    menuToggle.textContent = "☰";
  });
});

// Reservation form validation and confirmation
const bookingForm = document.getElementById("bookingForm");
const formMessage = document.getElementById("formMessage");
const dateInput = document.getElementById("date");

// Prevent choosing a date in the past
const today = new Date().toISOString().split("T")[0];
dateInput.min = today;

bookingForm.addEventListener("submit", function (event) {
  event.preventDefault();

  const customerName = document.getElementById("name").value.trim();
  const customerEmail = document.getElementById("email").value.trim();
  const bookingDate = dateInput.value;
  const bookingTime = document.getElementById("time").value;
  const guests = document.getElementById("guests").value;

  if (!customerName || !customerEmail || !bookingDate || !bookingTime || !guests) {
    formMessage.textContent = "Please complete all required fields.";
    return;
  }

  formMessage.textContent =
    "Thank you, " + customerName + "! Your reservation request has been received.";
  bookingForm.reset();
  dateInput.min = today;
});
