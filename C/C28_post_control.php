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
require_once('class.basic_control.php');

/* user defined includes */
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C2-includes begin
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C2-includes end

/* user defined constants */
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C2-constants begin
// section 10-5-23-115--513bad66:14c21d161ba:-8000:00000000000018C2-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C28_post_control
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
     if ( empty($_POST["forename"]) OR
     empty($_POST["name"]) OR
     empty($_POST["mail"]))
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
     
     $success = FALSE;
     $password = $this->rand_string( 8 );
     
     $author = new member();
     $author->set_id( $_SESSION['watch_id'] );
     $author->load();
     
     $member = new member();
     $member->set_address_id(0);
     $member->set_name( htmlspecialchars( $_POST["name"] ));
     $member->set_year( (int)1970 );
     $member->set_month( (int)1 );
     $member->set_day( (int)1 );
     $member->set_image_id(0);
     $member->set_forename( htmlspecialchars( $_POST["forename"] ));
     $member->set_password( md5( $password ) );
     $member->set_mail_address( htmlspecialchars( $_POST["mail"] ));
     $member->set_gender((int)0);
     $member->set_last_activity( '0000-00-00 00:00:00' );
     $member->set_private_information_id(0);
     $member->set_language( $author->get_language() );
     
     if ( $member->find_id_by_address() == 0 )
     {
     $member_id = $member->insert();
     if ( $member_id > 0 )
     {
     $team_id = $_SESSION['watched_id'];
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->ask_team_member_connection();
     
     $mail = new extern_team_invitation_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $member_id );
     $mail->set_password( $password );
     $mail->set_author_team( $team_id );
     
     if ( empty($_POST["invitation_text"]) )
     { $mail->set_invitation_text(""); }
     else
     { $mail->set_invitation_text( $_POST["invitation_text"] ); }
     
     $mail->sent_mail();
     $this->control_info->sent_mail_C28();
     $success = TRUE;
     }
     }
     else
     { $this->control_warning->sent_mail_C28(); }
     return $success;
    }
}?>