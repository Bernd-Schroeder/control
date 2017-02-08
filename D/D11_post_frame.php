<?php
session_start();

//11  show image data list
include_once 'class.D_basic_frame.php';
include_once 'D11_post_control.php';

$frame = new D_basic_frame();
$frame->set_control( new D11_post_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>