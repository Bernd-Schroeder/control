<?php
session_start();
// service

include_once 'service_control.php';

$service = new service_control();
$service->batch_run();
?>