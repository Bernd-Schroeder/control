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
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-includes begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-includes end

/* user defined constants */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-constants begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B6_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute reader_id
     *
     * @access private
     * @var Integer
     */
    private $reader_id = null;

    /**
     * Short description of attribute author_id
     *
     * @access private
     * @var Integer
     */
    private $author_id = null;

    /**
     * Short description of attribute message_id
     *
     * @access private
     * @var Integer
     */
    private $message_id = null;

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
     else
     {
     if
     (
     (isset($_GET["reader_id"]) && is_string($_GET["reader_id"]))
     AND
     (isset($_GET["author_id"]) && is_string($_GET["author_id"]))
     )
     {
     $this->reader_id = $_GET["reader_id"];
     $this->author_id = $_GET["author_id"];
     }
     else
     {
     $this->reader_id = $_SESSION['watched_id'];
     $this->author_id = $_SESSION['watch_id'];
     }
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
     require_once(__ROOT_DATA__.'class.member_message.php');
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.'email/class.message_single_mail.php');
     
     $text = htmlspecialchars( $_POST["message"]);
     $is_conform = FALSE;
     
     if ( $this->is_mobbing_included( $text ) == FALSE )
     {
     $is_conform = TRUE;
     $message = new member_message();
     $message->set_author_id( $this->author_id );
     $message->set_reader_id( $this->reader_id );
     $message->set_read_stamp( 0 );
     $message->set_text( $this->generate_hyperlink( $text ) );
     $message->set_media_id( $this->add_file() );
     $message->insert();
     
     $this->insert_news();
     
     $mail = new message_single_mail();
     $mail->set_author_id( $this->author_id );
     $mail->set_receiver_id( $this->reader_id );
     $mail->sent_mail();
     }
     return $is_conform;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function add_file()
    {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.service_add_file.php');
     
     if( empty( $_FILES['userfile']['name'] ))
     // nothing to copy
     { $media_id = (int)0; }
     else
     {
     // something has to copy
     $service_file = new service_add_file();
     $service_file->set_file_name( $_FILES['userfile']['name'] );
     $service_file->set_file_source( $_FILES['userfile']['tmp_name'] );
     $service_file->set_file_size( $_FILES['userfile']['size'] );
     $service_file->set_file_error( $_FILES['userfile']['error'] );
     
     $service_file->set_owner_group( "m" );
     $service_file->set_uploader_id( $this->author_id );
     
     $media_id = $service_file->add_file();
     }
     return $media_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function insert_news()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_receiver_id( $this->reader_id );
     $news->set_uploader_id( $this->author_id );
     $news->set_entity_group("m");
     $news->set_entity_id( (int)0 );
     $news->set_function( (int)500 );
     $news->set_article_id( (int)0 );
     $news->insert();
    }
}?>