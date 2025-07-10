<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['step3'] = $_POST;
  $_SESSION['step3_files'] = $_FILES;
  header("Location: dashboard.php?step=4");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Application Submitted</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    .success-wrapper {
      max-width: 700px;
      margin: 40px auto;
      padding: 30px;
      background-color: #f2fff2;
      border: 2px solid #009900;
      border-radius: 10px;
      text-align: center;
      font-family: 'Poppins', sans-serif;
    }
    .success-wrapper h2 {
      color: #006600;
      margin-bottom: 20px;
    }
    .success-wrapper p {
      font-size: 16px;
      margin: 10px 0;
    }
  </style>
</head>
<body>

<div class="success-wrapper">
  <h2>✅ Application Submitted</h2>
  <p>Thank you! Your application has been successfully submitted.</p>
  <p>You will receive a confirmation email with your application number.</p>
  <p>Our recruitment team will contact you if further action is needed.</p>
</div>

</body>
</html>
