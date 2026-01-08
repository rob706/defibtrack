<?php

ob_start();
session_start();

require_once("../../core/config.php");

print_r($_POST);
echo "<br><br>";
print_r($_FILES);

$aed_location = $aed_w3w = $aed_condition = $mon_start = $mon_end = $tue_start = $tue_end = $wed_start = $wed_end = $thur_start = $thur_end = $fri_start = $fri_end = $sat_start = $sat_end = $sun_start = $sun_end = $aed_signage = $aed_make = $aed_model = $aed_assettag = $aed_serialnumber = $aed_batterystatus = $aed_manufacturedate = $box_assettag = $box_accesscode = $box_power = $otherinfo = $loggedby = "";

$available_mon = $available_tue = $available_wed = $available_thur = $available_fri = $available_sat = $available_sun = $aed_cemark = $aed_registered = $box_locked = 0;

if(!empty($_POST['aed_location']))          $aed_location = $conn_update->real_escape_string($_POST['aed_location']);
if(!empty($_POST['aed_w3w']))               $aed_w3w = $conn_update->real_escape_string($_POST['aed_w3w']);
if(!empty($_POST['aed_condition']))         $aed_condition = $conn_update->real_escape_string($_POST['aed_condition']);
if(!empty($_POST['mon_start']))             $mon_start = $conn_update->real_escape_string($_POST['mon_start']);
if(!empty($_POST['mon_end']))               $mon_end = $conn_update->real_escape_string($_POST['mon_end']);
if(!empty($_POST['available_mon']))         $available_mon = $conn_update->real_escape_string($_POST['available_mon']);
if(!empty($_POST['tue_start']))             $tue_start = $conn_update->real_escape_string($_POST['tue_start']);
if(!empty($_POST['tue_end']))               $tue_end = $conn_update->real_escape_string($_POST['tue_end']);
if(!empty($_POST['available_tue']))         $available_tue = $conn_update->real_escape_string($_POST['available_tue']);
if(!empty($_POST['wed_start']))             $wed_start = $conn_update->real_escape_string($_POST['wed_start']);
if(!empty($_POST['wed_end']))               $wed_end = $conn_update->real_escape_string($_POST['wed_end']);
if(!empty($_POST['available_wed']))         $available_wed = $conn_update->real_escape_string($_POST['available_wed']);
if(!empty($_POST['thur_start']))            $thur_start = $conn_update->real_escape_string($_POST['thur_start']);
if(!empty($_POST['thur_end']))              $thur_end = $conn_update->real_escape_string($_POST['thur_end']);
if(!empty($_POST['available_thur']))        $available_thur = $conn_update->real_escape_string($_POST['available_thur']);
if(!empty($_POST['fri_start']))             $fri_start = $conn_update->real_escape_string($_POST['fri_start']);
if(!empty($_POST['fri_end']))               $fri_end = $conn_update->real_escape_string($_POST['fri_end']);
if(!empty($_POST['available_fri']))         $available_fri = $conn_update->real_escape_string($_POST['available_fri']);
if(!empty($_POST['sat_start']))             $sat_start = $conn_update->real_escape_string($_POST['sat_start']);
if(!empty($_POST['sat_end']))               $sat_end = $conn_update->real_escape_string($_POST['sat_end']);
if(!empty($_POST['available_sat']))         $available_sat = $conn_update->real_escape_string($_POST['available_sat']);
if(!empty($_POST['sun_start']))             $sun_start = $conn_update->real_escape_string($_POST['sun_start']);
if(!empty($_POST['sun_end']))               $sun_end = $conn_update->real_escape_string($_POST['sun_end']);
if(!empty($_POST['available_sun']))         $available_sun = $conn_update->real_escape_string($_POST['available_sun']);
if(!empty($_POST['aed_signage']))           $aed_signage = $conn_update->real_escape_string($_POST['aed_signage']);
if(!empty($_POST['aed_make']))              $aed_make = $conn_update->real_escape_string($_POST['aed_make']);
if(!empty($_POST['aed_model']))             $aed_model = $conn_update->real_escape_string($_POST['aed_model']);
if(!empty($_POST['aed_assettag']))          $aed_assettag = $conn_update->real_escape_string($_POST['aed_assettag']);
if(!empty($_POST['aed_cemark']))            $aed_cemark = $conn_update->real_escape_string($_POST['aed_cemark']);
if(!empty($_POST['aed_serialnumber']))      $aed_serialnumber = $conn_update->real_escape_string($_POST['aed_serialnumber']);
if(!empty($_POST['aed_batterystatus']))     $aed_batterystatus = $conn_update->real_escape_string($_POST['aed_batterystatus']);
if(!empty($_POST['aed_manufacturedate']))   $aed_manufacturedate = $conn_update->real_escape_string($_POST['aed_manufacturedate']);
if(!empty($_POST['aed_registered']))        $aed_registered = $conn_update->real_escape_string($_POST['aed_registered']);
if(!empty($_POST['box_locked']))            $box_locked = $conn_update->real_escape_string($_POST['box_locked']);
if(!empty($_POST['box_assettag']))          $box_assettag = $conn_update->real_escape_string($_POST['box_assettag']);
if(!empty($_POST['box_accesscode']))        $box_accesscode = $conn_update->real_escape_string($_POST['box_accesscode']);
if(!empty($_POST['box_power']))             $box_power = $conn_update->real_escape_string($_POST['box_power']);
if(!empty($_POST['otherinfo']))             $otherinfo = $conn_update->real_escape_string($_POST['otherinfo']);
$loggedby = $_SESSION['uid'];

if($available_mon == "on") $available_mon = 1;
if($available_tue == "on") $available_tue = 1;
if($available_wed == "on") $available_wed = 1;
if($available_thur == "on") $available_thur = 1;
if($available_fri == "on") $available_fri = 1;
if($available_sat == "on") $available_sat = 1;
if($available_sun == "on") $available_sun = 1;

if($aed_cemark == "on") $aed_cemark = 1;
if($aed_registered == "on") $aed_registered = 1;
if($box_locked == "on") $box_locked = 1;

$conn_update->query("
    insert into aed_machines
        (
            `aed_location`,
            `aed_w3w`,
            `aed_condition`,
            `aed_time_mon_start`,
            `aed_time_mon_end`,
            `aed_available_mon`,
            `aed_time_tue_start`,
            `aed_time_tue_end`,
            `aed_available_tue`,
            `aed_time_wed_start`,
            `aed_time_wed_end`,
            `aed_available_wed`,
            `aed_time_thur_start`,
            `aed_time_thur_end`,
            `aed_available_thur`,
            `aed_time_fri_start`,
            `aed_time_fri_end`,
            `aed_available_fri`,
            `aed_time_sat_start`,
            `aed_time_sat_end`,
            `aed_available_sat`,
            `aed_time_sun_start`,
            `aed_time_sun_end`,
            `aed_available_sun`,
            `aed_signage`,
            `aed_make`,
            `aed_model`,
            `aed_assettag`,
            `aed_cemark`,
            `aed_serialnumber`,
            `aed_batterystatus`,
            `aed_manufacturedate`,
            `aed_registered`,
            `box_locked`,
            `box_assettag`,
            `box_accesscode`,
            `box_power`,
            `otherinfo`,
            `loggedby`
        ) 
        values
        (
            '".$aed_location."',
            '".$aed_w3w."',
            '".$aed_condition."',
            '".$mon_start."',
            '".$mon_end."',
            '".$available_mon."',
            '".$tue_start."',
            '".$tue_end."',
            '".$available_tue."',
            '".$wed_start."',
            '".$wed_end."',
            '".$available_wed."',
            '".$thur_start."',
            '".$thur_end."',
            '".$available_thur."',
            '".$fri_start."',
            '".$fri_end."',
            '".$available_fri."',
            '".$sat_start."',
            '".$sat_end."',
            '".$available_sat."',
            '".$sun_start."',
            '".$sun_end."',
            '".$available_sun."',
            '".$aed_signage."',
            '".$aed_make."',
            '".$aed_model."',
            '".$aed_assettag."',
            '".$aed_cemark."',
            '".$aed_serialnumber."',
            '".$aed_batterystatus."',
            '".$aed_manufacturedate."',
            '".$aed_registered."',
            '".$box_locked."',
            '".$box_assettag."',
            '".$box_accesscode."',
            '".$box_power."',
            '".$otherinfo."',
            '".$loggedby."'
        )
");

$lastid = $conn_update->insert_id;

if(!empty($_FILES['aed_location_pic'])){

    // Select file type
    $imageFileType = strtolower(pathinfo($_FILES['aed_location_pic']['name'], PATHINFO_EXTENSION));

    // Get Image Info    
    $name = $lastid."_location.".$imageFileType;
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($name);

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Upload file
        move_uploaded_file($_FILES['aed_location_pic']['tmp_name'], $target_dir . $name);
    }
} 

if(!empty($_FILES['aed_condition_pic'])){
    
    // Select file type
    $imageFileType = strtolower(pathinfo($_FILES['aed_condition_pic']['name'], PATHINFO_EXTENSION));

    // Get Image Info    
    $name = $lastid."_condition.".$imageFileType;
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($name);

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Upload file
        move_uploaded_file($_FILES['aed_condition_pic']['tmp_name'], $target_dir . $name);
    }
} 

header("location: /");

ob_end_flush();

?>