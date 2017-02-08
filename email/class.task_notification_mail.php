<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.task_notification_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.06.2016, 21:13:02 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include single_mail
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.single_mail.php');

/* user defined includes */
// section 10-30-49-121--374f6b80:14c366ddc0a:-8000:00000000000018ED-includes begin
// section 10-30-49-121--374f6b80:14c366ddc0a:-8000:00000000000018ED-includes end

/* user defined constants */
// section 10-30-49-121--374f6b80:14c366ddc0a:-8000:00000000000018ED-constants begin
// section 10-30-49-121--374f6b80:14c366ddc0a:-8000:00000000000018ED-constants end

/**
 * Short description of class task_notification_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class task_notification_mail
    extends single_mail
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
     * Short description of attribute task
     *
     * @access private
     * @var Integer
     */
    private $task = null;

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
     $lang['task_subject'];
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
     "<p>" . $lang['task_hi'] . " " .
     utf8_decode( $this->get_receiver()->get_forename() ) . "</p>" .
     "<p>" . $lang['task_1'] . 
     utf8_decode( $this->get_author()->get_forename() ) .
     $lang['task_1_1'] . 
     utf8_decode( $this->entity->get_name() ) . "</p>" .
     "</p>" . $lang['task_2'] . 
     utf8_decode( $this->entity->get_abs_link(null) ) . "</p>" .
     "<p>" . $lang['task_regards'] . "</p>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  task
     */
    public function set_task($task)
    {
     $this->task = $task;
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