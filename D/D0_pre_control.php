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
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A60-includes begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A60-includes end

/* user defined constants */
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A60-constants begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A60-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D0_pre_control
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
     $success = TRUE;
     
     if(isset($_GET["id"]) && is_numeric($_GET["id"]))
     { $_SESSION['watched_id'] = htmlspecialchars( $_GET["id"] ); }
     else
     { $_SESSION['watched_id'] = 0; }
     
     return $success;
    }
}?>