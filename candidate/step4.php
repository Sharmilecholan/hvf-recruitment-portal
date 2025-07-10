<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['terms'])) {
    $error = "Please accept the Terms and Conditions to proceed.";
  } else {
    $_SESSION['step4'] = $_POST;
    header("Location: submit.php");
    exit();
  }
}
?>

<h2>Step 4: Declaration & Eligibility</h2>

<?php if (isset($error)): ?>
  <div class="error"><?= $error ?></div>
<?php endif; ?>

<form method="POST" action="" class="declaration-form">

  <div class="form-group">
    <label>
      <input type="checkbox" name="eligibility[]" value="citizen" required>
      I am an Indian citizen.
    </label>
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="eligibility[]" value="age_limit" required>
      I meet the eligible age limit for the post.
    </label>
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="eligibility[]" value="character" required>
      I have a clean character with no criminal record.
    </label>
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="eligibility[]" value="fitness" required>
      I am medically and physically fit for defense service.
    </label>
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="eligibility[]" value="education" required>
      I possess the required educational qualifications.
    </label>
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="eligibility[]" value="employment_status" required>
      I am not dismissed from any government job.
    </label>
  </div>

  <hr>

  <div class="form-group">
    <label>
      <input type="checkbox" name="terms" value="accepted" required>
      <strong>I agree to the Terms and Conditions.</strong>
    </label>
  </div>

  <button type="submit" class="next-btn">Submit Application</button>
</form>
