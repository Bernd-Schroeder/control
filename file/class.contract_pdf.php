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
require_once('fpdf.php');

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
class contract_pdf
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
private $data = array();

function Loadfooter($file)
{
	// Read file lines
	$lines = file($file);
	$this->data = array();
	foreach($lines as $line)
	$this->data[] = explode(';',trim($line));
}

    public function Header()
    {
     $logo = 'http://www.3appy.com/view/view/images/3appy_logo.jpg';
     $this->Image( $logo, 10, 10, 20, 20 );
     $this->Ln(20);
    }


function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-40);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Text color in gray
	$this->SetTextColor(0);
	// Page number
	foreach($this->data as $row)
	{
		foreach($row as $col)
			$this->Cell(55,4,$col,0);
		$this->Ln();
	}
	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');

    $this->Loadfooter('countries.txt');

}

function ChapterTitle( $label )
{
	if ( $label != "" )
    {
    // Arial 12
	$this->SetFont('Arial','',12);
	// Background color
	$this->SetFillColor(192,192,192);
	// Title
	$this->Cell(0,6, "$label",0,1,'L',true);
	// Line break
	$this->Ln(4);
    }
}

function ChapterBody($file)
{
	// Read text file
	$txt = file_get_contents($file);
	// Times 12
	$this->SetFont('Times','',12);
	// Output justified text
	$this->MultiCell(0,5,$txt);
	// Line break
	$this->Ln();
	// Mention in italics
	$this->SetFont('','I');
}

function PrintChapter($title, $file)
{
	$this->ChapterTitle($title);
	$this->ChapterBody($file);
}

function PrintDocument()
{   
    $this->Loadfooter('countries.txt');

	$this->AddPage();
	$this->PrintChapter('hoho','20k_c1.txt');
	// Line break
	$this->Ln();
	$this->PrintChapter('haha', '20k_c1.txt');
    $this->Output( "D");
}

}?>