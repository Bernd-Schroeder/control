<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.comment_list_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 10.06.2016, 15:17:16 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include list_mail
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.list_mail.php');

/* user defined includes */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001860-includes begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001860-includes end

/* user defined constants */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001860-constants begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001860-constants end

/**
 * Short description of class comment_list_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class comment_list_mail
    extends list_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute entity
     *
     * @access private
     * @var Integer
     */
    private $entity = null;

    /**
     * Short description of attribute article
     *
     * @access private
     * @var Integer
     */
    private $article = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_subject()
    {
     $lang = $this->get_language_array();
     return
     $lang['comment_subject'] . 
     utf8_decode( $this->article->get_header() );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_message()
    {
     $lang = $this->get_language_array();
     return
     "<p>" . $lang['comment_hi'] . " " .
     utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['comment_1'] . 
     utf8_decode( $this->get_author()->get_forename() ) .
     $lang['comment_1_1'] . 
     utf8_decode( $this->entity->get_name() ) . " - " . 
     utf8_decode( $this->article->get_header() ) . "</p>" .
     "</p>" . $lang['comment_2'] . 
     utf8_decode( $this->entity->get_abs_link(null) ) . "</p>" .
     "<p>" . $lang['comment_regards'] . "</p>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  article
     */
    public function set_article($article)
    {
     $this->article = $article;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  entity
     */
    public function set_entity($entity)
    {
     $this->entity = $entity;
    }
}?>