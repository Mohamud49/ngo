<?php
include('./includes/db.php');

$offset = intval($_GET['offset'] ?? 0);
$sql = "SELECT * FROM latest_updates ORDER BY created_at DESC LIMIT 12 OFFSET $offset";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()):
?>
  <div class="update-card">
    <img src="../admin/uploads/updates/<?php echo htmlspecialchars($row['image']); ?>" alt="Update image">
    <div class="update-body">
      <div class="update-date"><?php echo date("d M Y", strtotime($row['created_at'])); ?></div>
      <div class="update-title"><?php echo htmlspecialchars($row['title']); ?></div>
    </div>
  </div>
<?php endwhile; ?>
