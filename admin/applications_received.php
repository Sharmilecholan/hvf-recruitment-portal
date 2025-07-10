<?php
$jobs = $conn->query("SELECT * FROM jobs");

while ($job = $jobs->fetch_assoc()):
  $jobId = $job['id'];
  $jobTitle = $job['title'];

  // Count how many candidates applied to this job
  $result = $conn->query("SELECT COUNT(*) as total FROM candidates WHERE job_position = '$jobId'");
  $count = $result->fetch_assoc()['total'];
?>
  <div class="job-card">
    <div class="job-header" onclick="toggleDetails('app-<?= $jobId ?>')">
      <span class="job-title"><?= htmlspecialchars($jobTitle) ?></span>
      <span class="job-vacancy"><?= $count ?> Applications</span>
    </div>

    <div class="job-details" id="details-app-<?= $jobId ?>" style="display: none;">
      <table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
        <tr>
          <th>Full Name</th>
          <th>DOB</th>
          <th>Address</th>
          <th>Applied On</th>
        </tr>
        <?php
        $candidates = $conn->query("SELECT full_name, dob, address, created_at FROM candidates 
                                    WHERE job_position = '$jobId'");
        while ($row = $candidates->fetch_assoc()):
        ?>
          <tr>
            <td><?= htmlspecialchars($row['full_name']) ?></td>
            <td><?= htmlspecialchars($row['dob']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </div>
<?php endwhile; ?>

<script>
function toggleDetails(id) {
  const elem = document.getElementById('details-' + id);
  elem.style.display = (elem.style.display === 'none') ? 'block' : 'none';
}
</script>
