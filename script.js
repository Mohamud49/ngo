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





  //HERO SECTION
 // Hero Section Functionality
 // Enhanced Hero Functionality
 document.addEventListener('DOMContentLoaded', function() {

    // Fixed Gradient Text Redraw
  function fixGradientText() {
    const gradientTexts = document.querySelectorAll('.text-gradient');
    gradientTexts.forEach(text => {
      // Force redraw
      text.style.backgroundImage = 'none';
      void text.offsetWidth; // Trigger reflow
      text.style.backgroundImage = '';
    });
  }
  // Call on load and when night mode changes
  fixGradientText();
  document.addEventListener('nightModeToggle', fixGradientText);

    // Typewriter Effect with Delete
    const typewriterElements = document.querySelectorAll('.typewriter');
    typewriterElements.forEach(el => {
      const texts = JSON.parse(el.getAttribute('data-texts'));
      let currentText = 0;
      let currentChar = 0;
      let isDeleting = false;
      let typingSpeed = 100;
      
      function type() {
        const currentContent = texts[currentText];
        
        if (isDeleting) {
          el.textContent = currentContent.substring(0, currentChar - 1);
          currentChar--;
          typingSpeed = 50;
        } else {
          el.textContent = currentContent.substring(0, currentChar + 1);
          currentChar++;
          typingSpeed = 100;
        }
        
        if (!isDeleting && currentChar === currentContent.length) {
          typingSpeed = 2000;
          isDeleting = true;
        } else if (isDeleting && currentChar === 0) {
          isDeleting = false;
          currentText = (currentText + 1) % texts.length;
          typingSpeed = 500;
        }
        
        setTimeout(type, typingSpeed);
      }
      
      type();
    });
  
    // Testimonial Carousel with Dots
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
  
    function showTestimonial(index) {
      testimonialCards.forEach(card => {
        card.classList.remove('active');
        card.style.opacity = '0';
        card.style.transform = 'translateX(30px)';
      });
      
      dots.forEach(dot => dot.classList.remove('active'));
      
      testimonialCards[index].classList.add('active');
      testimonialCards[index].style.opacity = '1';
      testimonialCards[index].style.transform = 'translateX(0)';
      dots[index].classList.add('active');
      
      currentIndex = index;
    }
  
    // Arrow Navigation
    document.querySelector('.carousel-arrow.prev').addEventListener('click', () => {
      showTestimonial((currentIndex - 1 + testimonialCards.length) % testimonialCards.length);
    });
    
    document.querySelector('.carousel-arrow.next').addEventListener('click', () => {
      showTestimonial((currentIndex + 1) % testimonialCards.length);
    });
  
    // Dot Navigation
    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        showTestimonial(parseInt(dot.getAttribute('data-index')));
      });
    });

     /*  Testimonial Carousel
  const testimonialCards = document.querySelectorAll('.testimonial-card');
  const prevBtn = document.querySelector('.carousel-arrow.prev');
  const nextBtn = document.querySelector('.carousel-arrow.next');
  let currentIndex = 0;

  function showTestimonial(index) {
    testimonialCards.forEach((card, i) => {
      card.classList.toggle('active', i === index);
      
      // Add direction-based animation
      if (i === index) {
        card.style.transform = 'translateX(0)';
      } else if (i < index) {
        card.style.transform = 'translateX(-30px)';
      } else {
        card.style.transform = 'translateX(30px)';
      }
    });
  }

  prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + testimonialCards.length) % testimonialCards.length;
    showTestimonial(currentIndex);
  });

  nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % testimonialCards.length;
    showTestimonial(currentIndex);
  }); */

// Auto-rotate testimonials
let carouselInterval = setInterval(() => {
    showTestimonial((currentIndex + 1) % testimonialCards.length);
  }, 6000);

  // Pause on hover
  const carousel = document.querySelector('.testimonial-carousel');
  carousel.addEventListener('mouseenter', () => clearInterval(carouselInterval));
  carousel.addEventListener('mouseleave', () => {
    carouselInterval = setInterval(() => {
      showTestimonial((currentIndex + 1) % testimonialCards.length);
    }, 6000);
  });

  // Initialize first testimonial
  showTestimonial(0);
  

  
    // Typed Effect
  const typedElements = document.querySelectorAll('.typed');
  typedElements.forEach(el => {
    const items = JSON.parse(el.getAttribute('data-typed'));
    let currentItem = 0;
    
    function rotateText() {
      el.style.opacity = '0';
      el.style.transform = 'translateY(10px)';
      
      setTimeout(() => {
        el.textContent = items[currentItem];
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
        currentItem = (currentItem + 1) % items.length;
      }, 300);
      
      setTimeout(rotateText, 2000);
    }
    
    rotateText();
  });

  // Animated Counters
  function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    
    counters.forEach(counter => {
      const target = +counter.getAttribute('data-target');
      const count = +counter.innerText;
      const increment = target / speed;
      
      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(animateCounters, 1);
      } else {
        counter.innerText = target.toLocaleString();
      }
    });
  }

  // Initialize animations when hero is in view
  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      animateCounters();
      
      // Add animate-in class to elements
      document.querySelectorAll('[data-aos]').forEach(el => {
        el.classList.add('animate-in');
        el.classList.add(`delay-${el.dataset.aosDelay || '1'}`);
      });
      
      observer.unobserve(entries[0].target);
    }
  }, { threshold: 0.3 });

  observer.observe(document.getElementById('hero'));

  // Quick Donate Interaction
  const quickDonate = document.querySelector('.quick-donate');
  const donateOptions = document.querySelector('.donate-options');
  
  quickDonate.addEventListener('click', function(e) {
    if (e.target.closest('.donate-btn')) {
      donateOptions.style.display = 
        donateOptions.style.display === 'grid' ? 'none' : 'grid';
    }
  });
  
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.quick-donate')) {
      donateOptions.style.display = 'none';
    }
  });
  
  donateOptions.addEventListener('click', function(e) {
    if (e.target.tagName === 'BUTTON') {
      const amount = e.target.getAttribute('data-amount');
      console.log(`Quick Donate: $${amount}`);
      donateOptions.style.display = 'none';
    }
  });

  // Night Mode Text Gradient Fix
  document.addEventListener('nightModeToggle', function() {
    // Force redraw for gradient text
    const gradientText = document.querySelector('.text-gradient');
    gradientText.style.backgroundImage = 'none';
    setTimeout(() => {
      gradientText.style.backgroundImage = '';
    }, 10);
  });
});
  
    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-out-quad',
        once: true
      });
    }





  //ABOUT SECTION
  // About Section Animations and Functionality
document.addEventListener('DOMContentLoaded', function() {
  // Initialize AOS if available
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-out-quad',
      once: true
    });
  }

  // Animate timeline items on scroll
  const timelineItems = document.querySelectorAll('.timeline-item');
  const timelineObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  timelineItems.forEach(item => {
    timelineObserver.observe(item);
  });

  // Team member loading functionality
  const teamContainer = document.getElementById('teamMembersContainer');
  const loadTeamBtn = document.getElementById('loadTeamMembers');
  
  // Mock team data (replace with actual API call)
  const teamMembers = [
    {
      name: "Dr. Furqan",
      position: "Founder & Executive Director",
      bio: "Public health specialist with 15+ years experience in community development across East Africa.",
      photo: "./Images/Logo.enc"
    },
    {
      name: "Mr. Ayub",
      position: "Program Director",
      bio: "Education expert who has designed curriculum for 200+ schools in the region.",
      photo: "./Images/Logo.enc"
    },
    {
      name: "Miss Nasra",
      position: "Director of Partnerships",
      bio: "Former corporate leader who brings strategic development expertise to our team.",
      photo: "./Images/Logo.enc"
    }
  ];

  // Load initial team members
  loadTeamMembers();

  loadTeamBtn.addEventListener('click', function() {
    // In a real implementation, this would load more team members
    window.location.href = "team.html"; // Redirect to full team page
  });

  function loadTeamMembers() {
    teamMembers.forEach((member, index) => {
      const card = document.createElement('div');
      card.className = 'about-team-card';
      card.style.transitionDelay = `${index * 0.1}s`;
      card.innerHTML = `
        <div class="about-team-photo">
          <img src="${member.photo}" alt="${member.name}" class="about-team-img" loading="lazy">
        </div>
        <div class="about-team-info">
          <h3 class="about-team-name">${member.name}</h3>
          <p class="about-team-position">${member.position}</p>
          <p class="about-team-bio">${member.bio}</p>
        </div>
      `;
      
      teamContainer.appendChild(card);
      
      // Animate card into view
      setTimeout(() => {
        card.classList.add('visible');
      }, 50);
    });
  }

  // Dark mode toggle handling
  document.addEventListener('nightModeToggle', function() {
    // Force redraw for gradient text
    const gradientTexts = document.querySelectorAll('.about-main-title');
    gradientTexts.forEach(text => {
      text.style.backgroundImage = 'none';
      void text.offsetWidth; // Trigger reflow
      text.style.backgroundImage = '';
    });
  });
});










//VOLUNTEER SECTION
// Volunteer Section Interactions
document.addEventListener('DOMContentLoaded', function() {
  // Form Submission
  const volunteerForm = document.getElementById('volunteerForm');
  if (volunteerForm) {
    volunteerForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const submitBtn = this.querySelector('.submit-btn');
      const spinner = submitBtn.querySelector('.loading-spinner');
      
      // Show loading state
      submitBtn.disabled = true;
      spinner.style.opacity = '1';
      submitBtn.querySelector('span').textContent = 'Submitting...';
      
      // Simulate form submission (replace with actual AJAX call)
      setTimeout(() => {
        spinner.style.opacity = '0';
        submitBtn.querySelector('span').textContent = 'Submitted!';
        
        // Reset form after delay
        setTimeout(() => {
          volunteerForm.reset();
          submitBtn.querySelector('span').textContent = 'Submit Application';
          submitBtn.disabled = false;
          
          // Show success message
          const successMsg = document.createElement('div');
          successMsg.className = 'form-success';
          successMsg.textContent = 'Thank you! We\'ll contact you soon.';
          volunteerForm.appendChild(successMsg);
          
          setTimeout(() => {
            successMsg.style.opacity = '0';
            setTimeout(() => successMsg.remove(), 300);
          }, 3000);
        }, 1500);
      }, 2000);
    });
  }

  // Calendar Event Hover Effects
  const eventItems = document.querySelectorAll('.event-item');
  eventItems.forEach(item => {
    item.addEventListener('mouseenter', () => {
      item.style.transform = 'translateX(5px)';
    });
    item.addEventListener('mouseleave', () => {
      item.style.transform = '';
    });
  });

  // Partnership Option Buttons
  document.querySelectorAll('.option-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const cardType = this.closest('.option-card').classList.contains('corporate') ? 
        'corporate' : 'ngo';
      
      // You would replace this with actual navigation
      console.log(`Showing more ${cardType} partnership info`);
      
      // Temporary visual feedback
      this.textContent = 'Loading...';
      setTimeout(() => {
        this.textContent = 'Learn More';
      }, 1000);
    });
  });

  // Initialize animations if using AOS
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-out-quad',
      once: true
    });
  }
});









//BLOGS
// Newsletter Form Submission
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
  newsletterForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const emailInput = this.querySelector('input[type="email"]');
    const submitBtn = this.querySelector('button');
    
    // Simple validation
    if (!emailInput.value || !emailInput.value.includes('@')) {
      emailInput.style.border = '1px solid #ff6b6b';
      setTimeout(() => {
        emailInput.style.border = 'none';
      }, 2000);
      return;
    }
    
    // Animation
    submitBtn.innerHTML = '<i class="fas fa-check"></i>';
    submitBtn.style.backgroundColor = '#2ecc71';
    
    // Reset after animation
    setTimeout(() => {
      emailInput.value = '';
      submitBtn.innerHTML = '<span>Subscribe</span><i class="fas fa-paper-plane"></i>';
      submitBtn.style.backgroundColor = '';
    }, 2000);
    
    // Here you would normally send the data to your server
    console.log('Subscribed email:', emailInput.value);
  });
}

// Intersection Observer for blog cards
const blogCards = document.querySelectorAll('.blog-card');
if (blogCards.length > 0) {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animation = `fadeInUp 0.6s forwards`;
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  blogCards.forEach((card, index) => {
    card.style.setProperty('--order', index);
    observer.observe(card);
  });
}

















//ALL BLOG PAGE
// blog.js - For View All page
document.addEventListener('DOMContentLoaded', function() {
  // Filter functionality
  const categoryFilter = document.getElementById('category-filter');
  const yearFilter = document.getElementById('year-filter');
  const blogCards = document.querySelectorAll('.blog-card');

  function filterBlogs() {
    const selectedCategory = categoryFilter.value;
    const selectedYear = yearFilter.value;

    blogCards.forEach(card => {
      const cardCategory = card.querySelector('.blog-card-category').textContent.toLowerCase();
      const cardYear = card.querySelector('time').getAttribute('datetime').substring(0,4);

      const categoryMatch = selectedCategory === 'all' || cardCategory.includes(selectedCategory);
      const yearMatch = selectedYear === 'all' || cardYear === selectedYear;

      if (categoryMatch && yearMatch) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  }

  categoryFilter.addEventListener('change', filterBlogs);
  yearFilter.addEventListener('change', filterBlogs);

  // Pagination (simplified example)
  const pageNumbers = document.querySelectorAll('.page-number');
  pageNumbers.forEach(number => {
    number.addEventListener('click', function(e) {
      e.preventDefault();
      pageNumbers.forEach(n => n.classList.remove('active'));
      this.classList.add('active');
      // In real implementation, load new content via AJAX
    });
  });
});

















// CONTACT SECTION
// Form Validation
document.querySelector('.contact-form').addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Add your form submission logic here
  console.log('Form submitted!');
  alert('Thank you for your message! We will respond shortly.');
  
  // Reset form
  this.reset();
});

// Intersection Observer for animations
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = 1;
      entry.target.style.transform = 'translateY(0)';
    }
  });
});

document.querySelectorAll('.contact-card, .contact-form').forEach((el) => {
  el.style.opacity = 0;
  el.style.transform = 'translateY(20px)';
  observer.observe(el);
});









//LIVE CHAT
// Live Chat Implementation
document.addEventListener('DOMContentLoaded', function() {
  const chatToggle = document.querySelector('.chat-toggle');
  const chatWidget = document.querySelector('.chat-widget');
  const chatClose = document.querySelector('.chat-close');
  const chatOverlay = document.querySelector('.chat-overlay');
  const chatInput = document.getElementById('chat-input');
  const chatSend = document.querySelector('.chat-send');
  const chatMessages = document.getElementById('chat-messages');
  
  // Toggle Chat
  function toggleChat() {
    chatWidget.classList.toggle('active');
    chatOverlay.classList.toggle('active');
    
    if (chatWidget.classList.contains('active')) {
      // Initialize chat when opened
      initializeChat();
    }
  }
  
  chatToggle.addEventListener('click', toggleChat);
  chatClose.addEventListener('click', toggleChat);
  
  // Close when clicking outside
  chatOverlay.addEventListener('click', toggleChat);
  
  // Prevent propagation when clicking chat
  chatWidget.addEventListener('click', function(e) {
    e.stopPropagation();
  });
  
  // Send message
  function sendMessage() {
    const message = chatInput.value.trim();
    if (message) {
      addMessage(message, 'user');
      chatInput.value = '';
      
      // Simulate API call (replace with real API integration)
      simulateAgentResponse(message);
    }
  }
  
  chatSend.addEventListener('click', sendMessage);
  
  chatInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      sendMessage();
    }
  });
  
  // Add message to chat
  function addMessage(text, sender) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('chat-message', `message-${sender}`);
    messageDiv.textContent = text;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }
  
  // Simulate agent response (replace with real API)
  function simulateAgentResponse(userMessage) {
    setTimeout(() => {
      let response;
      
      if (userMessage.toLowerCase().includes('donation')) {
        response = "For donations, visit our secure donation page at [link]. Would you like me to guide you through the process?";
      } else if (userMessage.toLowerCase().includes('tax')) {
        response = "All donations are tax-deductible. We'll email you a receipt immediately after your donation.";
      } else {
        response = "Thank you for your message! Our support team will respond shortly. In the meantime, you might find answers in our <a href='/faq'>FAQ</a>.";
      }
      
      addMessage(response, 'agent');
    }, 1000);
  }
  
  // Initialize Chat (API Integration)
  function initializeChat() {
    // Replace with actual API initialization
    console.log("Initializing chat with LiveChat/Zendesk API");
    
    // Example for LiveChat:
    // window.__lc = window.__lc || {};
    // window.__lc.license = YOUR_LICENSE_ID;
    // (function() {
    //   var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    //   lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    //   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    // })();
    
    // For Zendesk:
    // zE('webWidget', 'show');
  }
  
  // Unread message badge
  function updateUnreadBadge(count) {
    const badge = document.querySelector('.chat-badge');
    if (count > 0) {
      badge.textContent = count;
      badge.style.display = 'flex';
    } else {
      badge.style.display = 'none';
    }
  }
  
  // Example: Simulate unread message
  setTimeout(() => {
    updateUnreadBadge(1);
  }, 5000);
});














//TRUSTED DONORS
// Pause animation on hover
const donorCards = document.querySelectorAll('.donor-card-inner');
const carousel = document.querySelector('.donor-carousel');

donorCards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        carousel.style.animationPlayState = 'paused';
    });
    
    card.addEventListener('mouseleave', () => {
        carousel.style.animationPlayState = 'running';
    });
});

// Manual navigation
document.querySelector('.carousel-nav.prev').addEventListener('click', () => {
    carousel.style.animationPlayState = 'paused';
    // In a real implementation, you'd move to previous item
    setTimeout(() => {
        carousel.style.animationPlayState = 'running';
    }, 2000);
});

document.querySelector('.carousel-nav.next').addEventListener('click', () => {
    carousel.style.animationPlayState = 'paused';
    // In a real implementation, you'd move to next item
    setTimeout(() => {
        carousel.style.animationPlayState = 'running';
    }, 2000);
});

// Touch support for mobile
let touchStartX = 0;
carousel.addEventListener('touchstart', (e) => {
    touchStartX = e.touches[0].clientX;
    carousel.style.animationPlayState = 'paused';
}, {passive: true});

carousel.addEventListener('touchend', (e) => {
    const touchEndX = e.changedTouches[0].clientX;
    if (Math.abs(touchEndX - touchStartX) > 50) {
        // Swipe detected - would navigate in full implementation
    }
    setTimeout(() => {
        carousel.style.animationPlayState = 'running';
    }, 1000);
}, {passive: true});













//SOCIAL LINKS
// Social Media Feed Controller
document.addEventListener('DOMContentLoaded', function() {
  // Tab Switching
  const tabBtns = document.querySelectorAll('.tab-btn');
  const feeds = document.querySelectorAll('.social-feed');
  
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Update active tab
      tabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      
      // Show corresponding feed
      const tabName = btn.dataset.tab;
      feeds.forEach(feed => {
        feed.classList.remove('active');
        if(feed.classList.contains(`${tabName}-feed`)) {
          feed.classList.add('active');
        }
      });
      
      // Lazy load content when tab becomes active
      if(tabName === 'instagram') loadInstagramFeed();
      if(tabName === 'twitter') loadTwitterFeed();
    });
  });
  
  // Load Instagram Feed
  async function loadInstagramFeed() {
    const feedContainer = document.getElementById('instafeed');
    if(feedContainer.children.length > 3) return; // Already loaded
    
    try {
      // Simulate API call (replace with actual Instagram API)
      await new Promise(resolve => setTimeout(resolve, 1000));
      
      // Mock data - replace with real API response
      const mockData = [
        { id: 1, image: './Images/Logo.enc', likes: 142, comments: 23 },
        { id: 2, image: './Images/bird.jpeg', likes: 89, comments: 12 },
        { id: 3, image: './Images/foa.jpg', likes: 210, comments: 45 },
        { id: 4, image: './Images/istockphoto-1373659740-1024x1024.jpg', likes: 76, comments: 8 },
        { id: 5, image: './Images/download (3).jpg', likes: 185, comments: 32 },
        { id: 6, image: './Images/cat.png', likes: 54, comments: 5 }
      ];
      
      feedContainer.innerHTML = '';
      mockData.forEach(post => {
        feedContainer.innerHTML += `
          <a href="#" class="insta-card">
            <img src="${post.image}" alt="Instagram post ${post.id}" loading="lazy">
            <div class="insta-overlay">
              <span><i class="fas fa-heart"></i> ${post.likes}</span>
              <span><i class="fas fa-comment"></i> ${post.comments}</span>
            </div>
          </a>
        `;
      });
    } catch (error) {
      feedContainer.innerHTML = `
        <div class="feed-error">
          Couldn't load Instagram feed. <a href="https://instagram.com/yourngo" target="_blank">Visit our profile</a>.
        </div>
      `;
    }
  }
  
  // Load Twitter Feed
  function loadTwitterFeed() {
    const container = document.getElementById('tweetfeed');
    if(container.children.length > 0) return;
    
    // Using Twitter's widget.js
    if(typeof twttr !== 'undefined') {
      twttr.widgets.createTimeline(
        {
          sourceType: 'profile',
          screenName: 'yourngo'
        },
        container,
        {
          height: 600,
          theme: body.classList.contains('dark-mode') ? 'dark' : 'light'
        }
      );
    } else {
      container.innerHTML = `
        <div class="tweet-card">
          <p>Follow us on <a href="https://twitter.com/yourngo" target="_blank">Twitter</a> for updates</p>
        </div>
      `;
    }
  }
  
  // Initialize Facebook SDK
  window.fbAsyncInit = function() {
    FB.init({
      appId            : 'your-app-id',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v12.0'
    });
  };
  
  // Share Functionality
  document.querySelectorAll('.share-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const platform = this.classList.contains('twitter') ? 'twitter' :
                     this.classList.contains('facebook') ? 'facebook' : 'linkedin';
      shareContent(platform);
    });
  });
  
  function shareContent(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    const text = encodeURIComponent("Check out this amazing initiative!");
    
    let shareUrl;
    switch(platform) {
      case 'twitter':
        shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${text}&hashtags=Charity,GoodWork`;
        break;
      case 'facebook':
        shareUrl = `https://www.facebook.com/groups/551152913022228.php?u=${url}`;
        break;
      case 'linkedin':
        shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
        break;
    }
    
    window.open(shareUrl, '_blank', 'width=600,height=400');
  }
  
  // Copy URL Functionality
  document.querySelector('.copy-btn').addEventListener('click', function() {
    const urlInput = document.getElementById('share-url');
    urlInput.select();
    document.execCommand('copy');
    
    const originalText = this.innerHTML;
    this.innerHTML = '<i class="fas fa-check"></i> Copied!';
    setTimeout(() => {
      this.innerHTML = originalText;
    }, 2000);
  });
  
  // Load initial feed
  loadInstagramFeed();
});

// Load Facebook SDK
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Load Twitter Widgets
(function(d, s, id) {
  var js, tjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  tjs.parentNode.insertBefore(js, tjs);
}(document, 'script', 'twitter-wjs'));























// CONTACT SECTION PHP
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();
  
  const form = e.target;
  const formData = new FormData(form);
  const responseMessage = document.getElementById('responseMessage');
  
  fetch(form.action, {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      responseMessage.textContent = data.message;
      responseMessage.className = 'response-message ' + (data.success ? 'success' : 'error');
      
      if (data.success) {
          form.reset();
      }
  })
  .catch(error => {
      responseMessage.textContent = 'An error occurred. Please try again.';
      responseMessage.className = 'response-message error';
  });
});







// FOOTER
// Newsletter Form Submission
document.querySelector('.newsletter-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const email = this.querySelector('input').value;
    
    // Replace with actual AJAX call
    console.log('Subscribed email:', email);
    
    // Show confirmation
    this.innerHTML = `
      <div class="newsletter-success">
        <i class="fas fa-check-circle"></i>
        <p>Thank you for subscribing!</p>
      </div>
    `;
    
    // Add CSS for success message
    const style = document.createElement('style');
    style.textContent = `
      .newsletter-success {
        text-align: center;
        padding: 10px;
      }
      .newsletter-success i {
        color: #4CAF50;
        font-size: 2rem;
        margin-bottom: 10px;
      }
    `;
    document.head.appendChild(style);
  });

  function toggleNightMode() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('nightMode', document.body.classList.contains('dark-mode'));

      // Update footer-specific classes if needed
  document.querySelector('.footer').classList.toggle('dark-mode');
}
