<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.basic_frame.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 18.05.2016, 17:24:25 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include param_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.param_list.php');

/* user defined includes */
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027AF-includes begin
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027AF-includes end

/* user defined constants */
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027AF-constants begin
// section 127-0-0-1--5258635d:14e779cd53e:-8000:00000000000027AF-constants end

/**
 * Short description of class basic_frame
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class basic_frame
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute control
     *
     * @access private
     * @var Integer
     */
    private $control = null;

    /**
     * Short description of attribute next_frame
     *
     * @access private
     * @var String
     */
    private $next_frame = null;

    /**
     * Short description of attribute frame_switch
     *
     * @access private
     * @var String
     */
    private $frame_switch = null;

    /**
     * Short description of attribute param_list
     *
     * @access private
     * @var Integer
     */
    private $param_list = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->param_list = new param_list();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  control
     */
    public function set_control($control)
    {
     $this->control = $control;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_control()
    {
     return $this->control;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  next_frame
     */
    public function set_next_frame($next_frame)
    {
     $this->next_frame = $next_frame;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_next_frame()
    {
     return $this->next_frame;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  frame_switch
     */
    public function set_frame_switch($frame_switch)
    {
     $this->frame_switch = $frame_switch;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_frame_switch()
    {
     return $this->frame_switch;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_param_list()
    {
     return $this->param_list;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function return_next_frame()
    {
     if(
     isset( $_SESSION['last_frame'] ) AND
     isset( $_SESSION['A_frame_base'] ) AND
     isset( $_SESSION['B_frame_base'] ))
     {
     if ( $this->get_control()->batch_run() )
     {
     switch( $this->get_frame_switch() )
     {
     case ( 'from_control' ):
     { $next_frame = $this->get_from_control(); }
     break;
     case ( 'to_control' ):
     { $next_frame = $this->get_to_control(); }
     break;
     case ( 'last_frame' ):
     { $next_frame = $this->get_last_frame(); }
     break;
     default:
     { $next_frame = $this->get_default_frame(); }
     break;
     }
     }
     else
     { $next_frame = $this->get_last_frame(); }
     }
     else
     { $next_frame = $this->get_start_frame(); }
     
     // add the parameterlist from the frame
     $frame_param_list = $this->get_param_list();
     for ( $n = 0; $n < $frame_param_list->get_param_count(); $n++)
     { $next_frame .= $frame_param_list->get_parameter( $n ); }
          
     // add the parameterlist from the controller
     $con_param_list = $this->get_control()->get_param_list();
     for ( $n = 0; $n < $con_param_list->get_param_count(); $n++)
     { $next_frame .= $con_param_list->get_parameter( $n ); }
     
     return $next_frame;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_from_control()
    {
     return ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_to_control()
    {
     return ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_last_frame()
    {
     return ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_default_frame()
    {
     return ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_start_frame()
    {
     if( defined('__ROOT_VIEW__') == FALSE )
     { define('__ROOT_VIEW__', $this->get_root_view() ); }
     require_once(__ROOT_VIEW__.'frame/path.php');
     
     $path = new path();
     $next_frame = $path->get_start_frame();
     return $next_frame;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_root_view()
    {
     return dirname(dirname(dirname(__FILE__))) . '/view/';
    }
}?>