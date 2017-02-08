<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.service_new_member.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 10.11.2016, 10:11:28 with ArgoUML PHP module 
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
// section 10-30--8--14--24d40fa0:15848c1adb9:-8000:0000000000002A07-includes begin
// section 10-30--8--14--24d40fa0:15848c1adb9:-8000:0000000000002A07-includes end

/* user defined constants */
// section 10-30--8--14--24d40fa0:15848c1adb9:-8000:0000000000002A07-constants begin
// section 10-30--8--14--24d40fa0:15848c1adb9:-8000:0000000000002A07-constants end

/**
 * Short description of class service_new_member
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class service_new_member
    extends service_operation
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute name
     *
     * @access private
     * @var String
     */
    private $name = null;

    /**
     * Short description of attribute forename
     *
     * @access private
     * @var String
     */
    private $forename = null;

    /**
     * Short description of attribute mail_address
     *
     * @access private
     * @var String
     */
    private $mail_address = null;

    /**
     * Short description of attribute password
     *
     * @access private
     * @var String
     */
    private $password = null;

    /**
     * Short description of attribute new_id
     *
     * @access private
     * @var Integer
     */
    private $new_id = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  name
     */
    public function set_name($name)
    {
     $this->name = trim($name);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  forename
     */
    public function set_forename($forename)
    {
     $this->forename = trim($forename);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  mail_address
     */
    public function set_mail_address($mail_address)
    {
     $this->mail_address = trim($mail_address);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  password
     */
    public function set_password($password)
    {
     $this->password = trim($password);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate_new_member()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member.php');
     
     $pass = md5( $this->password );
     
     $member = new member();
     $member->set_address_id(0);
     $member->set_name( $this->name );
     $member->set_year( (int)1970 );
     $member->set_month( (int)1 );
     $member->set_day( (int)1 );
     $member->set_image_id(0);
     $member->set_forename( $this->forename );
     $member->set_password( $pass );
     $member->set_mail_address( $this->mail_address );
     $member->set_gender((int)0);
     $member->set_last_activity( '0000-00-00 00:00:00' );
     $member->set_private_information_id( (int)0 );
     $member->set_language("en");
     $this->new_id = $member->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( $this->member_exist() )
     { return NULL; }
     else
     { 
     $this->generate_new_member(); 
     return $this->get_new_id();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_new_id()
    {
     return $this->new_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function member_exist()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_list_csv.php');
     
     $exist = FALSE;
     $list = new member_list_csv();
     $list->set_mail_address( $this->mail_address );
     $member = $list->get_member();
     if( $member != NULL )
     {
     $exist = TRUE; 
     $this->new_id = $member->get_id();      
     }
     return $exist; 
    }
}?>