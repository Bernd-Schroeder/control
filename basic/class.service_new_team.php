<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.service_new_team.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 16.09.2016, 13:09:05 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include service_operation
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.service_operation.php');

/* user defined includes */
// section 10-5-29-6-4f8763fa:157325078a3:-8000:000000000000388C-includes begin
// section 10-5-29-6-4f8763fa:157325078a3:-8000:000000000000388C-includes end

/* user defined constants */
// section 10-5-29-6-4f8763fa:157325078a3:-8000:000000000000388C-constants begin
// section 10-5-29-6-4f8763fa:157325078a3:-8000:000000000000388C-constants end

/**
 * Short description of class service_new_team
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class service_new_team
    extends service_operation
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute top_team_id
     *
     * @access private
     * @var Integer
     */
    private $top_team_id = null;

    /**
     * Short description of attribute team_id
     *
     * @access public
     * @var Integer
     */
    public $team_id = null;

    /**
     * Short description of attribute owner_id
     *
     * @access private
     * @var Integer
     */
    private $owner_id = null;

    /**
     * Short description of attribute team_name
     *
     * @access public
     * @var String
     */
    public $team_name = null;

    /**
     * Short description of attribute type
     *
     * @access private
     * @var Integer
     */
    private $type = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  top_team_id
     */
    public function set_top_team_id($top_team_id)
    {
     $this->top_team_id = $top_team_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  owner_id
     */
    public function set_owner_id($owner_id)
    {
     $this->owner_id = $owner_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_name
     */
    public function set_team_name($team_name)
    {
     $this->team_name = $team_name;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  type
     */
    public function set_type($type)
    {
     $this->type = $type;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     $success = FALSE;
     $team_id = $this->generate_new_team();
     
     if ( $team_id > 0 )
     {
     $this->team_id = $team_id;
     $success = $this->generate_new_team_member();
     $success = $this->generate_new_team_team();
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate_new_team()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     //get_top_team
     $top_team = new team();
     $top_team->set_id( $this->top_team_id );
     $top_team->load();
     
     $new_team = new team();
     $new_team->set_owner_id($this->owner_id);
     $new_team->set_address_id(0);
     
     $timezone = new DateTimeZone('Europe/Berlin' );
     $now = new DateTime( "now",  $timezone);
     
     $new_team->set_network_id( $top_team->get_network_id() );
     $new_team->set_name( $this->team_name );
     $new_team->set_type( $this->type );
     $new_team->set_year( $now->format("Y") );
     $new_team->set_month( $now->format("m") );
     $new_team->set_day( $now->format("d") );
     $new_team->set_image_id(0);
     $new_team->set_private_information_id(0);
     $new_team_id = $new_team->insert();
     return $new_team_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate_new_team_member()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_member.php');
     
     $success = FALSE;
     $team_member = new team_member();
     $team_member->set_team_id( $this->team_id );
     $team_member->set_member_id( $this->owner_id );
     $team_member->set_status( (int)2 );
     $new_team_member_id = $team_member->insert();
     if ( $new_team_member_id > 0 )
     { $success = TRUE; }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate_new_team_team()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_team.php');
     
     $success = FALSE;
     $team_team = new team_team();
     $team_team->set_team_id( $this->top_team_id );
     $team_team->set_sub_team_id( $this->team_id );
     $team_team->set_status( (int)5 );
     $new_team_team_id = $team_team->insert();
     if ( $new_team_team_id > 0 )
     { $success = TRUE; }
     return $success;
    }
}?>