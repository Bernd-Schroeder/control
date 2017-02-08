<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.team_member_list_pdf.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 07.05.2016, 17:28:58 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include FPDF
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('fpdf.php');


/* user defined includes */
// section 10-5-29--13-1e83a6dd:15471e64d80:-8000:0000000000002DB1-includes begin
// section 10-5-29--13-1e83a6dd:15471e64d80:-8000:0000000000002DB1-includes end

/* user defined constants */
// section 10-5-29--13-1e83a6dd:15471e64d80:-8000:0000000000002DB1-constants begin
// section 10-5-29--13-1e83a6dd:15471e64d80:-8000:0000000000002DB1-constants end

/**
 * Short description of class team_member_list_pdf
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class team_member_list_pdf
    extends FPDF
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute x
     *
     * @access private
     * @var Integer
     */
    protected $x = null;

    /**
     * Short description of attribute y
     *
     * @access private
     * @var Integer
     */
    protected $y = null;

    /**
     * Short description of attribute header
     *
     * @access private
     * @var Integer
     */
    protected $header = null;

    /**
     * Short description of attribute element
     *
     * @access private
     * @var Integer
     */
    protected $element = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function Header()
    {
     $logo = 'http://www.3appy.com/view/view/images/3appy_logo.jpg';
     $this->Image( $logo, 10, 10, 20, 20 );
     $this->Ln(20);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  csv_header
     */
    public function loadheader($csv_header)
    {
     $this->header = explode(';',trim( $csv_header ));
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  csv_element
     */
    public function loadtable($csv_element)
    {
     $lines = explode('|',trim( $csv_element ));
     
         for($i=0;$i<count($lines);$i++)
     { $this->element[$i] = explode(';',trim($lines[$i])); }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function print_table()
    {
     $this->print_header();
     $this->print_element();
     $this->Output( "D");
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  image_path
     * @param  image_x
     * @param  image_y
     */
    public function print_image($image_path, $image_x, $image_y)
    {
     $this->Image( $image_path, $image_x+2, $image_y+2 );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function print_header()
    {
     $this->AddPage();
     // Colors, line width and bold font
     $this->SetFillColor(49,74,128);
     $this->SetTextColor(255);
     $this->SetDrawColor(128,0,0);
     $this->SetLineWidth(.3);
     $this->SetFont('Arial','',10);
     $this->SetFont('','B');
     // Header
     
     $this->Cell(19,7,$this->header[0],1,0,'C',true);
     $this->Cell(30,7,$this->header[1],1,0,'C',true);
     $this->Cell(40,7,$this->header[2],1,0,'C',true);
     $this->Cell(55,7,$this->header[3],1,0,'C',true);
     $this->Cell(0,7,$this->header[4],1,0,'C',true);
     $this->Ln();
     
     $this->SetFillColor(224,235,255);
     $this->SetTextColor(0);
     $this->SetFont('Arial','',8);    
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function print_element()
    {
     $fill = false;
     foreach($this->element as $row)
     { 
     $actual_y = $this->GetY();
     $max_y = $this->GetPageHeight();
     if ( ( $actual_y + 60 ) > $max_y )
     { $this->print_header(); }
     
     $x = $this->GetX();
     $y = $this->GetY();
     $push_right = 0;

     $this->MultiCell($w = 19,5, $this->empty_cell(),1,'L',false);
     $this->print_image( $row[0], $x, $y );
     
     $push_right += $w;
     $this->SetXY($x + $push_right, $y);
     $this->MultiCell( $w = 30,5, 
     $this->get_name( $row[1], $row[2] ) ,1,'L',$fill);
     $push_right += $w;
     $this->SetXY($x + $push_right, $y);
     $this->MultiCell( $w = 40,5,
     $this->get_address( $row[3], $row[4], $row[5], $row[6] ),1,'L',$fill);
     
     $push_right += $w;
     $this->SetXY($x + $push_right, $y);
     $this->MultiCell($w = 55,5, 
     $this->get_mail( $row[7] ) ,1,'L',$fill);
     
     $push_right += $w;
     $this->SetXY($x + $push_right, $y);
     $this->MultiCell(0,5,
     $this->get_phone( $row[8] ) ,1,'C',$fill);
     
     $fill = !$fill;
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function empty_cell()
    {
     return "\r\n \r\n \r\n \r\n \r\n";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  forname
     * @param  name
     */
    public function get_name($forname, $name)
    {
     return $forname . "\r\n" . $name . "\r\n \r\n \r\n \r\n";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  street
     * @param  number
     * @param  zip
     * @param  city
     */
    public function get_address($street, $number, $zip, $city)
    {
     return 
     $street . " " . $number . "\r\n" . 
     $zip . " " . $city . "\r\n \r\n \r\n \r\n";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  mail
     */
    public function get_mail($mail)
    {
     return $mail . "\r\n \r\n \r\n \r\n \r\n";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  phone
     */
    public function get_phone($phone)
    {
     return $phone . "\r\n \r\n \r\n \r\n \r\n";
    }
}?>