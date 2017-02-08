<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.new_contact_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.06.2016, 21:23:40 with ArgoUML PHP module 
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
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C7-includes begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C7-includes end

/* user defined constants */
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C7-constants begin
// section 10-5-23-115-5907ba10:14c1fb4ec9f:-8000:00000000000017C7-constants end

/**
 * Short description of class new_contact_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class new_contact_mail
    extends single_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute question
     *
     * @access private
     * @var String
     */
    private $question = null;

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
     $lang['contact_subject'];
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
     "<p>" . $lang['contact_hi'] . "</p>" .
     "<p>" . $lang['contact_1'] . "</p>" .
     "<p>" . utf8_decode( $this->get_author()->get_forename() ) . "</p>" . 
     "<p>" . utf8_decode( $this->get_author()->get_name() ) . "</p>" . 
     "<p>" . " email: " . 
     utf8_decode( $this->get_author()->get_mail_address() ) . "</p>" .
     "<p>" . $lang['contact_2'] . "</p>" .
     "<p>" . utf8_decode( $this->question ) ."</p>" .
     "<p>" . $lang['contact_regards'] . "</p>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  question
     */
    public function set_question($question)
    {
     $this->question = $question;
    }
}?>