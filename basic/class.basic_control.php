<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.basic_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 19.09.2016, 15:22:46 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include control_error
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.control_error.php');

/**
 * include control_info
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.control_info.php');

/**
 * include control_warning
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.control_warning.php');

/**
 * include param_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.param_list.php');

/* user defined includes */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153E-includes begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153E-includes end

/* user defined constants */
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153E-constants begin
// section 10-5-31--39--6c74144a:14bfb07c4e9:-8000:000000000000153E-constants end

/**
 * Short description of class basic_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class basic_control
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute control_info
     *
     * @access protected
     * @var Integer
     */
    protected $control_info = null;

    /**
     * Short description of attribute control_warning
     *
     * @access protected
     * @var Integer
     */
    protected $control_warning = null;

    /**
     * Short description of attribute control_error
     *
     * @access protected
     * @var Integer
     */
    protected $control_error = null;

    /**
     * Short description of attribute param_list
     *
     * @access public
     * @var Integer
     */
    public $param_list = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->param_list = new param_list();
     $this->control_info    = new control_info();
     $this->control_warning = new control_warning();
     $this->control_error   = new control_error();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_param_list()
    {
     return $this->param_list;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function batch_run()
    {
     $success = FALSE;
     
     if(isset($_GET["basic_element_function"]) &&
     is_numeric($_GET["basic_element_function"]))
     {
     $function = $_GET["basic_element_function"];
     switch($function)
     {
     case ( 1 ):
     $success = $this->insert();
     break;
     case ( 2 ):
     $success = $this->basic_update();
     break;
     case ( 4 ):
     $success = $this->basic_delete();
     break;
     case ( 5 ):
     $success = $this->added_function();
     break;
     default:
     $success = $this->basic_function();
     break;
     }
     }
     else
     { $success = $this->basic_function(); }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function basic_function()
    {
     $success = FALSE;
     
     if ( $this->is_entered_completed())
     {
     $this->control_error->success();
     $success = $this->perform();
     }
     else
     {
     $this->control_error->missing_information();
     }
     $this->control_error->serialize();
     $this->control_warning->serialize();
     $this->control_info->serialize();
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function basic_update()
    {
     if(isset($_GET["id"]) && is_numeric($_GET["id"]))
     {
     $id = $_GET["id"];
     return $this->update( $id );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     */
    public function update($id)
    {
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function basic_delete()
    {
     if(isset($_GET["id"]) && is_numeric($_GET["id"]))
     {
     $id = $_GET["id"];
     return $this->delete( $id );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     */
    public function delete($id)
    {
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function added_function()
    {
     if(isset($_GET["id"]) && is_numeric($_GET["id"]))
     {
     $id = $_GET["id"];
     return $this->added_func( $id );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     */
    public function added_func($id)
    {
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  length
     */
    public function rand_string($length)
    {
     $chars = "abcdefghijklmnopqrstuvwxyz
     ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     $str = "";
     $size = strlen( $chars );
     for( $i = 0; $i < $length; $i++ )
     { $str .= $chars[ rand( 0, $size - 1 ) ]; }
     return $str;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  text
     */
    public function generate_hyperlink($text)
    {
     $text = str_replace("\n"," \n ",$text );
     $content_array = explode(" ", $text);
     $output = '';
     
     foreach($content_array as $content)
     {
     //starts with https://
     if (substr($content, 0, 8) == "https://")
     {
     $link = explode(".", $content);
     $content =
     "<a href=\"" . $content . "\"" .
     " target=\"_blank\">" . $link[1] . "</a>";       
     }

     //starts with http://
     if (substr($content, 0, 7) == "http://")
     {
     $link = explode(".", $content);
     $content =
     "<a href=\"" . $content . "\"" .
     " target=\"_blank\">" . $link[1] . "</a>";
     }

     //starts with www.
     if (substr($content, 0, 4) == "www.")
     {
     $link = explode(".", $content);
     $content = 
     "<a href=\"http://" . $content . "\"" .
     " target=\"_blank\">" . $link[1] . "</a>";
     }
     $output .= " " . $content;
     }
     $output = trim($output);
     return $output;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  text
     */
    public function is_mobbing_included($text)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.forbidden_word_list.php');
     
     $found = FALSE;
     
     $tmp_message = strtolower( $text );
     $wordlist = new forbidden_word_list();
     $wordlist->load();
     
     for (
     $n = 0;
     (( $n < $wordlist->get_item_count() ) AND ( $found == FALSE ));
     $n++ )
     {
     $forbidden_word = $wordlist->get_item( $n );
     $word = $forbidden_word->get_name();
     if ( !( empty( $word )) AND
     $this->is_word_in_text( $tmp_message, $word ))
     {
     $found = TRUE;
     $this->control_error->error_B5();
     $forbidden_word->set_hit( $forbidden_word->get_hit() + 1 );
     $forbidden_word->update();
     }
     }
     return $found;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  text
     * @param  word
     */
    public function is_word_in_text($text, $word)
    {
     $word_in_text = TRUE;
     
     $pos = strpos( $text, $word );
     if($pos === FALSE)
     { $word_in_text = FALSE; }
     
     return $word_in_text;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_root_data()
    {
     return dirname(dirname(dirname(__FILE__))) . '/data/';
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_root_control()
    {
     return dirname(dirname(dirname(__FILE__))) . '/control/';
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_root_view()
    {
     return dirname(dirname(dirname(__FILE__))) . '/view/';
    }
}?>