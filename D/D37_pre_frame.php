<?php
session_start();

// 37 show all comments to an article
include_once 'class.D_basic_frame.php';
include_once 'D37_pre_control.php';

$frame = new D_basic_frame();
$frame->set_control( new D37_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'D37_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>