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
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBC-includes begin
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBC-includes end

/* user defined constants */
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBC-constants begin
// section 10-30--8--28-57c59812:1581ed1622b:-8000:0000000000001BBC-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C33_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute name
     *
     * @access protected
     * @var String
     */
    protected $name = null;

    /**
     * Short description of attribute admin_id
     *
     * @access protected
     * @var Integer
     */
    protected $admin_id = null;

    /**
     * Short description of attribute team_id
     *
     * @access protected
     * @var Integer
     */
    protected $team_id = null;

    /**
     * Short description of attribute start_date
     *
     * @access protected
     * @var String
     */
    protected $start_date = null;

    /**
     * Short description of attribute end_date
     *
     * @access protected
     * @var String
     */
    protected $end_date = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_start_datetime_set()
    {
     $success = FALSE;
     date_default_timezone_set('Europe/Berlin');
     
     if ( !empty($_POST['startdate']) )
     {
     if( !empty($_POST['starttime']) )
     { $date_str = $_POST['startdate'] . " " . $_POST['starttime']; }
     else
     { $date_str = $_POST['startdate'] . " " . '12:00'; }
     try
     {
     $this->start_date = new DateTime($date_str);
     $success = TRUE;
     }
     catch (Exception $e) {;}
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function set_end_datetime_set()
    {
     date_default_timezone_set('Europe/Berlin');
     if ( !empty($_POST['enddate']) )
     {
     if( !empty($_POST['endtime']) )
     { $date_str = $_POST['enddate'] . " " . $_POST['endtime']; }
     else
     { $date_str = $_POST['enddate'] . " " . '18:00'; }
     try
     { $this->end_date = new DateTime($date_str); }
     catch (Exception $e) {;}
     }
     else
     {
     $this->end_date = clone $this->start_date;
     $this->end_date->modify('+1 day');
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  type
     */
    public function generate_new_event($type)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event.php');
     
     $new_event = new event();
     $new_event->set_owner_id( $this->team_id );
     $new_event->set_type($type);
     $new_event->set_address_id(0);
     $new_event->set_name( $this->name );
     
     $start_datetime = $this->start_date->format('Y-m-d H-i-s');
     $new_event->set_start_datetime( $start_datetime );
     $end_datetime = $this->end_date->format('Y-m-d H-i-s');
     $new_event->set_end_datetime( $end_datetime );
     
     $new_event->set_year( $this->start_date->format('Y') );
     $new_event->set_month( $this->start_date->format('m') );
     $new_event->set_day( $this->start_date->format('d') );
     
     $new_event->set_image_id(0);
     $new_event->set_private_information_id(0);
     $event_id = $new_event->insert();
     return $event_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  team_id
     */
    public function generate_owner_team_event($event_id, $team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_event.php');
     
     $team_event = new team_event();
     $team_event->set_team_id( $team_id );
     $team_event->set_event_id( $event_id );
     $team_event->set_status( (int)5 );
     $team_event_id = $team_event->insert();
     return $team_event_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  team_id
     */
    public function generate_all_admin_event_member($event_id, $team_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id( $this->team_id );
     $team->load();
     
     // generate all the admins from the team to the admins  of the event
     $admin_list = $team->get_admin_member_list();
     for ( $n=0; $n < $admin_list->get_item_count(); $n++ )
     { 
     $admin_id = $admin_list->get_item( $n )->get_id();
     $this->generate_admin_event_member( $event_id, $admin_id ); 
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  admin_id
     */
    public function generate_admin_event_member($event_id, $admin_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $event_member = new event_member();
     $event_member->set_event_id( $event_id );
     $event_member->set_member_id( $admin_id );
     $event_member->set_status( (int)2 );
     $event_member_id = $event_member->insert();
     
     $this->insert_news_item(  $admin_id, $event_id );
     $this->sent_mail_item(  $admin_id, $event_id );
     
     return $event_member_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  member_id
     */
    public function generate_member_event_member($event_id, $member_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_member.php');
     
     $event_member = new event_member();
     $event_member->set_event_id( $event_id );
     $event_member->set_member_id( $member_id );
     $event_member->set_status( (int)4 );
     $event_member_id = $event_member->insert();
     return $event_member_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_id
     * @param  uploader_id
     */
    public function insert_news_item($receiver_id, $uploader_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_receiver_id( $receiver_id );
     $news->set_entity_group("t");
     $news->set_entity_id( $_SESSION['watched_id'] );
     $news->set_function( (int)508 );
     $news->set_article_id( (int)0 );
     $news->set_uploader_id( $uploader_id );
     $news->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_id
     * @param  event_id
     */
    public function sent_mail_item($receiver_id, $event_id)
    {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     '/email/class.event_invitation_mail.php');
     
     $mail = new event_invitation_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $receiver_id );
     $mail->set_author_event( $event_id );
     $mail->sent_mail();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_list
     * @param  uploader_id
     */
    public function insert_news_list($receiver_list, $uploader_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news_list.php');
     
     $news_list = new news_list();
     $news_list->set_receiver_model( $receiver_list );
     $news_list->set_entity_group("t");
     $news_list->set_entity_id( $_SESSION['watched_id'] );
     $news_list->set_function( (int)508 );
     $news_list->set_article_id( (int)0 );
     $news_list->set_uploader_id( $uploader_id );
     $news_list->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_list
     * @param  event_id
     */
    public function sent_mail_list($receiver_list, $event_id)
    {
     $receiver_list_count = $receiver_list->get_item_count();
     for ( $n = 0; $n < $receiver_list_count; $n++ )
     {
     $receiver = $receiver_list->get_item( $n );
     $this->sent_mail_item( $receiver->get_id(), $event_id );
     }
    }
}?>