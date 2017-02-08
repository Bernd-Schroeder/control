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
require_once('class.basic_control.php');

/* user defined includes */
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000003FE5-includes begin
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000003FE5-includes end

/* user defined constants */
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000003FE5-constants begin
// section 10-5-21-86--2dd5f7ec:1542a89a34a:-8000:0000000000003FE5-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class excel_post_control
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
     $header = $_POST["csv_header"];
     $table = $_POST["csv_element"];
     
     $filename = "test";
     header("Content-type: application/vnd.ms-excel");
     header("Content-disposition: csv" . ".csv");
     header("Content-disposition: filename=".$filename.".csv");
     print mb_convert_encoding($header, "Windows-1252");
     print mb_convert_encoding($table, "Windows-1252");
     exit;
    }
}?>