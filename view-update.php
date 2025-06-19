<?php 
session_start();
require_once './includes/db.php';

$id = $_GET['id'] ?? 0;
$mode = $_SESSION['mode'] ?? 'light';

// Fetch update
$stmt = $conn->prepare("SELECT * FROM updates WHERE id = ? AND deleted_at IS NULL");
$stmt->bind_param("i", $id);
$stmt->execute();
$update = $stmt->get_result()->fetch_assoc();

if (!$update) {
  die("Update not found.");
}

// Update view count
$conn->query("UPDATE updates SET view_count = view_count + 1 WHERE id = $id");

// Fetch Previous update
$prev = $conn->query("SELECT id, title FROM updates WHERE id < $id AND deleted_at IS NULL ORDER BY id DESC LIMIT 1")->fetch_assoc();

// Fetch Next update
$next = $conn->query("SELECT id, title FROM updates WHERE id > $id AND deleted_at IS NULL ORDER BY id ASC LIMIT 1")->fetch_assoc();

// Save comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment']);
    if (!empty($comment) && $id > 0) {
        $stmt = $conn->prepare("INSERT INTO comments (update_id, name, comment, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iss", $id, $name, $comment);
        $stmt->execute();
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Comment posted successfully!'];
        header("Location: view-update.php?id=$id");
        exit;
    } else {
        $_SESSION['toast'] = ['type' => 'danger', 'message' => 'Comment cannot be empty.'];
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= $mode ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($update['title']) ?> | Update</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Source+Serif+Pro:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./global.css">
  <style>
    /* header */
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
 display: flex;
  flex-direction: column;
  gap: 0.5rem;
  min-width: 200px;
  position: absolute;
  top: 100%;
  left: 0;
  background: #005EB8;
  color: var(--footer-text);
  padding: 1rem;
  border-radius: 0.5rem;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  opacity: 0;
  visibility: hidden;
  transform: translateY(10px);
  transition: var(--transition-medium);
  z-index: 10;
  background-image: var(--footer-glow), var(--footer-bg);
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







    :root {
      --card-bg-light: #ffffff;
      --card-bg-dark: #1e1e1e;
      --text-light: #212529;
      --text-dark: #f8f9fa;
      --border-light: #e9ecef;
      --border-dark: #2d2d2d;
      --tag-bg-light: #f8f9fa;
      --tag-bg-dark: #2a4365;
      --tag-text-light: #495057;
      --tag-text-dark: #ebf8ff;
      --shadow-light: 0 2px 16px rgba(0, 0, 0, 0.08);
      --shadow-dark: 0 2px 16px rgba(0, 0, 0, 0.2);
      --primary-accent: #4361ee;
      --secondary-accent: #3f37c9;
    }

    body {
      font-family: 'Inter', sans-serif;
      line-height: 1.7;
      background-color: #f8f9fa;
      color: var(--text-light);
      transition: all 0.3s ease;
      -webkit-font-smoothing: antialiased;
    }

    body.dark-mode {
      background-color: #121212;
      color: var(--text-dark);
    }

    .content-container {
      max-width: 900px;
      margin: 8rem auto;
      padding: 0 1.5rem;
      /* margin-top: 30px; */
    }

    .article-card {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow-light);
      border: none;
      background-color: var(--card-bg-light);
      transition: all 0.3s ease;
      margin-bottom: 2rem;
      padding: 10px;
    }

    body.dark-mode .article-card {
      background-color: var(--card-bg-dark);
      box-shadow: var(--shadow-dark);
    }

    .article-header {
      padding: 2rem 2rem 0;
    }

    .article-title {
      font-family: 'Source Serif Pro', serif;
      font-weight: 600;
      margin-bottom: 1rem;
      color: inherit;
      line-height: 1.3;
      font-size: 2rem;
    }

    .article-meta {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      font-size: 0.875rem;
      color: #6c757d;
      margin-bottom: 1.5rem;
    }

    body.dark-mode .article-meta {
      color: #adb5bd;
    }

    .article-image {
      width: 100%;
      max-height: 450px;
      object-fit: cover;
      border-radius: 8px;
      margin: 1.5rem 0;
      box-shadow: var(--shadow-light);
    }

    .article-content {
    padding: 1.5rem 2rem;
    font-size: 1.05rem;
    line-height: 1.8;
    color: var(--text-light);
    overflow: hidden; /* Prevents content from bleeding outside */
    word-wrap: break-word; /* Ensures long words break properly */
}

body.dark-mode .article-content {
    color: var(--text-dark);
}

.article-content p {
    margin-bottom: 1.5rem;
    padding: 0.25rem 0; /* Adds small vertical padding to paragraphs */
}

/* Additional fixes for potential hidden content */
.article-content * {
    max-width: 100%; /* Prevents elements from overflowing */
}


    .tag {
      display: inline-flex;
      align-items: center;
      background-color: var(--tag-bg-light);
      color: var(--tag-text-light);
      padding: 0.35rem 1rem;
      border-radius: 6px;
      font-size: 0.75rem;
      font-weight: 500;
      margin: 0 0.5rem 0.5rem 0;
      transition: all 0.3s ease;
      border: 1px solid #e9ecef;
    }

    body.dark-mode .tag {
      background-color: var(--tag-bg-dark);
      color: var(--tag-text-dark);
      border-color: #3d3d3d;
    }

    .article-navigation {
      display: flex;
      justify-content: space-between;
      padding: 1.5rem 2rem;
      border-top: 1px solid var(--border-light);
    }

    body.dark-mode .article-navigation {
      border-top-color: var(--border-dark);
    }

    .comment-section {
      margin-top: 3rem;
    }

    .comment-card {
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 2rem;
      border: none;
      background-color: var(--card-bg-light);
      box-shadow: var(--shadow-light);
    }

    body.dark-mode .comment-card {
      background-color: var(--card-bg-dark);
      box-shadow: var(--shadow-dark);
    }

    .section-header {
      background-color: #005EB8;
      color: white;
      padding: 1.25rem 2rem;
      font-weight: 600;
      font-size: 1.1rem;
    }

    .comment-form {
      padding: 2rem;
    }

    .comment-list {
      padding: 0;
      margin: 0;
      list-style: none;
    }

    .comment-item {
      padding: 1.5rem 2rem;
      border-bottom: 1px solid var(--border-light);
      transition: background-color 0.2s ease;
    }

    .comment-item:hover {
      background-color: rgba(0,0,0,0.02);
    }

    body.dark-mode .comment-item {
      border-bottom-color: var(--border-dark);
    }

    body.dark-mode .comment-item:hover {
      background-color: rgba(255,255,255,0.03);
    }

    .comment-item:last-child {
      border-bottom: none;
    }

    .comment-author {
      font-weight: 600;
      margin-bottom: 0.75rem;
      color: inherit;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .comment-author i {
      color: var(--primary-accent);
    }

    .comment-text {
      margin-bottom: 0.75rem;
      color: var(--text-light);
      line-height: 1.7;
    }

    body.dark-mode .comment-text {
      color: var(--text-dark);
    }

    .comment-date {
      font-size: 0.75rem;
      color: #6c757d;
      display: flex;
      align-items: center;
      gap: 0.3rem;
    }

    body.dark-mode .comment-date {
      color: #adb5bd;
    }

    .form-control, .form-control:focus {
      background-color: var(--card-bg-light);
      color: var(--text-light);
      border-color: var(--border-light);
      transition: all 0.3s ease;
      padding: 0.75rem 1rem;
      border-radius: 6px;
    }

    body.dark-mode .form-control, 
    body.dark-mode .form-control:focus {
      background-color: #2c2c2c;
      color: var(--text-dark);
      border-color: #3d3d3d;
    }

    body.dark-mode .form-control::placeholder {
      color: #8e8e8e;
    }

    .btn-primary {
      background-color: #005EB8;
      border-color: var(--primary-accent);
      padding: 0.65rem 1.5rem;
      font-weight: 500;
      border-radius: 6px;
      transition: all 0.2s ease;
    }

    .btn-primary:hover {
      background-color: var(--secondary-accent);
      border-color: var(--secondary-accent);
      transform: translateY(-1px);
    }

    .btn-outline-primary {
      transition: all 0.2s ease;
      border-radius: 6px;
      padding: 0.65rem 1.5rem;
      font-weight: 500;
    }

    .btn-outline-primary:hover {
      transform: translateY(-1px);
    }

    .btn-outline-secondary {
      transition: all 0.2s ease;
      border-radius: 6px;
      padding: 0.65rem 1.5rem;
      font-weight: 500;
    }

    .btn-outline-secondary:hover {
      transform: translateY(-1px);
    }

    .empty-state {
      padding: 3rem 2rem;
      text-align: center;
    }

    .empty-state i {
      font-size: 2rem;
      color: #6c757d;
      margin-bottom: 1rem;
    }

    body.dark-mode .empty-state i {
      color: #adb5bd;
    }

    .empty-state p {
      color: #6c757d;
      margin-bottom: 0;
    }

    body.dark-mode .empty-state p {
      color: #adb5bd;
    }

    @media (max-width: 768px) {
      .content-container {
        padding: 0 1rem;
        margin: 8rem auto;
      }
      
      .article-header, 
      .article-content,
      .comment-form {
        padding: 1.5rem;
      }
      
      .article-title {
        font-size: 1.75rem;
      }
      
      .article-navigation {
        flex-direction: column;
        gap: 1rem;
        padding: 1.5rem;
      }
      
      .article-navigation a {
        width: 100%;
        text-align: center;
      }
      
      .article-image {
        max-height: 300px;
        margin: 1rem 0;
      }
      
      .comment-item {
        padding: 1.25rem 1.5rem;
      }
    }





   
  </style>
</head>
<body class="<?= $mode === 'dark' ? 'dark-mode' : '' ?>">
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
              <a href="humanright.php">Human rights</a>
              <a href="sustainability.php">Sustainability</a>
            </div>
          </li>
          <li><a href="./index#update-stories" class="active">Updates</a></li>
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
                <a href="humanright.php">Human rights</a>
                <a href="sustainability.php">Sustainability</a>
              </div>
            </li>

            <li><a href="./index#update-stories" class="active">Updates</a></li>
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








  <div class="content-container">
  <article class="article-card">
    <header class="article-header">
      <h1 class="article-title"><?= htmlspecialchars($update['title']) ?></h1>
      <div class="article-meta">
        <span><i class="bi bi-calendar3 me-1"></i><?= date('F j, Y', strtotime($update['created_at'])) ?></span>
        <span><i class="bi bi-eye me-1"></i><?= number_format($update['view_count'] ?? 0) ?> views</span>
      </div>

      <?php if (!empty($update['tags'])): ?>
        <div class="d-flex flex-wrap mt-3">
          <?php foreach (explode(',', $update['tags']) as $tag): ?>
            <span class="tag"><i class="bi bi-tag me-1"></i><?= htmlspecialchars(trim($tag)) ?></span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </header>

    <?php if (!empty($update['image']) && file_exists("./admin/uploads/updates/{$update['image']}")): ?>
      <img src="./admin/uploads/updates/<?= $update['image'] ?>" class="article-image" alt="<?= htmlspecialchars($update['title']) ?>">
    <?php endif; ?>

    <div class="article-content">
      <?= nl2br(htmlspecialchars($update['full_text'])) ?>
    </div>


          <div class="d-flex justify-content-between align-items-center m-3">
      <?php if ($next): ?>
        <a href="demo.php?id=<?= $next['id'] ?>" class="btn btn-outline-primary">
          <?= htmlspecialchars($next['title']) ?> <i class="bi bi-arrow-right-circle"></i>
        </a>
      <?php else: ?><span></span><?php endif; ?>

      <?php if ($prev): ?>
        <a href="demo.php?id=<?= $prev['id'] ?>" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left-circle"></i> <?= htmlspecialchars($prev['title']) ?>
        </a>
      <?php endif; ?>
    </div>
  </article>

  <section class="comment-section">
    <div class="comment-card">
      <div class="section-header">
        <i class="bi bi-pencil-square me-2"></i>Post a Comment
      </div>
      <div class="comment-form">
        <form method="POST">
          <div class="mb-4">
            <label for="name" class="form-label mb-2">Your Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="mb-4">
            <label for="comment" class="form-label mb-2">Your Comment</label>
            <textarea name="comment" class="form-control" rows="4" placeholder="Share your thoughts..." required></textarea>
          </div>
          <div class="text-end">
            <button type="submit" name="submit_comment" class="btn btn-primary">
              <i class="bi bi-send me-2"></i> Post Comment
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="comment-card">
      <div class="section-header">
        <i class="bi bi-chat-square-text me-2"></i>Comments
      </div>
      <div class="comment-list">
        <?php
        $comments = $conn->query("SELECT name, comment, created_at FROM comments WHERE update_id = $id AND status = 'approved' ORDER BY created_at DESC");
        if ($comments->num_rows > 0):
          while ($c = $comments->fetch_assoc()):
        ?>
          <div class="comment-item">
            <div class="comment-author">
              <i class="bi bi-person-circle"></i>
              <?= htmlspecialchars($c['name']) ?>
            </div>
            <div class="comment-text"><?= nl2br(htmlspecialchars($c['comment'])) ?></div>
            <div class="comment-date">
              <i class="bi bi-clock"></i>
              <?= date("F j, Y \a\\t g:i a", strtotime($c['created_at'])) ?>
            </div>
          </div>
        <?php endwhile; else: ?>
          <div class="empty-state">
            <i class="bi bi-chat-left-text"></i>
            <p>No comments yet. Be the first to share your thoughts!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
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




<?php if (!empty($_SESSION['toast'])): ?>
  <div class="position-fixed bottom-1rem end-1rem" style="z-index: 9999;">
    <div class="toast align-items-center text-white bg-<?= $_SESSION['toast']['type'] ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body d-flex align-items-center">
          <i class="bi <?= $_SESSION['toast']['type'] === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' ?> me-2"></i>
          <?= $_SESSION['toast']['message'] ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <?php unset($_SESSION['toast']); ?>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/global.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toastEl = document.querySelector('.toast');
    if (toastEl) {
      const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
      toast.show();
    }
    
    // Add smooth scrolling to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  });
</script>
</body>
</html>