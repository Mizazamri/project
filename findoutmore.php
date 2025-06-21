<?php include("navbar.php"); ?>
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <title>Ketahui Lebih Lanjut - BloodLink</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #fff; padding: 20px; }
    h1, h2 { color: #d23241; }
    .accordion { cursor: pointer; padding: 15px; border: none; background-color: #f1f1f1; color: #333; width: 100%; text-align: left; outline: none; font-size: 18px; transition: 0.3s; margin-top: 10px; }
    .active, .accordion:hover { background-color: #ddd; }
    .panel { padding: 0 18px; display: none; background-color: #fafafa; overflow: hidden; border-left: 4px solid #d23241; margin-bottom: 10px; }
    ul { padding-left: 20px; }
    .callout { background: #fff3cd; padding: 10px; border-left: 5px solid #ffc107; margin-top: 10px; }
    .emergency { background: #f8d7da; border-left: 5px solid #dc3545; color: #721c24; }
  </style>
</head>
<body>

<h1>🩸 Ketahui Lebih Lanjut Tentang Pendermaan Darah</h1>

<button class="accordion">✅ Syarat Kelayakan</button>
<div class="panel">
  <ul>
    <li>Sihat tubuh badan</li>
    <li>Berumur 17 - 70 tahun (penderma baru: 17-60, tetap: 17-70)</li>
    <li>Berat badan 45kg ke atas</li>
    <li>Tidur minimum 5 jam</li>
    <li>Tiada masalah kesihatan atau ubat-ubatan</li>
    <li>Makan dalam masa 4 jam sebelum menderma</li>
    <li>Tidak terlibat dalam kegiatan berisiko tinggi seperti:
      <ul>
        <li>Hubungan sejenis, biseksual, pekerja seks, tukar pasangan</li>
        <li>Mengambil dadah secara suntikan</li>
      </ul>
    </li>
    <li>Pendermaan terakhir sekurang-kurangnya 3 bulan lepas</li>
    <li>Tidak mengandung / menyusu / datang haid (hari ke-4 ke atas sahaja boleh)</li>
    <li>Bawa dokumen asal (IC/pasport/lesen)</li>
  </ul>
</div>

<button class="accordion">🕒 Sebelum Pendermaan</button>
<div class="panel">
  <ul>
    <li>Minum air secukupnya</li>
    <li>Tidur sekurang-kurangnya 5 jam</li>
    <li>Layari laman web Pusat Darah Negara untuk kriteria lanjut</li>
  </ul>
</div>

<button class="accordion">💉 Semasa Pendermaan</button>
<div class="panel">
  <ul>
    <li>Pastikan sihat dan makan dalam 4 jam terakhir</li>
    <li>Pakai pakaian selesa dan boleh gulung lengan</li>
    <li>Bawa kad pengenalan atau lesen</li>
  </ul>
</div>

<button class="accordion">❤️ Selepas Pendermaan</button>
<div class="panel">
  <ul>
    <li>Rehat 10 minit dan tekan tempat cucuk jarum</li>
    <li>Makan/minum yang disediakan</li>
    <li>Minum air lebih</li>
    <li>Elak aktiviti berat selama 6–8 jam</li>
    <li><b>Lebam atau bengkak?</b>
      <ul>
        <li>Letak ais selama 10 minit</li>
        <li>Jangan urut kawasan lebam</li>
        <li>Jika sakit, hubungi Pusat Darah Negara segera</li>
      </ul>
    </li>
    <li><b>Reaksi selepas menderma?</b> Gunakan kad CUE dan hubungi nombor kecemasan.</li>
  </ul>
  <div class="callout emergency">
    📞 Hubungi Pusat Darah Negara dalam 24 jam jika anda:
    <ul>
      <li>Merasa darah anda tidak selamat</li>
      <li>Mengalami pening berpanjangan, kebas, bengkak</li>
    </ul>
    <b>Hotline: 03-26132688 </b>
  </div>
</div>

<script>
const acc = document.getElementsByClassName("accordion");
for (let i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    const panel = this.nextElementSibling;
    panel.style.display = panel.style.display === "block" ? "none" : "block";
  });
}
</script>

</body>
</html>
