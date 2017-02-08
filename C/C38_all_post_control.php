<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C38_all_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 04.09.2016, 20:33:28 with ArgoUML PHP module 
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
require_once('C38_post_control.php');

/* user defined includes */
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029F7-includes begin
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029F7-includes end

/* user defined constants */
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029F7-constants begin
// section 10-30-49-108-64d54e97:14c510fa990:-8000:00000000000029F7-constants end

/**
 * Short description of class C38_all_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C38_all_post_control
    extends C38_post_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     $success = TRUE;
     
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member.php');
     
     $teacher_id = $_SESSION['watch_id'];
     $pupil_list = $this->get_team()->get_approved_member_list();
     
     for( $n = 0; $n < $pupil_list->get_item_count(); $n++ )
     {
     $pupil_id = $pupil_list->get_item( $n )->get_id();
     $success = $this->insert_task( $pupil_id, $teacher_id );
     if ( $success )
     {
     $this->send_mail( $pupil_id, $teacher_id );
     $this->insert_news( $pupil_id, $teacher_id );
     
     $pupil = new member();
     $pupil->set_id( $pupil_id );
     $pupil->load();
     
     $parent_list = $pupil->get_follower_member_list();
     for( $i = 0; $i < $parent_list->get_item_count(); $i++ )
     {
     $parent_id = $parent_list->get_item( $i )->get_id();
     $this->send_mail( $parent_id, $teacher_id );
     }
     }
     }
     return $success;
    }
}?>