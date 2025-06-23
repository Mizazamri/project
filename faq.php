<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <title>Soalan Lazim - BloodLink</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #fff; color: #333; }
    .container { max-width: 1000px; margin: auto; padding: 20px; }
    h1 { text-align: center; color: #d23241; margin-bottom: 30px; }

    .tabs {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-bottom: 20px;
    }

    .tab-button {
      background-color: #eee;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .tab-button.active {
      background-color: #d23241;
      color: white;
    }

    .faq-content {
      display: none;
      animation: fadeIn 0.5s;
    }

    .faq-content.active {
      display: block;
    }

    .faq-item {
      background: #f9f9f9;
      margin-bottom: 15px;
      padding: 15px;
      border-left: 5px solid #d23241;
      border-radius: 6px;
    }

    .faq-item h3 {
      margin-top: 0;
      color: #b42434;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>

<body>
<?php include("navbar.php") ?>

<div class="container">
  
  <h1>❓ Soalan Lazim (FAQ)</h1>

  <div class="tabs">
    <button class="tab-button active" onclick="showTab('general')">Umum</button>
    <button class="tab-button" onclick="showTab('health')">Kesihatan</button>
    <button class="tab-button" onclick="showTab('system')">Sistem BloodLink</button>
    <button class="tab-button" onclick="showTab('support')">Akses & Sokongan</button>
  </div>

  <div id="general" class="faq-content active">
    <div class="faq-item">
      <h3>Siapa yang layak menderma darah?</h3>
      <p>Individu sihat berumur 17–70 tahun, berat minimum 45kg, dan tidak menghidap penyakit tertentu.</p>
    </div>
    <div class="faq-item">
      <h3>Berapa kerap saya boleh menderma darah?</h3>
      <p>Setiap 3 bulan untuk darah penuh, atau mengikut nasihat pusat darah.</p>
    </div>
    <div class="faq-item">
      <h3>Adakah proses pendermaan menyakitkan?</h3>
      <p>Tidak terlalu sakit, hanya seperti dicucuk jarum biasa.</p>
    </div>
  </div>

  <div id="health" class="faq-content">
    <div class="faq-item">
      <h3>Adakah selamat untuk menderma darah semasa haid?</h3>
      <p>Tidak digalakkan. Tunggu 3 hari selepas haid berakhir.</p>
    </div>
    <div class="faq-item">
      <h3>Adakah darah saya akan diuji?</h3>
      <p>Ya. Semua darah diuji untuk penyakit berjangkit seperti HIV, Hepatitis B & C.</p>
    </div>
    <div class="faq-item">
      <h3>Apa yang perlu saya buat selepas menderma?</h3>
      <p>Rehat secukupnya, minum air, elakkan aktiviti berat 6–8 jam.</p>
    </div>
  </div>

  <div id="system" class="faq-content">
    <div class="faq-item">
      <h3>Bagaimana untuk melihat sejarah pendermaan saya?</h3>
      <p>Log masuk dan pergi ke halaman "View History".</p>
    </div>
    <div class="faq-item">
      <h3>Bolehkah saya tukar maklumat profil?</h3>
      <p>Ya, pergi ke halaman "Profile" dan klik "Edit".</p>
    </div>
    <div class="faq-item">
      <h3>Apa itu kad CUE?</h3>
      <p>Kad pengecualian sukarela jika penderma rasa darah tidak selamat untuk didermakan.</p>
    </div>
  </div>

  <div id="support" class="faq-content">
    <div class="faq-item">
      <h3>Saya lupa kata laluan. Apa perlu saya buat?</h3>
      <p>Klik "Lupa Kata Laluan" di halaman log masuk.</p>
    </div>
    <div class="faq-item">
      <h3>Bagaimana saya tahu ada kempen darah berhampiran?</h3>
      <p>Semak di halaman "Event", atau ikuti kami di Instagram.</p>
    </div>
  </div>
</div>

<script>
function showTab(tabId) {
  const tabs = document.querySelectorAll('.faq-content');
  const buttons = document.querySelectorAll('.tab-button');

  tabs.forEach(tab => tab.classList.remove('active'));
  buttons.forEach(btn => btn.classList.remove('active'));

  document.getElementById(tabId).classList.add('active');
  event.target.classList.add('active');
}
</script>
</body>

<?php include ("footer.html") ?>
</html>
