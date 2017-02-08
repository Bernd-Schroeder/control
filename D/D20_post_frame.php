<?php
session_start();

//20 accept/interview time slot
include_once 'class.D_basic_frame.php';
include_once 'D20_post_control.php';

$frame = new D_basic_frame();
$frame->set_control( new D20_post_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'D5_frame.php' );

$next_frame = $frame->return_next_frame();

header("Location:" . $next_frame );
exit;
?>