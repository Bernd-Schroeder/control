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
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AEC-includes begin
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AEC-includes end

/* user defined constants */
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AEC-constants begin
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AEC-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D36_pre_control
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
     $success = FALSE;
     if(isset($_GET["article_id"]) && is_numeric($_GET["article_id"]))
     {
     $_SESSION['D36_article_id'] = htmlspecialchars( $_GET["article_id"] );
     $success = TRUE;
     }
     return $success;
    }
}?>