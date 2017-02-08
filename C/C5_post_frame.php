<?php
session_start();

//5  team member list
include_once 'C5_post_control.php';

$control = new C5_post_control();
$control->batch_run();
?>