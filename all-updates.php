<?php
include('./includes/db.php');

// Fetch first 12 updates
$updates = $conn->query("SELECT * FROM latest_updates ORDER BY created_at DESC LIMIT 12");

// Fetch tags with post count
$raw = $conn->query("SELECT tags FROM latest_updates");
$tagCounts = [];

while ($row = $raw->fetch_assoc()) {
  $tags = explode(',', $row['tags']);
  foreach ($tags as $tag) {
    $clean = trim(strtolower($tag));
    if ($clean) {
      $tagCounts[$clean] = ($tagCounts[$clean] ?? 0) + 1;
    }
  }
}
ksort($tagCounts);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>All Updates</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f7fa; padding: 40px; font-family: sans-serif; }

    .page-title {
      font-size: 1.8rem;
      margin-bottom: 20px;
      font-weight: bold;
      color: #005eb8;
    }

    .update-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .update-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .update-card:hover {
      transform: translateY(-5px);
    }

    .update-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .update-body {
      padding: 15px;
    }

    .update-title {
      font-size: 1rem;
      font-weight: bold;
      color: #005eb8;
      margin-bottom: 10px;
    }

    .update-date {
      font-size: 0.85rem;
      color: #888;
    }

    .tag-filter {
      display: none;
      margin: 20px 0;
      padding: 10px;
      background: #eef5fa;
      border-radius: 8px;
    }

    .tag-filter span {
      display: inline-block;
      background: #cde0f9;
      color: #005eb8;
      padding: 5px 12px;
      border-radius: 20px;
      margin: 5px;
      cursor: pointer;
      font-size: 0.85rem;
    }

    #loadMoreBtn {
      display: block;
      margin: 30px auto 0;
      padding: 10px 25px;
      background: #005eb8;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    #loadMoreBtn:hover {
      background: #0072ff;
    }

    .filter-toggle {
      margin-bottom: 15px;
    }

    .filter-toggle button {
      background: #005eb8;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <h1 class="page-title">📚 DRC News</h1>
  <p>Find press releases, news, and stories from around the world.</p>

  <!-- Filter Toggle Button -->
  <div class="filter-toggle">
    <button onclick="document.getElementById('tagFilter').classList.toggle('d-block')">☰ Expand Filter</button>
  </div>

  <!-- Tag Filter Panel -->
  <div class="tag-filter" id="tagFilter">
    <?php foreach ($tagCounts as $tag => $count): ?>
      <span onclick="location.href='tag.php?tag=<?php echo urlencode($tag); ?>'">
        <?php echo htmlspecialchars(ucfirst($tag)) . " ($count)"; ?>
      </span>
    <?php endforeach; ?>
  </div>

  <!-- Grid -->
  <div class="update-grid" id="updateGrid">
    <?php while ($row = $updates->fetch_assoc()): ?>
      <div class="update-card">
        <img src="../admin/uploads/updates/<?php echo htmlspecialchars($row['image']); ?>" alt="Update image">
        <div class="update-body">
          <div class="update-date"><?php echo date("d M Y", strtotime($row['created_at'])); ?></div>
          <div class="update-title"><?php echo htmlspecialchars($row['title']); ?></div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Load More Button -->
  <button id="loadMoreBtn">Load 12 More</button>

  <script>
    let offset = 12;

    document.getElementById("loadMoreBtn").addEventListener("click", function () {
      fetch("load-more-updates.php?offset=" + offset)
        .then(res => res.text())
        .then(html => {
          document.getElementById("updateGrid").insertAdjacentHTML("beforeend", html);
          offset += 12;
        });
    });
  </script>

</body>
</html>
