<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.basic_service_connection.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 31.08.2016, 16:47:13 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-5-29-6--19465cd0:156e102777a:-8000:0000000000001A75-includes begin
// section 10-5-29-6--19465cd0:156e102777a:-8000:0000000000001A75-includes end

/* user defined constants */
// section 10-5-29-6--19465cd0:156e102777a:-8000:0000000000001A75-constants begin
// section 10-5-29-6--19465cd0:156e102777a:-8000:0000000000001A75-constants end

/**
 * Short description of class basic_service_connection
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class basic_service_connection
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_root_data()
    {
     return dirname(dirname(dirname(__FILE__))) . '/data/';
    }
}?>