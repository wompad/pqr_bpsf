<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class TPdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->library('Pdf');
		#$this->load->view('view_file');
    }

	public function index()
	{
         
	}
	
	function createpdf( $from = 1, $end = 24, $prefix='TEST'){
		$data['from'] = $from;
		$data['end'] = $end;
		$data['prefix'] = $prefix;
		$data['path'] = "F:/bpsf-forms";
		$this->load->view('view_file',$data); 
	}
	
 /*
	function generate( $prefix = 'DVAPP'){
		$count = 3000;
		$this->benchmark->mark('code_start');
  		for($i=1;$i<=$count;$i+=2)
			$this->createpdf($i,$prefix);
		
		$this->benchmark->mark('code_end');
  
		echo $this->benchmark->elapsed_time('code_start', 'code_end') .' seconds '.PHP_EOL; 
		 
	 
		die();
	}
	*/
	
	/*
	command-line usage: 
		1. change directory to <htdocs>\pqr
		2. run -> php index.php Tpdf dvapp PREFIX number-of-forms
		PREFIX = Name of city/muni
		number-of-forms = default to 1
*/
	function bpsf($prefix = 'BPSF', $start = 1, $count = 1){
		$start  = $start;//start
		$end = $count; //
		$this->benchmark->mark('code_start');
  		for($i = $start ; $i <= $end ; $i += 24)
			$this->createpdf($i,$end,strtoupper($prefix));
		
		$this->benchmark->mark('code_end');
  
		echo $this->benchmark->elapsed_time('code_start', 'code_end') .' seconds '.PHP_EOL; 
	 
		die();
	}
	
}

/*
* application/controllers/Pdf.php
*/
