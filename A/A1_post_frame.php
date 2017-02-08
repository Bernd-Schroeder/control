<?php
session_start();

// Registration control
include_once 'class.A_basic_frame.php';
include_once 'A1_post_control.php';

$frame = new A_basic_frame();
$frame->set_control( new A1_post_control() );
$frame->set_frame_switch( 'to_control' );
$frame->set_next_frame( 'B_post_frame.php' );

$frame->get_param_list()->add_parameter( "?function=" . (int)0 );
$next_frame = $frame->return_next_frame();

header("Location:" . $next_frame );
exit;
?>