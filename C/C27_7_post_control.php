<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C27_7_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.11.2016, 22:36:02 with ArgoUML PHP module 
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
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA2-includes begin
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA2-includes end

/* user defined constants */
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA2-constants begin
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA2-constants end

/**
 * Short description of class C27_7_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C27_7_post_control
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
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.service_new_member.php');
     require_once(__ROOT_CONTROL__.
     'basic/class.member_service_connection.php');
     
     // Email@Elternteil1;Email@Schüler1
     // Suche das Mitglied mit der Email Adresse: email@Elternteil1
     // Suche das Mitglied mit der Email Adresse: email@Schüler1
     // Verbinde beide Mitglieder dem Status (5)
     
     $service = new service_new_member();
// find the parent ....
     $service->set_mail_address( $csv_line->get_item( (int)0 ) );
     if( $service->member_exist() )
     { $follower_id = $service->get_new_id(); }
     else
     { $follower_id = (int)0; }
     
// find the pupil ....
     $service->set_mail_address( $csv_line->get_item( (int)1 ) );
     if( $service->member_exist() )
     { $pupil_id = $service->get_new_id(); }
     else
     { $pupil_id = (int)0; }
     
     if(( $follower_id > (int)0 ) AND ( $pupil_id > (int)0 ))
     {
     $scon = new member_service_connection();
     $scon->set_member_id( $pupil_id );
     $scon->ask_member_follower_connection( $follower_id );
     }
    }
}?>