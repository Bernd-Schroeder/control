<?php

error_reporting(E_ALL);

/**
 * untitledModel - \class.B24_post_da_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.03.2016, 16:21:29 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('B24_post_control.php');

/* user defined includes */
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000305F-includes begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000305F-includes end

/* user defined constants */
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000305F-constants begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000305F-constants end

/**
 * Short description of class B24_post_da_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B24_post_da_control
    extends B24_post_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_language()
    {
     return 'da';
    }
}?>