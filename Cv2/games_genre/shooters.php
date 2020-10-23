<?php
$style = "/css/style.css";
$title = "Shooters";
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
        <video autoplay muted loop src="../images/bg%20videos/Space%20Sphere%20Gaming.mp4"></video>
    </div>
    <?php
    $arrLinks = array("../images/doom.png", "../images/borderlands%20the%20pre%20sequel.jpg", "../images/Serious_Sam4.jpg");
    include_once "../imgbox.php";
    ?>
</section>
<section id="about">
    <h1>About</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores expedita quis recusandae totam voluptas! A
        facere in maxime repudiandae sint! Autem explicabo fugit harum ipsum iusto nihil nobis sed similique!</p>
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