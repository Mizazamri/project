<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['hospital_name'])) {
    header("Location: login.php");
    exit();
}

include("connect.php");

// Chart 1: Blood Type
$bloodData = [];
$result1 = $conn->query("SELECT donor.bloodtype, COUNT(*) AS total 
    FROM donor 
    JOIN donation_record ON donor.donor_id = donation_record.donor_id 
    GROUP BY donor.bloodtype");
while ($row = $result1->fetch_assoc()) {
    $bloodData[] = $row;
}

// Chart 2: State
$stateData = [];
$result3 = $conn->query("SELECT state, COUNT(*) AS total FROM donation_record GROUP BY state");
while ($row = $result3->fetch_assoc()) {
    $stateData[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BloodLink Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="admin-home.css" type="text/style">
</head>
<body>

<header>
    <h1>BloodLink Admin Dashboard</h1>
</header>

<nav>
    <div class="nav-container">
        <a href="admin_home.php">Home</a>
        <a href="add-donation.php">Add Donation</a>
        <a href="add-event.php">Add Event</a>
        <a href="#" onclick="alert('Coming Soon!')">About Us</a>
        <a href="#" onclick="alert('Coming Soon!')">Hospital</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</nav>

<main>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['hospital_name']) ?></h2>
    <p>This is your admin dashboard. Use the menu above to manage donations and events.</p>

    <h3>Donations by Blood Type</h3>
    <canvas id="bloodChart"></canvas>

    <h3>Donations by Hospital</h3>
    <canvas id="hospitalChart"></canvas>

    <h3>Donations by State</h3>
    <canvas id="stateChart"></canvas>
</main>

<script>
const bloodCtx = document.getElementById('bloodChart').getContext('2d');
new Chart(bloodCtx, {
    type: 'bar',
    data: {
        labels: [<?= implode(',', array_map(fn($r) => '"' . $r['bloodtype'] . '"', $bloodData)) ?>],
        datasets: [{
            label: 'Total Donations',
            data: [<?= implode(',', array_column($bloodData, 'total')) ?>],
            backgroundColor: 'rgba(255,99,132,0.6)'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true }
        }
    }
});


const stateCtx = document.getElementById('stateChart').getContext('2d');
new Chart(stateCtx, {
    type: 'pie',
    data: {
        labels: [<?= implode(',', array_map(fn($r) => '"' . $r['state'] . '"', $stateData)) ?>],
        datasets: [{
            data: [<?= implode(',', array_column($stateData, 'total')) ?>],
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56',
                '#4BC0C0', '#9966FF', '#FF9F40', '#00C853'
            ]
        }]
    },
    options: { responsive: true }
});
</script>

</body>

<?php include ("footer.html") ?>
</html>
