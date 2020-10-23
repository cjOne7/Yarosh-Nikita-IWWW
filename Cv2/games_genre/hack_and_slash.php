<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "../header.html" ?>
    <!--My css-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!--My JS functions-->
    <script type="text/javascript" src="../open-img-modal.js"></script>
	<title>Hack and slash</title>
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
		<video autoplay muted loop src="../images/bg%20videos/blue_neurons.mp4"
			   poster="../images/bg%20videos/start_blue_neurons.jpg"></video>
	</div>
	<div class="dws-wrapper">
		<section class="container-image">
			<div id="grim_dawn" class="img-box" style="background-image: url(../images/grim%20dawn.jpg);"
				 onclick="onClick(this.id)">
				<span class="bor-left-right"></span>
				<span class="bor-top-bottom"></span>
				<div class="img-content">
					<h2>Grim Dawn</h2>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
						voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
						nesciunt et eligendi quae? Ea, accusantium.</p>
				</div>
			</div>
			<div id="path_of_exile" class="img-box" style="background-image: url(../images/path_of_exile.jpg);"
				 onclick="onClick(this.id)">
				<span class="bor-left-right"></span>
				<span class="bor-top-bottom"></span>
				<div class="img-content">
					<h2>Path of Exile</h2>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
						voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
						nesciunt et eligendi quae? Ea, accusantium.</p>
				</div>
			</div>
			<div id="diablo" class="img-box" style="background-image: url(../images/diablo3.jpg);"
				 onclick="onClick(this.id)">
				<span class="bor-left-right"></span>
				<span class="bor-top-bottom"></span>
				<div class="img-content">
					<h2>Diablo 3</h2>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse voluptas ipsum inventore
						voluptatibus unde nihil ducimus tempora beatae atque consectetur natus, odit, minima odio,
						nesciunt et eligendi quae? Ea, accusantium.</p>
				</div>
			</div>
		</section>
	</div>
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