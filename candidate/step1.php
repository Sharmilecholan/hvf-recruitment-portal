<?php
include '../db.php';

// Fetch job positions
$jobs = $conn->query("SELECT id, title FROM jobs");

// Handle form submit (only when included via dashboard)
// Inside step1.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['step1'] = $_POST;
  header("Location: dashboard.php?step=2");
  exit();
}

?>

<h2>Step 1: Personal Information</h2>
<form method="POST" action="">

  <label for="full_name">Full Name</label>
  <input type="text" name="name" id="full_name" required>

  <label for="dob">Date of Birth</label>
  <input type="date" name="dob" id="dob" required>

  <label for="gender">Gender</label>
  <select name="gender" id="gender" required>
    <option value="">Select</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>

  <label for="phone">Phone Number</label>
  <input type="text" name="phone" id="phone" required>

  <label for="email">Email</label>
  <input type="email" name="email" id="email" required>

  <label for="address">Residential Address</label>
  <textarea name="address" id="address" rows="3" required></textarea>

  <label for="job_id">Job Position Applying For</label>
  <select name="job" id="job_id" required>
    <option value="">Select Job</option>
    <?php while ($row = $jobs->fetch_assoc()): ?>
      <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
    <?php endwhile; ?>
  </select>

  <button type="submit">Next</button>
</form>
