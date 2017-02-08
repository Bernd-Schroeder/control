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
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C9-includes begin
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C9-includes end

/* user defined constants */
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C9-constants begin
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C9-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A25_post_control
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
     if ( empty($_POST["mail"]) OR empty($_POST["message"]) )
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
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.'email/class.new_contact_mail.php');
     
     $name = htmlspecialchars( $_POST["name"] );
     $mail = htmlspecialchars( $_POST["mail"] );
     $tel_number = htmlspecialchars( $_POST["number"] );
     $question = htmlspecialchars( $_POST["message"] );
     
     $author = new member();
     $author->set_name( $name );
     $author->set_mail_address( $mail );
     $receiver_id = (int)160;
     
     $mail = new new_contact_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $receiver_id );
     $mail->set_question( $question . " " . $tel_number );
     $mail->set_author( $author );
     $mail->sent_mail();
     
     $this->control_info->sent_mail_A25();
    }
}?>