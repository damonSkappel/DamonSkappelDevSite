<?php
session_start();

// Get errors and form data from session
$errors = $_SESSION['form_errors'] ?? [];
$formData = $_SESSION['form_data'] ?? [];

// Clear session data after retrieving
unset($_SESSION['form_errors']);
unset($_SESSION['form_data']);

// Display alert if there are errors
$alertMessage = '';
if (!empty($errors)) {
    $alertMessage = "Please fix the following errors:\\n\\n" . implode("\\n", $errors);
}

$pageTitle = "Contact Me - Damon Skappel";
$activePage = "contactForm";
include 'includes/header.php';
include 'includes/nav.php';
?>

      <?php if (!empty($alertMessage)): ?>
      <script>
        alert('<?php echo $alertMessage; ?>');
      </script>
      <?php endif; ?>

      <div class="contact-page-container">
        <div class="contact-header slide-in-up delay-1">
          <h1>Contact Me</h1>
          <p>Get in touch - I'd love to hear from you!</p>
        </div>

        <div class="contact-form-wrapper slide-in-up delay-2">
          <div class="container">
            <form action="contactSubmit.php" method="POST" class="contact-form">
              <div class="form-group">
                <label for="name">Name <span class="required">*</span></label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  value="<?php echo htmlspecialchars($formData['name'] ?? ''); ?>"
                  class="<?php echo isset($errors['name']) ? 'invalid-field' : ''; ?>"
                  required
                />
              </div>

              <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>"
                  class="<?php echo isset($errors['email']) ? 'invalid-field' : ''; ?>"
                  required
                />
              </div>

              <div class="form-group">
                <label for="message">Message <span class="required">*</span></label>
                <textarea
                  id="message"
                  name="message"
                  rows="5"
                  class="<?php echo isset($errors['message']) ? 'invalid-field' : ''; ?>"
                  required
                ><?php echo htmlspecialchars($formData['message'] ?? ''); ?></textarea>
              </div>

              <button type="submit" class="btn btn-primary">
                Send Message
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="m22 2-7 20-4-9-9-4Z" />
                  <path d="M22 2 11 13" />
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>

<?php include 'includes/footer.php'; ?>
