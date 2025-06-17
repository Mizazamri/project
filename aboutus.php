<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodLink</title>
<style>
*
{
    box-sizing:border-box
}
body
{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin: 0;
}
.mySlides
{
    display: none;
}
img
{
    vertical-align: middle;
}

.slideshow-container
{
    max-width: 1000px;
    position: relative;
    margin: auto;
}

.prev, .next
{
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

.next
{
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover
{
    background-color: rgba(0,0,0,0.8);
}

.text
{
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

.numbertext
{
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

.dot
{
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}
.active, .dot:hover
{
    background-color: #717171;
}
.fade
{
    animation-name: fade;
    animation-duration: 1.5s;
}
@keyframes fade
{
    from
    {
        opacity: .4;
    }
    to
    {
        opacity: 1;
    }
}
@media only screen and (max-width: 300px)
{
    .prev, .next, .text
    {
        font-size: 11px;
    }
}
.content
{
    padding: 20px;
    text-align: center;
}
</style>
</head> 
<body>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="Image/First.png" style="width: 100%">
            <div class="text">1</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="Image/Second.png" style="width: 100%">
            <div class="text">2</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="Image/Third.png" style="width: 100%">
            <div class="text">3</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="Image/Fourth.png" style="width: 100%">
            <div class="text">4</div>
        </div>

        <a class="prev"
        onclick="plusSlides(-1)">❮</a>
        <a class="next"
        onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div style="text-align: center">
    <span class="dot"
    onclick="currentSlide(1)"></span>
    <span class="dot"
    onclick="currentSlide(2)"></span>
    <span class="dot"
    onclick="currentSlide(3)"></span>
    <span class="dot"
    onclick="currentSlide(4)"></span>
    </div>

    <div class="content">
        <h1>ABOUT US</h1>
        <p>At BloodLink, we believe in the power of technology to save lives. 
            Our mission is to make blood donation simpler, smarter, and more accessible for everyone. 
            Born out of the need to replace the traditional red book, BloodLink is a digital platform that 
            helps blood donors track their donation history, receive reminders, and stay updated on upcoming donation events—all in one place.</p>
        <p>We aim to support hospitals and blood banks by streamlining blood stock management and improving emergency response times through digital records.
             Our system also helps raise awareness about the importance of regular blood donation,
             encouraging more people to contribute to a healthier community.</p>
        <p>BloodLink proudly supports Sustainable Development Goal 3: Good Health and Well-Being, 
            by enhancing healthcare services and building a reliable blood supply network for Malaysia.</p>
        <p>Together, let’s create a future where every drop counts.</p>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n)
        {
            showSlides(slideIndex += n);
        }
        function currentSlide(n)
        {
            showSlides(slideIndex = n);
        }
        function showSlides(n)
        {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length)
        {
            slideIndex = 1
        }
            if ( n < 1)
        {
            slideIndex = slides.length;
        }
            for (i = 0; i < slides.length; i++)
        {
            slides[i].style.display= "none";
        }
            for (i = 0; i < dots.length; i++)
        {
            dots[i].className = dots[i].className.replace(" active", "");
        }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>

    <script>
        let autoIndex= 0;
        autoShowSlides();

        function autoShowSlides()
        {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }
        autoIndex++
        if (autoIndex > slides.length)
        {
            autoIndex = 1;
        }
        for (i = 0; i < dots.length; i++)
        {
            dots[i].className = dots[i].className.replace(" active", "");
        }
            slides[autoIndex-1].style.display = "block";
            dots[autoIndex-1].className += " active";
            setTimeout(autoShowSlides, 7000);
        }
    </script>

</body>
</html>