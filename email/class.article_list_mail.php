<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.article_list_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 10.06.2016, 15:18:38 with ArgoUML PHP module 
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
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001839-includes begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001839-includes end

/* user defined constants */
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001839-constants begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001839-constants end

/**
 * Short description of class article_list_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class article_list_mail
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
     $lang['article_subject'] . utf8_decode( $this->article->get_header() );
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
     "<p>" . $lang['article_hi'] . " " . 
     utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['article_1'] . 
     utf8_decode( $this->get_author()->get_forename() ) .
     $lang['article_1_1'] . 
     utf8_decode( $this->entity->get_name() ) . "</p>" .
     "</p>" . $lang['article_2'] . 
     utf8_decode( $this->entity->get_abs_link(null) ) . "</p>" .
     "<p>" . $lang['article_regards'] . "</p>";
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