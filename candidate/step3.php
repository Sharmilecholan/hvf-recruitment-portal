<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['step3'] = $_POST;
  $_SESSION['step3_files'] = $_FILES;
  header("Location: dashboard.php?step=4");
  exit();
}
?>

<h2>Step 3: Upload Documents</h2>

<form method="POST" enctype="multipart/form-data" action="">
  <label for="aadhaar">Aadhaar (PDF)</label>
  <input type="file" name="aadhaar" id="aadhaar" accept=".pdf" required>

  <label for="photo">Passport Size Photo (JPEG/PNG)</label>
  <input type="file" name="photo" id="photo" accept=".jpg,.jpeg,.png" required>

  <label for="signature">Signature (JPEG/PNG)</label>
  <input type="file" name="signature" id="signature" accept=".jpg,.jpeg,.png" required>

  <label for="community">Community Certificate (PDF)</label>
  <input type="file" name="community" id="community" accept=".pdf" required>

  <label for="resume">Resume (PDF)</label>
  <input type="file" name="resume" id="resume" accept=".pdf" required>

  <label for="marksheet_10">10th Marksheet (PDF)</label>
  <input type="file" name="marksheet_10" id="marksheet_10" accept=".pdf" required>

  <label for="marksheet_12">12th Marksheet (PDF)</label>
  <input type="file" name="marksheet_12" id="marksheet_12" accept=".pdf" required>

  <label for="degree">Degree Certificate (PDF)</label>
  <input type="file" name="degree" id="degree" accept=".pdf" required>

  <button type="submit">Next</button>
</form>
