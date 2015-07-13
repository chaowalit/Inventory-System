<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_exportController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('storemodel','',TRUE);
	}
	
	public function index(){	
		$this->load->view('web/table_export');
	}
	
	function exportExcelTo()
	{
		$dateFrom = $this->input->post('dateFrom');
		$dateTo = $this->input->post('dateTo');
		if($dateFrom == "" || $dateTo == ""){
			$this->load->view('web/table_export');
		}
		$timeFrom = strtotime($dateFrom);
		$dateFrom = date('Y-m-d',$timeFrom);
		
		$timeTo = strtotime($dateTo);
		$dateTo = date('Y-m-d',$timeTo);
		
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		/** Include PHPExcel */
		// require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
		$this->load->library('Excel');


		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
									 ->setLastModifiedBy("Maarten Balliauw")
									 ->setTitle("Office 2007 XLSX Test Document")
									 ->setSubject("Office 2007 XLSX Test Document")
									 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Test result file");

		/* Commented by SUT
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Nattapong')
					->setCellValue('A2', 'Thitichawalitkul!')
					->setCellValue('B1', 'Hello')
					->setCellValue('B2', 'world!');

		// Miscellaneous glyphs, UTF-8
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A4', 'Miscellaneous glyphs')
					->setCellValue('A5', 'Umm');
		*/

		$objPHPExcel->setActiveSheetIndex(0);
		
		$this->db-> select('Order,Type,Vendor,Description,Quantity,Price/Unit,Amount,Cost_Center,Department,Manager,Owner,En,Ext,Model,Support_Prt,Building');
		$this->db->from('withdraw');
		$this->db->where('Date_time >=', "$dateFrom");
		$this->db->where('Date_time <=', "$dateTo");
		$query = $this->db->get();
		
		if(!$query)
				return false;
		$fields = $query->list_fields();
		//fetching header
		$col = 0;
		foreach($fields as $field){
			$row = 1;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$field);
			//$objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
			$objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' => '0000FF')));			
			//set color font
			$styleArray = array(
			    'font'  => array(
				'bold'  => true,
				'color' => array('rgb' => 'FFFFFF'),
				//'size'  => 15,
				//'name'  => 'Verdana'
			));
			$objPHPExcel->getActiveSheet()->getStyle('A1:P1')->applyFromArray($styleArray);
			//end set color
			$col++;
		}
		
		//fetching table's data
		$row = 2;
		foreach($query->result() as $data){
			$col = 0;
			foreach($fields as $field){
				$sheet = $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$data->$field);
				$col++;
			}
			$row++;
		}
		
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Store1');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="01simple.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	function getDataExportExcel()
	{
		$datepickerfrom = $this->input->post('datePickerFrom');
		$datepickerto = $this->input->post('datePickerTo');
		
		$timeFrom = strtotime($datepickerfrom);
		$datepickerfrom = date('Y-m-d',$timeFrom);
		
		$timeTo = strtotime($datepickerto);
		$datepickerto = date('Y-m-d',$timeTo);
		$result = $this->storemodel->returnRecordToExportExcel($datepickerfrom,$datepickerto);
		if(empty($result)){
			echo "<tr align='center'><td colspan='11'>No Data for $datepickerfrom To $datepickerto</td></tr>";
		}else{
			foreach($result as $row){
				echo "<tr align='left'>";
				echo "<td>$row->Type</td>";
				echo "<td>$row->Description</td>";
				echo "<td>$row->Quantity</td>";
				echo "<td>$row->Cost_Center</td>";
				echo "<td>$row->Department</td>";
				echo "<td>$row->Manager</td>";
				echo "<td>$row->Owner</td>";
				echo "<td>$row->En</td>";
				echo "<td>$row->Ext</td>";
				echo "<td>$row->Model</td>";
				echo "<td>$row->Support_Prt</td>";
				echo "</tr>";
			}
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
