<?php
session_start();

//33  event registration
include_once 'class.C_basic_frame.php';
include_once 'C33_pre_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C33_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C33_frame.php' );

if(isset($_GET["event_type"]) && is_numeric($_GET["event_type"]))
{ $event_type = htmlspecialchars( $_GET["event_type"] ); }
else
{ $event_type = (int)0; }

$frame->get_param_list()->add_parameter( "&event_type=" . $event_type );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>