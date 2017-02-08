<?php
session_start();

//35 select image for article
include_once 'class.D_basic_frame.php';
include_once 'D35_post_control.php';

$frame = new D_basic_frame();
$frame->set_control( new D35_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'D7_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>