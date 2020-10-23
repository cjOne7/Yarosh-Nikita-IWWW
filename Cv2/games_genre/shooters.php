<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "../header.html" ?>
    <title>Shooters</title>
</head>
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
    <div class="dws-wrapper">
        <section class="container-image">
            <div id="doom" class="img-box" style="background-image: url(../images/doom.png);"
                 onclick="onClick(this.id)">
                <span class="bor-left-right"></span>
                <span class="bor-top-bottom"></span>
                <div class="img-content">
                    <h2>Doom</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
                        voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
                        nesciunt et eligendi quae? Ea, accusantium.</p>
                </div>
            </div>
            <div id="borderlands_pre" class="img-box"
                 style="background-image: url(../images/borderlands%20the%20pre%20sequel.jpg);"
                 onclick="onClick(this.id)">
                <span class="bor-left-right"></span>
                <span class="bor-top-bottom"></span>
                <div class="img-content">
                    <h2>Borderlands the pre-sequel</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
                        voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
                        nesciunt et eligendi quae? Ea, accusantium.</p>
                </div>
            </div>
            <div id="serious_sam4" class="img-box" style="background-image: url(../images/Serious_Sam4.jpg);"
                 onclick="onClick(this.id)">
                <span class="bor-left-right"></span>
                <span class="bor-top-bottom"></span>
                <div class="img-content">
                    <h2>Serious Sam 4</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
                        voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
                        nesciunt et eligendi quae? Ea, accusantium.</p>
                </div>
            </div>
        </section>
    </div>
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