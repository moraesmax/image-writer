<?php
/**
  * @param array $cfg
  *     @param string $text
  *     @param string $imagePath
  *     @param array  $rgbColor[R,G,B]
  *     @param float  $fontSize
  *     @param array  $textPosition[X, Y]
  *     @param string $fontFilePath
  * @return resource
  *
  * Writes a certain text over an image.
  */

function writeTextOnImage($cfg) {

    $text = $cfg["text"] ?? "";

    // Load image
    if(isset($cfg["imagePath"])) {
        $rImg = ImageCreateFromJPEG($cfg["imagePath"]);
    } else {
        return false;
    }

    //Define color
    if(isset($cfg["rgbColor"])) {
        $rgb = $cfg["rgbColor"];
        $color = imagecolorallocate($rImg, $rgb[0], $rgb[1], $rgb[2]);
    } else {
        $color = imagecolorallocate($rImg, 0, 0, 0);
    }

    //Define font size
    if(isset($cfg["fontSize"])) {
        $fontSize = $cfg["fontSize"];
    } else {
        $fontSize = 20;
    }

    //Define text position
    if(isset($cfg["textPosition"])) {
        $textPosition = $cfg["textPosition"];
    } else {
        $textPosition = [0,0];
    }

    //Define font file and write text on image
    if(isset($cfg["fontFilePath"])) {
        $font = $cfg["fontFilePath"];
        imagettftext($rImg, $fontSize, 0, $textPosition[0], $textPosition[1], $color, $font, $text);
    } else {
        imagestring($rImg,5, $textPosition[0], $textPosition[1], $text, $color);
    }

    return $rImg;
}
?>
