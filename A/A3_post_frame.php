<?php
session_start();

// I forgott my password
include_once 'class.A_basic_frame.php';
include_once 'A3_post_control.php';

$frame = new A_basic_frame();
$frame->set_control( new A3_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( "A1_frame.php" );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>