<?php
session_start();

//27_4  member import
include_once 'class.C_basic_frame.php';
include_once 'C27_4_post_control.php';

$control = new C27_4_post_control();

$frame = new C_basic_frame();
$frame->set_control( $control );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C27_frame.php' );

$frame->get_param_list()->add_parameter( "&cvs=" . (int)4 );
$next_frame = $frame->return_next_frame() . "&document_id=" . $control->get_csv_id();

header("Location:" . $next_frame );
exit;
?>