<?php
ob_start();
session_start();

@require_once("../core/config.php");
#@require_once("core/functions.php");

$uid = $name = $level = "";

$uid = @$_SESSION['uid'];
$name = @$_SESSION['name'];
$level = @$_SESSION['level'];
$clientid = @$_SESSION['clientid'];
$cal_opt = @$_SESSION['cal_opt'];
$nr = 0;

## Check if user is disabled

if(!empty($uid)){
$cals = $conn->query("
  select 
    u.uid,
    u.name,
    u.level
  from
    users as u
  where
    u.uid = ".$uid."
    and u.active=1
") or die($conn->error);

$nr = @$cals->num_rows;

}

if($nr != 0){

  $uinfo = $cals->fetch_assoc();

  $name = @$uinfo['name'];
  $level = @$uinfo['level'];
  $clientid = @$uinfo['clientid'];

} else {

  $_SESSION['uid'] = $_SESSION['name'] = $_SESSION['level'] = $_SESSION['clientid'] = "";

}

#$level = 3;

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Debib Tracker</title>

    <link href="/core/css/modal.css" rel="stylesheet">
    <link href="/core/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/core/css/dashboard.css" rel="stylesheet">
    <script src="/core/js/jquery-3.6.1.min.js"></script>
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Defib Tracker</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
      <?php if(!empty($_SESSION['uid'])){ ?><nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <span data-feather="home" class="align-text-bottom"></span>
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/log_aed.htm">
                <span data-feather="compass" class="align-text-bottom"></span>
                Log AED
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/core/login.php">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Sign Out
              </a>
            </li>
            
          </ul>
        </div>
      </nav><?php } ?>
    

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php

        $pg = "home";
        $dpage = "../pages/".$pg.".pg";
        if(!empty($_GET['pg'])) $pg = $_GET['pg'];
        if(empty($_SESSION['uid'])) $pg = "login";

        $page = "../pages/".$pg.".pg";

        if(file_exists($page)){
        include($page);
        } else {
        include($dpage);
        }
        ?>
    </main>
  </div>
</div>
    <script src="/core/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
ob_end_flush();
?>