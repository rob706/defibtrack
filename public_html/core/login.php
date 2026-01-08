<?php
ob_start();
session_start();

@require_once("../../core/config.php");
$conn = new mysqli($server, $user, $pass, $db);

$user = $conn->real_escape_string(strtolower($_POST['user']));
$pass = md5(md5($conn->real_escape_string($_POST['pass']).$secret));

$cals = $conn->query("
  select
    u.uid,
    u.name,
    u.level
  from
    users as u
  where
    u.uname = '".$user."'
    and u.password = '".$pass."'
    and u.active=1
");

$info = $cals->fetch_assoc();

#print_r($info);

if($info['level'] >= 1){
  $_SESSION['uid'] = $info['uid'];
  $_SESSION['name'] = $info['name'];
  $_SESSION['level'] = $info['level'];

  $cals = $conn_update->query("update users set lastlogin = '".date('Y-m-d H:i:s')."' where uid = '".$info['uid']."'");

}else{
  $_SESSION['uid'] = $_SESSION['name'] = $_SESSION['level'] = "";
}

header("location: /");
ob_end_flush();
?>
