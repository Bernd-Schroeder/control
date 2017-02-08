<?php
session_start();
// E 

include_once 'excel_post_control.php';

$excel_control = new excel_post_control();
$excel_control->batch_run();
?>