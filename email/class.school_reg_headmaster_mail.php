<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.school_reg_headmaster_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.06.2016, 21:01:48 with ArgoUML PHP module 
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
// section -64--88-1--117--4cee5dbc:1524f13ef92:-8000:000000000000193C-includes begin
// section -64--88-1--117--4cee5dbc:1524f13ef92:-8000:000000000000193C-includes end

/* user defined constants */
// section -64--88-1--117--4cee5dbc:1524f13ef92:-8000:000000000000193C-constants begin
// section -64--88-1--117--4cee5dbc:1524f13ef92:-8000:000000000000193C-constants end

/**
 * Short description of class school_reg_headmaster_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class school_reg_headmaster_mail
    extends single_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute password
     *
     * @access private
     * @var String
     */
    private $password = null;

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
     $lang['school_head_subject'];
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
     "<p>" . $lang['school_head_hi'] .
     " " . utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['school_head_1'] . $this->password . "</p>" .
     "<p>" . $lang['school_head_2'] . "</p>" .
     "<p>" . $lang['school_head_regards'] . "</p>";
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
}?>