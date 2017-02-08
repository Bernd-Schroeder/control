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
// section 10-5-29--89--59601f63:158863a1098:-8000:0000000000003EC2-includes begin
// section 10-5-29--89--59601f63:158863a1098:-8000:0000000000003EC2-includes end

/* user defined constants */
// section 10-5-29--89--59601f63:158863a1098:-8000:0000000000003EC2-constants begin
// section 10-5-29--89--59601f63:158863a1098:-8000:0000000000003EC2-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D5_post_control
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
     if (
     empty($_POST["csv_header"]) OR
     empty($_POST["csv_element"]) )
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
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'file/class.team_member_list_pdf.php');
     
     $pdf = new team_member_list_pdf();
     $pdf->loadheader($_POST["csv_header"]);
     $pdf->loadtable($_POST["csv_element"]);
     //     $pdf->SetAutoPageBreak( TRUE, 50 );
     $pdf->print_table();
     return TRUE;
    }
}?>