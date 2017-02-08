<?php
session_start();

// contact control
include_once 'class.A_basic_frame.php';
include_once 'A25_post_control.php';

$frame = new A_basic_frame();
$frame->set_control( new A25_post_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>