<?php
$style = "/css/style.css";
$title = "MMORPG";
include_once "../header.php";
?>
<body>
<?php
include_once "../navbar.html";
?>
<section class="showcase">
    <div class="btn">
        <div class="link-about">
            <a href="#about">Read More</a>
        </div>
    </div>
    <div class="video-container">
        <video autoplay muted loop src="../images/bg%20videos/Magical%20Ground.mp4"
               poster="../images/bg%20videos/magical%20ground.jpg"></video>
    </div>
    <?php
    $arrLinks = array("../images/tera.jpg", "../images/revelation.jpg", "../images/Blade_and_Soul.jpg");
    include_once "../imgbox.php";
    ?>
</section>
<section id="about">
    <h1>About</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A assumenda atque culpa dicta doloribus enim est, eum
        fugit illo laboriosam maiores nihil numquam perferendis quasi sapiente, sint tempora tempore voluptatem?</p>
</section>

<div id="modal-block" class="modal" onclick="this.style.display='none'">
    <span class="close">&times;</span>
    <div class="modal-content">
        <img id="img01" width="100%">
    </div>
    <div id="caption"></div>
</div>
</body>
</html>