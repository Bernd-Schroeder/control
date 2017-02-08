<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C27_1_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.11.2016, 22:46:22 with ArgoUML PHP module 
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
// section 10-30-49-67--7c7125f6:155a0bfc0e7:-8000:0000000000004A42-includes begin
// section 10-30-49-67--7c7125f6:155a0bfc0e7:-8000:0000000000004A42-includes end

/* user defined constants */
// section 10-30-49-67--7c7125f6:155a0bfc0e7:-8000:0000000000004A42-constants begin
// section 10-30-49-67--7c7125f6:155a0bfc0e7:-8000:0000000000004A42-constants end

/**
 * Short description of class C27_1_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C27_1_post_control
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
     return (int)3;
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
     require_once(__ROOT_DATA__.'class.team_list_csv.php');
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.service_new_team.php');
     
     $up_team_name = $csv_line->get_item( (int)0 );
     $team_name  = $csv_line->get_item( (int)1 );
     $team_type     = $csv_line->get_item( (int)2 );
     
     $team_list = new team_list_csv();
     $team_list->set_owner_id( $this->team->get_network_id() );
     $team_list->set_team_name( $up_team_name ); 
     $up_team = $team_list->get_team();
     
     if ( $up_team != NULL )
     {
     $service = new service_new_team();
     $service->set_top_team_id( $up_team->get_id() );
     $service->set_owner_id( $_SESSION['watch_id'] );
     $service->set_team_name( $team_name );
     $service->set_type( $team_type );
     $success = $service->perform();
     }
     else
     { $this->control_warning->csv_not_clear(); }
    }
}?>