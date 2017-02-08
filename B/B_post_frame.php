<?php
session_start();

// B header
include_once 'class.B_basic_frame.php';
include_once 'B_post_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B_post_control() );
$frame->set_frame_switch( 'from_control' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>