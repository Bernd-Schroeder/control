<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.service_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 29.08.2016, 14:25:06 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.basic_control.php');

/* user defined includes */
// section 10-5-28-20-335a9c0f:15583ef730f:-8000:0000000000007F4E-includes begin
// section 10-5-28-20-335a9c0f:15583ef730f:-8000:0000000000007F4E-includes end

/* user defined constants */
// section 10-5-28-20-335a9c0f:15583ef730f:-8000:0000000000007F4E-constants begin
// section 10-5-28-20-335a9c0f:15583ef730f:-8000:0000000000007F4E-constants end

/**
 * Short description of class service_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class service_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     $this->update_team_article_list();
     $this->update_event_article_list();
     $this->update_team_list();
    }
    /**
     * list !
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function update_team_article_list()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_article_list.php');
     
     $list = new team_article_list();
     $list->set_row_per_page( (int)500 );
     // remember ti disable the actual binding in the list_class to read the
     $list->load_all();
     $list_count = $list->get_item_count();
     
     echo "team_article_list: " . $list_count;
     
     for( $n=0; $n<$list_count; $n++ )
     {
     $team_article =  $list->get_item( $n );
     $stamp = $team_article->get_written_stamp();
     if( $team_article->get_modified_stamp() == null )
     { $team_article->set_modified_stamp( $stamp ); }
     $team_article->update();
     }
    }
    /**
     * list !
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function update_event_article_list()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event_article_list.php');
     
     $list = new event_article_list();
     $list->set_row_per_page( (int)500 );
     // remember ti disable the actual binding in the list_class to read the
     $list->load_all();
     $list_count = $list->get_item_count();
     echo "event_article_list: " . $list_count;

     for( $n=0; $n<$list_count; $n++ )
     {
     $event_article =  $list->get_item( $n );
     $stamp = $event_article->get_written_stamp();
     if( $event_article->get_modified_stamp() == null )
     { $event_article->set_modified_stamp( $stamp ); }
     $event_article->update();
     }
    }
    /**
     * list !
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function update_team_list()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_list.php');
     
     $list = new team_list();
     $list->set_row_per_page( (int)500 );
     // remember ti disable the actual binding in the list_class to read the
     $list->load_all();
     $list_count = $list->get_item_count();
     echo "team_list: " . $list_count;              
     
     for( $n=0; $n<$list_count; $n++ )
     {
     $team =  $list->get_item( $n );
     
     if( $team->get_network_id() == NULL )
     { $team->set_network_id( (int)1 ); }
     
     if( $team->get_type() == NULL )
     { $team->set_type( (int)3 ); }
     
     $team->update();
     }
    }
}?>