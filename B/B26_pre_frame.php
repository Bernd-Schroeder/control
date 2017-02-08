<?php
session_start();

// the search
include_once 'class.B_basic_frame.php';
include_once 'B26_pre_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B26_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'B26_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>