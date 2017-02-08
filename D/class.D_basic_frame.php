<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_frame.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_frame
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('../basic/class.basic_frame.php');

/* user defined includes */
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A53-includes begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A53-includes end

/* user defined constants */
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A53-constants begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A53-constants end

/**
 * require_once('../basic/class.basic_frame.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D_basic_frame
    extends basic_frame
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_last_frame()
    {
     return
     $_SESSION['last_frame'] .
     "?lu:jo!:ni:be!ev=" . $_SESSION['watched_id'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_default_frame()
    {
     return
     $_SESSION['D_frame_base'] .
     $this->get_next_frame() .
     "?lu:jo!:ni:be!ev=" . $_SESSION['watched_id'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_from_control()
    {
     return
     $this->get_control()->get_next_frame() .
     "?lu:jo!:ni:be!ev=" . $_SESSION['watched_id'];
    }
}?>