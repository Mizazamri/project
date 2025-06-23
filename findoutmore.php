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

<h1>🩸 Learn More About Blood Donation</h1>

<!-- Eligibility Requirements -->
<button class="accordion">✅ Eligibility Criteria</button>
<div class="panel">
  <ul>
    <li>In good health</li>
    <li>Aged 17 - 70 years (new donors: 17–60, regular donors: 17–70)</li>
    <li>Minimum weight of 45kg</li>
    <li>At least 5 hours of sleep</li>
    <li>No health issues or current medications</li>
    <li>Have eaten within the last 4 hours</li>
    <li>Not involved in high-risk activities such as:
      <ul>
        <li>Same-sex relations, bisexuality, sex work, partner swapping</li>
        <li>Injecting drugs</li>
      </ul>
    </li>
    <li>Last donation was at least 3 months ago</li>
    <li>Not pregnant / breastfeeding / menstruating (only after day 4 of period)</li>
    <li>Bring original documents (IC/passport/driver’s license)</li>
  </ul>
</div>

<!-- Before Donation -->
<button class="accordion">🕒 Before Donation</button>
<div class="panel">
  <ul>
    <li>Drink plenty of water</li>
    <li>Get at least 5 hours of sleep</li>
    <li>Visit the National Blood Centre website for full eligibility guidelines</li>
  </ul>
</div>

<!-- During Donation -->
<button class="accordion">💉 During Donation</button>
<div class="panel">
  <ul>
    <li>Ensure you feel well and have eaten within the last 4 hours</li>
    <li>Wear comfortable clothing with sleeves that can be rolled up</li>
    <li>Bring your ID or driver's license</li>
  </ul>
</div>

<!-- After Donation -->
<button class="accordion">❤️ After Donation</button>
<div class="panel">
  <ul>
    <li>Rest for 10 minutes and apply pressure on the needle site</li>
    <li>Eat/drink the refreshments provided</li>
    <li>Drink more fluids</li>
    <li>Avoid heavy activities for 6–8 hours</li>
    <li><b>Bruising or swelling?</b>
      <ul>
        <li>Apply ice for 10 minutes</li>
        <li>Do not massage the bruised area</li>
        <li>If in pain, contact the National Blood Centre immediately</li>
      </ul>
    </li>
    <li><b>Reaction after donating?</b> Use the CUE card and call the emergency number.</li>
  </ul>
  <div class="callout emergency">
    📞 Contact the National Blood Centre within 24 hours if you:
    <ul>
      <li>Feel your blood may not be safe for donation</li>
      <li>Experience prolonged dizziness, numbness, or swelling</li>
    </ul>
    <b>Hotline: 03-26132688 </b>
    <img src="Hotline1.jpeg">
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
