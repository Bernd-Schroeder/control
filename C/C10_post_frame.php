<?php
session_start();

//10  upload image data
include_once 'class.C_basic_frame.php';
include_once 'C10_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C10_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C11_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>