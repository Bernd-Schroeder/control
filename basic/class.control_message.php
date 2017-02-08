<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.control_message.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 20.07.2015, 16:22:37 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153F-includes begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153F-includes end

/* user defined constants */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153F-constants begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153F-constants end

/**
 * Short description of class control_message
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class control_message
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute error_code
     *
     * @access public
     * @var Integer
     */
    public $error_code = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_error_code()
    {
     $old_code = $this->error_code;
     $this->reset();
     $this->serialize();
     return $old_code;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  error_code
     */
    public function set_error_code($error_code)
    {
     $this->error_code = $error_code;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function reset()
    {
     $this->error_code = 0;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function success()
    {
     $this->error_code = 0;
    }
}?>