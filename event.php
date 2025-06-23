<?php
include "connect.php";
session_start();

// Determine if user is admin
$is_admin = isset($_SESSION['hospital_id']);
$hospital_id = $_SESSION['hospital_id'] ?? null;

// AJAX request: Filter by state/district
if (isset($_GET['state']) || isset($_GET['district'])) {
    header('Content-Type: application/json');

    $state = $_GET['state'] ?? '';
    $district = $_GET['district'] ?? '';

    $sql = "SELECT e.event_id, e.event_name, e.event_date, e.starttime, e.endtime, e.event_details, e.state, e.district, e.image_path, em.hospital_id
            FROM event e
            LEFT JOIN event_management em ON e.event_id = em.event_id
            WHERE 1=1";

    $params = [];
    $types = "";

    if (!empty($state)) {
        $sql .= " AND e.state = ?";
        $params[] = $state;
        $types .= "s";
    }
    if (!empty($district)) {
        $sql .= " AND e.district = ?";
        $params[] = $district;
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }

    echo json_encode($events);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BloodLink Events</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="events.css">
</head>

<body>
    <?php include "navbar.php"; ?>
    
    <div class="filters">
        <h2>Choose your state:</h2>
        <select id="state" onchange="updateDistricts()">
    </div>

      <option value="">STATES</option>
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

    <select id="district" onchange="filterEvents()" disabled>
      <option value="">DISTRICT</option>
    </select>
  </div>

  <div id="events" class="event-container"></div>
</main>

<script>
const isAdmin = <?= $is_admin ? 'true' : 'false' ?>;
const hospitalId = <?= $hospital_id ?? 'null' ?>;

const stateDistricts = {
  "Johor": ["Batu Pahat", "Johor Bahru", "Kluang","Kota Tinggi","Mersing","Muar","Pontian","Segamat"],
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
  "Wilayah Persekutuan Kuala Lumpur": [],
  "Wilayah Persekutuan Labuan": [],
  "Wilayah Persekutuan Putrajaya": ["Putrajaya"],
  "Perlis": []
};

function updateDistricts() {
  const state = document.getElementById("state").value;
  const districtSelect = document.getElementById("district");
  districtSelect.innerHTML = "";

  if (!stateDistricts[state] || stateDistricts[state].length === 0) {
    districtSelect.disabled = true;
    districtSelect.innerHTML = `<option value="">DISTRICT</option>`;
  } else {
    districtSelect.disabled = false;
    districtSelect.innerHTML = `<option value="">DISTRICT</option>`;
    stateDistricts[state].forEach(d => {
      const option = document.createElement("option");
      option.value = d;
      option.textContent = d;
      districtSelect.appendChild(option);
    });
  }
  filterEvents();
}

function filterEvents() {
  const state = document.getElementById("state").value;
  const district = document.getElementById("district").value;

    fetch(`?state=${state}&district=${district}`)
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById("events");
            if (data.length === 0) {
                container.innerHTML = "<p>No events found.</p>";
                return;
            }
            container.innerHTML = data.map(e => `
                <div class="event">
                    <img src="${e.image_path}" alt="${e.event_name}" style="max-width:100%;height:auto;">
                    <h3>${e.event_name}</h3>
                    <p><strong>Date:</strong> ${e.event_date} | ${e.starttime} - ${e.endtime}</p>
                    <p><strong>Location:</strong> ${e.district}, ${e.state}</p>
                    <p>${e.event_details}</p>
                    ${isAdmin && hospitalId === parseInt(e.hospital_id) ? `
                        <a href="manage-event.php?action=edit&event_id=${e.event_id}">Edit</a> |
                        <a href="manage-event.php?action=delete&event_id=${e.event_id}" onclick="return confirm('Are you sure?')">Delete</a>
                    ` : ""}
                </div>
            `).join("");
        });
}

window.onload = () => {
  updateDistricts();
  filterEvents();
};
</script>

</body>

<?php include ("footer.html") ?>
</html>