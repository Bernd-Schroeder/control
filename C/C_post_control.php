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
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E6-includes begin
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E6-includes end

/* user defined constants */
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E6-constants begin
// section 10-5-22-23-68cf0c5f:14bfee8b63a:-8000:000000000000A2E6-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C_post_control
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
     { $this->show_video($_GET["video_id"]); }
     else
     { $success = FALSE; }
     break;
     
     case ( 27 ):
     // import CSV
     $this->show_import_csv();
     break;
     
     case ( 28 ):
     // invite extern
     $this->show_external_invitation();
     break;
     
     case ( 29 ):
     // show tasklist
     $this->show_tasklist();
     break;
     
     case ( 30 ):
     // show all related members
     $this->show_all_related_members();
     break;
     
     case ( 31 ):
     // register team
     $this->register_team();
     break;
     
     case ( 32 ):
     // show all related teams
     $this->show_all_related_teams();
     break;
     
     case ( 33 ):
     // register event
     $this->register_event();
     break;
     
     case ( 34 ):
     // show all related event
     $this->show_all_related_events();
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
     
     case ( 38 ):
     // show task form
     $this->show_task_form();
     break;
     
     case ( 39 ):
     // show control_table_item form
     $this->show_control_table_item_form();
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
     // show image data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_image_data($_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 502 ):
     // show document data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_document_data($_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 503 ):
     // show video data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_video_data($_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 504 ):
     // show article data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_article_data($_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 505 ):
     // show comment data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])) AND
     (isset($_GET["article_id"]) && 
     is_numeric($_GET["article_id"])))
     { $this->show_team_comment_data($_GET["team_id"],
     $_GET["article_id"], $_GET["news_id"]); }
     break;
     
     case ( 506 ):
     // show task data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_task_data($_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 507 ):
     // show schedule data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_schedule_data($_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 508 ):
     // show event data for a special team
     if
     ((isset($_GET["team_id"]) && 
     is_numeric($_GET["team_id"])) AND
     (isset($_GET["news_id"]) && 
     is_numeric($_GET["news_id"])))
     { $this->show_team_event_data( $_GET["team_id"], $_GET["news_id"]); }
     break;
     
     case ( 1000 ):
     // ask_member_team_connection
     $this->ask_member_team_connection();
     break;
     
     case ( 1001 ):
     // remove_member_team_inquiry
     $this->remove_member_team_inquiry();
     break;
     
     case ( 1002 ):
     // accept_team_member_inquiry
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->accept_team_member_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1003 ):
     // decline_team_member_inquiry
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->decline_team_member_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1004 ):
     // remove_team_member_connection
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->remove_team_member_connection($_GET["item_id"]); }
     break;
     
     case ( 1010 ):
     // ask_team_member_connection 
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->ask_team_member_connection($_GET["item_id"]); }
     break;
     
     case ( 1011 ):
     // remove_team_member_inquiry 
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->remove_team_member_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1012 ):
     // accept_member_team_inquiry
     $this->accept_member_team_inquiry();
     break;
     
     case ( 1013 ):
     // decline_member_team_inquiry
     $this->decline_member_team_inquiry();
     break;
     
     case ( 1014 ):
     // remove_member_team_connection
     $this->remove_member_team_connection();
     break;
     
     case ( 1020 ):
     // ask_team_admin_connection  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->ask_team_admin_connection($_GET["item_id"]); }
     break;
     
     case ( 1021 ):
     // remove_team_admin_inquiry 
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->remove_team_admin_inquiry($_GET["item_id"]); }
     break;
     
     case ( 1022 ):
     // accept_admin_team_inquiry
     $this->accept_admin_team_inquiry();
     break;
     
     case ( 1023 ):
     // decline_admin_team_inquiry
     $this->decline_admin_team_inquiry();
     break;
     
     case ( 1024 ):
     // remove_admin_team_connection
     $this->remove_admin_team_connection();
     break;
     
     case ( 1030 ):
     // remove_team_admin_connection  
     if(isset($_GET["item_id"]) && is_numeric($_GET["item_id"]))
     { $this->remove_team_admin_connection($_GET["item_id"]); }
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
     $this->next_frame = $_SESSION['C_frame_base'] . "C2_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function modify_article_data()
    {
     //3  modify article data
     $this->next_frame = $_SESSION['C_frame_base'] . "C3_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_master_data()
    {
     //4  show master data
     $this->next_frame = $_SESSION['C_frame_base'] . "C4_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_member_list_data()
    {
     //5  show member data ( only team and event )
     $this->next_frame = $_SESSION['C_frame_base'] . "C5_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_article_data()
    {
     //7  show article data
     $this->next_frame = $_SESSION['C_frame_base'] . "C7_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_calendar_data()
    {
     //9  show calender data
     $this->next_frame = $_SESSION['C_control_base'] . "C9_pre_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_image_data()
    {
     //10  upload image data
     $this->next_frame = $_SESSION['C_frame_base'] . "C10_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_image_data()
    {
     //11  show image data list
     $this->next_frame = $_SESSION['C_frame_base'] . "C11_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_document_data()
    {
     //12  upload document data
     $this->next_frame = $_SESSION['C_frame_base'] . "C12_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_document_data()
    {
     //13  show document data list
     $this->next_frame = $_SESSION['C_frame_base'] . "C13_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function upload_video_data()
    {
     //14  upload video data
     $this->next_frame = $_SESSION['C_frame_base'] . "C14_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_video_data()
    {
     //15  show video data list
     $this->next_frame = $_SESSION['C_frame_base'] . "C15_frame.php";
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
     $this->next_frame = $_SESSION['C_frame_base'] . "C16_frame.php";
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
     $this->next_frame = $_SESSION['C_frame_base'] . "C17_frame.php";
     $this->get_param_list()->add_parameter( '&video_id=' . $video_id);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_import_csv()
    {
     //27 external_invitation
     $this->next_frame = $_SESSION['C_frame_base'] . "C27_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_external_invitation()
    {
     //28 external_invitation
     $this->next_frame = $_SESSION['C_frame_base'] . "C28_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_tasklist()
    {
     //29 show tasklist
     $this->next_frame = $_SESSION['C_frame_base'] . "C29_frame.php";
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
     $this->next_frame = $_SESSION['C_frame_base'] . "C30_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function register_team()
    {
     //31 register team
     $this->next_frame = $_SESSION['C_frame_base'] . "C31_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_teams()
    {
     //32 show all related teams
     $this->next_frame = $_SESSION['C_frame_base'] . "C32_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function register_event()
    {
     //33 register event
     $this->next_frame = $_SESSION['C_frame_base'] . "C33_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_all_related_events()
    {
     //34 show all related events
     $this->next_frame = $_SESSION['C_frame_base'] . "C34_frame.php";
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
     * @param  article_id
     */
    public function show_write_comment($article_id)
    {
     // 36 show write comment
     $this->next_frame = $_SESSION['C_control_base'] . "C36_pre_frame.php";
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
     $this->next_frame = $_SESSION['C_control_base'] . "C37_pre_frame.php";
     $this->get_param_list()->add_parameter( '&article_id=' . $article_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_task_form()
    {
//     if(isset($_GET["team_id"]))
//     { $team_id = (int)$_GET["team_id"]; }
//     else
//     { $team_id = $_SESSION['watched_id']; }
     
     if(isset($_GET["id"]))
     { $id = (int)$_GET["id"]; }
     else
     { $id = (int)0; }
     
     if(isset($_GET["image_link_modus"]))
     { $image_link_modus = (int)$_GET["image_link_modus"]; }
     else
     { $image_link_modus = (int)1; }
     
     if(isset($_GET["all"]))
     { $all = $_GET["all"]; }
     else
     { $all = "all"; }
     
     $this->next_frame = $_SESSION['C_frame_base'] . "C38_frame.php";
     $list = $this->get_param_list();
//     $list->add_parameter( '&team_id=' . $team_id);
     $list->add_parameter( '&task_id=' . $id);
     $list->add_parameter( '&image_link_modus=' . $image_link_modus);
     $list->add_parameter( '&all=' . $all);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_control_table_item_form()
    {
     //39 show control_table_item form
     $this->next_frame = $_SESSION['C_frame_base'] . "C39_frame.php";
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
     * @param  team_id
     * @param  news_id
     */
    public function show_team_image_data($team_id, $news_id)
    {
     // 501 show image data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_image_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  news_id
     */
    public function show_team_document_data($team_id, $news_id)
    {
     // 502 show image data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_document_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  news_id
     */
    public function show_team_video_data($team_id, $news_id)
    {
     // 503 show image data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_video_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  news_id
     */
    public function show_team_article_data($team_id, $news_id)
    {
     // 504 show article data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_article_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  article_id
     * @param  news_id
     */
    public function show_team_comment_data($team_id, $article_id, $news_id)
    {
     // 505 show comment data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_show_comment( $article_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  news_id
     */
    public function show_team_task_data($team_id, $news_id)
    {
     // 506 show task data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_tasklist();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  news_id
     */
    public function show_team_schedule_data($team_id, $news_id)
    {
     // 507 show schedule data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_calendar_data();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     * @param  news_id
     */
    public function show_team_event_data($team_id, $news_id)
    {
     // 508 show event data for a special team
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_id( $news_id );
     $news->set_read();
     
     $_SESSION['watched_id'] = $team_id;
     $this->show_all_related_events();
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
    public function ask_member_team_connection()
    {
     //1000 ask_member_team_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->ask_member_team_connection( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_member_team_inquiry()
    {
     //1001 remove_member_team_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_member_team_inquiry( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function accept_team_member_inquiry($team_id)
    {
     //1002 accept_team_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->accept_team_member_inquiry();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function decline_team_member_inquiry($team_id)
    {
     //1003 decline_team_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->decline_team_member_inquiry();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_team_member_connection($team_id)
    {
     //1004 remove_team_member_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->remove_team_member_connection();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
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
     * @param  team_id
     */
    public function ask_team_member_connection($team_id)
    {
     //1010 ask_team_member_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     require_once(__ROOT_CONTROL__.
     'email/class.team_invitation_mail.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->ask_team_member_connection();
     
     $mail = new team_invitation_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $member_id );
     $mail->set_author_team( $team_id );
     $mail->sent_mail();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_team_member_inquiry($team_id)
    {
     //1011 remove_team_member_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->remove_team_member_inquiry();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function accept_member_team_inquiry()
    {
     //1012 remove_member_team_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->accept_member_team_inquiry( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function decline_member_team_inquiry()
    {
     //1013 decline_member_team_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->decline_member_team_inquiry( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_member_team_connection()
    {
     //1014 remove_member_team_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_member_team_connection( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function cc()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function ask_team_admin_connection($team_id)
    {
     //1020 ask_team_admin_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->ask_team_admin_connection();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_team_admin_inquiry($team_id)
    {
     //1021 remove_team_admin_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->remove_team_admin_inquiry();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function accept_admin_team_inquiry()
    {
     //1022 accept_admin_team_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->accept_admin_team_inquiry( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function decline_admin_team_inquiry()
    {
     //1023 decline_admin_team_inquiry
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->decline_admin_team_inquiry( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function remove_admin_team_connection()
    {
     //1024 remove_admin_team_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     $team_id = ( $_SESSION['watched_id'] );
     $member_id = ( $_SESSION['watch_id'] );
     
     $scon = new member_service_connection();
     $scon->set_member_id( $member_id );
     $scon->remove_admin_team_connection( $team_id );
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function dd()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  team_id
     */
    public function remove_team_admin_connection($team_id)
    {
     //1030 remove_team_admin_connection
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     
     $member_id = ( $_SESSION['watched_id'] );
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->remove_team_admin_connection();
     
     $this->next_frame = $_SESSION['C_control_base'] . "C0_pre_frame.php";
     $this->get_param_list()->add_parameter( '&id=' . $team_id );
    }
}?>