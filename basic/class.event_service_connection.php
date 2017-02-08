<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.event_service_connection.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 01.09.2016, 10:11:17 with ArgoUML PHP module 
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
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015DA-includes begin
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015DA-includes end

/* user defined constants */
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015DA-constants begin
// section 10-30-49-48--661ba2c3:14bdfde1c97:-8000:00000000000015DA-constants end

/**
 * Short description of class event_service_connection
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class event_service_connection
    extends basic_service_connection
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute event_id
     *
     * @access public
     * @var Integer
     */
    public $event_id = null;

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
     * @param  event_id
     */
    public function set_event_id($event_id)
    {
     $this->event_id = $event_id;
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
    public function accept_event_member_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $this->event_id, $this->member_id, (int)3  );
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
    public function decline_event_member_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $this->event_id, $this->member_id, (int)3  );
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
     */
    public function remove_event_member_connection()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $this->event_id, $this->member_id, (int)5  );
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
     * @return mixed
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
    public function ask_event_member_connection()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $con->set_event_id( $this->event_id );
     $con->set_member_id( $this->member_id );
     $con->set_status( (int)4 );
     $con->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_event_member_inquiry()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $con = new event_member();
     $id = $con->find_member( $this->event_id, $this->member_id, (int)4  );
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
     */
    public function bb()
    {
     ;
    }
}?>