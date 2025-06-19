<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Human right Section</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/global.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .main-title {
      font-weight: bold;
      color: #005eb8;
      margin-top: 60px;
    }
    p, ul, ol {
      color: black;
    }
        .footer-about-text {
      color: white;
    }
    .footer-contact > p {
      color: white;
    }
    .footer-bottom-content > p {
      color: white;
    }
    body.dark-mode p,
    body.dark-mode ol,
    body.dark-mode ul {
      color: white;
    }
    .subtitle {
      font-size: 1.8rem;
      color: #005eb8;
    }
    .contact-box {
      background: #f8f9fa;
      padding: 1rem;
      border-left: 4px solid #000;
    }

    body.dark-mode .contact-box {
      background: #1a202c;
    }
    .additional-resources img,
    .press-release img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 1.5rem;
      flex-wrap: wrap;
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
      gap: 0.5rem;
      padding: 1rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      min-width: 200px;
      z-index: 1000;
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
    .mobile-nav ul {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    @media (max-width: 768px) {
      nav.desktop-nav {
        display: none;
      }
      .dropdown-toggle {
        display: inline-block;
      }
      .header-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
      }
      .mobile-menu {
        display: block;
      }
      .mobile-menu span {
          color: #fff;
      }
    }
    .btn-donate-mobile,
    .btn-donate {
      background-color: #005EB8;
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 5px;
      font-weight: bold;
    }

       
    
    /* Desktop nav */
.desktop-nav a,
.desktop-nav .dropdown > a,
.dropdown-menu a {
  position: relative;
  display: inline-block;
  padding: 0.25rem 0;
  text-decoration: none;
  color: white;
  transition: color 0.3s ease;
}

.desktop-nav a::after,
.desktop-nav .dropdown > a::after,
.dropdown-menu a::after {
 content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background-color: #ffdf5d;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease;
}

.desktop-nav a:hover::after,
.desktop-nav a.active:hover::after,
.desktop-nav .dropdown > a:hover::after,
.dropdown-menu a:hover::after {
  transform: scaleX(1);
}

.desktop-nav a:hover,
.desktop-nav a.active:hover,
.desktop-nav .dropdown > a:hover,
.dropdown-menu a:hover {
  color: #ffdf5d;
}

.desktop-nav a.active,
.desktop-nav .dropdown > a.active,
.dropdown-menu a.active {
  color: white;
}

.desktop-nav a.active::after,
.desktop-nav .dropdown > a.active::after,
.dropdown-menu a.active::after {
  transform: scaleX(1);
}


body.dark-mode .desktop-nav a,
body.dark-mode .desktop-nav .dropdown > a,
body.dark-mode .dropdown-menu a {
  color: rgba(255, 255, 255, 0.85);
}

body.dark-mode .desktop-nav a:hover,
body.dark-mode .desktop-nav a.active:hover,
body.dark-mode .desktop-nav .dropdown > a:hover,
body.dark-mode .dropdown-menu a:hover {
  color: #ffd369;
}

body.dark-mode .desktop-nav a::after,
body.dark-mode .desktop-nav .dropdown > a::after,
body.dark-mode .dropdown-menu a::after {
  background-color: #ffd369;
}

/* Mobile Navigation */
.mobile-nav a.active {
  color: #ffdf5d;
  position: relative;
}

.mobile-nav a.active::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  height: 2px;
  width: 100%;
  background-color: #ffdf5d;
  transform: scaleX(1);
  transform-origin: left;
}

.mobile-dropdown-menu a.active {
  color: #ffdf5d;
  position: relative;
}

.mobile-dropdown-menu a.active::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  height: 2px;
  width: 100%;
  background-color: #ffdf5d;
  transform: scaleX(1);
  transform-origin: left;
}
  </style>
</head>
<body>
 <!-- Header Section -->
 <header class="header">
    <div class="container">
      <!-- Logo + NGO Name -->
      <a href="index.php" class="logo">
        <img src="../assets/images/newlogo.png" alt="Horn Cummunity Care Organization Logo" width="40">
        <span>Horn Cummunity Care Organization</span>
      </a>

      <!-- Desktop Navigation -->


      <nav class="desktop-nav" id="mobile-nav">
        <ul id="nav-menu">
          <li><a href="./index.php">Home</a></li>
          <li><a href="./index#professional">About us</a></li>
          <li class="dropdown">
            <a href="#who-we-are" onclick="toggleDropdown(event)">programs <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-menu" id="dropdown-menu">
              <a href="emergency.php">Emergency</a>
              <a href="humanright.php" class="<?= basename($_SERVER['PHP_SELF']) === 'humanright.php' ? 'active' : '' ?>">Human Right</a>
              <a href="sustainability.php">Sustainability</a>
            </div>
          </li>
          <li><a href="./index#update-stories">Updates</a></li>
          <li><a href="./index#partners">Partner</a></li>
          <li><a href="./index#contact">Contact</a></li>
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
            <img src="../assets/images/newlogo.png" alt="Horn Cummunity Care Organization Logo" width="40">
            <span>Horn Cummunity Care Organization</span>
          </a>
          <button class="mobile-menu-close">
            <span class="close-line"></span>
            <span class="close-line"></span>
          </button>
        </div>
        
        <nav class="mobile-nav">
          <ul>
            <li><a href="./index">Home</a></li>
            <li><a href="./index#professional">About us</a></li>
            <li class="mobile-dropdown"> 
              <button class="mobile-dropdown-btn">
               Programs <i class="fas fa-chevron-down"></i>
              </button>
              <div class="mobile-dropdown-menu">
                <a href="emergency.php">Emergency</a>
                <a href="humanright.php" class="<?= basename($_SERVER['PHP_SELF']) === 'humanright.php' ? 'active' : '' ?>">Human Right</a>
                <a href="sustainability.php">Sustainability</a>
              </div>
            </li>

            <li><a href="./index#update-stories">Updates</a></li>
            <li><a href="./index#partners">Partener</a></li>
            <li><a href="./index#contact">Contact</a></li>
          </ul>
        </nav>
        
        <div class="mobile-menu-footer">
          <!-- <a href="donate.html" class="btn-donate-mobile">Donate Now</a> -->
        </div>
      </div>
    </div>
    
    <div class="mobile-menu-overlay"></div>
  </header>


    <div class="container py-5">
    <div class="row mb-4">
      <div class="col-md-8">
        <h1 class="main-title">Human Right Program</h1>
        <p class="mt-3">
          HCCO’s human rights programs aim to build an inclusive society where individuals, especially women, children, and marginalized groups, can enjoy their rights freely and equitably. By promoting social justice, access to legal resources, and accountability, HCCO works to ensure the dignity and protection of all members of society.
        </p>

        <p>24 May 2025</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 press-release">
        <img src="../assets/images/humantights.jpeg" alt="emergency image" width="700">
        
       
                <h2 class="subtitle mt-5">Thematic area, Approaches and Models</h2> 

        <h4>Promotion of Human Rights (GBV, FGM, Early/Child/Forced Marriage - ECFM):</h4>
        <ul>
          <li><strong>Community Conversations Model:</strong> Engaging communities in open discussions to address harmful social norms and practices.</li>
          <li><strong>Social Norm Transformation:</strong> Focusing on changing perceptions and behaviours related to gender-based violence, female genital mutilation (FGM), and early/child/forced marriages.</li>
          <li><strong>Civic Education Promotions:</strong> Raising awareness on human rights and legal frameworks protecting individuals from violence and discrimination.</li>
          <li><strong>IEC and Media Messaging:</strong> Utilizing Information, Education, and Communication (IEC) materials, along with media campaigns (radio, TV, social media), to promote awareness and educate communities about human rights.</li>
          <li><strong>Forums and Meetings:</strong> Organizing community-based forums and meetings to promote dialogue and build consensus on human rights issues.</li>
          <li><strong>Legal Aid Services:</strong> Providing legal assistance to survivors of human rights violations, helping them navigate the justice system.</li>
        </ul> </br>      
        

        <h4>Accountability and Transparency:</h4>
        <ul>
          <li><strong>Capacity Building for the Judiciary:</strong>Strengthening the knowledge and skills of judicial officers to ensure they are equipped to handle human rights cases impartially.</li>
          <li><strong>Training Community Paralegals:</strong>Empowering local paralegals to assist individuals in accessing legal support and understanding their rights.</li>
        </ul></br>

        <h4>Accountability and Transparency:</h4>
        <ul>
          <li><strong>Community Education and Awareness:</strong> Educating communities about their rights and the responsibilities of duty-bearers (government officials, law enforcement).</li>
          <li><strong>Capacity Building for Rights-Holders and Duty-Bearers:</strong> Strengthening the capacity of both rights-holders (the community) and duty-bearers (authorities, service providers) to understand and fulfil their obligations.</li>
          <li><strong>Social Dialogue with Duty-Bearers:</strong> Facilitating discussions between communities and government representatives to ensure accountability in decision-making processes.</li>
          <li><strong>Information Sharing:</strong> Disseminating information regarding human rights laws, policies, and services available to marginalized groups.</li>
          <li><strong>Accountability Forums:</strong> Holding public forums where community members can voice concerns about the delivery of services and accountability of service providers.</li>
          <li><strong>Publication and Dissemination of Annual Reports:</strong> Ensuring transparency in HCCO’s work by sharing regular updates and progress reports with the public and stakeholders.</li>
          <li><strong>Social Debates:</strong> Organizing debates on human rights issues to foster community engagement and promote dialogue around social justice.</li>
        </ul> </br>

        <h4>Advocacy and Lobbying:</h4>
        <ul>
          <li><strong>Mobilization of Civil Society Organizations (CSOs):</strong> Organizing CSOs to influence policy and decision-making processes at local, national, and international levels.</li>
          <li><strong>Media Engagement (Social Media, Radio, TV):</strong> Using various media platforms to advocate for human rights issues and raise awareness of violations, ensuring that the voices of marginalized groups are heard.</li>
          <li><strong>Policy Brief Productions:</strong> Creating and disseminating policy briefs to inform decision-makers and the public about key human rights challenges and proposed solutions.</li>
          <li><strong>Advocacy Forums and Meetings:</strong> Organizing forums and meetings with key stakeholders (government, donors, and civil society) to advocate for the protection of human rights and the implementation of policies that support marginalized groups.</li>
        </ul> </br>
      </div>

      <div class="col-md-4">
        <div class="contact-box mb-4">
          <h5>Media contacts</h5>
          <p><strong>Eng. Mohamud</strong><br>HCCO Galkacyo<br>Tel: +252 907 944 294<br>Email: <a href="engmohamud7@gmail.com">engmohamud7@gmail.com</a></p>

          <p><strong>Eng. Mahad</strong><br>HCCO Galkacyo<br>Tel: +252 906 069 638<br>Email: <a href="mahadabdirisak@gmail.com">mahadabdirisak@gmail.com</a></p>
        </div>

        <div class="Additional-resources">
          <h5>Additional resources</h5>
          <img src="../assets/images/sustainability.jpeg" alt="sustainability" width="354"><br></br>
          <a href="sustainability.php">Sustainability</a>
        </div>
      </div>
    </div>
  </div>

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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/global.js"></script>
</body>

</html>
