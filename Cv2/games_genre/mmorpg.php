<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "../header.html" ?>
    <!--My css-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!--My JS functions-->
    <script type="text/javascript" src="../open-img-modal.js"></script>
    <title>MMORPG</title>
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
        <video autoplay muted loop src="../images/bg%20videos/Magical%20Ground.mp4"
               poster="../images/bg%20videos/magical%20ground.jpg"></video>
    </div>
    <div class="dws-wrapper">
        <section class="container-image">
            <div id="tera" class="img-box" style="background-image: url(../images/tera.jpg);"
                 onclick="onClick(this.id)">
                <span class="bor-left-right"></span>
                <span class="bor-top-bottom"></span>
                <div class="img-content">
                    <h2>TERA: The Next</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
                        voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
                        nesciunt et eligendi quae? Ea, accusantium.</p>
                </div>
            </div>
            <div id="revelation" class="img-box" style="background-image: url(../images/revelation.jpg);"
                 onclick="onClick(this.id)">
                <span class="bor-left-right"></span>
                <span class="bor-top-bottom"></span>
                <div class="img-content">
                    <h2>Revelation online</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
                        voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
                        nesciunt et eligendi quae? Ea, accusantium.</p>
                </div>
            </div>
            <div id="blade_and_soul" class="img-box" style="background-image: url(../images/Blade_and_Soul.jpg);"
                 onclick="onClick(this.id)">
                <span class="bor-left-right"></span>
                <span class="bor-top-bottom"></span>
                <div class="img-content">
                    <h2>Blade and Soul</h2>
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