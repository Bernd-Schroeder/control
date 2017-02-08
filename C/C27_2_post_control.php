<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C27_2_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.11.2016, 22:31:40 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('C27_post_control.php');

/* user defined includes */
// section 10-30--8--14-348ebe49:158441fe3ac:-8000:0000000000003A8D-includes begin
// section 10-30--8--14-348ebe49:158441fe3ac:-8000:0000000000003A8D-includes end

/* user defined constants */
// section 10-30--8--14-348ebe49:158441fe3ac:-8000:0000000000003A8D-constants begin
// section 10-30--8--14-348ebe49:158441fe3ac:-8000:0000000000003A8D-constants end

/**
 * Short description of class C27_2_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C27_2_post_control
    extends C27_post_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_requested_width()
    {
     return (int)2;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  csv_line
     */
    public function handle_csv_line($csv_line)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.room.php');
     
     // Raum;Beschreibung
     $network_id = $this->team->get_network_id();
     
     $room = new room();
     $room->set_network_id( $network_id );
     $room->set_abbreviation( $csv_line->get_item( (int)0 ) );
     $room->set_description( $csv_line->get_item( (int)1 ) );
     $room->insert();
    }
}?>