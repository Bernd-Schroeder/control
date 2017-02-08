<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.headmaster_mail_pdf.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 31.05.2016, 21:46:36 with ArgoUML PHP module 
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
// section 10-30-49-67--3c0df305:155072289a7:-8000:0000000000000A95-includes begin
// section 10-30-49-67--3c0df305:155072289a7:-8000:0000000000000A95-includes end

/* user defined constants */
// section 10-30-49-67--3c0df305:155072289a7:-8000:0000000000000A95-constants begin
// section 10-30-49-67--3c0df305:155072289a7:-8000:0000000000000A95-constants end

/**
 * Short description of class headmaster_mail_pdf
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class headmaster_mail_pdf
    extends FPDF
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

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
     */
    public function Footer()
    {
     // Position at 1.5 cm from bottom
     $this->SetY(-15);
     // Arial italic 8
     $this->SetFont('Arial','I',8);
     // Page number
     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    /**
     * $this->AliasNbPages();
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate()
    {
     $this->AddPage();
     $this->SetFont('Times','',12);
     for($i=1;$i<=40;$i++)
     {
     $this->Cell(0,10,'Printing line number '.$i,0,1);
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  path
     * @param  name
     */
   
}?>