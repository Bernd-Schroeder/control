<?php
session_start();

// 
include_once 'class.B_basic_frame.php';
include_once 'B0_pre_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B0_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'B7_frame.php' );

if(
(isset($_GET["entity_name"]) && is_string($_GET["entity_name"])) AND
(isset($_GET["entity_id"]) && is_numeric($_GET["entity_id"])))
{ 
$frame->get_param_list()->add_parameter( "&entity_name=" . $_GET["entity_name"] );
$frame->get_param_list()->add_parameter( "&entity_id=" . $_GET["entity_id"] );
}

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>