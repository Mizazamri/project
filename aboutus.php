<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>BloodLink</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f7f7f7;
      color: #333;
    }

    /* Slideshow */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: 40px auto;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .mySlides {
      display: none;
    }

    .mySlides img {
      width: 100%;
      border-radius: 10px;
    }

    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 22px;
      border-radius: 0 3px 3px 0;
      user-select: none;
      background-color: rgba(0,0,0,0.5);
      transform: translateY(-50%);
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    .dot {
      cursor: pointer;
      height: 12px;
      width: 12px;
      margin: 0 4px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.3s ease;
    }

    .active, .dot:hover {
      background-color: #e74c3c;
    }

    .dot-container {
      text-align: center;
      padding-top: 10px;
    }

    /* About Section */
    .content {
      background: white;
      max-width: 1000px;
      margin: 40px auto;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .content h1 {
      font-size: 32px;
      margin-bottom: 20px;
      color: #d62828;
    }

    .content p {
      font-size: 16px;
      line-height: 1.7;
      margin-bottom: 18px;
    }

    /* Responsive */
    @media only screen and (max-width: 600px) {
      .prev, .next {
        font-size: 14px;
        padding: 12px;
      }

      .content {
        padding: 20px;
      }

      .content h1 {
        font-size: 26px;
      }

      .content p {
        font-size: 15px;
      }
    }
  </style>
</head>
<body>

  <?php include("navbar.php") ?>

  <!-- Slideshow -->
  <div class="slideshow-container">
    <div class="mySlides fade">
      <img src="Image/First.png" alt="Slide 1">
    </div>
    <div class="mySlides fade">
      <img src="Image/Second.png" alt="Slide 2">
    </div>
    <div class="mySlides fade">
      <img src="Image/Third.png" alt="Slide 3">
    </div>
    <div class="mySlides fade">
      <img src="Image/Fourth.png" alt="Slide 4">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
  </div>

  <div class="dot-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
  </div>

  
  <div class="content">
    <h1>ABOUT US</h1>
    <p>BloodLink is a school project developed by students of Universiti Teknikal Malaysia Melaka, as part of the Web Programming and System Development course. Our goal is to use technology to support and improve the blood donation process in Malaysia, addressing real-world issues through innovative digital solutions.</p>
    <p>Inspired by the limitations of the traditional red book system, BloodLink serves as a centralized digital platform where blood donors can easily track their donation history, and stay informed about upcoming donation events—all in one place.</p>
    <p>Through this project, we also aim to support hospitals and blood banks by improving blood stock management and accelerating emergency response with accurate, real-time records. By raising awareness and encouraging regular donations, we hope to foster a healthier and more responsive community.</p>
    <p>Our work aligns with Sustainable Development Goal 3: Good Health and Well-Being, as we strive to contribute to a more connected and efficient healthcare system. Together, let’s build a future where every drop truly counts.</p>
  
    <h2>GitHub</h2>
    <a href="https://github.com/Mizazamri/project.git " target="_blank" title="GitHub" style="margin-right: 10px;">
    <img src="image/github.jpg" width="40px"/>
    </a>
    <p> View our project source code here </p>

</div>

  <!-- Slideshow JS -->
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = slides.length }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }

    // Auto slideshow
    let autoIndex = 0;
    autoShowSlides();

    function autoShowSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      autoIndex++;
      if (autoIndex > slides.length) { autoIndex = 1; }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[autoIndex - 1].style.display = "block";
      dots[autoIndex - 1].className += " active";
      setTimeout(autoShowSlides, 7000);
    }
  </script>

  <?php include("footer.html") ?>

</body>
</html>
