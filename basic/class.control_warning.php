<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.control_warning.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 20.07.2015, 16:23:03 with ArgoUML PHP module 
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
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001551-includes begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001551-includes end

/* user defined constants */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001551-constants begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:0000000000001551-constants end

/**
 * Short description of class control_warning
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class control_warning
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
     if(isset($_SESSION['control_warning']))
     { $this->set_error_code($_SESSION['control_warning']); }
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
     $_SESSION['control_warning'] = $this->error_code;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function sent_mail_A2()
    {
     $this->error_code = 102;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function sent_mail_C28()
    {
     $this->error_code = 228;
    }

    public function csv_not_clear()
    {
     $this->error_code = 327;
    }
}?>