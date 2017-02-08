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
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000064A0-includes begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000064A0-includes end

/* user defined constants */
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000064A0-constants begin
// section 127-0-0-1--71f03ac0:14e87bc885d:-8000:00000000000064A0-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute next_frame
     *
     * @access public
     * @var Integer
     */
    public $next_frame = null;

    // --- OPERATIONS ---
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
     */
    public function perform()
    {
     $success = FALSE;
     
     if(isset($_GET["function"]) && is_numeric($_GET["function"]))
     {
     $success = TRUE;
     $function = $_GET["function"];
     
     switch($function)
     {
     case ( 0 ):
     // about_us
     $this->show_about_us();
     break;
     
     case ( 1 ):
     // login
     $this->show_login();
     break;
     
     case ( 2 ):
     // register
     $this->show_register();
     break;
     
     case ( 3 ):
     // forgott_password
     $this->show_forgott_password();
     break;
     
     case ( 4 ):
     // Disclaimer
     $this->show_disclaimer();
     break;
     
     case ( 5 ):
     // Impressum
     $this->show_impressum();
     break;
     
     case ( 6 ):
     // AGB / terms and conditions
     $this->show_agb();
     break;
     
     case ( 7 ):
     // datasecurity
     $this->show_datasecurity();
     break;
     
     case ( 9 ):
     // log out
     $this->show_log_out();
     break;
     
     case ( 10 ):
     // prices
     $this->show_prices();
     break;
     
     case ( 11 ):
     // jobs
     $this->show_jobs();
     break;
     
     case ( 12 ):
     // question and answer
     $this->show_qaa();
     break;
     
     case ( 13 ):
     // public directory of procedures
     $this->show_public_directory();
     break;
     
     case ( 14 ):
     // terms of reference
     $this->show_terms_of_reference();
     break;
     
     case ( 15 ):
     // show presentation school
     $this->show_presentation_school();
     break;
     
     case ( 16 ):
     // show presentation teacher
     $this->show_presentation_teacher();
     break;
     
     case ( 17 ):
     // show presentation pupils
     $this->show_presentation_pupils();
     break;
     
     case ( 18 ):
     // show presentation parents
     $this->show_presentation_parents();
     break;
     
     case ( 19 ):
     // show terms of use
     $this->show_terms_of_use();
     break;
     
     case ( 20 ):
     // register_school
     $this->show_register_school();
     break;
     
     case ( 21 ):
     // show contact
     $this->show_contact();
     break;
     
     case ( 24 ):
     // terms of reference
     $this->show_language();
     break;
     
     case ( 25 ):
     // help me
     $this->show_help_me();
     break;
     
     default:
     break;
     }
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_about_us()
    {
     //0  about_us
     $this->next_frame = $_SESSION['A_frame_base'] . "A0_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_login()
    {
     //1  login
     $this->next_frame = $_SESSION['A_frame_base'] . "A1_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_register()
    {
     //2  register
     $this->next_frame = $_SESSION['A_frame_base'] . "A2_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_forgott_password()
    {
     //2  forgott_password
     $this->next_frame = $_SESSION['A_frame_base'] . "A3_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_disclaimer()
    {
     //4  Disclaimer
     $this->next_frame = $_SESSION['A_frame_base'] . "A4_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_impressum()
    {
     //5  Impressum
     $this->next_frame = $_SESSION['A_frame_base'] . "A5_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_agb()
    {
     //6  AGB / Allgemeine Vertragsbedingungen
     $this->next_frame =  $_SESSION['A_frame_base'] . "A6_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_datasecurity()
    {
     //7  datasecurity
     $this->next_frame =  $_SESSION['A_frame_base'] . "A7_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_log_out()
    {
     //9  log out
     unset( $_SESSION['database_error'] );
     unset( $_SESSION['database_warning'] );
     
     unset( $_SESSION['control_error'] );
     unset( $_SESSION['control_warning'] );
     unset( $_SESSION['control_info'] );
     
     unset( $_SESSION['watch_id'] );
     unset( $_SESSION['watched_id'] );
     unset( $_SESSION['online'] );
     
     $this->next_frame =  $_SESSION['A_frame_base'] . "A1_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_prices()
    {
     //10  show_prices
     $this->next_frame =  $_SESSION['A_frame_base'] . "A10_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_jobs()
    {
     //11  show_jobs
     $this->next_frame =  $_SESSION['A_frame_base'] . "A11_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_qaa()
    {
     //12  question and answer
     $this->next_frame =  $_SESSION['A_frame_base'] . "A12_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_public_directory()
    {
     //13  public directory of procedures
     $this->next_frame =  $_SESSION['A_frame_base'] . "A13_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_terms_of_reference()
    {
     //14  terms of reference
     $this->next_frame =  $_SESSION['A_frame_base'] . "A14_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_presentation_school()
    {
     //15  presentation_school
     $this->next_frame =  $_SESSION['A_frame_base'] . "A15_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_presentation_teacher()
    {
     //16  presentation teacher
     $this->next_frame =  $_SESSION['A_frame_base'] . "A16_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_presentation_pupils()
    {
     //16  presentation pupils
     $this->next_frame =  $_SESSION['A_frame_base'] . "A17_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_presentation_parents()
    {
     //16  presentation parents
     $this->next_frame =  $_SESSION['A_frame_base'] . "A18_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_terms_of_use()
    {
     //19  terms of use
     $this->next_frame =  $_SESSION['A_frame_base'] . "A19_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_register_school()
    {
     //20 register school
     $this->next_frame =  $_SESSION['A_frame_base'] . "A20_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_contact()
    {
     //21 register school
     $this->next_frame =  $_SESSION['A_frame_base'] . "A21_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_language()
    {
     //24  terms of reference
     $this->next_frame =  $_SESSION['A_frame_base'] . "A24_frame.php";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function show_help_me()
    {
     //25  help me
     $this->next_frame =  $_SESSION['A_frame_base'] . "A25_frame.php";
    }
}?>