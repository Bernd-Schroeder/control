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
// section 10-5-26--54-481b9c74:15370d9c231:-8000:0000000000001A73-includes begin
// section 10-5-26--54-481b9c74:15370d9c231:-8000:0000000000001A73-includes end

/* user defined constants */
// section 10-5-26--54-481b9c74:15370d9c231:-8000:0000000000001A73-constants begin
// section 10-5-26--54-481b9c74:15370d9c231:-8000:0000000000001A73-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C3_post_control
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
     require_once(__ROOT_DATA__.'class.team_article.php');
     require_once(__ROOT_DATA__.'class.team.php');
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'email/class.article_list_mail.php');
     
     $success = FALSE;
     $author_id = $_SESSION['watch_id'];
     $owner_id = $_SESSION['watched_id'];
     
     $new_article = new team_article();
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
     
     $team = new team();
     $team->set_id( $owner_id );
     $team->load();
     
     $receiver_list = $team->get_all_member_list();
     $author_id = $new_article->get_author_id();
     
     $mail_list = new article_list_mail();
     $mail_list->set_author_id( $author_id );
     $mail_list->set_receiver_list( $receiver_list );
     $mail_list->set_article( $new_article );
     $mail_list->set_entity( $team );
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
     $news_list->set_entity_group("t");
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
     if (isset($_POST['filetype']))
     {
     if ($_POST['filetype'] == '1')
     { 
     $this->next_frame = $_SESSION['C_frame_base'] . "C35_frame.php"; 
     $_SESSION['article_return_id'] = $article_id;
     }
     else
     { $this->next_frame = $_SESSION['C_frame_base'] . "C7_frame.php"; }
     }
     else
     { $this->next_frame = $_SESSION['C_frame_base'] . "C7_frame.php"; }
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
     require_once(__ROOT_DATA__.'class.team_article.php');
     
     $article = new team_article();
     $article->set_id( $article_id );
     $article->load();
     $article->set_modified_stamp( $article->get_written_stamp() );
     $article->update();
    }
}?>