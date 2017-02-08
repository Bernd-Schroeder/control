<?php
session_start();

// change to a specific event
include_once 'class.D_basic_frame.php';
include_once 'D0_pre_control.php';

$frame = new D_basic_frame();
$frame->set_control( new D0_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'D7_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>