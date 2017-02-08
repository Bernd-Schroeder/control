<?php
session_start();

//34 show all related events
include_once 'class.B_basic_frame.php';
include_once 'B34_post_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B34_post_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>