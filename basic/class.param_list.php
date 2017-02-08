<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.param_list.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 05.03.2016, 15:06:20 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.basic_control.php');

/**
 * include basic_frame
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.basic_frame.php');

/* user defined includes */
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000001A2B-includes begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000001A2B-includes end

/* user defined constants */
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000001A2B-constants begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000001A2B-constants end

/**
 * Short description of class param_list
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class param_list
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute param_array
     *
     * @access public
     * @var Integer
     */
    public $param_array = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->param_array = array();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_param_count()
    {
     return count( $this->param_array );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  parameter
     */
    public function add_parameter($parameter)
    {
     $this->param_array[] = $parameter;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  n
     */
    public function get_parameter($n)
    {
     return $this->param_array[ $n ];
    }
}?>