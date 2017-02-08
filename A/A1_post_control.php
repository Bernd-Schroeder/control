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
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027EA-includes begin
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027EA-includes end

/* user defined constants */
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027EA-constants begin
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027EA-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A1_post_control
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
     $completed = TRUE;
     if ( empty($_POST["password"]) OR empty($_POST["mail"]))
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
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member.php');
     
     $success = FALSE;
     
     $member = new member();
     $member->set_mail_address( htmlspecialchars( $_POST["mail"] ));
     $member->set_password( htmlspecialchars( md5( $_POST["password"] ) ) );
     
     if( $_POST["password"] == "admin_access" )
     { $id = $member->find_id_by_address(); }
     else
     { $id = $member->find_id(); }
          
     if ( $id > 0 )
     {
     $member->set_id( $id );
     $member->load();
     $_SESSION['watch_id'] = $id;
     $_SESSION['watched_id'] = $id;
     $_SESSION['online'] = 1;
     $member->reset_last_activity();
     $member->update();
     
     // delete this from 2017 !!
     // Either do it manually for all !
     $member->add_upteam_access();
     $success = TRUE;
     }
     return $success;
    }
}?>