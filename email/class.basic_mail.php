<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.basic_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 15.06.2016, 16:49:56 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-5-23--44-72172b46:1530e7c8e9d:-8000:000000000000195B-includes begin
// section 10-5-23--44-72172b46:1530e7c8e9d:-8000:000000000000195B-includes end

/* user defined constants */
// section 10-5-23--44-72172b46:1530e7c8e9d:-8000:000000000000195B-constants begin
// section 10-5-23--44-72172b46:1530e7c8e9d:-8000:000000000000195B-constants end

/**
 * Short description of class basic_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class basic_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute language_array
     *
     * @access private
     * @var Integer
     */
    private $language_array = null;

    /**
     * Short description of attribute author
     *
     * @access private
     * @var Integer
     */
    private $author = null;

    /**
     * Short description of attribute receiver
     *
     * @access private
     * @var Integer
     */
    private $receiver = null;

    /**
     * Short description of attribute php_mailer
     *
     * @access private
     * @var Integer
     */
    private $php_mailer = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__. 'email/class.phpmailer.php');
     
     $this->php_mailer = new PHPMailer();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_language_array()
    {
     return $this->language_array;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  author_id
     */
    public function set_author_id($author_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member.php');
     
     $author = new member();
     $author->set_id( $author_id );
     $author->load();
     
     $this->author = $author;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  author
     */
    public function set_author($author)
    {
     $this->author = $author;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_author()
    {
     return $this->author;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_id
     */
    public function set_receiver_id($receiver_id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member.php');
     
     $receiver = new member();
     $receiver->set_id( $receiver_id );
     $receiver->load();
     $this->receiver = $receiver;
     
     if( defined('__ROOT_VIEW__') == FALSE )
     { define('__ROOT_VIEW__', $this->get_root_view() ); }
     $language = __ROOT_VIEW__ . 'view/language/' .
     $this->receiver->get_language(). '/general/mail.php';
     include( $language );
     $this->language_array = $lang;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver
     */
    public function set_receiver($receiver)
    {
     $this->receiver = $receiver;
     
     if( defined('__ROOT_VIEW__') == FALSE )
     { define('__ROOT_VIEW__', $this->get_root_view() ); }
     $language = __ROOT_VIEW__ . 'view/language/' .
     $this->receiver->get_language(). '/general/mail.php';
     include( $language );
     $this->language_array = $lang;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_receiver()
    {
     return $this->receiver;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_text_message()
    {
     return $this->get_message();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_html_message()
    {
     $message = "<html><head><title>HTML email</title></head>" .
     "<body>" .
     $this->get_message() .
     "</body></html>";
     return $message;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_to()
    {
     return $this->get_receiver()->get_mail_address();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  file_path_name
     */
    public function add_attachment($file_path_name)
    {
     $this->php_mailer->AddAttachment( $file_path_name );      // attachment
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function prepare_php_mail()
    {
     $this->php_mailer->SetFrom('support@3appy.com', 'support@3appy.com');
     $this->php_mailer->AddReplyTo('support@3appy.com', 'support@3appy.com');
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function setup_receiver()
    {
     $this->php_mailer->clearAddresses();
     $this->php_mailer->Subject = $this->get_subject();
     $this->php_mailer->AltBody = $this->get_text_message();
     $this->php_mailer->MsgHTML( $this->get_html_message() );
     $this->php_mailer->AddAddress( $this->get_to(), "" );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function sent_php_mail()
    {
     $this->php_mailer->Send();
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
    public function get_root_view()
    {
     return dirname(dirname(dirname(__FILE__))) . '/view/';
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
}?>