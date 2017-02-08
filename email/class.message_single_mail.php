<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.message_single_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 12.06.2016, 19:17:34 with ArgoUML PHP module 
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
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001889-includes begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001889-includes end

/* user defined constants */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001889-constants begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001889-constants end

/**
 * Short description of class message_single_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class message_single_mail
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
     $lang['message_subject'] . $this->get_author()->get_forename();
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
     "<p>" . $lang['message_hi'] .
     " " . utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['message_1'] . "</p>" .
     "<p>" . $lang['message_2'] . "</p>" .
     "<p>" . $lang['message_regards'] . "</p>";
    }
}?>