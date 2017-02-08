<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_control.php');
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
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003051-includes begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003051-includes end

/* user defined constants */
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003051-constants begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003051-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B24_post_en_control
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
     return 'en';
    }
}?>