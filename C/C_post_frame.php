<?php
session_start();

// C header and left vertical menue
include_once 'class.C_basic_frame.php';
include_once 'C_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C_post_control() );
$frame->set_frame_switch( 'from_control' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>