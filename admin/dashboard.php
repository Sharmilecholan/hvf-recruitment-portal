<?php session_start(); ?>
<?php include '../db.php'; ?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}
$page = $_GET['page'] ?? 'jobs';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - HVF Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    .dashboard-container {
      display: flex;
      min-height: 80vh;
    }

    .sidebar {
      width: 220px;
      background-color: #1d3557;
      padding: 20px;
      color: #fff;
    }

    .sidebar h3 {
      font-size: 20px;
      margin-bottom: 20px;
    }

    .sidebar a {
      display: block;
      margin: 10px 0;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar a.active {
      background-color: #457b9d;
      padding: 8px;
      border-radius: 5px;
    }

    .main-content {
      flex: 1;
      padding: 30px;
    }

    .logout-wrapper {
      text-align: right;
      margin: 10px 20px;
    }

    .create-btn {
      margin-bottom: 20px;
      padding: 8px 16px;
      background-color: #2a9d8f;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 4px;
    }

    .create-btn:hover {
      background-color: #21867a;
    }
  </style>
</head>
<body>

<!-- Header -->
<header>
  <div class="header-wrapper">
    <img src="../assets/logo-left.png" class="logo left" alt="Gov Logo">
    <div class="title-block">
      <h1>ARMOURED VEHICLES NIGAM LIMITED</h1>
      <h2>HVF Contract Recruitment Portal</h2>
      <p>A Government of India Enterprise (Ministry of Defence)</p>
    </div>
    <img src="../assets/logo-right.jpg" class="logo right" alt="AVNL Logo">
  </div>
</header>

<!-- Logout Button -->
<div class="logout-wrapper">
  <form method="POST" action="../logout.php">
    <button type="submit">Logout</button>
  </form>
</div>

<!-- Sidebar and Main Section -->
<div class="dashboard-container">
  <div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="?page=jobs" class="<?= $page === 'jobs' ? 'active' : '' ?>">Job Listings</a>
    <a href="?page=applications" class="<?= $page === 'applications' ? 'active' : '' ?>">Applications Received</a>
  </div>

  <div class="main-content">
    <?php
      if ($page === 'jobs') {
        include 'job_listings.php';
      } elseif ($page === 'applications') {
        include 'applications_received.php';
      } else {
        echo "<p>Invalid section.</p>";
      }
    ?>
  </div>
</div>

</body>
</html>
