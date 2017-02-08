<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.control_error.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 20.07.2015, 16:23:14 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include control_message
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.control_message.php');

/* user defined includes */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001550-includes begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001550-includes end

/* user defined constants */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001550-constants begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001550-constants end

/**
 * Short description of class control_error
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class control_error
    extends control_message
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function load()
    {
     if(isset($_SESSION['control_error']))
     { $this->set_error_code($_SESSION['control_error']); }
     else
     { $this->reset(); }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function serialize()
    {
     $_SESSION['control_error'] = $this->error_code;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function missing_information()
    {
     $this->error_code = 1;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function error_B5()
    {
     $this->error_code = 105;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function invalid_password_B20()
    {
     $this->error_code = 1201;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function not_identical_B20()
    {
     $this->error_code = 1202;
    }
}?>