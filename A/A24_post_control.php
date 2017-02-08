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
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('../basic/class.basic_control.php');

/* user defined includes */
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004201-includes begin
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004201-includes end

/* user defined constants */
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004201-constants begin
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:0000000000004201-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A24_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     $lang = $this->get_language();
     setcookie("lang", $lang, time()+60*60*24*30, '/' );
     return TRUE;
    }
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