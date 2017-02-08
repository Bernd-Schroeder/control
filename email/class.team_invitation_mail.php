<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.team_invitation_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.06.2016, 21:18:20 with ArgoUML PHP module 
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
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C6-includes begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C6-includes end

/* user defined constants */
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C6-constants begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C6-constants end

/**
 * Short description of class team_invitation_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class team_invitation_mail
    extends single_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

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
     $lang['invitation_subject'] . $this->get_author()->get_name();
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
     "<p>" . $lang['invitation_hi'] .
     " " . utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['invitation_1'] . "</p>" .
     "<p>" . $lang['invitation_2'] . "</p>" .
     "<p>" . $lang['invitation_regards'] . "</p>";
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