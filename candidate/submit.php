<?php
session_start();
include '../db.php';

// ✅ Check all required session data
if (!isset($_SESSION['user_id'], $_SESSION['step1'], $_SESSION['step2'], $_SESSION['step3'], $_SESSION['step3_files'], $_SESSION['step4'])) {
  echo "<h2 style='color:red;text-align:center;'>❌ Missing application data.</h2>";
  echo "<p style='text-align:center;'>Please complete all the steps before submitting.</p>";
  exit;
}

$user_id = $_SESSION['user_id'];
$step1 = $_SESSION['step1'];
$step2 = $_SESSION['step2'];
$step3 = $_SESSION['step3'];
$step3_files = $_SESSION['step3_files'];
$step4 = $_SESSION['step4'];

// 1. Insert into candidates
$stmt = $conn->prepare("INSERT INTO candidates (user_id, full_name, dob, address, job_position) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $user_id, $step1['name'], $step1['dob'], $step1['address'], $step1['job']);
$stmt->execute();
$candidate_id = $stmt->insert_id;

// 2. Education entries
$qual = $step2['qualification'];
$inst = $step2['institution'];
$board = $step2['board'];
$year = $step2['year'];
$perc = $step2['percentage'];

for ($i = 0; $i < count($qual); $i++) {
  $stmt = $conn->prepare("INSERT INTO education (candidate_id, qualification, institution, board, year, percentage) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("isssis", $candidate_id, $qual[$i], $inst[$i], $board[$i], $year[$i], $perc[$i]);
  $stmt->execute();
}



// 4. Insert into applications
$stmt = $conn->prepare("INSERT INTO applications (candidate_id, status) VALUES (?, 'Submitted')");
$stmt->bind_param("i", $candidate_id);
$stmt->execute();

// 5. Clear step data (keep user_id if logged in)
unset($_SESSION['step1'], $_SESSION['step2'], $_SESSION['step3'], $_SESSION['step3_files'], $_SESSION['step4']);

// ✅ Redirect to success page
header("Location: success.php");
exit;
?>
