<?php
session_start();

//37  show comment data list
include_once 'class.C_basic_frame.php';
include_once 'C37_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C37_post_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>