<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C33_3_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 21.11.2016, 10:59:06 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('C33_post_control.php');

/* user defined includes */
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BC2-includes begin
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BC2-includes end

/* user defined constants */
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BC2-constants begin
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BC2-constants end

/**
 * Short description of class C33_3_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C33_3_post_control
    extends C33_post_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute team
     *
     * @access public
     * @var Integer
     */
    public $team = null;

    /**
     * Short description of attribute event_id
     *
     * @access public
     * @var Integer
     */
    public $event_id = null;

    /**
     * Short description of attribute day_array
     *
     * @access public
     * @var Integer
     */
    public $day_array = null;

    /**
     * Short description of attribute slot_array
     *
     * @access public
     * @var Integer
     */
    public $slot_array = null;

    /**
     * Short description of attribute time_slice
     *
     * @access public
     * @var String
     */
    public $time_slice = null;

    /**
     * Short description of attribute last_slot
     *
     * @access public
     * @var Integer
     */
    public $last_slot = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if (empty($_POST["name"]) OR !$this->is_start_datetime_set())
     { $completed = FALSE; }
     else
     {
     $this->name = htmlspecialchars( $_POST["name"] );
     $this->admin_id = $_SESSION['watch_id'];
     $this->team_id = $_SESSION['watched_id'];
     
     $this->day_array = array();
     $this->slot_array = array();
     $this->last_slot = (int)0;
     
     $this->set_time_slice();
     }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_start_datetime_set()
    {
     $success = FALSE;
     date_default_timezone_set('Europe/Berlin');
     
     if ( !empty($_POST['start_1_date']) )
     {
     if( !empty($_POST['start_1_time']) )
     {
     $date_str = $_POST['start_1_date'] . " " . $_POST['start_1_time'];
     try
     {
     $this->start_date = new DateTime($date_str);
     $this->end_date = clone( $this->start_date );
     $success = TRUE;
     }
     catch (Exception $e) {;}
     }
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function set_time_slice()
    {
     // 1 = 2 Minuten
     // 2 = 5 Minuten;
     // 3 = 10 Minuten;
     // 4 = 15 Minuten;
     // 5 = 20 Minuten;
     // 6 = 25 Minuten;
     // 7 = 30 Minuten;
     // 8 = 45 Minuten;
     // 9 = 60 Minuten;
     
     if( empty($_POST["time_slice"]) )
     { $slice = (int)4; }
     else
     { $slice = $_POST["time_slice"]; }
     
     switch( $slice )
     {
     case ( 1 ):
     $this->time_slice = '+2 minutes';
     break;
     case ( 2 ):
     $this->time_slice = '+5 minutes';
     break;
     case ( 3 ):
     $this->time_slice = '+10 minutes';
     break;
     case ( 4 ):
     $this->time_slice = '+15 minutes';
     break;
     case ( 5 ):
     $this->time_slice = '+20 minutes';
     break;
     case ( 6 ):
     $this->time_slice = '+25 minutes';
     break;
     case ( 7 ):
     $this->time_slice = '+30 minutes';
     break;
     case ( 8 ):
     $this->time_slice = '+45 minutes';
     break;
     case ( 9 ):
     $this->time_slice = '+60 minutes';
     break;
     default:
     $this->time_slice = '+15 minutes';
     break;
     } // end switch
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function set_day_array()
    {
     date_default_timezone_set('Europe/Berlin');
     
     if( !empty($_POST['start_1_date']) AND !empty($_POST['start_1_time']) )
     {
     $date_time = $this->get_datetime( 'start_1_date', 'start_1_time' );
     if( $date_time != NULL )
     { $this->day_array[] = $date_time; }
     }
     
     if( !empty($_POST['start_2_date']) AND !empty($_POST['start_2_time']) )
     {
     $date_time = $this->get_datetime( 'start_2_date', 'start_2_time' );
     if( $date_time != NULL )
     { $this->day_array[] = $date_time; }
     }
     
     if( !empty($_POST['start_3_date']) AND !empty($_POST['start_3_time']) )
     {
     $date_time = $this->get_datetime( 'start_3_date', 'start_3_time' );
     if( $date_time != NULL )
     { $this->day_array[] = $date_time; }
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  date
     * @param  time
     */
    public function get_datetime($date, $time)
    {
     $start_date = NULL;
     date_default_timezone_set('Europe/Berlin');
     
     if ( !empty($_POST[$date]) )
     {
     if( !empty($_POST[$time]) )
     {
     $date_str = $_POST[$date] . " " . $_POST[$time];
     try
     { $start_date = new DateTime($date_str); }
     catch (Exception $e) {;}
     }
     }
     return $start_date;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  amount
     */
    public function set_slot_array($amount)
    {
     $day_count = count( $this->day_array );
     $slot_count = (int)0;
     
     while ( $slot_count < $amount )
     {
     for( $n = 0; $n < $day_count; $n++ )
     {
     $slot = $this->day_array[ $n ];
     $this->slot_array[] = $slot;
     
     $new_slot = clone( $slot );
     $new_slot->modify( $this->time_slice );
     $this->day_array[ $n ]  = $new_slot;
     $slot_count++;
     }
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $success = TRUE;
     $this->team = new team();
     $this->team->set_id( $this->team_id );
     $this->team->load();
     
     $interview_count = $this->team->get_interview_member_list_count();
     
     if( $interview_count > (int)0 )
     {
     $this->event_id = $this->generate_event();
     //$this->event_id = 1;
     if( $this->event_id > (int)0 )
     {
     // set all slots ...
     $this->set_day_array();
     $this->set_slot_array( $interview_count );
     
     // ready to run ...
     $up_team = $this->team->get_upteam();
     
     // catch all the approved members in all sub - teams
     $pupil_list = $up_team->get_approved_recursive_pupil_list();
     $this->generate_day_event( $pupil_list );
     
     } // end if event_id > 0
     } // end if interview_count > 0
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate_event()
    {
     $event_id = $this->generate_new_event( (int)3 );
     if ( $event_id > (int)0 )
     {
     $this->generate_owner_team_event( $event_id, $this->team_id );
     $this->generate_all_admin_event_member( $event_id, $this->team_id );
     }
     return $event_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  pupil_list
     */
    public function generate_day_event($pupil_list)
    {
     for ( $n=0; $n < $pupil_list->get_item_count(); $n++ )
     {
     // get all members - 1 by 1
     $pupil = $pupil_list->get_item( $n );
     // get all the followers from this member
     $follower_list = $pupil->get_follower_member_list();
     if ($follower_list->get_item_count() > (int)0 )
     {
     // get all followers - 1 by 1
     $follower = $follower_list->get_item( (int)0 );
     
     if( $this->team->is_member_element_of( $follower->get_id() ) )
     {
     // this follower is member of the team that starts the invitation
     // generate an event_member item for this specific member
     $this->generate_event_member( $pupil, $follower);
     } // end if member is element
     } // end if no follower available
     else
     {
     ; //echo "<br />" . " " . $pupil->get_forename() . " " . $pupil->get_name() . " has no follower!";
     }
     } // end if no pupils available
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  pupil
     * @param  follower
     */
    public function generate_event_member($pupil, $follower)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $event_member = new event_member();
     $event_member->set_event_id( $this->event_id );
     
     $event_member->set_member_id( $follower->get_id() );
     $event_member->set_followed_id( $pupil->get_id() );
     $slot = $this->slot_array[ $this->last_slot++ ];
     
     //echo "<br />" . "Slot: " . $this->last_slot . " " . 
     //$slot->format('Y-m-d H-i-s') . " " . 
     //$follower->get_forename() . " " . $follower->get_name();
     
     $event_member->set_time_slot( $slot->format('Y-m-d H-i-s') );
     $event_member->set_status( (int)4 );
     $event_member->insert();
     $this->insert_news_item( $follower->get_id(), $this->admin_id );
     $this->sent_mail_item( $follower->get_id(), $this->event_id );
    }
}?>