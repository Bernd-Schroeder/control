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
// section 10-5-22--28-67713df9:153704fd98d:-8000:0000000000001A63-includes begin
// section 10-5-22--28-67713df9:153704fd98d:-8000:0000000000001A63-includes end

/* user defined constants */
// section 10-5-22--28-67713df9:153704fd98d:-8000:0000000000001A63-constants begin
// section 10-5-22--28-67713df9:153704fd98d:-8000:0000000000001A63-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C2_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute team
     *
     * @access private
     * @var Integer
     */
    private $team = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     return TRUE;
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
     require_once(__ROOT_DATA__.'class.team.php');
     
     $success = TRUE;
     $this->team = new team();
     $this->team->set_id($_SESSION['watched_id']);
     $this->team->load();
     $this->team->set_name( htmlspecialchars( $_POST["name"] ));
     $this->team->set_address_id($this->perform_address());
     $this->team->set_private_information_id($this->perform_info());
     $this->perform_day();
     $this->team->update();
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
     
     $address = $this->team->get_address();
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
     $info = $this->team->get_private_information();
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
     $this->team->set_year( htmlspecialchars( $_POST[ "year" ] ));
     $this->team->set_month( htmlspecialchars( $_POST[ "month" ] ));
     $this->team->set_day( htmlspecialchars( $_POST[ "day" ] ));
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
     require_once(__ROOT_DATA__.'class.team.php');
     
     $team = new team();
     $team->set_id($id);
     $team->load();
     $team->remove_team();
    }
}?>