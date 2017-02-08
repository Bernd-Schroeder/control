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
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019D9-includes begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019D9-includes end

/* user defined constants */
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019D9-constants begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019D9-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B0_pre_control
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