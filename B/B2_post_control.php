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
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019DE-includes begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019DE-includes end

/* user defined constants */
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019DE-constants begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000019DE-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B2_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute member
     *
     * @access private
     * @var Integer
     */
    private $member = null;

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
     require_once(__ROOT_DATA__.'class.member.php');
     
     $success = TRUE;
     $this->member = new member();
     $this->member->set_id($_SESSION['watched_id']);
     $this->member->load();
     $this->member->set_forename( htmlspecialchars( $_POST["forname"] ) );
     $this->member->set_name( htmlspecialchars( $_POST["name"] ) );
     $this->member->set_mail_address( htmlspecialchars( $_POST["mail"] ) );
     
     if( empty( $_POST[ "gender" ] ))
     {$this->member->set_gender( htmlspecialchars( $_POST[ "gender" ] ) ); }
     else
     {$this->member->set_gender( (int)0 ); }
            
     $this->member->set_address_id($this->perform_address() );
     $this->member->set_private_information_id($this->perform_info() );
     $this->perform_day();
     $this->member->update();
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
     
     $address = $this->member->get_address();
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
     $info = $this->member->get_private_information();
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
     $this->member->set_year( htmlspecialchars( $_POST[ "year" ] ) );
     $this->member->set_month( htmlspecialchars( $_POST[ "month" ] ) );
     $this->member->set_day( htmlspecialchars( $_POST[ "day" ] ) );
    }
}?>