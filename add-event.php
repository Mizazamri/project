<?php
session_start();
if (!isset($_SESSION['hospital_id'])) {
    header("Location: login.php");
    exit;
}

include("connect.php");

$success = false;
$error = "";
$title = $state = $district = $event_date = $start_time = $end_time = $description = $location = $imagePath = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['event_name'] ?? '';
    $state = $_POST['state'] ?? '';
    $district = $_POST['district'] ?? '';
    $event_date = $_POST['date'] ?? '';
    $start_time = $_POST['start_time'] ?? '';
    $end_time = $_POST['end_time'] ?? '';
    $description = $_POST['event_details'] ?? '';
    $location = $_POST['location'] ?? '';
    $hospital_id = $_SESSION['hospital_id'];
    $event_id = "EVT" . date("YmdHis", strtotime("$event_date $start_time")) . rand(100, 999);

    // Image upload
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['event_image']['tmp_name'];
        $name = uniqid() . "_" . basename($_FILES['event_image']['name']);
        $type = mime_content_type($tmp);
        $size = $_FILES['event_image']['size'];

        if (!in_array($type, ['image/jpeg', 'image/png', 'image/gif'])) {
            $error = "Invalid image type.";
        } elseif ($size > 2 * 1024 * 1024) {
            $error = "Image must be under 2MB.";
        } else {
            $imagePath = "eventimg/" . $name;
            move_uploaded_file($tmp, $imagePath);
        }
    } else {
        $error = "Image required.";
    }

    if (!$error) {
        $stmt = $conn->prepare("INSERT INTO event (event_id, image_path, event_name, state, district, event_date, starttime, endtime, event_details, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $event_id, $imagePath, $title, $state, $district, $event_date, $start_time, $end_time, $description, $location);

        if ($stmt->execute()) {
            $stmt2 = $conn->prepare("INSERT INTO event_management (event_id, hospital_id) VALUES (?, ?)");
            $stmt2->bind_param("si", $event_id, $hospital_id);
            if ($stmt2->execute()) {
                $success = true;
            } else {
                $error = "Failed to link hospital to event: " . $stmt2->error;
            }
            $stmt2->close();
        } else {
            $error = "Database error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Event - Admin Page</title>
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

    .form-grid {
      display: grid;
      gap: 1rem;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    label {
      font-weight: bold;
    }

    textarea, select, input {
      width: 100%;
      padding: 0.7rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      resize: vertical;
    }

    .upload-box {
      border: 2px dashed #ccc;
      height: 150px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      border-radius: 8px;
      position: relative;
    }

    .upload-box input[type="file"] {
      opacity: 0;
      width: 100%;
      height: 100%;
      position: absolute;
      cursor: pointer;
    }

    .upload-box span {
      z-index: 1;
      color: #777;
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
    <a href="#">Home</a>
    <a href="add-donation.php">Add Donation</a>
    <a class="active" href="add-event.php">Add Event</a>
    <a href="#">About Us</a>
  </nav>
</header>

<main>
  <h2>Add Event</h2>
  <?php if ($success): ?>
    <div>✅ Event added. <a href="event.php">View events</a></div>
<?php elseif ($error): ?>
    <div>❌ <?= htmlspecialchars($error) ?></div>
<?php endif; ?>

  <form id="eventForm" method="POST" enctype="multipart/form-data">
    <div class="form-grid">
      <div class="upload-box" id="uploadBox">
        <span id="uploadText">Drop image here or click to upload</span>
        <input type="file" name="event_image" accept="image/*" required onchange="previewImage(event)" />
      </div>

      <div>
        <label for="event_name">Tajuk Program</label>
        <textarea id="event_name" name="event_name" required></textarea>
      </div>

      <div>
        <label for="state">Negeri</label>
        <select name="state" id="state" required onchange="updateDistricts()">
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Penang">Penang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
           </select>
      </div>

      <div>
        <label for="district">District</label>
        <select name="district" id="district" >
          <option value="">-- Choose district --</option>
        </select>
      </div>

      <div>
        <label for="location">Location</label>
         <textarea id="location" name="location" required></textarea>
      </div>

      <div>
        <label for="date">Program Date</label>
        <input type="date" id="date" name="date" required />
      </div>

      <div>
        <label for="start_time">Start Time</label>
        <input type="time" id="start_time" name="start_time" required />
      </div>

      <div>
        <label for="end_time">End Time</label>
        <input type="time" id="end_time" name="end_time" required />
      </div>


      <div>
        <label for="event_details">Description</label>
        <textarea id="event_details" name="event_details" required></textarea>
      </div>
    </div>

    <div class="button-group">
      <button type="reset" class="cancel">Cancel</button>
      <button type="submit" class="save">Save</button>
    </div>
  </form>
</main>

<script>
  function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("uploadBox").style.backgroundImage = `url('${e.target.result}')`;
        document.getElementById("uploadBox").style.backgroundSize = "cover";
        document.getElementById("uploadBox").style.backgroundPosition = "center";
        document.getElementById("uploadText").style.display = "none";
      };
      reader.readAsDataURL(file);
    }
  }

  const districtMap = {
    "Johor": ["Batu Pahat", "Johor Bahru", "Kluang","Kota Tinggi","Kulaijaya","Mersing","Muar","Pontian","Segamat"],
    "Kedah": ["Kota Setar","Kubang Pasu","Padang Terap","Langkawi","Kuala Muda", "Yan", "Sik","Baling","Kulim","Bandar Baharu","Pendang","Pokok Sena"],
    "Kelantan": ["Bachok","Kota Bharu","Machang", "Pasir Mas","Pasir Puteh","Tanah Merah" ,"Tumpat","Gua Musang","Kuala Krai","Jeli"],
    "Melaka": ["Melaka Tengah","Jasin","Alor Gajah"],
    "Negeri Sembilan": ["Jelebu","Kuala Pilah","Port Dickson","Rembau","Seremban", "Tampin", "Jempol"],
    "Pahang": ["Bentong","Cameron Highlands","Jerantut","Kuantan","Lipis","Pekan","Raub", "Temerloh","Rompin","Maran","Bera"],
    "Penang": ["Seberang Perai", "George Town"],
    "Perak": ["Batang Padang","Manjung","Kinta","Kerian","Kuala Kangsar","Larut & Matang","Hilir Perak","Hulu Perak","Selama", "Perak Tengah", "Kampar"],
    "Sabah": ["Kota Kinabalu","Papar","Kota Belud","Tuaran","Kudat","Ranau", "Sandakan","Labuk & Sugut","Kinabatangan", "Tawau","Lahad Datu","Semporna","Keningau","Tambunan","Pensiangan","Tenom","Beaufort","Kuala Penyu","Sipitang","Penampang","Kota Marudu","Pitas","Kunak","Tongod","Putatan"],
    "Sarawak": ["Kuching", "Sri Aman", "Sibu","Miri","Limbang","Sarikei","Kapit","Samarahan","Bintulu","Mukah","Betong"],
    "Selangor": ["Klang","Kuala Langat","Kuala Selangor","Sabak Bernam","Ulu Langat","Ulu Selangor", "Petaling", "Gombak","Sepang"],
    "Terengganu": ["Besut","Dungun","Kemaman","Kuala Terengganu", "Hulu Terengganu", "Marang","Setiu"],
    "Wilayah Persekutuan Kuala Lumpur": [""],
    "Wilayah Persekutuan Labuan": [""],
    "Wilayah Persekutuan Putrajaya": ["Putrajaya"],
    "Perlis": [""]
  };

function updateDistricts() {
    const state = document.getElementById("state").value;
    const districtSelect = document.getElementById("district");

    districtSelect.innerHTML = '<option value="">-- Choose option --</option>';

    const districts = districtMap[state];

    if (!districts || districts.length === 0) {
        districtSelect.innerHTML = '<option value="">No district</option>';
        districtSelect.disabled = true;
    } else if (districts.length === 1) {
        const onlyOption = districts[0];
        districtSelect.innerHTML = `<option value="${onlyOption}" selected>${onlyOption}</option>`;
        districtSelect.disabled = true;
    } else {
        districtSelect.disabled = false;
        districts.forEach(d => {
            const option = document.createElement("option");
            option.value = d;
            option.textContent = d;
            districtSelect.appendChild(option);
        });
    }
}


    
</script>

</body>
</html>
