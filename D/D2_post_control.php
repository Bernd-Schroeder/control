<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_control.php');
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
require_once('../basic/class.basic_control.php');

/* user defined includes */
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A66-includes begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A66-includes end

/* user defined constants */
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A66-constants begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001A66-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D2_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute event
     *
     * @access public
     * @var Integer
     */
    public $event = null;

    /**
     * Short description of attribute start_date
     *
     * @access public
     * @var String
     */
    public $start_date = null;

    /**
     * Short description of attribute end_date
     *
     * @access public
     * @var String
     */
    public $end_date = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if (( !$this->is_start_datetime_set() ) OR
     ( !$this->is_end_datetime_set() ) )
     { $completed = FALSE; }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event.php');
     
     $success = TRUE;
     $this->event = new event();
     $this->event->set_id($_SESSION['watched_id']);
     $this->event->load();
     $this->event->set_name( htmlspecialchars( $_POST["name"] ));
     $this->event->set_address_id($this->perform_address());
     $this->event->set_private_information_id($this->perform_info());
     $this->perform_day();
     $this->event->update();
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform_address()
    {
     if ( isset( $_POST["country_id"] ) )
     { $country_id = htmlspecialchars( $_POST["country_id"] ); }
     else
     { $country_id = 0; }
     
     $address = $this->event->get_address();
     $address->
     set_street_name( htmlspecialchars( $_POST["street_name"] ) );
     $address->
     set_house_number( htmlspecialchars( $_POST["house_number"] ) );
     $address->
     set_zip_code( htmlspecialchars( $_POST["plz"] ) );
     $address->
     set_city_name( htmlspecialchars( $_POST["city"] ) );
     $address->
     set_country_id( $country_id );
     
     $address_id = $address->get_id();
     if ( $address_id > 0 )
     { $address->update(); }
     else
     { $address_id = $address->insert(); }
     return $address_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform_info()
    {
     $info = $this->event->get_private_information();
     $info->set_mobile_phone( htmlspecialchars( $_POST["mobile_phone"] ) );
     $info->set_home_phone( htmlspecialchars( $_POST["home_phone"] ) );
     $info->set_work_phone( htmlspecialchars( $_POST["work_phone"] ) );
     
     $info_id = $info->get_id();
     if ( $info_id > 0 )
     { $info->update(); }
     else
     { $info_id = $info->insert(); }
     return $info_id;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform_day()
    {
     $this->event->
     set_start_datetime( $this->start_date->format('Y-m-d H-i-s') );
     $this->event->
     set_end_datetime( $this->end_date->format('Y-m-d H-i-s') );
     
     $this->event->set_year( $this->start_date->format('Y') );
     $this->event->set_month( $this->start_date->format('m') );
     $this->event->set_day( $this->start_date->format('d') );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     */
    public function delete($id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.event.php');
     
     $event = new event();
     $event->set_id($id);
     $event->load();
     $event->remove_event();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_start_datetime_set()
    {
     $success = FALSE;
     date_default_timezone_set('Europe/Berlin');
     if ( isset($_POST['startdate']) AND isset($_POST['starttime']) )
     {
     $date_str = $_POST['startdate'] . " " . $_POST['starttime'];
     try
     {
     $this->start_date = new DateTime($date_str);
     $success = TRUE;
     }
     catch (Exception $e) {;}}
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_end_datetime_set()
    {
     $success = FALSE;
     date_default_timezone_set('Europe/Berlin');
     if ( isset($_POST['enddate']) AND isset($_POST['endtime']) )
     {
     $date_str = $_POST['enddate'] . " " . $_POST['endtime'];
     try
     {
     $this->end_date = new DateTime($date_str);
     $success = TRUE;
     }
     catch (Exception $e) {;}}
     return $success;
    }
}?>