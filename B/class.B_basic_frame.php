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
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019C8-includes begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019C8-includes end

/* user defined constants */
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019C8-constants begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019C8-constants end

/**
 * require_once('../basic/class.basic_frame.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B_basic_frame
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
     "?ni:be!:lu:jo!mem=" . $_SESSION['watched_id'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_default_frame()
    {
     return
     $_SESSION['B_frame_base'] .
     $this->get_next_frame() .
     "?ni:be!:lu:jo!mem=" . $_SESSION['watched_id'];
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
     "?ni:be!:lu:jo!mem=" . $_SESSION['watched_id'];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_to_control()
    {
     return
     $_SESSION['B_control_base'] . $this->get_next_frame() .
     "?3appy=toll";
    }
}?>