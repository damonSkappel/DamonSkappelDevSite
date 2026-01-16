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

// Trigger animations on initial page load
document.addEventListener("DOMContentLoaded", function () {
  triggerAnimations();
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
