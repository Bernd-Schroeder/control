<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.extern_team_invitation_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 10.06.2016, 15:08:33 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include single_mail
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.single_mail.php');

/* user defined includes */
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C5-includes begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C5-includes end

/* user defined constants */
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C5-constants begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C5-constants end

/**
 * Short description of class extern_team_invitation_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class extern_team_invitation_mail
    extends single_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute password
     *
     * @access private
     * @var Integer
     */
    private $password = null;

    /**
     * Short description of attribute invitation_text
     *
     * @access private
     * @var Integer
     */
    private $invitation_text = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_subject()
    {
     $lang = $this->get_language_array();
     return
     $lang['extern_inv_subject'] . $this->get_author()->get_name();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_message()
    {
     $lang = $this->get_language_array();
     return
     "<p>" . $lang['extern_inv_hi'] .
     " " . utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['extern_inv_1'] . $this->password . "</p>" .
     "<p>" . $lang['extern_inv_2'] . "</p>" .
     "<p>" . $lang['extern_inv_regards'] . "</p>" .
     "<p>" . utf8_decode( $this->invitation_text ) . "</p>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  password
     */
    public function set_password($password)
    {
     $this->password = $password;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  invitation_text
     */
    public function set_invitation_text($invitation_text)
    {
     $this->invitation_text = $invitation_text;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  author_team_id
     */
    public function set_author_team($author_team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id( $author_team_id );
     $team->load();
     $this->set_author( $team );
    }
}?>