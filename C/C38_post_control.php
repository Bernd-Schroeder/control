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
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029DB-includes begin
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029DB-includes end

/* user defined constants */
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029DB-constants begin
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029DB-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C38_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute start_time_item_id
     *
     * @access private
     * @var Integer
     */
    private $start_time_item_id = null;

    /**
     * Short description of attribute end_time_item_id
     *
     * @access private
     * @var Integer
     */
    private $end_time_item_id = null;

    /**
     * Short description of attribute task
     *
     * @access private
     * @var Integer
     */
    private $task = null;

    /**
     * Short description of attribute team
     *
     * @access private
     * @var Integer
     */
    private $team = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team.php');
     
     $completed = TRUE;
     if ( empty($_POST["start_time_item_id"]) OR
     empty($_POST["end_time_item_id"]) )
     { $completed = FALSE; }
     else
     {
     $this->start_time_item_id = $_POST["start_time_item_id"];
     $this->end_time_item_id = $_POST["end_time_item_id"];
     
     $this->team = new team();
     $this->team->set_id( $_SESSION['watched_id'] );
     $this->team->load();
     }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_task()
    {
     return $this->task;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_team()
    {
     return $this->team;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  task_id
     */
    public function update($task_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.task.php');
     
     $task = new task();
     $task->set_id( $task_id );
     $task->load();
     
     if ( isset( $_POST["real_duration"] ))
     {
     $real_duration = htmlspecialchars($_POST['real_duration']);
     $task->set_real_duration( $real_duration );
     }
     
     if ( isset( $_POST["receiver_comment"] ))
     {
     $receiver_comment = htmlspecialchars($_POST['receiver_comment']);
     $task->set_receiver_comment( $receiver_comment );
     }
     
     if ( isset( $_POST["author_comment"] ))
     {
     $author_comment = htmlspecialchars($_POST['author_comment']);
     $task->set_author_comment( $author_comment );
     }
     
     if ( isset( $_POST["status"] ))
     {
     $status = htmlspecialchars($_POST['status']);
     $task->set_status( $status );
     }
     
     $success = $task->update();
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_id
     * @param  author_id
     */
    public function insert_task($receiver_id, $author_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.task.php');
     require_once(__ROOT_DATA__.'class.time_table_item.php');
     
     $est_duration = (int)0;
     $real_duration = (int)0;
     $status = (int)0;
     $task_description = "";
     $author_comment = "";
     $receiver_comment = "";
     
     $this->task = new task();
     $this->task->set_author_id( $author_id );
     $this->task->set_receiver_id($receiver_id );
     $this->task->set_team_id( $_SESSION['watched_id'] );
     
     if ( isset( $_POST["est_duration"] ))
     { $est_duration = htmlspecialchars($_POST['est_duration']); }
     $this->task->set_est_duration( $est_duration );
     
     if ( isset( $_POST["real_duration"] ))
     { $real_duration = htmlspecialchars($_POST['real_duration']); }
     $this->task->set_real_duration( $real_duration );
     
     if ( isset( $_POST["status"] ))
     { $status = htmlspecialchars($_POST['status']); }
     $this->task->set_status( $status );
     
     if ( isset( $_POST["task_description"] ))
     { $task_description = htmlspecialchars($_POST['task_description']); }
     $this->task->set_task_description( $task_description );
     
     if ( isset( $_POST["author_comment"] ))
     { $author_comment = htmlspecialchars($_POST['author_comment']); }
     $this->task->set_author_comment( $author_comment );
     
     if ( isset( $_POST["receiver_comment"] ))
     { $receiver_comment = htmlspecialchars($_POST['receiver_comment']); }
     $this->task->set_receiver_comment( $receiver_comment );
     
     $this->task->set_start_time_table_item_id( $this->start_time_item_id );
     $this->task->set_end_time_table_item_id( $this->end_time_item_id );
     
     $time_table_item = new time_table_item();
     $time_table_item->set_id( $this->end_time_item_id );
     $time_table_item->load();
     $this->task->set_end_item_date( $time_table_item->get_item_date() );
     
     $success = $this->task->insert();
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_id
     * @param  uploader_id
     */
    public function insert_news($receiver_id, $uploader_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_receiver_id( $receiver_id );
     $news->set_entity_group("t");
     $news->set_entity_id( $_SESSION['watched_id'] );
     $news->set_function( (int)506 );
     $news->set_article_id( (int)0 );
     $news->set_uploader_id( $uploader_id );
     $news->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_id
     * @param  author_id
     */
    public function send_mail($receiver_id, $author_id)
    {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'email/class.task_notification_mail.php');
     
     $mail = new task_notification_mail();
     $mail->set_author_id( $author_id );
     $mail->set_receiver_id( $receiver_id );
     $mail->set_task( $this->get_task() );
     $mail->set_entity( $this->get_team() );
     $mail->sent_mail();
    }
}?>