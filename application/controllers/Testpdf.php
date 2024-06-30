<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ( APPPATH .'third_party/qrcode/qrcode.class.php');

 
/**
* Name:  Testpdf
*
* Version: 1.0.0
*
* Author: Pedro Ruiz Hidalgo
*		  ruizhidalgopedro@gmail.com
*         @pedroruizhidalg
*
* Location: application/controllers/Testpdf.php
*
* Created:  208-02-27
*
* Description:  This demonstrates pdf library is working.
*
* Requirements: PHP5 or above
*
*/


class Testpdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->add_package_path( APPPATH . 'third_party/fpdf');
        
        $this->load->library('pdf');
    }

	public function index()
	{
        $this->pdf = new Pdf();
        $this->pdf->Add_Page('P','A4',0);
        $this->pdf->AliasNbPages();
		$this->qrcode = new QRcode ('MAINIT-00001-2019', 'M'); // error level: L, M, Q, H

        $this->qrcode-> displayFPDF ($this->pdf, 180, 5, 20);
		$this->pdf->SetFontSize(14);
		$title = 'RESPONDENT\'S CONSENT FORM';
		$strlen = $this->pdf->GetStringWidth($title);
		$width = $this->pdf->GetPageWidth();
		
		#$this->pdf->SetXY(($width/2)-$strlen, 100);
		$this->pdf->Text(60,27,$title);
		$this->pdf->SetFontSize(11);
		$this->pdf->MultiCell(0,5, "In compliance with Republic Act 10173 or the Data Privacy Act (DPA) of 2012 and its Implementing Rules and Regulations (IRR), I hereby agree and give my consent to DSWD to collect, process update, store, and disclose my personal information.  Further, I authorize DSWD for controlled disclosure or transfer of my personal data to its development partners, evaluation firms, academe, and other stakeholders in accordance with the Data Sharing Protocols of the Program and the provisions of the DPA of 2012.");
		
		
		$this->pdf->Line(50, 80, 160, 80);
	 
		$this->pdf->Text(50,85, "Name and Signature of Respondent");
		
        $this->pdf->Output( 'page.pdf' , 'I' );
	}
}

/*
* application/controllers/Testpdf.php
*/
