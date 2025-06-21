<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - BloodLink</title>
    <link rel="stylesheet" href="home.css" type="text/css">
</head>
<body>
    <header>
        <div id="branding">
            <img src="image/logo.png" alt="BloodLink Logo" id="logo">
            <h1>BloodLink</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php" class="nav-btn">Home</a></li>
                <li><a href="event.php" class="nav-btn">Event</a></li>
                <li><a href="faq.php" class="nav-btn">FAQ</a></li> 
                <li><a href="aboutus.php" class="nav-btn">About Us</a></li>
                <li><a href="profile.php" class="nav-btn">Profile</a></li>
            </ul>
        </nav>
        <div id="user-icon">
            <a href="profile.php" title="Profile">
        <img src="image/user-icon.png" alt="User Icon">
    </a>
</div>

    </header>

    <section class="intro">
        <h2>Intro</h2>
        <p class="subtitle">subtitle</p>
        <div class="cta-buttons">
            <button>🩸 donate now!</button>
            <button>💬 let's get to know more about blood donation! 💉</button>
        </div>
    </section>

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
    <button class="prev" onclick="plusSlides(-1)">❮</button>
    <button class="next" onclick="plusSlides(1)">❯</button>
</section>

    <article>
        <header><h2>The Story of BloodLink 💗</h2></header>
        <p>In Malaysia, blood donors receive a red book to track their donation history, but it can be easily lost or forgotten. This makes it difficult for donors to keep track of their eligibility and past contributions, which can lead to missed opportunities to donate.

            BloodLink is a digital platform created to replace the traditional red book by providing an easier way for donors to view their donation history, receive reminders, and check upcoming blood donation events online. The system helps users stay informed and engaged by offering convenient access to essential donation information.
            
            Additionally, administrators can manage donor records, update donation histories and create or publish blood donation events by state. This makes the entire process more efficient and organized, helping both donors and organizers contribute to a more effective blood donation system.</p>
    </article>
    <div class="social-icons">
        <a href="https://www.figma.com/design/19HkocX3ODbiYf8dz16Gpx/PROJECT-SYSTEM-DEV?node-id=0-1&p=f&t=6B9v0hkXyywTloMS-0" target="_blank">
            <img src="image/figma.avif" alt="Figma" width="80">
        </a>
        <a href="" target="_blank">
            <img src="image/insta1.png" alt="Email" width="80">
        </a>
        <a href="" target="_blank">
            <img src="image/youtube1.png" alt="Youtube" width="80">
        </a>
    </div>

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