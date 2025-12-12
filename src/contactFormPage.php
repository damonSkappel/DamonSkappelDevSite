<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Me - Damon Skappel</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="script.js"></script>
  </head>
  <body>
    <div class="mainpage">
      <nav class="slide-in-up">
        <div class="nav-container">
          <ul class="nav-menu">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="projects.php" class="nav-link">Projects</a>
            </li>
            <li class="nav-item">
              <a href="projectDetails.php" class="nav-link">Project Details</a>
            </li>
            <li class="nav-item">
              <a href="contact.php" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="resumeHTML.php" class="nav-link">Resume</a>
            </li>
            <li class="nav-item">
              <a href="contactFormPage.php" class="nav-link active"
                >Contact Form</a
              >
            </li>
          </ul>
        </div>
      </nav>

      <div class="contact-page-container">
        <div class="contact-header slide-in-up delay-1">
          <h1>Contact Me</h1>
          <p>Get in touch - I'd love to hear from you!</p>
        </div>

        <div class="contact-form-wrapper slide-in-up delay-2">
          <div class="container">
            <form action="contactSubmit.php" method="POST" class="contact-form">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required />
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea
                  id="message"
                  name="message"
                  rows="5"
                  required
                ></textarea>
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
    </div>
  </body>
</html>
