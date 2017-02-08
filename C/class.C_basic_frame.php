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
// section 10-5-26--54-60a3ac80:1536f925bdf:-8000:0000000000003E1D-includes begin
// section 10-5-26--54-60a3ac80:1536f925bdf:-8000:0000000000003E1D-includes end

/* user defined constants */
// section 10-5-26--54-60a3ac80:1536f925bdf:-8000:0000000000003E1D-constants begin
// section 10-5-26--54-60a3ac80:1536f925bdf:-8000:0000000000003E1D-constants end

/**
 * require_once('../basic/class.basic_frame.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C_basic_frame
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
     "?be:ni!:jo:lu!te=" . $_SESSION['watched_id'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_default_frame()
    {
     return
     $_SESSION['C_frame_base'] .
     $this->get_next_frame() .
     "?be:ni!:jo:lu!te=" . $_SESSION['watched_id'];
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
     "?be:ni!:jo:lu!te=" . $_SESSION['watched_id'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_to_control()
    {
     return
     $_SESSION['C_control_base'] . $this->get_next_frame() .
     "?3appy=toll";
    }
}?>