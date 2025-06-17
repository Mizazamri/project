<?php
include("connect.php");

$popupMessage = "";
$today = date("Y-m-d");
$currentTime = date("H:i");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_card_number = $_POST['id_card_number'];

    // Step 1: Lookup donor_id using IC number
    $query = "SELECT donor_id FROM donor WHERE id_card_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id_card_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $popupMessage = "❌ Donor with IC number '$id_card_number' not found.";
    } else {
        $row = $result->fetch_assoc();
        $donor_id = $row['donor_id'];

        // Step 2: Gather other inputs
        $donation_id = uniqid('DN');
        $blood_serial = $_POST['blood_serial_num'];
        $volume = $_POST['volume_donation'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $hemoglobin = $_POST['hemoglobin'] ?? null;
        $state = $_POST['state'];
        $event_id = !empty($_POST['event_id']) ? $_POST['event_id'] : null;

        // Combine date and time
        $donation_datetime = $_POST['donation_date'] . ' ' . $_POST['donation_time'] . ':00';

        // Step 3: Insert donation
        $sql = "INSERT INTO donation_record (
                    donation_id, donor_id, weight, height, hemoglobin, donation_date, volume_donation, state, blood_serial_num, event_id
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        } else {
            $stmt->bind_param("sidddsisss", $donation_id, $donor_id, $weight, $height, $hemoglobin, $donation_datetime, $volume, $state, $blood_serial, $event_id);

            if ($stmt->execute()) {
                $popupMessage = "✅ Donation added successfully!";
            } else {
                $popupMessage = "❌ Execute failed: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Donation - Admin Page</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      background: #fff;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: #fff;
      box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    }

    header nav a {
      margin: 0 1rem;
      text-decoration: none;
      color: #000;
    }

    .active {
      color: #fff;
      background: #e63946;
      padding: 0.3rem 0.8rem;
      border-radius: 5px;
    }

    main {
      padding: 2rem;
      max-width: 900px;
      margin: auto;
    }

    h2 {
      margin-bottom: 1rem;
    }

    form {
      display: grid;
      gap: 1rem;
    }

    .form-grid {
      display: grid;
      gap: 1rem;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    input, select {
      width: 100%;
      padding: 0.7rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .button-group {
      margin-top: 2rem;
      display: flex;
      gap: 1rem;
      justify-content: flex-end;
    }

    button {
      padding: 0.7rem 1.5rem;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .cancel {
      background: transparent;
      border: 1px solid #e63946;
      color: #e63946;
    }

    .save {
      background: #e63946;
      color: white;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fff;
      margin: auto;
      padding: 2rem;
      border: 1px solid #ccc;
      width: 90%;
      max-width: 500px;
      border-radius: 8px;
      text-align: center;
      position: relative;
    }

    .close-btn {
      position: absolute;
      right: 1rem;
      top: 1rem;
      font-size: 1.5rem;
      font-weight: bold;
      color: #e63946;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>

<header>
  <div><strong>🩸BloodLink</strong></div>
  <nav>
    <a href="admin-home.php">Home</a>
    <a class="active" href="add-donation.php">Add Donation</a>
    <a href="add-event.php">Add Event</a>
    <a href="#">About Us</a>
  </nav>
</header>

<main>
  <h2>Add Donation</h2>

  <form method="POST" action="">
    <div class="form-grid">
      <input type="date" name="donation_date" value="<?= $today ?>" required>
      <input type="text" name="id_card_number" placeholder="IC Number (e.g., 990101-14-1234)" required>
      <input type="text" name="blood_serial_num" placeholder="Blood Serial Number" required>
      <input type="number" name="volume_donation" placeholder="Amount (ml)" required>
      <input type="number" step="0.01" name="weight" placeholder="Weight (kg)" required>
      <input type="number" step="0.01" name="height" placeholder="Height (cm)" required>
      <input type="number" step="0.1" name="hemoglobin" placeholder="Hemoglobin (g/dL)">
      <input type="text" name="event_id" placeholder="Event ID (optional)">
      <select name="state" required>
        <option value="">Pilih Negeri</option>
        <option value="Johor">Johor</option>
        <option value="Kedah">Kedah</option>
        <option value="Kelantan">Kelantan</option>
        <option value="Melaka">Melaka</option>
        <option value="Negeri Sembilan">Negeri Sembilan</option>
        <option value="Pahang">Pahang</option>
        <option value="Penang">Pulau Pinang</option>
        <option value="Perak">Perak</option>
        <option value="Perlis">Perlis</option>
        <option value="Sabah">Sabah</option>
        <option value="Sarawak">Sarawak</option>
        <option value="Selangor">Selangor</option>
        <option value="Terengganu">Terengganu</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Putrajaya">Putrajaya</option>
        <option value="Labuan">Labuan</option>
      </select>
    </div>

    <div class="button-group">
      <button type="reset" class="cancel">Cancel</button>
      <button type="submit" class="save">Save</button>
    </div>
  </form>
</main>

<!-- Modal -->
<div id="confirmationModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <p id="modalMessage"></p>
  </div>
</div>

<script>
  const popupMessage = <?= json_encode($popupMessage) ?>;

  function closeModal() {
    document.getElementById("confirmationModal").style.display = "none";
  }

  window.onload = function () {
    if (popupMessage) {
      document.getElementById("modalMessage").innerText = popupMessage;
      setTimeout(() => {
        document.getElementById("confirmationModal").style.display = "block";
      }, 1500);
    }
  }

  window.onclick = function (event) {
    const modal = document.getElementById("confirmationModal");
    if (event.target === modal) {
      closeModal();
    }
  }
</script>

</body>
</html>
