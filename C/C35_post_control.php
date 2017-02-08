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
// section 10-5-22--28--7aff95b1:153b27823fb:-8000:0000000000001B1B-includes begin
// section 10-5-22--28--7aff95b1:153b27823fb:-8000:0000000000001B1B-includes end

/* user defined constants */
// section 10-5-22--28--7aff95b1:153b27823fb:-8000:0000000000001B1B-constants begin
// section 10-5-22--28--7aff95b1:153b27823fb:-8000:0000000000001B1B-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C35_post_control
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
     $completed = FALSE;
     if (isset($_GET["image_id"]) && is_numeric($_GET["image_id"]))
     $completed = TRUE;
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
     
     if ( isset( $_SESSION['article_return_id'] ))
     {
     $new_article = new team_article();
     $new_article->set_id($_SESSION['article_return_id']);
     $new_article->load();
     $new_article->set_image_id( $_GET["image_id"] );
     $new_article->update();
     }
     unset($_SESSION['article_return_id'] );
     return TRUE;
    }
}?>