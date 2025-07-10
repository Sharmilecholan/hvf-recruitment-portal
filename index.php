<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <title>HVF Contract Recruitment Portal</title>
  <link rel="stylesheet" href="assets/style.css">
  <script>
    function toggleDetails(id) {
      const elem = document.getElementById('details-' + id);
      elem.style.display = (elem.style.display === 'none') ? 'block' : 'none';
    }
  </script>
</head>
<body>

<header>
  <div class="header-wrapper">
    <img src="assets/logo-left.png" class="logo left" alt="Gov Logo">
    <div class="title-block">
      <h1>ARMOURED VEHICLES NIGAM LIMITED</h1>
      <h2>HVF Contract Recruitment Portal</h2>
      <p>A Government of India Enterprise (Ministry of Defence)</p>
    </div>
    <img src="assets/logo-right.jpg" class="logo right" alt="AVNL Logo">
  </div>
</header>



  <main class="container">
    <!-- LEFT: Job Listings -->
    <section class="jobs">
      <h2>Available Positions</h2>
      <?php
        $jobs = $conn->query("SELECT * FROM jobs");
        while($job = $jobs->fetch_assoc()):
      ?>
        <div class="job-card">
          <div class="job-header" onclick="toggleDetails(<?= $job['id'] ?>)">
            <span class="job-title"><?= $job['title'] ?></span>
            <span class="job-vacancy"><?= $job['vacancies'] ?> Vacancies</span>
          </div>
          <div class="job-details" id="details-<?= $job['id'] ?>">
            <p><strong>Description:</strong> <?= $job['description'] ?></p>
            <p><strong>Eligibility:</strong> <?= $job['eligibility'] ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    </section>

    <!-- RIGHT: Login -->
    <section class="login-box">
      <h2>Login</h2>
      <?php if(isset($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
      <?php endif; ?>
      <form method="POST" action="login.php">
        <label for="role">Login as:</label>
        <select name="role" id="role">
          <option value="candidate">Candidate</option>
          <option value="admin">Admin</option>
        </select>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
      </form>
    </section>
  </main>

</body>
</html>
