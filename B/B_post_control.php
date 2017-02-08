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
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:00000000000015CB-includes begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:00000000000015CB-includes end

/* user defined constants */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:00000000000015CB-constants begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:00000000000015CB-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute next_frame
     *
     * @access private
     * @var Integer
     */
    private $next_frame = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_next_frame()
    {
     return $this->next_frame;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     $success = FALSE;
     
     if(isset($_GET["function"]) && is_numeric($_GET["function"]))
     {
     $success = TRUE;
     $function = $_GET["function"];
     
     switch($function)
     {
     case ( 0 ):
     // home
     $this->home();
     break;
     
     case ( 2 ):
     // modify master data
     $this->modify_master_data();
     break;
     
     case ( 4 ):
     // show master data
     $this->show_master_data();
     break;
     
     case ( 5 ):
     // show unread mails
     $this->show_unread_mails();
     break;
     
     case ( 6 ):
     // show message data
     $this->show_message_data();
     break;
     
     case ( 7 ):
     // show article data
     $this->show_article_data();
     break;
     
     case ( 8 ):
     // show mobbing selection
     $this->show_mobbing_selection();
     break;
     
     case ( 9 ):
     // show calendar data
     $this->show_calendar_data();
     break;
     
     case ( 10 ):
     // upload image data
     $this->upload_image_data();
     break;
     
     case ( 11 ):
     // show image data list
     $this->show_image_data();
     break;
     
     case ( 12 ):
     // upload document data
     $this->upload_document_data();
     break;
     
     case ( 13 ):
     // show document data list
     $this->show_document_data();
     break;
     
     case ( 14 ):
     // upload video data
     $this->upload_video_data();
     break;
     
     case ( 15 ):
     // show video data list
     $this->show_video_data();
     break;
     
     case ( 16 ):
     // show image
     if (isset($_GET["image_id"]) && is_numeric($_GET["image_id"]))
     $this->show_image($_GET["image_id"]);
     else
     $success = FALSE;
     break;
     
     case ( 17 ):
     // show video
     if (isset($_GET["video_id"]) && is_numeric($_GET["video_id"]))
     $this->show_video($_GET["video_id"]);
     else
     $success = FALSE;
     break;
     
     case ( 19 ):
     // show kontaktlist
     $this->show_kontaktlist();
     break;
     
     case ( 29 ):
     // show tasklist
     $this->show_tasklist();
     break;
     
     case ( 30 ):
     // show all related members
     $this->show_all_related_members();
     break;
     
     case ( 32 ):
     // show all related teams
     $this->show_all_related_teams();
     break;
     
     case ( 34 ):
     // show all related event
     $this->show_all_related_events();
     break;
     
     case ( 38 ):
     // show task form
     $this->show_task_form();
     break;
     
     case ( 39 ):
     // show all nasty words
     $this->show_all_nasty_words();
     break;
     
     case ( 100 ):
     // explore first entity
     $this->explore_first_entity();
     break;
     
     case ( 200 ):
     // explore second entity
     $this->explore_second_entity();
     break;
     
     case ( 300 ):
     // explore third entity
     $this->explore_third_entity();
     break;
     
     case ( 500 ):
     // show the unread mail from the author
     if
     ( isset($_GET["author_id"]) && is_numeric($_GET["author_id"]))
     {
     if
     (isset($_GET["news_id"]) && is_numeric($_GET["news_id"]))
     { $this->show_author_mail(
     $_GET["author_id"],
     $_GET["news_id"]); }
     else
     { $this->show_author_mail(
     $_GET["author_id"],
     (int)0); }
     }
     break;
     
     case ( 1000 ):
     //ask_member_follower_connection
     $this->ask_member_follower_connection();
     break;
     
     case ( 1001 ):
     // remove_member_follower_inquiry
     $this->remove_member_follower_inquiry();
     break;
     
     case ( 1002 ):
     // accept_follower_member_inquiry
     $this->accept_follower_member_inquiry();
     break;
     
     case ( 1003 ):
     //decline_follower_member_inquiry
     $this->decline_follower_member_inquiry();
     break;
     
     case ( 1004 ):
     // remove_follower_member_connection
     $this->remove_follower_member_connection();
     break;
     
     case ( 1005 ):
     // remove_member_follower_connection
     $this->remove_member_follower_connection();
     break;
     
     default:
     break;
     }
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function home()
    {
     //0  home
     $_SESSION['watched_id'] = $_SESSION['watch_id'];
     $this->show_article_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function modify_master_data()
    {
     //2  modify master data
     $this->next_frame = $_SESSION['B_frame_base'] . "B2_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_master_data()
    {
     //4  show master data
     $this->next_frame = $_SESSION['B_frame_base'] . "B4_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_unread_mails()
    {
     //5  show unread mails
     $this->next_frame = $_SESSION['B_frame_base'] . "B5_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_message_data()
    {
     //6  show message data
     $this->next_frame = $_SESSION['B_frame_base'] . "B6_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_article_data()
    {
     //7  show article data
     $this->next_frame = $_SESSION['B_frame_base'] . "B7_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_mobbing_selection()
    {
     //8  show mobbing selection
     $this->next_frame = $_SESSION['B_frame_base'] . "B8_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_calendar_data()
    {
     //9  show calender data
     $this->next_frame = $_SESSION['B_control_base'] . "B9_pre_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_image_data()
    {
     //10  upload image data
     $this->next_frame = $_SESSION['B_frame_base'] . "B10_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_image_data()
    {
     //11  show image data list
     $this->next_frame = $_SESSION['B_frame_base'] . "B11_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_document_data()
    {
     //12  upload document data
     $this->next_frame = $_SESSION['B_frame_base'] . "B12_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_document_data()
    {
     //13  show document data list
     $this->next_frame = $_SESSION['B_frame_base'] . "B13_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_video_data()
    {
     //14  upload video data
     $this->next_frame = $_SESSION['B_frame_base'] . "B14_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_video_data()
    {
     //15  show video data list
     $this->next_frame = $_SESSION['B_frame_base'] . "B15_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  image_id
     */
    public function show_image($image_id)
    {
     //16  show image
     $this->next_frame = $_SESSION['B_frame_base'] . "B16_frame.php";
     $this->get_param_list()->add_parameter( '&image_id=' . $image_id);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  video_id
     */
    public function show_video($video_id)
    {
     //17 show video
     $this->next_frame = $_SESSION['B_frame_base'] . "B17_frame.php";
     $this->get_param_list()->add_parameter( '&video_id=' . $video_id);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_kontaktlist()
    {
     // 19 show_kontaktlist
     $this->next_frame = $_SESSION['B_frame_base'] . "B19_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_tasklist()
    {
     //29 show tasklist
     $this->next_frame = $_SESSION['B_frame_base'] . "B29_frame.php";
     if(isset($_GET["modus"]))
     { $this->get_param_list()->add_parameter( '&modus=' .
     htmlspecialchars( $_GET["modus"])); }
     else
     { $this->get_param_list()->add_parameter( '&modus=actual' ); }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_members()
    {
     //30 show all related members
     $this->next_frame = $_SESSION['B_frame_base'] . "B30_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_teams()
    {
     //32 show all related teams
     $this->next_frame = $_SESSION['B_frame_base'] . "B32_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_events()
    {
     //34 show all related events
     $this->next_frame = $_SESSION['B_frame_base'] . "B34_frame.php";
     if(isset($_GET["modus"]))
     { $this->get_param_list()->add_parameter( '&modus=' .
     htmlspecialchars( $_GET["modus"])); }
     else
     { $this->get_param_list()->add_parameter( '&modus=actual' ); }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_task_form()
    {
     //38 show task form
     if(isset($_GET["id"]))
     { $id = (int)$_GET["id"]; }
     else
     { $id = (int)0; }
     
     if(isset($_GET["image_link_modus"]))
     { $image_link_modus = (int)$_GET["image_link_modus"]; }
     else
     { $image_link_modus = (int)1; }
     
     $this->next_frame = $_SESSION['B_frame_base'] . "B38_frame.php";
     $list = $this->get_param_list();
     $list->add_parameter( '&task_id=' . $id);
     $list->add_parameter( '&image_link_modus=' . $image_link_modus);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_nasty_words()
    {
     //39 show all nasty words
     $this->next_frame = $_SESSION['B_frame_base'] . "B39_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function explore_first_entity()
    {
     // 100 explore
     $this->next_frame = $_SESSION['last_frame'];
     $this->get_param_list()->add_parameter( '&nav=1' );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function explore_second_entity()
    {
     // 200 explore
     $this->next_frame = $_SESSION['last_frame'];
     $this->get_param_list()->add_parameter( '&nav=2' );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function explore_third_entity()
    {
     // 300 explore
     $this->next_frame = $_SESSION['last_frame'];
     $this->get_param_list()->add_parameter( '&nav=3' );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  author_id
     * @param  news_id
     */
    public function show_author_mail($author_id, $news_id)
    {
     // 500 show the unread mail from the author
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     if( $news_id > (int)0 )
     {
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     }
     
     $_SESSION['watched_id'] = $author_id;
     $this->show_message_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function aa()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function ask_member_follower_connection()
    {
     //1000 ask_member_follower_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $follower_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->ask_member_follower_connection( $follower_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_member_follower_inquiry()
    {
     //1001 remove_member_follower_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $follower_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_member_follower_inquiry( $follower_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function accept_follower_member_inquiry()
    {
     //1002 accept_follower_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     $follower_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->accept_follower_member_inquiry( $follower_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function decline_follower_member_inquiry()
    {
     //1003 decline_follower_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     $follower_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->decline_follower_member_inquiry( $follower_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_follower_member_connection()
    {
     //1004 remove_follower_member_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     $follower_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_follower_member_connection( $follower_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function bb()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_member_follower_connection()
    {
     //1014 remove_member_follower_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $follower_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_member_follower_connection( $follower_id );
    }
}?>