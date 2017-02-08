<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.service_operation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 16.09.2016, 13:03:57 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-5-29-6-4f8763fa:157325078a3:-8000:00000000000038AB-includes begin
// section 10-5-29-6-4f8763fa:157325078a3:-8000:00000000000038AB-includes end

/* user defined constants */
// section 10-5-29-6-4f8763fa:157325078a3:-8000:00000000000038AB-constants begin
// section 10-5-29-6-4f8763fa:157325078a3:-8000:00000000000038AB-constants end

/**
 * Short description of class service_operation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class service_operation
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