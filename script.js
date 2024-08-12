document.addEventListener('DOMContentLoaded', function() {
    // Form and floating button functionality
    const formContainer = document.getElementById('form-container');
    const mainContent = document.getElementById('main-content');
    const closeFormBtn = document.getElementById('close-form');
    const floatingContactBtn = document.getElementById('floating-contact-btn');
  
    function showForm() {
        formContainer.style.display = 'flex';
        mainContent.style.display = 'none';
    }
  
    function hideForm() {
        formContainer.style.display = 'none';
        mainContent.style.display = 'block';
    }
  
    // Show the form initially
    showForm();
  
    // Add event listeners for closing and opening the form
    closeFormBtn.addEventListener('click', hideForm);
    floatingContactBtn.addEventListener('click', showForm);
  
    // Testimonial carousel functionality
    const track = document.querySelector('.testimonial-track');
    const cards = document.querySelectorAll('.testimonial-card');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
  
    let currentIndex = 0;
    const totalCards = cards.length;
  
    function showCard(index) {
        const offset = -index * 100;
        track.style.transform = `translateX(${offset}%)`;
    }
  
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex === 0) ? totalCards - 1 : currentIndex - 1;
        showCard(currentIndex);
    });
  
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex === totalCards - 1) ? 0 : currentIndex + 1;
        showCard(currentIndex);
    });
  
    // Optional: Auto-slide functionality
    setInterval(() => {
        nextBtn.click();
    }, 5000);
  
    // Mobile menu functionality
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");
  
    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
  
    function closeMenu() {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    }
  
    hamburger.addEventListener("click", mobileMenu);
  
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach(link => link.addEventListener("click", closeMenu));
  
    // Form submission with EmailJS integration
    const form = document.getElementById('landing-form');
    
    // Initialize EmailJS (replace 'YOUR_USER_ID' with your actual User ID from EmailJS)
    emailjs.init('iLrbov786S0K0sNrK');
  
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        emailjs.sendForm('service_si6jgu7', 'template_geb3k8j', form)
          .then(function(response) {
              console.log('SUCCESS!', response.status, response.text);
              alert('Form submitted successfully!');
              form.reset();
              hideForm();
          }, function(error) {
              console.log('FAILED...', error);
              alert('Form submission failed. Please try again.');
          });
    });
  });
  