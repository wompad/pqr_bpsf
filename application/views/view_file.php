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


if(is_cli()){
 if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
	$pdf->Output($path.'/BPSF-Claim-Stub_'.($from).'-'.($cur_num-1).'.pdf', 'F');
}else
	$pdf->Output('', 'I');


?>