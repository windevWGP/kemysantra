<?php 

include("thumbnail.class.php");
$photo= $_GET['src'];
$width = $_GET['width'];
$height = $_GET['height'];

$tg = new thumbnailGenerator;
$tg->generate($photo, $width, $height, 'jpg');

