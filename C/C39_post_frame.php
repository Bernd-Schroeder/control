<?php
session_start();

//39 control_table_item_form
include_once 'class.C_basic_frame.php';
include_once 'C39_post_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C39_post_control() );
$frame->set_frame_switch( 'last_frame' );
$frame->set_next_frame( '' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>