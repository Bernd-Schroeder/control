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
// section 10-5-26-69-3831dcd2:153a510fada:-8000:0000000000001AC8-includes begin
// section 10-5-26-69-3831dcd2:153a510fada:-8000:0000000000001AC8-includes end

/* user defined constants */
// section 10-5-26-69-3831dcd2:153a510fada:-8000:0000000000001AC8-constants begin
// section 10-5-26-69-3831dcd2:153a510fada:-8000:0000000000001AC8-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C31_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute team_id
     *
     * @access private
     * @var Integer
     */
    private $team_id = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if ( empty($_POST["name"]) OR (empty($_POST["team_type"])) )
     { $completed = FALSE; }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.service_new_team.php');
     
     $service = new service_new_team();
     $service->set_top_team_id( $_SESSION['watched_id'] );
     $service->set_owner_id( $_SESSION['watch_id'] );
     $service->set_team_name( htmlspecialchars( $_POST["name"] ));
     $service->set_type( (int)$_POST["team_type"] + (int)1 );
     $success = $service->perform();
     
     return $success;
    }
}?>