<?php
session_start();
include("connect.php");

// Ensure the user is logged in
$email = $_SESSION['email'] ?? null;
if (!$email) {
    header("Location: login.php");
    exit();
}

// Get donor ID based on email
$stmt = $conn->prepare("SELECT donor_id FROM donor WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($donor_id);
$stmt->fetch();
$stmt->close();

// Get sorting option from query
$sort = isset($_GET['sort']) && $_GET['sort'] === 'latest' ? 'DESC' : 'ASC';

// Fetch donation records for this donor only
$sql = "SELECT * FROM donation_record WHERE donor_id = ? ORDER BY donation_date $sort";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $donor_id);
$stmt->execute();
$result = $stmt->get_result();

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BloodLink Donation History</title>
  <link rel="stylesheet" href="history.css">

  <script>
    function sortRecords() {
      const sortOrder = document.getElementById("sort").value;
      window.location.href = `history.php?sort=${sortOrder}`;
    }

    //basically macam screenshot
    function printRecords() {
      if (confirm("Do you want to print this donation history?")) {
        window.print();
      }
    }
  </script>
</head>
<body>

<?php include ("navbar.php") ?>

<div class="filter">
  <label for="sort">Sort by:</label>
  <select id="sort" onchange="sortRecords()">
    <option value="latest" <?= $sort === "DESC" ? "selected" : "" ?>>Latest</option>
    <option value="oldest" <?= $sort === "ASC" ? "selected" : "" ?>>Oldest</option>
  </select>
</div>

<?php if (count($records) > 0): ?>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Blood Serial Number</th>
        <th>Amount</th>
        <th>Weight (kg)</th>
        <th>Height (cm)</th>
        <th>Hemoglobin (g/dl)</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($records as $record): ?>
        <tr>
          <td><?= date("j F Y", strtotime($record['donation_date'])) ?></td>
          <td><?= htmlspecialchars($record['blood_serial_num']) ?></td>
          <td><?= htmlspecialchars($record['volume_donation']) ?></td>
          <td><?= htmlspecialchars($record['weight']) ?></td>
          <td><?= htmlspecialchars($record['height']) ?></td>
          <td><?= htmlspecialchars($record['hemoglobin']) ?></td>
          <td><?= htmlspecialchars($record['state']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <div class="no-records">No donation history available.</div>
<?php endif; ?>

<button onclick="printRecords()">Print Records</button><br><br>

</body>
<?php include ("footer.html") ?>
</html>
