<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('../basic/class.basic_control.php');

/* user defined includes */
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000002E03-includes begin
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000002E03-includes end

/* user defined constants */
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000002E03-constants begin
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000002E03-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D20_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if ( empty($_POST["time_slot"] ) OR 
         ( empty($_GET["old_em_id"] ) ) )
     { $completed = FALSE; }
     return $completed;
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
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     // get event_member1 which the member occupy by the following
     if (( isset( $_SESSION['watch_id'] ) AND
     isset( $_SESSION['watched_id'] )))
     {
     $event1 = $_SESSION['watched_id'];
     $member1 = $_SESSION['watch_id'];
     
     $old_em_id = $_GET["old_em_id"]; 
     $new_em_id = $_POST["time_slot"];
     
     $event_member1 = new event_member();
     $event_member1->set_id( $old_em_id );
     $event_member1->load();
        
     // get event_member2 which the member want to occupy
     $event_member2 = new event_member();
     $event_member2->set_id( $new_em_id );
     $event_member2->load();
     
     // save the member which occupy this event_member2
     $parent_id_1 = $event_member1->get_member_id();
     $pupil_id_1 = $event_member1->get_followed_id();
     
     $parent_id_2 = $event_member2->get_member_id();
     $pupil_id_2 = $event_member2->get_followed_id();
     
     // save the member2 to the source event_member1
     $event_member1->set_member_id( $parent_id_2 );
     $event_member1->set_followed_id( $pupil_id_2 );
     $event_member1->set_status( (int)4 );
     $event_member1->update();
     
     // save the member1 to the destination event_member2
     $event_member2->set_member_id( $parent_id_1 );
     $event_member2->set_followed_id( $pupil_id_1 );
     $event_member2->set_status( (int)5 );
     $event_member2->update();
     }
     return TRUE;
    }
}?>