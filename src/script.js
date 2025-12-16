function triggerAnimations() {
  // Get all elements with slide-in classes
  const slideElements = document.querySelectorAll(
    ".slide-in-left, .slide-in-right, .slide-in-up"
  );

  // Reset all elements to their initial state
  slideElements.forEach((element) => {
    element.classList.remove("active");
    // Force a reflow to ensure the class removal takes effect
    element.offsetHeight;
  });

  // Trigger animations after a brief delay
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      slideElements.forEach((element) => {
        element.classList.add("active");
      });
    });
  });
}

// Client-side form validation
function validateContactForm(event) {
  const form = event.target;
  const name = form.querySelector("#name");
  const email = form.querySelector("#email");
  const message = form.querySelector("#message");

  let errors = [];
  let isValid = true;

  // Remove previous error styles
  [name, email, message].forEach((field) => {
    field.classList.remove("invalid-field");
  });

  // Validate name
  if (!name.value.trim()) {
    errors.push("Name is required");
    name.classList.add("invalid-field");
    isValid = false;
  }

  // Validate email
  if (!email.value.trim()) {
    errors.push("Email is required");
    email.classList.add("invalid-field");
    isValid = false;
  } else {
    // Email format validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
      errors.push("Please enter a valid email address");
      email.classList.add("invalid-field");
      isValid = false;
    }
  }

  // Validate message
  if (!message.value.trim()) {
    errors.push("Message is required");
    message.classList.add("invalid-field");
    isValid = false;
  }

  // If validation fails, show alert and prevent submission
  if (!isValid) {
    event.preventDefault();
    alert("Please fix the following errors:\n\n" + errors.join("\n"));
    return false;
  }

  return true;
}

// Trigger animations on initial page load
document.addEventListener("DOMContentLoaded", function () {
  triggerAnimations();

  // Attach form validation to contact form
  const contactForm = document.querySelector(".contact-form");
  if (contactForm) {
    contactForm.addEventListener("submit", validateContactForm);
  }
});

// Trigger animations when navigating back to page (handles browser back/forward)
window.addEventListener("pageshow", function (event) {
  // Only trigger if coming from cache or navigation
  triggerAnimations();
});

// Optional: Trigger animations when page becomes visible again
document.addEventListener("visibilitychange", function () {
  if (!document.hidden) {
    triggerAnimations();
  }
});
