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
// section 10-30--8--63--28b88630:154c800f9f3:-8000:0000000000001B1B-includes begin
// section 10-30--8--63--28b88630:154c800f9f3:-8000:0000000000001B1B-includes end

/* user defined constants */
// section 10-30--8--63--28b88630:154c800f9f3:-8000:0000000000001B1B-constants begin
// section 10-30--8--63--28b88630:154c800f9f3:-8000:0000000000001B1B-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B38_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     * Short description of method is_entered_completed
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
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
}?>