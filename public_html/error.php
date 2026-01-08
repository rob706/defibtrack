<?php

switch($_GET['error']){

    default:
    case "bounce":
        header("location: /",true,301);
        break;

    case "404":
        header('HTTP/1.1 404 Not Found',true,404);
        break;

    case "401":
        header('HTTP/1.1 401 Unauthorized',true,401);
        break;

    case "403":
        header('HTTP/1.1 403 Forbidden',true,403);
        break;

}

?>