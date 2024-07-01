<?php

$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle($prefix.' BPSF');
$pdf->SetHeaderMargin(0);
$pdf->setFooterMargin(0);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('DSWD Caraga');
$pdf->SetDisplayMode('real', 'default');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(5,15,5,5);

$start = $i = $from;
$prefix = $prefix;
#$end = $start + 2;
#for($i = $start; $i <= ($end-2); $i+=2){
	$pdf->AddPage('L', 'A4');

	$style2 = array(
		'border' => 0,
		'vpadding' => 'auto',
		'hpadding' => 'auto',
		'fgcolor' => array(0,0,0),
		'bgcolor' => false, //array(255,255,255)
		'module_width' => 1, // width of a single module in points
		'module_height' => 1 // height of a single module in points
	);

	$linestyle=array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));

	$imgdata = "./assets/img/stub.jpg";

	$width = $pdf->getPageWidth() ;
	$height = $pdf->getPageHeight() ;

	$pdf->SetLineStyle(array('width' => .4, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1 ));


	$pdf->Line(5, 0, 5, $height);
	$pdf->Line(101, 0, 101, $height);
	$pdf->Line(197, 0, 197, $height);
	$pdf->Line(290, 0, 290, $height);



	$pdf->Line(0, $height - 205  , $width, $height -205 );
	$pdf->Line(0, $height - 180  , $width, $height -180 );
	$pdf->Line(0, $height - 155  , $width, $height -155 );
	$pdf->Line(0, $height - 130  , $width, $height -130 );
	$pdf->Line(0, $height - 105  , $width, $height -105 );
	$pdf->Line(0, $height - 80  , $width, $height -80 );
	$pdf->Line(0, $height - 55  , $width, $height -55 );
	$pdf->Line(0, $height - 30  , $width, $height -30 );
	$pdf->Line(0, $height - 5  , $width, $height -5 );

	
	$top = 7;
	$imgtop = 5;
	$cur_num = $from;


	for($i = 0 ; $i < 8 ; $i++){

			$left = 78;
			$imgleft = 5;
			
			for($j = 0 ; $j < 3 ; $j++){

				if($cur_num > $end){
					break;
				}else{

					$code = $prefix.'-'. str_pad($cur_num, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
						
					$pdf->Image($imgdata,$imgleft,$imgtop,74,25); #$,''

					$pdf->write2DBarcode($code, 'QRCODE,M', $left, $top, 25, 25, $style2, 'N');
					$pdf->SetFontSize(6);
					$pdf->Text($left+3, ($top-1), $code);
					
					$cur_num++;

					$left += 95;

					$imgleft += 96;

				}
			}

			$top += 25;
			$imgtop += 25;
	}

	

	// $code1 = $prefix.'-'. str_pad($i, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
	// $code2 = $prefix.'-'. str_pad($i+1, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
	// $code3 = $prefix.'-'. str_pad($i+2, 5, "0", STR_PAD_LEFT) . '-'. date('Y');

	// $code4 = $prefix.'-'. str_pad($i+3, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
	// $code5 = $prefix.'-'. str_pad($i+4, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
	// $code6 = $prefix.'-'. str_pad($i+5, 5, "0", STR_PAD_LEFT) . '-'. date('Y');

	// $code7 = $prefix.'-'. str_pad($i+6, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
	// $code8 = $prefix.'-'. str_pad($i+7, 5, "0", STR_PAD_LEFT) . '-'. date('Y');
	// $code9 = $prefix.'-'. str_pad($i+8, 5, "0", STR_PAD_LEFT) . '-'. date('Y');

	//top-right qr code
	
	//1st Row
	// $pdf->write2DBarcode($code1, 'QRCODE,M', 78, 7, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(78, 6, $code1);

	// $pdf->write2DBarcode($code2, 'QRCODE,M', 173, 7, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(173, 6, $code2);

	// $pdf->write2DBarcode($code3, 'QRCODE,M', 269, 7, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(269, 6, $code3);


	// //2nd Row
	// $pdf->write2DBarcode($code4, 'QRCODE,M', 78, 32, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(78, 31, $code4);

	// $pdf->write2DBarcode($code5, 'QRCODE,M', 173, 32, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(173, 31, $code5);

	// $pdf->write2DBarcode($code6, 'QRCODE,M', 269, 32, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(269, 31, $code6);


	// //3rd Row
	// $pdf->write2DBarcode($code7, 'QRCODE,M', 78, 57, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(78, 56, $code7);

	// $pdf->write2DBarcode($code8, 'QRCODE,M', 173, 57, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(173, 56, $code8);

	// $pdf->write2DBarcode($code9, 'QRCODE,M', 269, 57, 25, 25, $style2, 'N');
	// $pdf->SetFontSize(7);
	// $pdf->Text(269, 56, $code9);


	// $pdf->Text($width - 42, 10, $code_next);
	// $pdf->SetFontSize(11);
	// $pdf->write2DBarcode($code_next, 'QRCODE,M', ($width) - 45, 9, 30, 30, $style2, 'N');
	
	
	$consent = "";
	// "In compliance with Republic Act 10173 or the Data Privacy Act (DPA) of 2012 and its Implementing Rules and Regulations (IRR), I hereby agree and give my consent to DSWD to collect, process update, store, and disclose my personal information.  Further, I authorize DSWD for controlled disclosure or transfer of my personal data to its development partners, evaluation firms, academe, and other stakeholders in accordance with the Data Sharing Protocols of the Program and the provisions of the DPA of 2012.";


	$sigbox = "";

	// '<table style="width:100%;">
	//    <tr>
	// 	<td style="padding: 20px; text-align:center;width:50%"><h3>RESPONDENT\'S CONSENT FORM</h3><br/></td>
	// 	<td style="padding: 20px; text-align:center;width:50%"><h3>RESPONDENT\'S CONSENT FORM</h3><br/></td>
	// 	</tr> 
	//   <tr>
	// 	<td style="padding: 10px 10px 10px 10px;text-align:justify;width:48%;height:50px">'.$consent.'</td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="padding: 10px 10px 10px 10px;text-align:justify;width:48%">'.$consent.'</td>
	//   </tr>
	   
	//    <tr>
	// 	<td style="text-align:center;width:48%;height:20px">&nbsp; </td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%;height:20px">&nbsp; </td>
		 
	//   </tr>
	   
	  
	//      <tr>
	// 	<td style="text-align:center;width:48%;height:20px">&nbsp; </td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%;height:20px">&nbsp; </td>
		 
	//   </tr>
	//   <tr>
	// 	<td style="text-align:center;width:48%">________________________________</td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%">________________________________</td>
	//   </tr>
	  
	//   <tr>
	// 	<td style="text-align:center;width:48%">Name and Signature of Respondent</td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%">Name and Signature of Respondent</td>
	//   </tr>
	//   <tr>
	// 	<td style="text-align:center;width:48%">Date:____________________<br/><small>YYYY-MM-DD</small></td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%">Date:____________________<br/><small>YYYY-MM-DD</small></td>
	//   </tr>   
	  
	//   <tr>
	// 	<td style="text-align:center;width:48%;height:40px">&nbsp; </td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%;height:40px">&nbsp; </td>
		 
	//   </tr>
	//   <tr>
	// 	<td style="text-align:center;width:48%">________________________________</td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%">________________________________</td>
	//   </tr>
	  
	//   <tr>
	// 	<td style="text-align:center;width:48%">Name and Signature of Enumerator</td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%">Name and Signature of Enumerator</td>
	//   </tr>
	//   <tr>
	// 	<td style="text-align:center;width:48%">Date:____________________<br/><small>YYYY-MM-DD</small></td>
	// 	<td style="width:4%;">&nbsp;</td>
	// 	<td style="text-align:center;width:48%">Date:____________________<br/><small>YYYY-MM-DD</small></td>
	//   </tr>   
	  
	// </table>
	// ';



	$pdf->writeHTML($sigbox, true, false, true, false, '');
//	$pdf->Line(0, $height - 40  , $width, $height -40 );
	 
// 	//bottom-left qr code
// 	$pdf->write2DBarcode($code, 'QRCODE,M', 5, $height-42, 33, 33, $style2, 'N');

// 	$pdf->write2DBarcode($code_next, 'QRCODE,M', ($width/2)  , $height-42, 33, 33, $style2, 'N');

// 	#######
// 	$pdf->SetX(150);
// 	$pdf->SetY(150);
	 
// 	$pdf->SetFontSize(9);
// 	$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0 ));

// 	#left
// 	$pdf->MultiCell(30, 5, 'Claim Stub Number', 1, 'L', 0, 0, 35, 173, true);
// 	$pdf->MultiCell(75, 5, $code, 1, 'L', 0, 0, 65, 173, true);

// 	$pdf->MultiCell(30, 5, 'Family Head', 1, 'L', 0, 0, 35, 178, true);
// 	$pdf->MultiCell(75, 5, ' ', 1, 'L', 0, 0, 65, 178, true); 

// 	$pdf->MultiCell(30, 5, 'Spouse', 1, 'L', 0, 0, 35, 183, true);
// 	$pdf->MultiCell(75, 5, ' ', 1, 'L', 0, 0, 65, 183, true); 
	 
// 	$pdf->MultiCell(30, 5, 'Barangay Address', 1, 'L', 0, 0, 35, 188, true);
// 	$pdf->MultiCell(75, 5, ' ', 1, 'L', 0, 0, 65, 188, true); 
	 
	 
// 	$pdf->MultiCell(30, 5, 'Date Enumerated', 1, 'L', 0, 0, 35, 193, true);
// 	$pdf->MultiCell(75, 5, ' ', 1, 'L', 0, 0, 65, 193, true); 
	
// 	$pdf->MultiCell($width, 5, 'DSWD Field Office Caraga, R. Palma Street, Butuan City', 0, 'L', 0, 0, 35, 199, true); 
	
// 	$pdf->MultiCell($width, 5, 'e-mail: focrg@dswd.gov.ph / Tel. Nos. : (085) 342-5619 to 20', 0, 'L', 0, 0, 35, 202, true); 
	 
// 	#right
// 	$midline = $width/2;
// 	$pdf->MultiCell(30, 5, 'Claim Stub Number', 1, 'L', 0, 0, $midline+ 30, 173, true);
// 	$pdf->MultiCell(80, 5, $code_next, 1, 'L', 0, 0, $midline + 60, 173, true);
	 
// 	$pdf->MultiCell(30, 5, 'Family Head', 1, 'L', 0, 0,$midline + 30, 178, true);
// 	$pdf->MultiCell(80, 5, ' ', 1, 'L', 0, 0, $midline +60, 178, true); 

// 	$pdf->MultiCell(30, 5, 'Spouse', 1, 'L', 0, 0, $midline +30, 183, true);
// 	$pdf->MultiCell(80, 5, ' ', 1, 'L', 0, 0,$midline +60, 183, true); 
	 
// 	$pdf->MultiCell(30, 5, 'Barangay Address', 1, 'L', 0, 0,$midline + 30, 188, true);
// 	$pdf->MultiCell(80, 5, ' ', 1, 'L', 0, 0, $midline +60, 188, true); 
	 
	 
// 	$pdf->MultiCell(30, 5, 'Date Enumerated', 1, 'L', 0, 0, $midline +30, 193, true);
// 	$pdf->MultiCell(80, 5, ' ', 1, 'L', 0, 0,$midline + 60, 193, true); 
	
// 	$pdf->MultiCell($width, 5, 'DSWD Field Office Caraga, R. Palma Street, Butuan City', 0, 'L', 0, 0, 182, 199, true); 
	
// 	$pdf->MultiCell($width, 5, 'e-mail: focrg@dswd.gov.ph / Tel. Nos. : (085) 342-5619 to 20', 0, 'L', 0, 0, 182, 202, true); 
	  
#}


if(is_cli()){
 if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
	$pdf->Output($path.'/BPSF-Claim-Stub_'.($from).'-'.($cur_num-1).'.pdf', 'F');
}else
	$pdf->Output('', 'I');


?>