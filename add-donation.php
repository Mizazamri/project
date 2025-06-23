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
        $donation_date = $_POST['donation_date'] ;

        // Step 3: Insert donation
        $sql = "INSERT INTO donation_record (
                    donation_id, donor_id, weight, height, hemoglobin, donation_date, volume_donation, state, blood_serial_num, event_id
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        } else {
            $stmt->bind_param("sidddsisss", $donation_id, $donor_id, $weight, $height, $hemoglobin, $donation_date, $volume, $state, $blood_serial, $event_id);

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
  <link rel="stylesheet" href="add-donation.css" type="text/css">

</head>
<body>
<?php include ("admin-navbar.php") ?>
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
  <?php include ("footer.html") ?>
</html>
