document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const menuBars = document.querySelectorAll('.menu-bar');
    
    function toggleMobileMenu() {
      mobileMenu.classList.toggle('active');
      mobileMenuOverlay.classList.toggle('active');
      document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
      
      // Animate hamburger icon
      if (mobileMenu.classList.contains('active')) {
        menuBars[0].style.transform = 'translateY(8px) rotate(45deg)';
        menuBars[1].style.opacity = '0';
        menuBars[2].style.transform = 'translateY(-8px) rotate(-45deg)';
      } else {
        menuBars[0].style.transform = '';
        menuBars[1].style.opacity = '';
        menuBars[2].style.transform = '';
      }
    }
    
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);
    mobileMenuClose.addEventListener('click', toggleMobileMenu);
    mobileMenuOverlay.addEventListener('click', toggleMobileMenu);
    
    // Mobile Dropdown Toggle
    const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');
    
    mobileDropdownBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const dropdown = this.parentElement;
        dropdown.classList.toggle('active');
      });
    });
    
    // Night Mode Toggle
    const nightModeToggle = document.getElementById('night-mode-toggle');
    
    function setNightMode(isDark) {
      if (isDark) {
        document.body.classList.add('dark-mode');
        nightModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
      } else {
        document.body.classList.remove('dark-mode');
        nightModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
      }
    }
    
    // Check for saved preference or system preference
    function initNightMode() {
        if (localStorage.getItem('nightMode') === 'true') {
          document.body.classList.add('dark-mode');
          document.querySelector('.footer').classList.add('dark-mode');
        }
      
      
      try {
        const savedMode = localStorage.getItem('nightMode');
        if (savedMode !== null) {
          isDark = savedMode === 'true';
        } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
          isDark = true;
        }
      } catch (e) {
        console.error('Error accessing localStorage:', e);
      }
      
      setNightMode(isDark);
    }
    
    nightModeToggle.addEventListener('click', function() {
      const isDark = !document.body.classList.contains('dark-mode');
      setNightMode(isDark);
      
      try {
        localStorage.setItem('nightMode', isDark);
      } catch (e) {
        console.error('Error saving to localStorage:', e);
      }
    });
    
    initNightMode();
    
    // Close mobile menu when clicking links (except dropdown triggers)
    document.querySelectorAll('.mobile-nav a').forEach(link => {
      if (!link.classList.contains('mobile-dropdown-btn')) {
        link.addEventListener('click', toggleMobileMenu);
      }
    });
  });











  // HERO SECTION
/* === HERO BACKGROUND SLIDER === */
const slides = document.querySelectorAll('.hero-slider .slide');
let currentSlide = 0;

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove('active');
    if (i === index) slide.classList.add('active');
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % slides.length;
  showSlide(currentSlide);
}

// Initialize
showSlide(currentSlide);
setInterval(nextSlide, 7000); // Change every 7 seconds



/* === QUOTES SLIDER === */
const quotes = [
  "“Human rights are the foundation of a peaceful and sustainable world. Empowering marginalized communities and ensuring their access to resources and opportunities is not just a moral obligation, but a pathway to shared prosperity.”",
  "“True development is not just about economic growth, but about ensuring that no one is left behind. The voices and rights of marginalized and minority groups must be at the heart of sustainable progress. UNDP.”",
  "“Sustainable development is only achievable when it includes the rights of the most vulnerable, ensuring their participation, dignity, and access to opportunities that allow them to thrive.”",
  "“When we speak of human rights, we must remember that they are not privileges, but entitlements for every individual, especially those from marginalized communities whose voices are often ignored in development processes. Kofi Annan.”",
  "“The journey towards sustainable development requires the full inclusion of marginalized and minority groups, as their resilience, knowledge, and experiences are essential in building a more equitable and just world for future generations. Ban Ki-moon.”"
];

let currentQuote = 0;
const quoteText = document.getElementById("quote-text");
const quoteDots = document.getElementById("quote-dots");
const prevBtn = document.getElementById("prev-quote");
const nextBtn = document.getElementById("next-quote");

function renderDots() {
  quoteDots.innerHTML = "";
  quotes.forEach((_, i) => {
    const dot = document.createElement("span");
    dot.classList.toggle("active", i === currentQuote);
    quoteDots.appendChild(dot);
  });
}

function updateQuote() {
  quoteText.style.opacity = 0;
  setTimeout(() => {
    quoteText.textContent = quotes[currentQuote];
    quoteText.style.opacity = 1;
    renderDots();
  }, 300);
}

prevBtn.addEventListener("click", () => {
  currentQuote = (currentQuote - 1 + quotes.length) % quotes.length;
  updateQuote();
});

nextBtn.addEventListener("click", () => {
  currentQuote = (currentQuote + 1) % quotes.length;
  updateQuote();
});

setInterval(() => {
  nextBtn.click();
}, 14000);

renderDots();
updateQuote();












// Newsletter Form Handling
// Animated Newsletter Form
document.addEventListener('DOMContentLoaded', function() {
  const animatedForm = document.getElementById('animated-newsletter-form');
  const animatedToast = document.getElementById('animated-toast');
  const newsletterSection = document.querySelector('.animated-newsletter');

  // Initialize animations when section comes into view
  function initAnimations() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          newsletterSection.classList.add('animate-in');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    if (newsletterSection) {
      observer.observe(newsletterSection);
    }
  }

  // Form submission handler
  if (animatedForm) {
    animatedForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const emailInput = document.getElementById('animated-newsletter-email');
      const email = emailInput.value.trim();
      const submitBtn = this.querySelector('button[type="submit"]');
      
      // Validate email
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showAnimatedToast('Please enter a valid email address', true);
        emailInput.focus();
        return;
      }
      
      // Show loading state
      submitBtn.disabled = true;
      const originalContent = submitBtn.innerHTML;
      submitBtn.innerHTML = `
        <span>Submitting...</span>
        <div class="submit-arrow">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M12 2V6M12 18V22M6 12H2M22 12H18M19.0784 19.0784L16.25 16.25M19.0784 4.99999L16.25 7.82843M4.92157 19.0784L7.75 16.25M4.92157 4.99999L7.75 7.82843" 
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      `;
      
      // Simulate API call (replace with actual fetch)
      setTimeout(() => {
        fetch('subscribe.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: 'email=' + encodeURIComponent(email)
        })
        .then(response => {
          if (!response.ok) throw new Error('Network response was not ok');
          return response.text();
        })
        .then(message => {
          showAnimatedToast(message, message.toLowerCase().includes('error'));
          if (!message.toLowerCase().includes('error')) {
            animatedForm.reset();
          }
        })
        .catch(error => {
          console.error('Error:', error);
          showAnimatedToast('Something went wrong. Please try again.', true);
        })
        .finally(() => {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalContent;
        });
      }, 1000); // Simulate network delay
    });
  }

  // Show animated toast notification
  function showAnimatedToast(message, isError = false) {
    if (!animatedToast) return;
    
    animatedToast.textContent = message;
    animatedToast.className = 'animated-toast show';
    if (isError) animatedToast.classList.add('error');
    
    // Hide after delay
    setTimeout(() => {
      animatedToast.classList.remove('show');
      setTimeout(() => animatedToast.classList.remove('error'), 400);
    }, 5000);
  }

  // Initialize animations
  initAnimations();
});















// what we do section
// Initialize animations for services section
document.addEventListener('DOMContentLoaded', function() {
  // Initialize Intersection Observer for animations
  const animateOnScroll = function() {
    const elements = document.querySelectorAll('[data-aos]');
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('aos-animate');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    elements.forEach(element => {
      observer.observe(element);
    });
  };

  // Run animation function
  animateOnScroll();
});






// FOOTER SECTION
// FOOTER


function toggleNightMode() {
  document.body.classList.toggle('dark-mode');
  localStorage.setItem('nightMode', document.body.classList.contains('dark-mode'));

    // Update footer-specific classes if needed
document.querySelector('.footer').classList.toggle('dark-mode');
}


















// Modern Contact Form Handling
document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('modernContactForm');
  const contactToast = document.getElementById('modernContactToast');
  
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const submitBtn = this.querySelector('button[type="submit"]');
      const formData = new FormData(this);
      
      // Show loading state
      submitBtn.disabled = true;
      const originalContent = submitBtn.innerHTML;
      submitBtn.innerHTML = `
        <span>Sending...</span>
        <div class="submit-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M12 2V6M12 18V22M6 12H2M22 12H18M19.0784 19.0784L16.25 16.25M19.0784 4.99999L16.25 7.82843M4.92157 19.0784L7.75 16.25M4.92157 4.99999L7.75 7.82843" 
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      `;
      
      fetch('contact_process.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.text();
      })
      .then(message => {
        showModernToast(message, message.toLowerCase().includes('error'));
        if (!message.toLowerCase().includes('error')) {
          contactForm.reset();
          // Reset labels position after form reset
          document.querySelectorAll('.modern-contact-form label').forEach(label => {
            label.style.transform = '';
            label.style.fontSize = '';
          });
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showModernToast('Failed to send message. Please try again.', true);
      })
      .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalContent;
      });
    });
  }
  
  function showModernToast(message, isError = false) {
    if (!contactToast) return;
    
    contactToast.textContent = message;
    contactToast.className = 'modern-contact-toast show';
    if (isError) contactToast.classList.add('error');
    
    // Hide after delay
    setTimeout(() => {
      contactToast.classList.remove('show');
      setTimeout(() => contactToast.classList.remove('error'), 400);
    }, 5000);
  }
  
  // Initialize animations when elements come into view
  function initContactAnimations() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = 1;
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('[data-aos]').forEach(el => {
      observer.observe(el);
    });
  }
  
  initContactAnimations();
});








// About Professional Section Animation
function initProfessionalSection() {
  const professionalSection = document.querySelector('.professional-section');
  
  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.75
    );
  }
  
  function checkVisibility() {
    if (isInViewport(professionalSection)) {
      professionalSection.classList.add('visible');
      window.removeEventListener('scroll', checkVisibility);
    }
  }
  
  // Initial check
  if (isInViewport(professionalSection)) {
    professionalSection.classList.add('visible');
  } else {
    window.addEventListener('scroll', checkVisibility);
  }
}

// Call this function when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  // Your existing DOMContentLoaded code...
  initProfessionalSection();
});








// update section
// Add this to your existing JavaScript file
document.addEventListener('DOMContentLoaded', function() {
  // Initialize carousel
  const track = document.getElementById('carouselTrack');
  const cards = document.querySelectorAll('.update-card');
  const prevBtn = document.querySelector('.arrow-prev');
  const nextBtn = document.querySelector('.arrow-next');
  
  let currentIndex = 0;
  const cardCount = cards.length;
  let cardsPerView = 3; // Default for desktop
  
  // Set animation delays for each card
  cards.forEach((card, index) => {
    card.style.setProperty('--index', index);
  });
  
  // Update cards per view based on screen size
  function updateCardsPerView() {
    if (window.innerWidth < 768) {
      cardsPerView = 1;
    } else if (window.innerWidth < 992) {
      cardsPerView = 2;
    } else {
      cardsPerView = 3;
    }
    moveCarousel(0); // Reset position
  }
  
  // Move carousel function
  function moveCarousel(direction) {
    // Calculate new index
    currentIndex += direction;
    
    // Boundary checks
    if (currentIndex < 0) {
      currentIndex = 0;
    } else if (currentIndex > cardCount - cardsPerView) {
      currentIndex = cardCount - cardsPerView;
    }
    
    // Calculate transform value
    const cardWidth = cards[0].offsetWidth;
    const transformValue = -currentIndex * cardWidth;
    
    // Apply transform
    track.style.transform = `translateX(${transformValue}px)`;
    
    // Update button states
    updateButtonStates();
  }
  
  // Update button disabled states
  function updateButtonStates() {
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex >= cardCount - cardsPerView;
  }
  
  // Event listeners for buttons
  prevBtn.addEventListener('click', () => moveCarousel(-1));
  nextBtn.addEventListener('click', () => moveCarousel(1));
  
  // Handle window resize
  window.addEventListener('resize', function() {
    updateCardsPerView();
  });
  
  // Initialize
  updateCardsPerView();
  updateButtonStates();
  
  // // Optional: Auto-advance carousel
  // let autoSlideInterval;
  
  // function startAutoSlide() {
  //   autoSlideInterval = setInterval(() => {
  //     if (currentIndex < cardCount - cardsPerView) {
  //       moveCarousel(1);
  //     } else {
  //       moveCarousel(-currentIndex); // Return to start
  //     }
  //   }, 5000);
  // }
  
  // function stopAutoSlide() {
  //   clearInterval(autoSlideInterval);
  // }
  
  // // Start auto-slide
  // startAutoSlide();
  
  // // Pause on hover
  // track.addEventListener('mouseenter', stopAutoSlide);
  // track.addEventListener('mouseleave', startAutoSlide);
});










// desktop nav highlight and smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function (e) {
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth" });
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll(".desktop-nav a");

  function activateLinkOnScroll() {
    let scrollY = window.pageYOffset;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 80;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute("id");

      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          link.classList.remove("active");
          if (link.getAttribute("href") === `#${sectionId}`) {
            link.classList.add("active");
          }
        });
      }
    });
  }

  window.addEventListener("scroll", activateLinkOnScroll);
  activateLinkOnScroll(); // Run on load too
});

// mobile nav highlight and smooth scrolling
document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll(
    '.desktop-nav a, .mobile-nav a, .mobile-dropdown-menu a'
  );

  function activateLinkOnScroll() {
    let scrollY = window.pageYOffset;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 80;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute("id");

      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          link.classList.remove("active");
          if (link.getAttribute("href") === `#${sectionId}`) {
            link.classList.add("active");
          }
        });
      }
    });
  }

  window.addEventListener("scroll", activateLinkOnScroll);
  activateLinkOnScroll();
});
