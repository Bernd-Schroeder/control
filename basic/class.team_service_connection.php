<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.team_service_connection.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 01.09.2016, 10:07:47 with ArgoUML PHP module 
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
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D9-includes begin
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D9-includes end

/* user defined constants */
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D9-constants begin
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015D9-constants end

/**
 * Short description of class team_service_connection
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class team_service_connection
    extends basic_service_connection
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute team_id
     *
     * @access public
     * @var Integer
     */
    public $team_id = null;

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
     * @param  team_id
     */
    public function set_team_id($team_id)
    {
     $this->team_id = $team_id;
    }
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
     */
    public function accept_team_member_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)3  );
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
     */
    public function decline_team_member_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)3  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     $this->remove_upteam_access();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_team_member_connection()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)5  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     $this->remove_upteam_access();
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
     */
    public function ask_team_member_connection()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)8  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)4 );
     $con->update();
     }
     else
     {
     $con->set_team_id( $this->team_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)4 );
     $con->insert();
     }
     $this->add_upteam_access();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_team_member_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)4  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->delete();
     $this->remove_upteam_access();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function bb()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function ask_team_admin_connection_csv()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');

     $con = new team_member();
     $con->set_team_id( $this->team_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)7 );
     $id = $con->insert();
     
     $this->add_upteam_access();
    }    
    
    public function ask_team_member_connection_csv()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');

     $con = new team_member();
     $con->set_team_id( $this->team_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)4 );
     $con->insert();
     $this->add_upteam_access();
    }     
     
     
    public function ask_team_admin_connection()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)5  );
     if ( $id > 0 )
     {
     $con->set_id( $id );
     $con->load();
     $con->set_status( (int)7 );
     $con->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_team_admin_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)7  );
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
     */
    public function remove_team_admin_connection()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $con = new team_member();
     $id = $con->find_member( $this->team_id, $this->member_id, (int)2  );
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
     */
    public function cc()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function add_upteam_access()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id( $this->team_id );
     $team->load();
     $team->add_upteam_access( $this->member_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_upteam_access()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id( $this->team_id );
     $team->load();
     $team->remove_upteam_access( $this->member_id );
    }
}?>