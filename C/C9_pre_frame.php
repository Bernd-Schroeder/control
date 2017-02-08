<?php
session_start();

//9  show calender
include_once 'class.C_basic_frame.php';
include_once 'C9_pre_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C9_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C9_frame.php' );

date_default_timezone_set('Europe/Berlin');
$today    = new DateTime( "now" );

if(isset($_GET["y"]) && is_numeric($_GET["y"]))
{ $year = htmlspecialchars( $_GET["y"] ); }
else
{ $year = $today->format("Y"); }

if(isset($_GET["m"]) && is_numeric($_GET["m"]))
{ $month = htmlspecialchars( $_GET["m"] ); }
else
{ $month = $today->format("m"); }

if(isset($_GET["d"]) && is_numeric($_GET["d"]))
{ $day = htmlspecialchars( $_GET["d"] ); }
else
{ $day = $today->format("d"); }

if(isset($_GET["modus"]) && is_string($_GET["modus"]))
{ $modus = htmlspecialchars( $_GET["modus"] ); }
else
{ $modus = "week"; }

if( $modus == "week" )
{
date_default_timezone_set('Europe/Berlin');
$startstamp = mktime(0,0,0,$month,$day,$year);
$start_week = date("W", $startstamp);
$datetime = new DateTime();
$datetime->setISODate( $year, $start_week );
$year = $datetime->format('Y');
$month = $datetime->format('m');
$day = $datetime->format('d');
}



$frame->get_param_list()->add_parameter( "&y=" . $year );
$frame->get_param_list()->add_parameter( "&m=" . $month );
$frame->get_param_list()->add_parameter( "&d=" . $day );
$frame->get_param_list()->add_parameter( "&modus=" . $modus );

$next_frame = $frame->return_next_frame();

header("Location:" . $next_frame );
exit;
?>