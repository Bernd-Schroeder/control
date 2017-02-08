<?php
session_start();

//9  show csv import
include_once 'class.C_basic_frame.php';
include_once 'C27_pre_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C27_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C27_frame.php' );

if(isset($_GET["cvs"]) && is_numeric($_GET["cvs"]))
{ $cvs = htmlspecialchars( $_GET["cvs"] ); }
else
{ $cvs = (int)0; }

$frame->get_param_list()->add_parameter( "&cvs=" . $cvs );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>