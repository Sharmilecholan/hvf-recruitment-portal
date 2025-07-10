<?php
$jobs = $conn->query("SELECT * FROM jobs");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $vacancies = $_POST['vacancies'];
    $description = $_POST['description'];
    $eligibility = $_POST['eligibility'];

    $stmt = $conn->prepare("INSERT INTO jobs (title, vacancies, description, eligibility) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $title, $vacancies, $description, $eligibility);
    $stmt->execute();

    echo "<script>window.location.href='dashboard.php?page=jobs';</script>";
    exit();
}
?>

<h2>Job Listings</h2>

<button class="create-btn" onclick="document.getElementById('create-job-form').style.display='block'">+ Create Job</button>

<div id="create-job-form" style="display:none; margin-bottom:30px;">
  <form method="POST" action="">
    <label>Job Title</label>
    <input type="text" name="title" required>

    <label>No. of Vacancies</label>
    <input type="number" name="vacancies" required>

    <label>Job Description (Key Responsibilities)</label>
    <textarea name="description" required></textarea>

    <label>Eligibility</label>
    <textarea name="eligibility" required></textarea>

    <button type="submit">Create</button>
  </form>
</div>

<?php while($job = $jobs->fetch_assoc()): ?>
  <div class="job-card">
    <div class="job-header" onclick="toggleDetails(<?= $job['id'] ?>)">
      <span class="job-title"><?= $job['title'] ?></span>
      <span class="job-vacancy"><?= $job['vacancies'] ?> Vacancies</span>
    </div>
    <div class="job-details" id="details-<?= $job['id'] ?>" style="display: none;">
      <p><strong>Description:</strong> <?= $job['description'] ?></p>
      <p><strong>Eligibility:</strong> <?= $job['eligibility'] ?></p>
    </div>
  </div>
<?php endwhile; ?>

<script>
function toggleDetails(id) {
  const elem = document.getElementById('details-' + id);
  elem.style.display = (elem.style.display === 'none') ? 'block' : 'none';
}
</script>
