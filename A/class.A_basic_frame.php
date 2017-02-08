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
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027B0-includes begin
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027B0-includes end

/* user defined constants */
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027B0-constants begin
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027B0-constants end

/**
 * require_once('../basic/class.basic_frame.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A_basic_frame
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
     $_SESSION['last_frame'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_default_frame()
    {
     return
     $_SESSION['A_frame_base'] . $this->get_next_frame();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_from_control()
    {
     return
     $this->get_control()->get_next_frame();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_to_control()
    {
     return
     $_SESSION['B_control_base'] . $this->get_next_frame();
    }
}?>