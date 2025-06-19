<?php
include('./includes/db.php');

// Get tag from URL
$tag = $_GET['tag'] ?? '';
$cleanTag = trim($tag);

// Fetch updates that contain the tag (case-insensitive search)
$stmt = $conn->prepare("SELECT * FROM latest_updates WHERE tags LIKE ? ORDER BY created_at DESC");
$likeTag = '%' . $cleanTag . '%';
$stmt->bind_param("s", $likeTag);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Updates tagged: <?php echo htmlspecialchars($cleanTag); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./global.css">
  <style>
    body { background: #f9fafc; padding: 50px 20px; font-family: sans-serif; }

    .section-title {
      font-size: 1.5rem;
      color: #005eb8;
      margin-bottom: 30px;
      text-align: center;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .update-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
      transition: transform 0.3s;
      animation: fadeIn 0.6s ease-in-out;
    }

    .update-card:hover {
      transform: translateY(-5px);
    }

    .update-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    .update-body {
      padding: 15px;
    }

    .update-title {
      font-size: 1.1rem;
      font-weight: bold;
      color: #005eb8;
    }

    .update-date {
      font-size: 0.85rem;
      color: #888;
      margin: 5px 0;
    }

    .read-more-btn {
      text-decoration: none;
      display: inline-block;
      padding: 6px 12px;
      background: #005eb8;
      color: white;
      border-radius: 5px;
      font-size: 0.9rem;
      margin-top: 10px;
    }

    .read-more-btn:hover {
      background: #0072ff;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
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
          <li><a href="#professional" class="active">About us</a></li>
          <li class="dropdown">
            <a href="#who-we-are" onclick="toggleDropdown(event)">Programs <i class="fas fa-chevron-down"></i></a>
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
            <li><a href="#professional" class="active">About us</a></li>
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
            <li><a href="#partners">Partener</a></li>
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








  <!-- Section Title -->
  <h2 class="section-title">🔖 Updates tagged: "<?php echo htmlspecialchars($cleanTag); ?>"</h2>

  <!-- Grid of Cards -->
  <div class="card-grid">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="update-card">
          <img src="../uploads/stories/<?php echo htmlspecialchars($row['image']); ?>" class="update-img" alt="Image">
          <div class="update-body">
            <h3 class="update-title"><?php echo htmlspecialchars($row['title']); ?></h3>
            <div class="update-date"><?php echo date("d M Y", strtotime($row['created_at'])); ?></div>
            <p><?php echo htmlspecialchars($row['short_text']); ?></p>
            <a href="view-update.php?id=<?php echo $row['id']; ?>" class="read-more-btn">Read More</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-center">No updates found for this tag.</p>
    <?php endif; ?>
  </div>

<script src="./global.js"></script>
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
  </script>
</body>
</html>
