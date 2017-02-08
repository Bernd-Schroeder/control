<?php
session_start();

//5  team member list
include_once 'D5_post_control.php';

$control = new D5_post_control();
$control->batch_run();
?>