<?php

switch($_GET['ext']){
    default:
    case 'jpg':
    case 'jpeg':
        header("Content-Type: image/jpeg");
        break;
    case 'png':
        header("Content-Type: image/png");
        break;
    case 'gif':
        header("Content-Type: image/gif");
        break;
}


$path = $path = "../../images/".$_GET['pic'].".".$_GET['ext'];

echo file_get_contents($path);

?>