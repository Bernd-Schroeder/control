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
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E8-includes begin
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E8-includes end

/* user defined constants */
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E8-constants begin
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E8-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute next_frame
     *
     * @access public
     * @var Integer
     */
    public $next_frame = null;

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
     
     case ( 3 ):
     // modify article data
     $this->modify_article_data();
     break;
     
     case ( 4 ):
     // show master data
     $this->show_master_data();
     break;
     
     case ( 5 ):
     // show member list
     $this->show_member_list_data();
     break;
     
     case ( 7 ):
     // show article data
     $this->show_article_data();
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
     
     case ( 20 ):
     // show select timeslot
     if (isset($_GET["id"]) && is_numeric($_GET["id"]))
     $this->show_select_timeslot($_GET["id"]);
     else
     $success = FALSE;
     break;
     
     case ( 30 ):
     // show all related members
     $this->show_all_related_members();
     break;
     
     case ( 32 ):
     // show all related teams
     $this->show_all_related_teams();
     break;
     
     case ( 36 ):
     // show write comment
     if
     (isset($_GET["article_id"]) && is_numeric($_GET["article_id"]))
     { $this->show_write_comment( $_GET["article_id"] ); }
     break;
     
     case ( 37 ):
     // show show comment
     if
     (isset($_GET["article_id"]) && is_numeric($_GET["article_id"]))
     { $this->show_show_comment( $_GET["article_id"] ); }
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
     
     case ( 501 ):
     // show image data for a special event
     if
     ((isset($_GET["event_id"]) && 
     is_numeric($_GET["event_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_event_image_data($_GET["event_id"], 
     $_GET["news_id"]); }
     break;
     
     case ( 502 ):
     // show document data for a special event
     if
     ((isset($_GET["event_id"]) && 
     is_numeric($_GET["event_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_event_document_data($_GET["event_id"], 
     $_GET["news_id"]); }
     break;
     
     case ( 503 ):
     // show video data for a special event
     if
     ((isset($_GET["event_id"]) && 
     is_numeric($_GET["event_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_event_video_data($_GET["event_id"], 
     $_GET["news_id"]); }
     break;
     
     case ( 504 ):
     // show article data for a special event
     if
     ((isset($_GET["event_id"]) && 
     is_numeric($_GET["event_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_event_article_data($_GET["event_id"], 
     $_GET["news_id"]); }
     break;
     
     case ( 505 ):
     // show comment data for a special event
     if
     ((isset($_GET["event_id"]) && 
     is_numeric($_GET["event_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])) AND
     (isset($_GET["article_id"]) && 
     is_numeric($_GET["article_id"])))
     { $this->show_event_comment_data( 
     $_GET["event_id"], 
     $_GET["article_id"], 
     $_GET["news_id"]); }
     break;
     
     case ( 1000 ):
     // ask_member_event_connection 
     $this->ask_member_event_connection();
     break;
     
     case ( 1001 ):
     // remove_member_event_inquiry 
     $this->remove_member_event_inquiry();
     break;
     
     case ( 1002 ):
     // accept_event_member_inquiry  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->accept_event_member_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1003 ):
     // decline_event_member_inquiry  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->decline_event_member_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1004 ):
     // remove_event_member_connection  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->remove_event_member_connection($_GET["item_id"]); }
     break;
     
     case ( 1010 ):
     // ask_event_member_connection  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->ask_event_member_connection($_GET["item_id"]); }
     break;
     
     case ( 1011 ):
     // remove_event_member_inquiry  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->remove_event_member_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1012 ):
     // accept_member_event_inquiry 
     $this->accept_member_event_inquiry();
     break;
     
     case ( 1013 ):
     // decline_member_event_inquiry 
     $this->decline_member_event_inquiry();
     break;
     
     case ( 1014 ):
     // remove_member_event_connection 
     $this->remove_member_event_connection();
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
     $this->next_frame = $_SESSION['D_frame_base'] . "D2_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function modify_article_data()
    {
     //3  modify article data
     $this->next_frame = $_SESSION['D_frame_base'] . "D3_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_master_data()
    {
     //4  show master data
     $this->next_frame = $_SESSION['D_frame_base'] . "D4_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_member_list_data()
    {
     //5  show member data ( only team and event )
     $this->next_frame = $_SESSION['D_frame_base'] . "D5_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_article_data()
    {
     //7  show article data
     $this->next_frame = $_SESSION['D_frame_base'] . "D7_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_calendar_data()
    {
     //9  show calender data
     $this->next_frame = $_SESSION['D_control_base'] . "D9_pre_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_image_data()
    {
     //10  upload image data
     $this->next_frame = $_SESSION['D_frame_base'] . "D10_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_image_data()
    {
     //11  show image data list
     $this->next_frame = $_SESSION['D_frame_base'] . "D11_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_document_data()
    {
     //12  upload document data
     $this->next_frame = $_SESSION['D_frame_base'] . "D12_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_document_data()
    {
     //13  show document data list
     $this->next_frame = $_SESSION['D_frame_base'] . "D13_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_video_data()
    {
     //14  upload video data
     $this->next_frame = $_SESSION['D_frame_base'] . "D14_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_video_data()
    {
     //15  show video data list
     $this->next_frame = $_SESSION['D_frame_base'] . "D15_frame.php";
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
     $this->next_frame = $_SESSION['D_frame_base'] . "D16_frame.php";
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
     $this->next_frame = $_SESSION['D_frame_base'] . "D17_frame.php";
     $this->get_param_list()->add_parameter( '&video_id=' . $video_id);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_member_id
     */
    public function show_select_timeslot($event_member_id)
    {
     //20 show change time slot
     $this->next_frame = $_SESSION['D_frame_base'] . "D20_frame.php";
     $this->get_param_list()->add_parameter( '&event_member_id=' .
     $event_member_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_members()
    {
     //30 show all related members
     $this->next_frame = $_SESSION['D_frame_base'] . "D30_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_teams()
    {
     //32 show all related teams
     $this->next_frame = $_SESSION['D_frame_base'] . "D32_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  article_id
     */
    public function show_write_comment($article_id)
    {
     // 36 show write comment
     $this->next_frame = $_SESSION['D_control_base'] . "D36_pre_frame.php";
     $this->get_param_list()->add_parameter( '&article_id=' . $article_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  article_id
     */
    public function show_show_comment($article_id)
    {
     // 37 show write comment
     $this->next_frame = $_SESSION['D_control_base'] . "D37_pre_frame.php";
     $this->get_param_list()->add_parameter( '&article_id=' . $article_id );
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
     * @param  event_id
     * @param  news_id
     */
    public function show_event_image_data($event_id, $news_id)
    {
     // 501 show image data for a special event
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $event_id;
     $this->show_image_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  news_id
     */
    public function show_event_document_data($event_id, $news_id)
    {
     // 502 show image data for a special event
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $event_id;
     $this->show_document_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  news_id
     */
    public function show_event_video_data($event_id, $news_id)
    {
     // 503 show image data for a special event
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $event_id;
     $this->show_video_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  news_id
     */
    public function show_event_article_data($event_id, $news_id)
    {
     // 504 show article data for a special event
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $event_id;
     $this->show_article_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     * @param  article_id
     * @param  news_id
     */
    public function show_event_comment_data($event_id, $article_id, $news_id)
    {
     // 505 show comment data for a special event
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $event_id;
     $this->show_show_comment( $article_id );
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
    public function ask_member_event_connection()
    {
     //1000 ask_member_team_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $event_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->ask_member_event_connection( $event_id );
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_member_event_inquiry()
    {
     //1001 remove_member_event_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $event_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_member_event_inquiry( $event_id );
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function accept_event_member_inquiry($event_id)
    {
     //1002 accept_event_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.event_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new event_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_event_id( $event_id );
     $scon->accept_event_member_inquiry();
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function decline_event_member_inquiry($event_id)
    {
     //1003 decline_event_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.event_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new event_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_event_id( $event_id );
     $scon->decline_event_member_inquiry();
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function remove_event_member_connection($event_id)
    {
     //1004 remove_event_member_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.event_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new event_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_event_id( $event_id );
     $scon->remove_event_member_connection();
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
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
     * @param  event_id
     */
    public function ask_event_member_connection($event_id)
    {
     //1010 ask_event_member_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.event_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new event_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_event_id( $event_id );
     $scon->ask_event_member_connection();
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  event_id
     */
    public function remove_event_member_inquiry($event_id)
    {
     //1011 remove_event_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.event_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new event_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_event_id( $event_id );
     $scon->remove_event_member_inquiry();
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function accept_member_event_inquiry()
    {
     //1012 accept_member_event_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $event_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->accept_member_event_inquiry( $event_id );
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function decline_member_event_inquiry()
    {
     //1013 decline_member_event_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $event_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->decline_member_event_inquiry( $event_id );
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_member_event_connection()
    {
     //1014 remove_member_event_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $event_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_member_event_connection( $event_id );
     
     $this->next_frame = $_SESSION['D_control_base'] . "D0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $event_id );
    }
}?>