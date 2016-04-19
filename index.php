<?php

include_once "writeTextOnImage.php";

// Write on image
$rImg = writeTextOnImage([
    "imagePath" => "images/image.jpg",
    "rgbColor"  => [255,255,255],
    "fontFilePath"  => "fonts/OpenSans-CondLight.ttf",
    "fontSize"  => 60,
    "textPosition" => [75,125],
    "text"      => "Test"
]);

//Set header
header('Content-type: image/jpeg');

//Output image
imagejpeg($rImg,NULL,100);
imagedestroy($rImg);

?>
