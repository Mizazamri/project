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
<h1>❓ Frequently Asked Questions (FAQ)</h1>

  <div class="tabs">
    <button class="tab-button active" onclick="showTab('general')">General</button>
    <button class="tab-button" onclick="showTab('health')">Health</button>
    <button class="tab-button" onclick="showTab('system')">BloodLink System</button>
    <button class="tab-button" onclick="showTab('support')">Access & Support</button>
  </div>

  <!-- GENERAL -->
  <div id="general" class="faq-content active">
    <div class="faq-item">
      <h3>Who is eligible to donate blood?</h3>
      <p>Healthy individuals aged 17–70 years, with a minimum weight of 45kg, and without certain medical conditions.</p>
    </div>
    <div class="faq-item">
      <h3>How often can I donate blood?</h3>
      <p>Every 3 months for whole blood, or according to the advice of the blood center.</p>
    </div>
    <div class="faq-item">
      <h3>Is the donation process painful?</h3>
      <p>Not very painful, it feels like a regular needle prick.</p>
    </div>
  </div>

  <!-- HEALTH -->
  <div id="health" class="faq-content">
    <div class="faq-item">
      <h3>Is it safe to donate blood during menstruation?</h3>
      <p>Not recommended. Please wait 3 days after your period ends.</p>
    </div>
    <div class="faq-item">
      <h3>Will my blood be tested?</h3>
      <p>Yes. All donated blood is screened for infectious diseases such as HIV, Hepatitis B & C.</p>
    </div>
    <div class="faq-item">
      <h3>What should I do after donating?</h3>
      <p>Get enough rest, drink water, and avoid heavy activities for 6–8 hours.</p>
    </div>
  </div>

  <!-- SYSTEM -->
  <div id="system" class="faq-content">
    <div class="faq-item">
      <h3>How can I view my donation history?</h3>
      <p>Log in and go to the "View History" page.</p>
    </div>
    <div class="faq-item">
      <h3>Can I change my profile information?</h3>
      <p>Yes, go to the "Profile" page and click "Edit".</p>
    </div>
    
  </div>

  <!-- SUPPORT -->
  <div id="support" class="faq-content">
    <div class="faq-item">
      <h3>How do I know if there’s a blood donation campaign near me?</h3>
      <p>Check the "Event" page or follow us on Instagram.</p>
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
