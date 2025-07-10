<?php
include '../db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['step2'] = $_POST;
  header("Location: dashboard.php?step=3");
  exit();
}
?>

<h2>Step 2: Educational Details</h2>
<form method="POST" action="">
  <div id="education-container">
    <div class="edu-entry">
      <div class="form-group">
        <label>Qualification</label>
        <select name="qualification[]" required>
          <option value="">Select</option>
          <option value="10th">10th</option>
          <option value="12th">12th</option>
          <option value="Diploma">Diploma</option>
          <option value="UG">UG</option>
          <option value="PG">PG</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label>Institution</label>
        <input type="text" name="institution[]" required>
      </div>

      <div class="form-group">
        <label>Board/University</label>
        <input type="text" name="board[]" required>
      </div>

      <div class="form-group">
        <label>Year of Passing</label>
        <input type="number" name="year[]" min="1950" max="2099" required>
      </div>

      <div class="form-group">
        <label>Percentage / CGPA</label>
        <input type="text" name="percentage[]" required>
      </div>
    </div>
  </div>

  <div class="form-buttons">
    <button type="button" onclick="addEducationEntry()" class="add-btn">+ Add More</button>
    <button type="submit">Next</button>
  </div>
</form>

<script>
function addEducationEntry() {
  const container = document.getElementById('education-container');
  const original = container.querySelector('.edu-entry');
  const clone = original.cloneNode(true);

  // Clear the values in the clone
  clone.querySelectorAll('input, select').forEach(field => field.value = '');

  container.appendChild(clone);
}
</script>
