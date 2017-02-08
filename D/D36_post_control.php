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
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AD1-includes begin
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AD1-includes end

/* user defined constants */
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AD1-constants begin
// section 10-5-26-69-1432449b:153bde25491:-8000:0000000000001AD1-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D36_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute author_id
     *
     * @access public
     * @var Integer
     */
    public $author_id = null;

    /**
     * Short description of attribute article_id
     *
     * @access public
     * @var Integer
     */
    public $article_id = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if ( empty($_POST["text"]) OR empty($_GET["article_id"]))
     { $completed = FALSE; }
     else
     { 
     $this->author_id = $_SESSION['watch_id']; 
     $this->article_id = htmlspecialchars( $_GET["article_id"] );
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
     require_once(__ROOT_DATA__.'class.event_article_comment.php');
     
     $_SESSION['D37_article_id'] = $this->article_id;
     $text = htmlspecialchars( $_POST["text"]);
     
     $comment = new event_article_comment();
     $comment->set_deleted( (int)0 );
     $comment->set_author_id( $this->author_id );
     $comment->set_article_id( $this->article_id );
     $comment->set_text( $this->generate_hyperlink( $text ) );
     $comment_id = $comment->insert();
     
     if ( $comment_id > 0 )
     {
     $this->update_article_modified_stamp( $comment_id );
     $this->insert_news_list();
     $this->sent_mail_list();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function insert_news_list()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_article.php');
     require_once(__ROOT_DATA__.'class.event.php');
     require_once(__ROOT_DATA__.'class.news_list.php');
     
     $article = new event_article();
     $article->set_id( $this->article_id );
     $article->load();
     
     $event = new event();
     $event->set_id( $article->get_owner_id() );
     $event->load();
     
     $receiver_list = $event->get_all_member_list();
     
     $news_list = new news_list();
     $news_list->set_receiver_model( $receiver_list );
     $news_list->set_entity_group("e");
     $news_list->set_entity_id( $event->get_id() );
     $news_list->set_function( (int)505 );
     $news_list->set_article_id( $this->article_id );
     $news_list->set_uploader_id( $this->author_id );
     $news_list->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_list
     */
    public function sent_mail_list()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_article.php');
     require_once(__ROOT_DATA__.'class.event.php');
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'email/class.comment_list_mail.php');
     
     $article = new event_article();
     $article->set_id( $this->article_id );
     $article->load();
     
     $event = new event();
     $event->set_id( $article->get_owner_id() );
     $event->load();
     
     $receiver_list = $event->get_all_member_list();
     
     $mail_list = new comment_list_mail();
     $mail_list->set_author_id( $this->author_id );
     $mail_list->set_receiver_list( $receiver_list );
     $mail_list->set_article( $article );
     $mail_list->set_entity( $event );
     $mail_list->sent_mail();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  comment_id
     */
    public function update_article_modified_stamp($comment_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_article.php');
     require_once(__ROOT_DATA__.'class.event_article_comment.php');
     
     $comment = new event_article_comment();
     $comment->set_id( $comment_id );
     $comment->load();
     
     $article = new event_article();
     $article->set_id( $this->article_id );
     $article->load();
     $article->set_modified_stamp( $comment->get_written_stamp() );
     $article->update();
    }
}?>