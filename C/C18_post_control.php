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
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AD5-includes begin
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AD5-includes end

/* user defined constants */
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AD5-constants begin
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AD5-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C18_post_control
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
    public function is_entered_completed()
    {
     $completed = FALSE;
     if (isset($_GET["image_id"]) && is_numeric($_GET["image_id"]))
     $completed = TRUE;
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $success = TRUE;
     $this->team = new team();
     $this->team->set_id($_SESSION['watched_id']);
     $this->team->load();
     $this->team->set_image_id( $_GET["image_id"] );
     $this->team->update();
     return $success;
    }
}?>