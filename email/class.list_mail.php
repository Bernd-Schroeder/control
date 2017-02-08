<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.list_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 15.06.2016, 16:46:46 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_mail
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.basic_mail.php');

/* user defined includes */
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001822-includes begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001822-includes end

/* user defined constants */
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001822-constants begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001822-constants end

/**
 * Short description of class list_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class list_mail
    extends basic_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute receiver_list
     *
     * @access private
     * @var Integer
     */
    private $receiver_list = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function sent_mail()
    {
     $list_count = $this->receiver_list->get_item_count();
     $this->prepare_php_mail();
     
     for ( $n = 0; $n < $list_count; $n++ )
     {
     $receiver = $this->receiver_list->get_item( $n );
     $this->set_receiver( $receiver );
     $this->setup_receiver();
     $this->sent_php_mail();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  receiver_list
     */
    public function set_receiver_list($receiver_list)
    {
     $this->receiver_list = $receiver_list;
    }
}?>