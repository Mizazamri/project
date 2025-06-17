<?php
include("connect.php"); // make sure this file connects using $conn

if (isset($_GET['state']) || isset($_GET['district'])) {
    header('Content-Type: application/json');

    $state = $_GET['state'] ?? '';
    $district = $_GET['district'] ?? '';

    $sql = "SELECT event_name, event_date,starttime,endtime,event_details, state, district,image_path FROM event WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($state)) {
        $sql .= " AND state = ?";
        $params[] = $state;
        $types .= "s";
    }
    if (!empty($district)) {
        $sql .= " AND district = ?";
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
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <header>
        <h1>BloodLink</h1>
        <nav>
            <button onclick="navigate('home')">Home</button>
            <button onclick="navigate('event')">Event</button>
            <button onclick="navigate('faq')">FAQ</button>
            <button onclick="navigate('about')">About Us</button>
        </nav>
    </header>

    <main>
        <div class="filters">
            <select id="state" onchange="updateDistricts()">
                <option value="">Select State</option>
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
                <option value="Wilayah PErsekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
            </select>
            <select id="district" onchange="filterEvents()" disabled>
                <option value="">Select District</option>
            </select>
        </div>

        <section id="events">
            <!-- Events will be loaded here -->
        </section>
    </main>

   <script>
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

    function navigate(section) {
        alert("Navigating to " + section);
    }

    function updateDistricts() {
        const state = document.getElementById("state").value;
        const districtSelect = document.getElementById("district");

        // Clear current options
        districtSelect.innerHTML = "";

        if (state === "") {
            districtSelect.disabled = true;
            districtSelect.innerHTML = `<option value="">Select District</option>`;
            return;
        }

        const districts = stateDistricts[state];
        if (!districts || districts.length === 0) {
            districtSelect.disabled = true;
            districtSelect.innerHTML = `<option value=""></option>`;
        } else {
            districtSelect.disabled = false;
            districtSelect.innerHTML = `<option value="">Select District</option>`;
            districts.forEach(d => {
                const option = document.createElement("option");
                option.value = d;
                option.textContent = d;
                districtSelect.appendChild(option);
            });
        }

        filterEvents(); // Filter events on state change
    }

    function filterEvents() {
        const state = document.getElementById("state").value;
        const district = document.getElementById("district").value;

        fetch(`?state=${state}&district=${district}`)
            .then(res => res.json())
            .then(data => {
                const eventContainer = document.getElementById("events");
                if (data.length === 0) {
                    eventContainer.innerHTML = "<p>No events found.</p>";
                    return;
                }

                eventContainer.innerHTML = data.map(event => `
                <div class="event">
                <img src="${event.image_path}" alt="${event.event_name}" style="max-width: 100%; height: auto;" />
                <h3>${event.event_name}</h3>
                <p><strong>Date:</strong> ${event.event_date}</p>
                <p><strong>Time:</strong> ${event.starttime} - ${event.endtime}</p>
                <p><strong>Location:</strong> ${event.district}, ${event.state}</p>
                <p>${event.event_details}</p>
                </div>
                `).join("");

            });
    }

    window.onload = function () {
        updateDistricts();
        filterEvents();
    };
</script>

</body>
</html>
