<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credit card landing page</title>
    <link rel="stylesheet" href="./style.css" />
    <script src="script.js" defer></script>
  </head>
  <body>
  <?php
if (isset($_SESSION['mail_sent'])) {
    if ($_SESSION['mail_sent']) {
        echo "<p>Thank you! Your message has been sent successfully.</p>";
    } else {
        echo "<p>" . ($_SESSION['mail_error'] ?? "An error occurred. Please try again.") . "</p>";
    }
    // Clear the session variables
    unset($_SESSION['mail_sent']);
    unset($_SESSION['mail_error']);
}
?>
    <!-- The Form -->
    <div id="form-container">
  <div id="form-overlay"></div>
  <form id="landing-form">
    <h2>Contact Us</h2>
    <button type="button" id="close-form">Close</button>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Submit</button>
  </form>
</div>

    <div id="main-content">
      <!-- Header -->
      <header>
        <nav class="navbar">
          <div class="logo">
            <img src="./images/Logo.svg" alt="Logo" class="nav-logo" />
          </div>
          <ul class="nav-menu">
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Eng</a></li>
          </ul>
          <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
      </header>

      <!-- Hero Section -->
      <section class="hero">
        <div class="hero-content">
          <h1 class="hero-title">
            Simplify All Transactions in
            <span class="hero-title-span">One Card</span>
          </h1>
          <p class="hero-para">
            Hurry up and join now, with this you can manage your daily finances
            easily and safely.
          </p>

          <div class="right-part-three">
            <div class="right-happy-user">
              <h3 class="right-part-title">
                42K <span class="right-part-span">+</span>
              </h3>
              <p class="right-part-para">
                Happy <br />
                Active User
              </p>
            </div>
            <img src="./images/Vector 402.svg" class="vector-img" alt="" />
            <div class="right-happy-user">
              <h3 class="right-part-title">
                12K <span class="right-part-span">+</span>
              </h3>
              <p class="right-part-para">
                Years <br />
                Experience
              </p>
            </div>
          </div>
        </div>
        <div class="hero-image">
          <img src="./images/frontCards.png" class="hero-title-image" alt="" />
        </div>
      </section>

      <!-- Companies section -->
      <section class="companies-section">
        <div class="logo-section">
          <img src="./images/Logo.svg" alt="" />
          <img src="./images/Logo.svg" alt="" />
          <img src="./images/Logo.svg" alt="" />
          <img src="./images/Logo.svg" alt="" />
          <img src="./images/Logo.svg" alt="" />
        </div>
      </section>

      <!-- Transaction Services -->
      <section class="transaction-services">
        <div class="container-right">
          <h1 class="transaction-services-title">
            The best payment service for
            <span class="transaction-services-span">your transactions.</span>
          </h1>
        </div>
        <div class="container-left">
          <p class="transaction-services-sub-title">
            The following are the services we provide <br />to users. with the
            services we maximize <br />
            it is hoped that users are satisfied with <br />
            what we provide.
          </p>
        </div>
      </section>
      <section class="transaction-cards">
        <div class="card">
          <img src="./images/dollar-circle.svg" alt="" />
          <h3 class="transaction-card-title">Free transaction fee</h3>
        </div>
        <div class="card">
          <img src="./images/cloud-add.svg" alt="" />
          <h3 class="transaction-card-title">
            Easy to access <br />
            anytime and anywhere
          </h3>
        </div>
        <div class="card">
          <img src="./images/lock.svg" alt="" />
          <h3 class="transaction-card-title">Guaranteed Safety</h3>
        </div>
      </section>

      <section class="card-choice-section">
        <h1 class="card-choice-title">
          Unique and interesting <br />
          <span class="card-choice-span"> card choices</span>
        </h1>
        <p class="card-choice-para">
          We provide card editing features, where users can edit unique cards
          <br />
          according to the wishes and preferences of the users themselves.
        </p>
        <img src="./images/VCards.png" alt="" />
      </section>

      <!-- Testimonial section -->
      <section class="testiomonial-section">
        <h2 class="testiomonial-title">What Our Customers Say</h2>
        <p class="testiomonial-subtitle">Trusted by customers worldwide</p>

        <div class="testiomonial-carousel">
          <div class="testiomonial-track">
            <div class="testiomonial-card">
              <p>"Great service, really helped me out when I needed it."</p>
              <h4>John Doe</h4>
              <span>CEO, Company</span>
            </div>
            <div class="testiomonial-card">
              <p
                >"The best financial decision I have made so far. Highly
                recommend!"</p
              >
              <h4>Jane Smith</h4>
              <span>Manager, Another Company</span>
            </div>
            <div class="testiomonial-card">
              <p>"Amazing support and great offers. Can't ask for more."</p>
              <h4>Emily Johnson</h4>
              <span>Freelancer</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Cta Customise -->
      <footer>
        <img src="./images/Logo.svg" alt="" />
        <ul>
          <li>Branding</li>
          <li>Contact Us</li>
          <li>Privacy Policy</li>
          <li>FAQs</li>
        </ul>
      </footer>
    </div>
    <button id="floating-contact-btn">Contact Us</button>
  </body>
</html>
