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
// section 10-5-26--54--209386c:153576bf48a:-8000:0000000000001B37-includes begin
// section 10-5-26--54--209386c:153576bf48a:-8000:0000000000001B37-includes end

/* user defined constants */
// section 10-5-26--54--209386c:153576bf48a:-8000:0000000000001B37-constants begin
// section 10-5-26--54--209386c:153576bf48a:-8000:0000000000001B37-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B39_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if (empty($_POST["new_word"]))
     $completed = FALSE;
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
     require_once(__ROOT_DATA__.'class.forbidden_word.php');
     
     $new_word = new forbidden_word();
     $new_word->set_name( $_POST["new_word"] );
     $new_word->set_uploader_id( $_SESSION['watch_id'] );
     $new_word->set_hit( (int)0 );
     $new_word->insert();
    }
}?>