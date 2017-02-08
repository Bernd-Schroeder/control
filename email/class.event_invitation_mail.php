<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.event_invitation_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 27.06.2016, 12:24:33 with ArgoUML PHP module 
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
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017CB-includes begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017CB-includes end

/* user defined constants */
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017CB-constants begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017CB-constants end

/**
 * Short description of class event_invitation_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class event_invitation_mail
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
     $lang['e_invitation_subject'] . $this->get_author()->get_name();
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
     "<p>" . $lang['e_invitation_hi'] .
     " " . utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['e_invitation_1'] . "</p>" .
     "<p>" . $lang['e_invitation_2'] . "</p>" .
     "<p>" . $lang['e_invitation_regards'] . "</p>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  author_event_id
     */
    public function set_author_event($author_event_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event.php');
     
     $event = new event();
     $event->set_id( $author_event_id );
     $event->load();
     $this->set_author( $event );
    }
}?>