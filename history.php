<?php
// Database connection
include("connect.php");

// Get sorting option
$sort = isset($_GET['sort']) && $_GET['sort'] === 'latest' ? 'DESC' : 'ASC';

// Fetch donation records
$sql = "SELECT * FROM donations ORDER BY date $sort";
$result = $conn->query($sql);
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
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background: #f9f9f9;
    }
    header {
      background-color: #d23241;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 24px;
    }
    .filter {
      text-align: right;
      margin: 10px 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background: #d23241;
      color: white;
    }
    .no-records {
      text-align: center;
      margin: 20px;
      color: #777;
      font-size: 18px;
    }
    button {
      margin: 30px auto 0;
      display: block;
      padding: 10px 20px;
      background: #d23241;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      thead tr {
        display: none;
      }
      td {
        position: relative;
        padding-left: 50%;
        text-align: left;
      }
      td::before {
        position: absolute;
        top: 12px;
        left: 12px;
        font-weight: bold;
        color: #d23241;
        white-space: nowrap;
      }
      td:nth-child(1)::before { content: "Date"; }
      td:nth-child(2)::before { content: "Serial Number"; }
      td:nth-child(3)::before { content: "Amount"; }
      td:nth-child(4)::before { content: "Weight (kg)"; }
      td:nth-child(5)::before { content: "Height (cm)"; }
      td:nth-child(6)::before { content: "Hemoglobin"; }
      td:nth-child(7)::before { content: "Location"; }
    }
  </style>
  <script>
    function sortRecords() {
      const sortOrder = document.getElementById("sort").value;
      window.location.href = `history.php?sort=${sortOrder}`;
    }

    function printRecords() {
      if (confirm("Do you want to print this donation history?")) {
        window.print();
      }
    }
  </script>
</head>
<body>

<header>BloodLink - Donation History</header>

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
          <td><?= date("j F Y", strtotime($record['date'])) ?></td>
          <td><?= htmlspecialchars($record['serial_number']) ?></td>
          <td><?= htmlspecialchars($record['amount']) ?></td>
          <td><?= htmlspecialchars($record['weight']) ?></td>
          <td><?= htmlspecialchars($record['height']) ?></td>
          <td><?= htmlspecialchars($record['hemoglobin']) ?></td>
          <td><?= htmlspecialchars($record['location']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <div class="no-records">No donation history available.</div>
<?php endif; ?>

<button onclick="printRecords()">Print Records</button>

</body>
</html>
