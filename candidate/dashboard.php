<?php session_start(); ?>
<?php include '../db.php'; ?>
<?php $step = $_GET['step'] ?? '1'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Candidate Dashboard - HVF Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
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
<!-- Logout Button Below Header -->
<div class="logout-wrapper">
  <form method="POST" action="../logout.php">
    <button type="submit">Logout</button>
  </form>
</div>

<!-- Milestone-Style Progress Bar -->
<div class="progressbar">
  <div class="step <?= $step == 1 ? 'active' : '' ?>">
  <div class="bullet">1</div>
  <div class="label">Personal Info</div>
</div>
<div class="step <?= $step == 2 ? 'active' : '' ?>">
  <div class="bullet">2</div>
  <div class="label">Education</div>
</div>
  <div class="step <?= $step == 3 ? 'active' : '' ?>">
  <div class="bullet">3</div>
  <div class="label">Documents</div>
</div>
<div class="step <?= $step == 4 ? 'active' : '' ?>">
  <div class="bullet">4</div>
  <div class="label">Declaration</div>
</div>

</div>

<!-- Main Form Content -->
<div class="form-container">
  <?php


switch ($step) {
  case '2': include 'step2.php'; break;
  case '3': include 'step3.php'; break;
  case '4': include 'step4.php'; break;
  default:  include 'step1.php';
}
?>


</div>

</body>
</html>
