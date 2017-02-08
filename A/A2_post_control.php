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
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018C9-includes begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018C9-includes end

/* user defined constants */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018C9-constants begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018C9-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A2_post_control
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
     if(
     isset($_SESSION['captscha']) AND
     isset($_POST["captscha"]) AND
     ( $_SESSION['captscha'] == $_POST["captscha"] ) AND
     ( empty($_POST["forename"]) == FALSE ) AND
     ( empty($_POST["mail"]) == FALSE ))
     { $completed = TRUE; }
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
     'email/class.register_single_mail.php');
     require_once(__ROOT_CONTROL__.
     'basic/class.service_new_member.php');
     
     $success = FALSE;
     $password = $this->rand_string( 8 );
     
     $service = new service_new_member();
     $service->set_forename( htmlspecialchars( $_POST["forename"] ));
     $service->set_name( htmlspecialchars( $_POST["name"] ));
     $service->set_mail_address( htmlspecialchars( $_POST["mail"] ));
     $service->set_password( $password );
     $new_id = $service->perform();
     if( $new_id != NULL )
     {
     $success = TRUE;
     $this->control_info->sent_mail_A2();
     $receiver_id = $new_id;

     $mail = new register_single_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $receiver_id );
     $mail->set_password( $password );
     $mail->sent_mail();
     }         
     else
     { $this->control_warning->sent_mail_A2(); }
     return $success;
    }
}?>