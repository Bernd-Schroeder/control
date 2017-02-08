<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C33_1_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 06.11.2016, 20:48:58 with ArgoUML PHP module 
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
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBE-includes begin
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBE-includes end

/* user defined constants */
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBE-constants begin
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBE-constants end

/**
 * Short description of class C33_1_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C33_1_post_control
    extends C33_post_control
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
     if (empty($_POST["name"]) OR !$this->is_start_datetime_set())
     { $completed = FALSE; }
     else
     {
     $this->name = htmlspecialchars( $_POST["name"] );
     $this->set_end_datetime_set();
     $this->admin_id = $_SESSION['watch_id'];
     $this->team_id = $_SESSION['watched_id'];
     }
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
     require_once(__ROOT_DATA__.'class.team.php');
     
     $success = TRUE;
     $team = new team();
     $team->set_id( $this->team_id );
     $team->load();
     
     $event_id = $this->generate_new_event( (int)1 );
     if ( $event_id > (int)0 )
     {
     $this->generate_owner_team_event( $event_id, $this->team_id );
     $this->generate_all_admin_event_member( $event_id, $this->team_id );
     $receiver_list = $team->get_all_member_list();
     $this->insert_news_list( $receiver_list, $this->admin_id );
     $this->sent_mail_list( $receiver_list, $event_id );
     }
     else
     { $success = FALSE; }
     return $success;
    }
}?>