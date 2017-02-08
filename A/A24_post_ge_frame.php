<?php
session_start();

// language german control
include_once 'class.A_basic_frame.php';
include_once 'A24_post_ge_control.php';
              

$frame = new A_basic_frame();
$frame->set_control( new A24_post_ge_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>