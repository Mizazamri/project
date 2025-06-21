<?php
include("navbar.php");
include("connect.php");


$donationCount = 0;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Step 1: Get donor ID from donor table
    $getId = $conn->prepare("SELECT donor_id FROM donor WHERE email = ?");
    $getId->bind_param("s", $email);
    $getId->execute();
    $getId->bind_result($donor_id);
    $getId->fetch();
    $getId->close();

    // Step 2: Count donation records for that donor ID
    $stmt = $conn->prepare("SELECT COUNT(*) FROM donation_record WHERE donor_id = ?");
    if ($stmt === false) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
    $stmt->bind_result($donationCount);
    $stmt->fetch();
    $stmt->close();
}

$tiers = [
    ["max" => 1, "label" => "1", "color" => "#e0e0e0"],
    ["max" => 5, "label" => "2–5", "color" => "#fdd835"],
    ["max" => 10, "label" => "6–10", "color" => "#fbc02d"],
    ["max" => 15, "label" => "11–15", "color" => "#f9a825"],
    ["max" => 20, "label" => "16–20", "color" => "#f57f17"],
    ["max" => 30, "label" => "21–30", "color" => "#d32f2f"],
    ["max" => 40, "label" => "31–40", "color" => "#c62828"],
    ["max" => 50, "label" => "41–50", "color" => "#b71c1c"],
    ["max" => PHP_INT_MAX, "label" => "50+", "color" => "#880e4f"],
];

$activeTier = 0;
foreach ($tiers as $index => $tier) {
    if ($donationCount <= $tier['max']) {
        $activeTier = $index;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <title>Keistimewaan Penderma Darah - BloodLink</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 20px; background: #fff; color: #333; }
    .benefit-container { max-width: 1000px; margin: auto; }
    h1, h2 { text-align: center; color: #d23241; }

    .intro {
      background: #fff8e1;
      padding: 15px;
      border-left: 5px solid #ffc107;
      margin-bottom: 30px;
      border-radius: 6px;
    }

    .progress-wrapper {
      margin: 30px 0;
      text-align: center;
    }

    .progress-bar {
      display: flex;
      justify-content: space-between;
      background: #eee;
      padding: 6px;
      border-radius: 12px;
      overflow: hidden;
    }

    .tier-segment {
      flex: 1;
      padding: 10px 0;
      text-align: center;
      font-size: 14px;
      color: #fff;
    }

    .tier-segment.active {
      font-weight: bold;
      transform: scale(1.05);
      box-shadow: inset 0 -4px 6px rgba(0,0,0,0.15);
    }

    .tier {
      background-color: #f9f9f9;
      border-left: 6px solid #d23241;
      margin: 20px 0;
      padding: 20px;
      border-radius: 8px;
    }

    .tier h3 { margin-top: 0; color: #b42434; }
    .tier p { margin: 5px 0; }

  </style>
</head>
<body>

<div class="benefit-container">
  <h1>🎁 Keistimewaan Penderma Darah</h1>
  <p class="intro">
    Berdasarkan <strong>Surat Kementerian Kesihatan Bil. (23). KKM – 203/42</strong> bertarikh <strong>15 Julai 1996</strong>, penderma darah akan menerima rawatan percuma bergantung kepada bilangan pendermaan.
  </p>

  <div class="progress-wrapper">
    <h2>👤 Jumlah Pendermaan Anda: <?php echo $donationCount; ?></h2>
    <div class="progress-bar">
      <?php foreach ($tiers as $index => $tier): ?>
        <div class="tier-segment <?= ($index === $activeTier) ? 'active' : '' ?>"
             style="background-color: <?= $tier['color'] ?>;">
          <?= $tier['label'] ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <?php
  $benefits = [
    "1 Kali" => ["Rawatan pesakit luar & perubatan (tidak termasuk X-ray/pembedahan)", "Wad kelas dua untuk 4 bulan"],
    "2-5 Kali" => ["Pelalian Hepatitis B percuma", "Rawatan pesakit luar & wad kelas dua untuk 4 bulan"],
    "6-10 Kali" => ["Rawatan pesakit luar & wad kelas dua untuk 6 bulan"],
    "11-15 Kali" => ["Rawatan pesakit luar untuk 2 tahun", "Rawatan perubatan & wad kelas dua untuk 1 tahun"],
    "16-20 Kali" => ["Rawatan pesakit luar & wad kelas dua untuk 2 tahun"],
    "21-30 Kali" => ["Rawatan pesakit luar & wad kelas dua untuk 3 tahun"],
    "31-40 Kali" => ["Rawatan pesakit luar & wad kelas satu untuk 4 tahun"],
    "41-50 Kali" => ["Rawatan pesakit luar & wad kelas satu untuk 6 tahun"],
    "50+ Kali" => ["Rawatan pesakit luar & wad kelas satu untuk 10 tahun"]
  ];
  ?>

  <?php foreach ($benefits as $range => $items): ?>
    <div class="tier">
      <h3>🩸 <?= $range ?> Pendermaan</h3>
      <?php foreach ($items as $item): ?>
        <p>✅ <?= $item ?></p>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <p style="text-align: center; margin-top: 40px;">❤️ Terima kasih kerana menjadi penyelamat nyawa!</p>
</div>

</body>
</html>
