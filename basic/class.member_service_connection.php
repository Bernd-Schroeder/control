<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.member_service_connection.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 01.09.2016, 09:52:30 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_service_connection
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.basic_service_connection.php');

/* user defined includes */
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D8-includes begin
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D8-includes end

/* user defined constants */
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D8-constants begin
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D8-constants end

/**
 * Short description of class member_service_connection
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class member_service_connection
    extends basic_service_connection
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute member_id
     *
     * @access public
     * @var Integer
     */
    public $member_id = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  member_id
     */
    public function set_member_id($member_id)
    {
     $this->member_id = $member_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  follower_id
     */
    public function ask_member_follower_connection($follower_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_follower.php');
     
     $con = new member_follower();
     $con->set_follower_id( $follower_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)3 );
     $con->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function ask_member_team_connection($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $con->set_team_id( $team_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)3 );
     $con->insert();
     
     $this->add_upteam_access( $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function ask_member_event_connection($event_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $con->set_event_id( $event_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)3 );
     $con->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  follower_id
     */
    public function remove_member_follower_inquiry($follower_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_follower.php');
     
     $con = new member_follower();
     $id = $con->find_member( $follower_id, $this->member_id, (int)3  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_member_team_inquiry($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)3  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     
     $this->remove_upteam_access( $team_id );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function remove_member_event_inquiry($event_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $event_id, $this->member_id, (int)3  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  follower_id
     */
    public function accept_follower_member_inquiry($follower_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_follower.php');
     
     $con = new member_follower();
     $id = $con->find_member( $follower_id, $this->member_id, (int)3 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)5 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function accept_member_team_inquiry($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)4 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)5 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function accept_member_event_inquiry($event_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $event_id, $this->member_id, (int)4 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)5 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function accept_admin_team_inquiry($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)7 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)2 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  follower_id
     */
    public function decline_follower_member_inquiry($follower_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_follower.php');
     
     $con = new member_follower();
     $id = $con->find_member(  $follower_id, $this->member_id, (int)3 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function decline_member_team_inquiry($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)4 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     
     $this->remove_upteam_access( $team_id );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function decline_member_event_inquiry($event_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $event_id, $this->member_id, (int)4 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)9 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function decline_admin_team_inquiry($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)7 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  follower_id
     */
    public function remove_follower_member_connection($follower_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_follower.php');
     
     $con = new member_follower();
     $id = $con->find_member(  $follower_id, $this->member_id, (int)5 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  follower_id
     */
    public function remove_member_follower_connection($follower_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_follower.php');
     
     $con = new member_follower();
     $id = $con->find_member(  $follower_id, $this->member_id, (int)5 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_member_team_connection($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     require_once(__ROOT_DATA__.'class.member.php');
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)5 );
     if ( $id > 0 )
     $con->set_id( $id );
     {
     $con->set_id( $id );
     $con->load();
     
     $team = new team();
     $team->set_id( $team_id );
     $team->load();
     
     $member = new member();
     $member->set_id( $this->member_id );
     $member->load();
     
     $sub_count = $team->get_my_subteam_list($member)->get_item_count();
     if( $sub_count > (int)0 )
     {
     $con->set_status( (int)8 );
     $con->update();
     }
     else
     { $con->delete(); }
     
     $this->remove_upteam_access( $team_id );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function remove_member_event_connection($event_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $event_id, $this->member_id, (int)5 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_admin_team_connection($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $team_id, $this->member_id, (int)7 );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)2 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function aa()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function add_upteam_access($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id( $team_id );
     $team->load();
     $team->add_upteam_access( $this->member_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_upteam_access($team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id( $team_id );
     $team->load();
     $team->remove_upteam_access( $this->member_id );
    }
}?>