<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.single_mail.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 15.06.2016, 16:45:38 with ArgoUML PHP module 
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
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001802-includes begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001802-includes end

/* user defined constants */
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001802-constants begin
// section 10-5-23-115-4fc65059:14c18894407:-8000:0000000000001802-constants end

/**
 * Short description of class single_mail
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class single_mail
    extends basic_mail
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function sent_mail()
    {
     $this->prepare_php_mail();
     $this->setup_receiver();
     $this->sent_php_mail();
    }
}?>