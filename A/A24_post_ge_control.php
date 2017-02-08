<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.A24_post_ge_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 14.09.2016, 14:11:36 with ArgoUML PHP module 
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
require_once('A24_post_control.php');

/* user defined includes */
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004208-includes begin
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004208-includes end

/* user defined constants */
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004208-constants begin
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004208-constants end

/**
 * Short description of class A24_post_ge_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */   
class A24_post_ge_control
    extends A24_post_control
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
     return 'ge';
    }
}?>