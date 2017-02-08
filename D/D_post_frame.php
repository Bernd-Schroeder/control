<?php
session_start();

// D header and left vertical menue
include_once 'class.D_basic_frame.php';
include_once 'D_post_control.php';

$frame = new D_basic_frame();
$frame->set_control( new D_post_control() );
$frame->set_frame_switch( 'from_control' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>