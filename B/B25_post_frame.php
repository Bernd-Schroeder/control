<?php
session_start();

// contact control
include_once 'class.B_basic_frame.php';
include_once 'B25_post_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B25_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'B7_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>