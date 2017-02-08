<?php
session_start();

//38 task form
include_once 'class.C_basic_frame.php';
include_once 'C38_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C38_post_control() );
$frame->set_frame_switch( 'to_control' );
$frame->set_next_frame( 'C_post_frame.php' );

$frame->get_param_list()->add_parameter( "&function=" . (int)29 );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>

