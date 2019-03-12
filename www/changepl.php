<?php 
include_once 'connection.php';
$s_id= $_POST["s_id"];
$option=$_POST["option"];
$pl=$_POST["pl"];
if($mysqli->query("UPDATE `place` SET $pl='$option' WHERE s_id='$s_id'")){
    $message = 'Changes saved!';
    $color = 'green';
    $out = array(
        'message' => $message,
        'color' => $color
    );
    echo json_encode($out);
    die;     
}
else{
    $message = 'Error saving changes!';
    $color = 'red';
    $out = array(
        'message' => $message,
        'color' => $color
    );  
    echo json_encode($out);
    die;    
}           
            
?>
