<?php
session_start();

//12  upload document data
include_once 'class.C_basic_frame.php';
include_once 'C12_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C12_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C13_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>