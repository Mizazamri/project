<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - BloodLink</title>
    <link rel="stylesheet" href="home.css" type="text/css">
</head>
<body>
    <?php include("navbar.php"); ?>

    <container class="intro">
    <h1>Intro</h1>
    <p class="subtitle">Subtitle</p>
    <div class="cta-buttons">
      <a href="login.php"><button>🩸 Donate Now!</button></a>
        
      <button>📘 let's get to know more about blood donation!</button>
    </div>
  </container>

    <section class="slideshow">
    <div class="slide" style="display:block;">
        <div class="text-overlay">
            <h2>Be a Hero</h2>
            <p>Donate blood, save lives.</p>
            <a href="event.php" class="btn-slide">Join Event</a>
        </div>
        <img src="image/b1.jpg" alt="Slide 1">
    </div>
    <div class="slide">
        <div class="text-overlay">
            <h2>Track Your Donations</h2>
            <p>Stay up to date with BloodLink</p>
            <a href="signin.php" class="btn-slide">Sign In</a>
        </div>
        <img src="image/b2.jpg" alt="Slide 2">
    </div>
    <div class="slide">
        <div class="text-overlay">
            <h2>Are you eligible?</h2>
            <p>Find out more.</p>
            <a href="findoutmore.php" class="btn-slide">See More</a>
        </div>
        <img src="image/b6.jpg" alt="Slide 3">
    </div>
    <div class="slide">
        <div class="text-overlay">
            <h2>Have donated?</h2>
            <p>Look at your benefit here.</p>
            <a href="benefit.php" class="btn-slide">Read More</a>
        </div>
        <img src="image/Benefits-of-blood-donation.png" alt="Slide 4">
    </div>
    <button class="prev" onclick="plusSlides(-1)">❮</button>
    <button class="next" onclick="plusSlides(1)">❯</button>
</section>

    <article>
        <header><h2>The Story of BloodLink 💗</h2></header>
        <p>In Malaysia, blood donors receive a red book to track their donation history, but it can be easily lost or forgotten. This makes it difficult for donors to keep track of their eligibility and past contributions, which can lead to missed opportunities to donate.

            BloodLink is a digital platform created to replace the traditional red book by providing an easier way for donors to view their donation history, receive reminders, and check upcoming blood donation events online. The system helps users stay informed and engaged by offering convenient access to essential donation information.
            
            Additionally, administrators can manage donor records, update donation histories and create or publish blood donation events by state. This makes the entire process more efficient and organized, helping both donors and organizers contribute to a more effective blood donation system.</p>
    </article>
   
    <?php include ("footer.html") ?>

    <div id="cookie-banner">
    <button id="close-cookie-banner" class="close-btn">&times;</button>
    <p>This website uses cookies to ensure you get the best experience.</p>
    <button id="accept-cookies">Accept</button>
    <button id="reject-cookies">Reject</button>
    </div>


    <script>
    window.onload = function () {
        const consent = localStorage.getItem("cookieConsent");

        // Show banner unless user accepted or rejected
        if (consent !== "accepted" && consent !== "rejected") {
            document.getElementById("cookie-banner").style.display = "block";
        }
    };

    function handleCookieConsent(value) {
        localStorage.setItem("cookieConsent", value);
        document.getElementById("cookie-banner").style.display = "none";
    }

    document.getElementById("accept-cookies").onclick = function () {
        handleCookieConsent("accepted");
    };

    document.getElementById("reject-cookies").onclick = function () {
        handleCookieConsent("rejected");
    };

    document.getElementById("close-cookie-banner").onclick = function () {
        document.getElementById("cookie-banner").style.display = "none";
        // Do not save anything so it appears again next time
    };

    let slideIndex = 0;
const slides = document.querySelectorAll(".slide");

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? "block" : "none";
    });
}
function plusSlides(n) {
    slideIndex = (slideIndex + n + slides.length) % slides.length;
    showSlide(slideIndex);
}

showSlide(slideIndex); // Show first slide
</script>

</body>
</html>    