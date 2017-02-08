<?php
session_start();

// language danish control
include_once 'class.B_basic_frame.php';
include_once 'B24_post_da_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B24_post_da_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>