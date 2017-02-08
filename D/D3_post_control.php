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
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001803-includes begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001803-includes end

/* user defined constants */
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001803-constants begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001803-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D3_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute next_frame
     *
     * @access public
     * @var String
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
    public function is_entered_completed()
    {
     $completed = TRUE;
     if ( empty($_POST["header"]) OR empty($_POST["article"]))
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
     require_once(__ROOT_DATA__.'class.event_article.php');
     require_once(__ROOT_DATA__.'class.event.php');
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'email/class.article_list_mail.php');
     
     $success = FALSE;
     $author_id = $_SESSION['watch_id'];
     $owner_id = $_SESSION['watched_id'];
     
     $new_article = new event_article();
     $new_article->set_deleted( (int)0 );
     $new_article->set_owner_id( (int)$owner_id );
     $new_article->set_author_id( (int)$author_id );
     
     if ( isset($_POST["header"]) )
     { $new_article->set_header($_POST["header"]); }
     else
     { $new_article->set_header(""); }
     
     if ( isset($_POST["article"]) )
     {
     $article = htmlspecialchars( $_POST["article"] );
     $article = $this->generate_hyperlink( $article );
     $new_article->set_text( $article );
     }
     else
     { $new_article->set_text(""); }
     
     $new_article->set_image_id( (int)0 );
     $new_article->set_ref_link("");
     $article_id = $new_article->insert();
     
     if ( $article_id > 0 )
     {
     $success = TRUE;
     $this->set_next_frame( $article_id );
     
     $event = new event();
     $event->set_id( $owner_id );
     $event->load();
     
     $receiver_list = $event->get_all_member_list();
     $author_id = $new_article->get_author_id();
     
     $mail_list = new article_list_mail();
     $mail_list->set_author_id( $author_id );
     $mail_list->set_receiver_list( $receiver_list );
     $mail_list->set_article( $new_article );
     $mail_list->set_entity( $event );
     $mail_list->sent_mail();
     
     $this->insert_news( $receiver_list, $author_id );
     
     $this->update_article_modified_stamp( $article_id );
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_list
     * @param  uploader_id
     */
    public function insert_news($receiver_list, $uploader_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news_list.php');
     
     $news_list = new news_list();
     $news_list->set_receiver_model( $receiver_list );
     $news_list->set_entity_group("e");
     $news_list->set_entity_id( $_SESSION['watched_id'] );
     $news_list->set_function( (int)504 );
     $news_list->set_article_id( (int)0 );
     $news_list->set_uploader_id( $uploader_id );
     $news_list->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  article_id
     */
    public function set_next_frame($article_id)
    {
     if (isset($_POST['link']))
     {
     if ($_POST['link'] == '1')
     { 
     $this->next_frame = $_SESSION['D_frame_base'] . "D35_frame.php"; 
     $_SESSION['article_return_id'] = $article_id;
     }
     else
     { $this->next_frame = $_SESSION['D_frame_base'] . "D7_frame.php"; }
     }
     else
     { $this->next_frame = $_SESSION['D_frame_base'] . "D7_frame.php"; }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  article_id
     */
    public function update_article_modified_stamp($article_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_article.php');
     
     $article = new event_article();
     $article->set_id( $article_id );
     $article->load();
     $article->set_modified_stamp( $article->get_written_stamp() );
     $article->update();
    }
}?>