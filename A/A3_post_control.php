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
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018AC-includes begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018AC-includes end

/* user defined constants */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018AC-constants begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:00000000000018AC-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A3_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute forename
     *
     * @access private
     * @var String
     */
    private $forename = null;

    /**
     * Short description of attribute name
     *
     * @access private
     * @var String
     */
    private $name = null;

    /**
     * Short description of attribute mail
     *
     * @access private
     * @var String
     */
    private $mail = null;

    /**
     * Short description of attribute new_password
     *
     * @access private
     * @var String
     */
    private $new_password = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     
     if ( empty($_POST["forename"]) OR
     empty($_POST["name"]) OR
     empty($_POST["mail"]))
     { $completed = FALSE; }
     else
     {
     $this->forename = htmlspecialchars( $_POST["forename"] );
     $this->name = htmlspecialchars( $_POST["name"] );
     $this->mail = htmlspecialchars( $_POST["mail"] );
     $this->new_password = $this->rand_string( 8 );
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
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.'email/class.password_single_mail.php');
     
     $success = FALSE;
     
     $this->new_member = new member();
     $this->new_member->set_mail_address( $this->mail);
     $new_id = $this->new_member->find_id_by_address();
     if ( $new_id > 0 )
     {
     // member found
     $this->new_member->set_id( $new_id );
     $this->new_member->load();
     if(( $this->new_member->get_forename() == $this->forename ) AND
     ( $this->new_member->get_name() == $this->name ))
     {
     $success = TRUE;
     $this->new_member->set_password( md5( $this->new_password ) );
     $this->new_member->update();
     $this->control_info->sent_mail_A3();
     $receiver_id = $this->new_member->get_id();
     
     $mail = new password_single_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $receiver_id );
     $mail->set_password( $this->new_password );
     $mail->sent_mail();
     }
     }
     return $success;
    }
}?>