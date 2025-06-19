<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horn Cummunity Care Organization</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./global.css">
  <style>
    nav ul {
      list-style: none;
      display: flex;
      gap: 1.5rem;
    }
    nav a {
      color: white;
      text-decoration: none;
      font-weight: 500;
    }
    .dropdown-menu {
      display: none;
      position: absolute;
      background: #005EB8;
      top: 100%;
      left: 0;
      padding: 0.5rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      min-width: 200px;
    }
    .dropdown-menu a {
      display: block;
      color: #333;
      padding: 0.5rem 0;
    }
    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
    }
    .dropdown-menu.show {
      display: block !important;
    }

    .mobile-nav ul {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.5rem; /* optional spacing between links */
}


   
  </style>
</head>
<body>
 <!-- Header Section -->
 <header class="header">
    <div class="container">
      <!-- Logo + NGO Name -->
      <a href="index.php" class="logo">
        <img src="./assets/images/newlogo.png" alt="Horn Cummunity Care Organization Logo" width="40">
        <span>Horn Cummunity Care Organization</span>
      </a>

      <!-- Desktop Navigation -->


      <nav class="desktop-nav" id="mobile-nav">
        <ul id="nav-menu">
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about-org" class="active">About us</a></li>
          <li class="dropdown">
            <a href="#what-we-do" onclick="toggleDropdown(event)">Programs <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-menu" id="dropdown-menu">
              <a href="emergency.php">Emergency</a>
              <a href="humanright.php">Human Right</a>
              <a href="sustainability.php">Sustainability</a>
            </div>
          </li>
          <li><a href="#update-stories">Updates</a></li>
          <li><a href="#partners">Partner</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>

      <!-- Header Actions -->
      <div class="header-actions">
        <button id="night-mode-toggle" aria-label="Toggle Dark Mode">
          <i class="fas fa-moon"></i>
        </button>
        <!-- <a href="donate.html" class="btn-donate">Donate Now</a> -->
        <button class="mobile-menu-toggle" aria-label="Mobile Menu">
          <span class="menu-bar"></span>
          <span class="menu-bar"></span>
          <span class="menu-bar"></span>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
      <div class="mobile-menu-container">
        <div class="mobile-menu-header">
          <a href="index.php" class="mobile-logo">
            <img src="./assets/images/newlogo.png" alt="Horn Cummunity Care Organization Logo" width="40">
            <span>Horn Cummunity Care Organization</span>
          </a>
          <button class="mobile-menu-close">
            <span class="close-line"></span>
            <span class="close-line"></span>
          </button>
        </div>
        
        <nav class="mobile-nav">
          <ul>
            <li><a href="#hero" class="active">Home</a></li>
            <li><a href="#about-org" class="active">About us</a></li>
            <li class="mobile-dropdown"> 
              <button class="mobile-dropdown-btn">
               Programs <i class="fas fa-chevron-down"></i>
              </button>
              <div class="mobile-dropdown-menu">
                <a href="emergency.php">Emergency</a>
                <a href="humanright.php">Human Right</a>
                <a href="sustainability.php">Sustainability</a>
              </div>
            </li>
            <li><a href="#update-stories">Updates</a></li>
            <li><a href="#partners">Partner</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav>
        
        <div class="mobile-menu-footer">
          <!-- <a href="donate.html" class="btn-donate-mobile">Donate Now</a> -->
        </div>
      </div>
    </div>
    
    <div class="mobile-menu-overlay"></div>
  </header>



  
<section class="hero-slider-section" id="hero">
  <div class="hero-slider">
  <div class="slide" style="background-image: url('../assets/images/fr.jpg');"></div>
  <div class="slide" style="background-image: url('../assets/images/odayal.jpg');"></div>
  <div class="slide" style="background-image: url('../assets/images/wash.jpg');"></div>
  <div class="slide" style="background-image: url('../assets/images/food-security.jpg');"></div>
  <div class="slide" style="background-image: url('../assets/images/Health-and-Nutrition.jpg');"></div>
  <div class="slide" style="background-image: url('../assets/images/humanaterian.jpeg');"></div>
</div>

  <div class="hero-overlay"></div>

  <div class="hero-content">
    <h1 class="hero-title">About Us</h1>
    <p class="hero-subtext">
    We focus on ensuring that communities have sustainable solutions that will benefit them for generations.
    </p>
  </div>

  <!-- QUOTES SECTION -->
  <div class="quote-carousel">
    <div class="quote-card" id="quote-text">“Human rights are the foundation of a peaceful and sustainable world. 
      Empowering marginalized communities and ensuring their access to resources and opportunities is not just a moral obligation, but a pathway to shared prosperity.”</div>
    <div class="quote-controls">
      <button class="arrow" id="prev-quote">&#10094;</button>
      <div class="quote-dots" id="quote-dots"></div>
      <button class="arrow" id="next-quote">&#10095;</button>
    </div>
  </div>
</section>


<!-- Professional Section -->
<section class="professional-section" id="about-org">
  <div class="container">
    <div class="row align-items-center">
      <!-- Image Column (Left on desktop, top on mobile) -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="professional-img-container">
          <img src="./assets/images/fr.jpg" 
               alt="Professional workspace" 
               class="img-fluid rounded shadow-lg">
        </div>
      </div>
      
      <!-- Text Content Column (Right on desktop, bottom on mobile) -->
      <div class="col-lg-6">
        <div class="professional-text-content">
          <h2 class="section-title">Our Approach</h2>
          <p>
            HCCO combines professional expertise with community-focused solutions to create lasting impact. Our team brings together diverse skills and experiences to address complex challenges in the Horn of Africa region.
          </p>
          <p>
            With a commitment to transparency and accountability, we implement programs that are both effective and sustainable. Our professional standards ensure that every initiative meets rigorous quality benchmarks while remaining responsive to community needs.
          </p>
          <a href="#contact" class="modern-submit-btn">Contact Our Team</a>
        </div>
      </div>
    </div>
  </div>
</section>





    <!-- Wo we are -->
    <!-- Mission/Vision/Values -->
  <section class="about-org-section" id="about-org">
    <div class="about-container">
      <div class="about-header about-header-animate" data-aos="fade-up">
        <h2 class="section-title">Who we are</h2>
        <p class="section-subtitle">The pillars that guide our work</p>
      </div>
  
      <div class="about-pillars-grid">
        <!-- Mission -->
        <div class="about-pillar about-pillar-mission" data-aos="fade-up" data-aos-delay="100">
          <div class="pillar-icon-box">
            <div class="pillar-icon-circle">
              <i class="fas fa-bullseye pillar-icon"></i>
            </div>
          </div>
          <h3 class="pillar-title">Mission</h3>
          <p class="pillar-desc">HCCO is dedicated to Support the underserved communities and hard-to-reach areas 
            by providing the basic services and building sustainable programs that can last for generations .</p>
          <div class="pillar-wave-anim"></div>
        </div>
  
        <!-- Vision -->
        <div class="about-pillar about-pillar-vision" data-aos="fade-up" data-aos-delay="200">
          <div class="pillar-icon-box">
            <div class="pillar-icon-circle">
              <i class="fas fa-eye pillar-icon"></i>
            </div>
          </div>
          <h3 class="pillar-title">Vision</h3>
          <p class="pillar-desc">At Horn Community Care Organization, our vision is to create and build for the communities a sustainable 
            solution where they can access the essential services on their own independently, without the need for ongoing support. </p>
          <div class="pillar-wave-anim"></div>
        </div>
  
        <!-- Values -->
        <div class="about-pillar about-pillar-values" data-aos="fade-up" data-aos-delay="300">
          <div class="pillar-icon-box">
            <div class="pillar-icon-circle">
              <i class="fas fa-heart pillar-icon"></i>
            </div>
          </div>
          <h3 class="pillar-title">Core Values</h3>
          <ul class="about-values-list">
            <li class="value-item">
              <span class="value-name">Honest</span>
              <!-- <span class="value-desc">People-first approach</span> WAA MUHIIM BARI KA MAALIN -->
            </li>
            <li class="value-item">
              <span class="value-name">Respect</span>
            </li>
            <li class="value-item">
              <span class="value-name">Integrity</span>
            </li>
            <li class="value-item">
              <span class="value-name">Transparency</span>
            </li>
            <li class="value-item">
              <span class="value-name">Accountability</span>
            </li>
            <li class="value-item">
              <span class="value-name">Gender Sensitivity</span>
            </li>
          </ul>
          <div class="pillar-wave-anim"></div>
        </div>
      </div>
    </div>
</section>



<!-- Modern What We Do Section -->
<section class="services-section" id="what-we-do">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <h2 class="section-title">Our Programs & Services</h2>
      <p class="section-subtitle">Building stronger communities through comprehensive initiatives</p>
    </div>

    <div class="services-grid">
      <!-- Emergency Card -->
      <div class="service-card" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card__inner">
          <div class="service-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M12 8V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="service-title">Emergency Response</h3>
          <div class="service-content">
            <p>HCCO has strong experience in humanitarian emergency response across multiple sectors, providing critical aid when communities need it most.</p>
            <ul class="service-features">
              <li>Rapid disaster assessment</li>
              <li>Emergency food distribution</li>
              <li>Medical aid coordination</li>
            </ul>
          </div>
          <a href="./emergency.php" class="service-link">
            Learn More
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
              <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Human Rights Card -->
      <div class="service-card" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card__inner">
          <div class="service-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14 2V8H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M12 18V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M9 15H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="service-title">Human Rights Programs</h3>
          <div class="service-content">
            <p>We champion the rights of women, children, and marginalized groups through advocacy, education, and community empowerment initiatives.</p>
            <ul class="service-features">
              <li>Gender equality programs</li>
              <li>Child protection services</li>
              <li>Legal advocacy</li>
            </ul>
          </div>
          <a href="./humanright.php" class="service-link">
            Learn More
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
              <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Sustainability Card -->
      <div class="service-card" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card__inner">
          <div class="service-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 2H17V5H21V9H17V12H21V16H17V19H21V22H3V19H7V16H3V12H7V9H3V5H7V2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M7 5H17V9H7V5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M7 12H17V16H7V12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="service-title">Sustainable Development</h3>
          <div class="service-content">
            <p>Our sustainable development programs focus on creating long-term solutions that empower communities to thrive independently.</p>
            <ul class="service-features">
              <li>Water & sanitation projects</li>
              <li>Agricultural development</li>
              <li>Education initiatives</li>
            </ul>
          </div>
          <a href="./sustainability.php" class="service-link">
            Learn More
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
              <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>






<!-- LETEST UPDATE SECTION -->
 <?php
include('./includes/db.php');

// Fetch all updates (latest first)
$sql = "SELECT * FROM updates WHERE deleted_at IS NULL ORDER BY created_at DESC";
$result = $conn->query($sql);
$updates = [];
while ($row = $result->fetch_assoc()) {
  $updates[] = $row;
}
?>

<section class="updates-section" id="update-stories">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Latest Updates</h2>
      <p class="section-subtitle">Stay informed with our recent activities and news</p>
    </div>

    <div class="updates-carousel">
      <button class="carousel-arrow arrow-prev" aria-label="Previous updates">
        <i class="fas fa-chevron-left"></i>
      </button>
      
      <div class="carousel-track" id="carouselTrack">
        <?php foreach ($updates as $update): ?>
          <div class="update-card">
            <div class="update-inner">
              <div class="update-image">
                <img src="./admin/uploads/updates/<?php echo htmlspecialchars($update['image']); ?>" 
                     alt="<?php echo htmlspecialchars($update['title']); ?>" 
                     class="update-img">
                <div class="update-badge">
                  <span class="badge-date"><?php echo date("M d, Y", strtotime($update['created_at'])); ?></span>
                </div>
              </div>
              <div class="update-content">
                <h3 class="update-title"><?php echo htmlspecialchars($update['title']); ?></h3>
                <p class="update-snippet"><?php echo htmlspecialchars($update['short_text']); ?></p>
                <div class="update-footer">
                  <a href="view-update.php?id=<?php echo $update['id']; ?>" class="read-more-btn">
                    Read More <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      
      <button class="carousel-arrow arrow-next" aria-label="Next updates">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>

    <div class="view-all-container">
      <!-- <a href="./all-updates.php" class="view-all-btn">
        View All Updates <i class="fas fa-long-arrow-alt-right"></i>
      </a> -->
    </div>
  </div>
</section>




<!-- get newsletter -->
<!-- Animated Newsletter Section -->
<section class="animated-newsletter">
  <div class="animated-newsletter__container">
    <div class="animated-newsletter__content">
      <div class="animated-newsletter__text" data-aos="fade-up">
        <h2 class="animated-newsletter__title">Stay Connected</h2>
        <p class="animated-newsletter__subtitle">Join our community for exclusive updates</p>
      </div>
      
      <form id="animated-newsletter-form" class="animated-newsletter__form" data-aos="fade-up" data-aos-delay="100">
        <div class="animated-input__wrapper">
          <input type="email" id="animated-newsletter-email" required>
          <label for="animated-newsletter-email">Your email address</label>
          <div class="animated-input__underline"></div>
          <button type="submit" class="animated-newsletter__submit">
            <span>Subscribe</span>
            <div class="submit-arrow">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </button>
        </div>
        <p class="animated-newsletter__disclaimer">We respect your privacy. Unsubscribe anytime.</p>
      </form>
    </div>
  </div>

  <!-- Animated Notification -->
  <div id="animated-toast" class="animated-toast"></div>
</section>








<!-- OUR TRUSTED PARTENS -->
<section class="partners-section" id="partners">
  <h2 class="section-title"> Our Trusted Partners</h2>
  <div class="partner-slider" id="partnerSlider">
    <div class="logo-track" id="logoTrack">
      <!-- Logo 1 -->
      <a href="https://sodma.gov.so/" target="_blank" class="logo-item" title="SODMA">
        <img src="./assets/images/SODMA.png" alt="Partner SOSMA">
      </a>
      <!-- Logo 2 -->
      <a href="https://partner2.com" target="_blank" class="logo-item" title="SOSDA">
        <img src="./assets/images/SOSDA.jpg" alt="Partner SOSDA">
      </a>
      <!-- Duplicate for infinite loop -->
      <a href="https://sodma.gov.so/" target="_blank" class="logo-item" title="SODMA">
        <img src="./assets/images/SODMA.png" alt="Partner  SOSMA">
      </a>
      <a href="https://partner2.com" target="_blank" class="logo-item" title="SOSDA">
        <img src="./assets/images/SOSDA.jpg" alt="Partner SOSDA">
      </a>
    </div>
  </div>
</section>







<!-- Modern Contact Section -->
<section class="contact-section" id="contact">
  <div class="contact-container">
    <div class="contact-header" data-aos="fade-up">
      <h2 class="section-title">Get in Touch</h2>
      <p class="section-subtitle">We'd love to hear from you!</p>
    </div>
    
    <div class="contact-grid">
      <!-- Contact Info Card -->
      <div class="contact-info-card" data-aos="fade-right">
        <div class="contact-info-content">
          <img src="./assets/images/newlogo.png" alt="Horn Community Care Organization" class="contact-logo">
          
          <div class="contact-info-group">
            <div class="contact-info-item">
              <i class="fas fa-map-marker-alt"></i>
              <div>
                <h3>Our Location</h3>
                <p>Puntland, Somalia</p>
                <p>Galkayo Israac</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <i class="fas fa-phone-alt"></i>
              <div>
                <h3>Phone Number</h3>
                <p>+252 906 294645</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <i class="fas fa-envelope"></i>
              <div>
                <h3>Email Address</h3>
                <p>info@hcco.org</p>
              </div>
            </div>
          </div>
          
          <div class="contact-social">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      
      <!-- Contact Form -->
      <div class="contact-form-card" data-aos="fade-left">
        <form id="modernContactForm" class="modern-contact-form">
          <div class="form-group">
            <input type="text" id="contactName" name="name" required>
            <label for="contactName">Your Name</label>
            <div class="form-underline"></div>
          </div>
          
          <div class="form-group">
            <input type="email" id="contactEmail" name="email" required>
            <label for="contactEmail">Your Email</label>
            <div class="form-underline"></div>
          </div>
          
          <div class="form-group">
            <textarea id="contactMessage" name="message" rows="5" required></textarea>
            <label for="contactMessage">Your Message</label>
            <div class="form-underline"></div>
          </div>
          
          <button type="submit" class="modern-submit-btn">
            <span>Send Message</span>
            <div class="submit-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </button>
        </form>
      </div>
    </div>
    
    <!-- Map Section -->
    <div class="contact-map" data-aos="fade-up">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.230888566051!2d45.35193191432399!3d6.769204222336747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3d66f5d4065dd945%3A0xc92d083e0d9cfcc3!2sGalkayo%2C%20Somalia!5e0!3m2!1sen!2sso!4v1620640485473!5m2!1sen!2sso" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
  
  <!-- Modern Toast Notification -->
  <div id="modernContactToast" class="modern-contact-toast" aria-live="polite"></div>
</section>




<!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">
      <!-- Footer Top Section -->
      <div class="footer-top">
        <!-- NGO Info Column -->
        <div class="footer-col footer-about">
          <a href="index.php" class="footer-logo">
            <img src="./assets/images/newlogo.png" alt="Horn Care Cummunity Organization" width="180">
          </a>
          <p class="footer-about-text">
            HCCO has strong and diverse experience in humanitarian emergency response programming across a wide range of areas
          </p>
          <div class="footer-social">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
  
        <!-- Quick Links Column -->
        <div class="footer-col">
          <h3 class="footer-title">Quick Links</h3>
          <ul class="footer-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#professional">About Us</a></li>
            <li><a href="#update-stories">Updates</a></li>
            <li><a href="#partners">Partener</a></li>
            <li><a href="#contact">Contact Us</a></li>
          </ul>
        </div>
  
        <!-- Programs Column -->
        <div class="footer-col">
          <h3 class="footer-title">Our Programs</h3>
          <ul class="footer-links">
            <li><a href="emergency.php">Emergency</a></li>
            <li><a href="humanright.php">Human Right</a></li>
            <li><a href="sustainability.php">Sustainability</a></li>
          </ul>
        </div>
  
        <!-- Newsletter Column -->
        <div id="alert-box" class="alert-box"></div>
        
        <div class="footer-col footer-newsletter">
          <h3 class="footer-title">Contact Us</h3>
          

          <div class="footer-contact">
            <p><i class="fas fa-envelope"></i> info@hcco.org</p>
            <p><i class="fas fa-phone-alt"></i> +252 906 294 645</p>
            <p><i class="fas fa-map-marker-alt"></i> Somalia Puntland State<br>Galkayo, Israac</p>
          </div>
        </div>
      </div>
  
      <!-- Footer Bottom Section -->
      <div class="footer-bottom">
        <div class="footer-bottom-content">
          <p>&copy; 2025 Horn Cummunity Care Organization. All rights reserved.</p>
          <div class="footer-legal">
            <a href="privacy.html">Privacy Policy</a>
            <a href="terms.html">Terms of Service</a>
            <!-- <a href="financials.html">Financial Reports</a> -->
          </div>
        </div>
      </div>
  
    </div>
  </footer>



<script src="./global.js"></script>
<!-- LATTEST UPDATE SECTION -->
<script>
    function toggleMobileMenu() {
      document.getElementById('mobile-nav').classList.toggle('show');
    }

    function toggleDropdown(e) {
      if (window.innerWidth < 992) {
        e.preventDefault();
        document.getElementById('dropdown-menu').classList.toggle('show');
      }
    }
    
  // <!-- LATTEST UPDATE SECTION -->
   let currentIndex = 0;
    const track = document.getElementById('carouselTrack');
    const cards = document.querySelectorAll('.update-card');
    const cardCount = cards.length;
    const visibleCards = 3;

    function updateCarousel() {
      const scrollWidth = track.clientWidth / visibleCards;
      const offset = currentIndex * scrollWidth;
      track.style.transform = `translateX(-${offset}px)`;
    }

    function moveCarousel(direction) {
      currentIndex += direction;
      const maxIndex = Math.max(0, cardCount - visibleCards);
      if (currentIndex < 0) currentIndex = 0;
      if (currentIndex > maxIndex) currentIndex = maxIndex;
      updateCarousel();
    }

    window.addEventListener('resize', updateCarousel);
    updateCarousel();







    // OUR TRUSTED PARTENERS
    // Ensure only hover on logos pauses animation (not full wrapper)
// JS fallback to pause all on hover
const track = document.getElementById('logoTrack');
const items = document.querySelectorAll('.logo-item');

items.forEach(item => {
  item.addEventListener('mouseenter', () => {
    track.style.animationPlayState = 'paused';
  });
  item.addEventListener('mouseleave', () => {
    track.style.animationPlayState = 'running';
  });
});





// NEWS LETTER SUBSCRIBE FORM
// document.getElementById('subscribe-form').addEventListener('submit', function (e) {
//   e.preventDefault(); // Prevent page reload

//   const email = document.getElementById('email').value;
//   const alertBox = document.getElementById('alert-box');

//   fetch('subscribe.php', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/x-www-form-urlencoded'
//     },
//     body: 'email=' + encodeURIComponent(email)
//   })
//   .then(response => response.text())
//   .then(data => {
//     alertBox.innerText = data;
//     alertBox.className = 'alert-box show'; // reset + show

//     if (data.toLowerCase().includes('error') || data.toLowerCase().includes('invalid') || data.toLowerCase().includes('already')) {
//       alertBox.classList.add('error');
//     }

//     setTimeout(() => {
//       alertBox.classList.remove('show'); // hide after 5 sec
//     }, 5000);

//     document.getElementById('email').value = ''; // clear input
//   })
//   .catch(err => {
//     alertBox.innerText = 'Something went wrong!';
//     alertBox.className = 'alert-box error show';

//     setTimeout(() => {
//       alertBox.classList.remove('show');
//     }, 5000);
//   });
// });
</script>






</body>
</html>