<?php
$style = "/css/style.css";
$title = "Hack and slash";
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
        <video autoplay muted loop src="../images/bg%20videos/blue_neurons.mp4"
               poster="../images/bg%20videos/start_blue_neurons.jpg"></video>
    </div>
    <?php
    $arrLinks = array("../images/grim%20dawn.jpg", "../images/path_of_exile.jpg", "../images/diablo3.jpg");
    include_once "../imgbox.php";
    ?>
</section>
<section id="about">
    <div>
        <h1>About</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid commodi deserunt ducimus expedita mollitia
            non, sapiente. Ad beatae repudiandae voluptatem? Alias cupiditate expedita iste minima numquam pariatur
            rerum vitae voluptate.</p>
    </div>
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