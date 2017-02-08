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
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000303E-includes begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000303E-includes end

/* user defined constants */
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000303E-constants begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:000000000000303E-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B20_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute old_password
     *
     * @access private
     * @var String
     */
    private $old_password = null;

    /**
     * Short description of attribute new_password1
     *
     * @access private
     * @var String
     */
    private $new_password1 = null;

    /**
     * Short description of attribute new_password2
     *
     * @access private
     * @var String
     */
    private $new_password2 = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     
     if ( empty($_POST["old_password"]) OR
     empty($_POST["new_password1"]) OR
     empty($_POST["new_password2"]))
     { $completed = FALSE; }
     else
     {
     $this->old_password = htmlspecialchars( $_POST["old_password"] );
     $this->new_password1 = htmlspecialchars( $_POST["new_password1"] );
     $this->new_password2 = htmlspecialchars( $_POST["new_password2"] );
     }
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
     require_once(__ROOT_DATA__.'class.member.php');
     
     $success = FALSE;
     if ( $this->new_password1 == $this->new_password2 )
     {
     $member = new member();
     $member->set_id($_SESSION['watch_id']);
     $member->load();
     if ( $member->get_password() == md5($this->old_password) )
     {
     $success = TRUE;
     $member->set_password( md5( $this->new_password1 ));
     $member->update();
     $this->control_info->password_changed_B20();
     }
     else
     { $this->control_error->invalid_password_B20(); }
     }
     else
     { $this->control_error->not_identical_B20(); }
     return $success;
    }
}?>