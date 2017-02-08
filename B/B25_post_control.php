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
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003069-includes begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003069-includes end

/* user defined constants */
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003069-constants begin
// section 10-5-21-111-1a23429:1533c99be85:-8000:0000000000003069-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B25_post_control
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
     if ( empty($_POST["message"]))
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
     require_once(__ROOT_CONTROL__.'email/class.new_contact_mail.php');
     
     $question = htmlspecialchars( $_POST["message"] );
     $receiver_id = (int)160;
     $author_id = $_SESSION['watch_id'];
     
     $mail = new new_contact_mail();
     $mail->set_author_id( $author_id );
     $mail->set_receiver_id( $receiver_id );
     $mail->set_question( $question );
     $mail->sent_mail();
     
     $this->control_info->sent_mail_B25();
    }
}?>