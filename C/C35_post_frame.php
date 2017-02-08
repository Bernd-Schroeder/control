<?php
session_start();

//35 select image for article
include_once 'class.C_basic_frame.php';
include_once 'C35_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C35_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C7_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>