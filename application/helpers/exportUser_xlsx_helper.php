<?php
function do_export_xlsx($listRespon, $simpulan, $hasil) {
	$CI =& get_instance();
	
	// load the excel library
	$CI->load->library('excel');
	
	define('IDX_COL_HOME', 2);	// Kolom dimulai pada kolom ke 3 (index 2)
	define('IDX_ROW_START', 1); // Dimulai dari baris 1
	define('TABLE_COLS', 11);	// Tabel ada 8 kolom
	
	$jmlHasil = count($listRespon);
	
	$exportFileName = "Data User Kunjungan.xlsx";
	$columnWidths = array(
			2,	// [A] Padding
			2,	// [B] Padding
			8,	// [C] Kolom Nomer ID
			18,	// [D] Kolom Nama
			14,	// [E] Kolom NIK
			20,	// [F] Kolom Alamat
			12, // [G] Kolom umur
			20,	// [H] Kolom jenkel
			25,	// [J] Kolom instansi
			30,	// [I] Kolom keperluan
			12, // [K] Kolom no_pol
			20, // [K] Kolom antrian
			20, // [K] Kolom waktu kunjung(date_created)
	);
	$styleHeader = array(
			'alignment' => array(
					'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'font'  => array(
					'bold'  => true
			)
	);
	$styleGrayBg = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'EEEEEE')
			)
	);
	$styleBorderAll = array(
			'borders' => array(
					'allborders'	=> array(
							'style'		=> PHPExcel_Style_Border::BORDER_THIN
					)
			)
	);
	$styleAlignCenterTop = array(
			'alignment' => array(
					'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'		=> PHPExcel_Style_Alignment::VERTICAL_TOP,
					'wrap'			=> true
			),
	);
	$styleAPDown = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'F9BBBC')
			)
	);
	
	// Generate excel....
	try {
		$objPHPExcel = new PHPExcel();
		$worksheetReport = $objPHPExcel->getActiveSheet();
		$worksheetReport->setTitle('Data User Kunjungan');
		
		// Set default alignment ke kiri atas...
		$objPHPExcel->getDefaultStyle()
			->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		
		// Set up kolom -----------------------------------
		foreach ($columnWidths as $colIdx => $colWidth) {
			$worksheetReport->getColumnDimensionByColumn($colIdx)->setWidth($colWidth);
		}
		
		// Judul worksheet pada bagian atas
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, IDX_ROW_START,
				IDX_COL_HOME+TABLE_COLS-1, IDX_ROW_START+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME, IDX_ROW_START, "Data User Kunjungan");
		
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START)
			->applyFromArray($styleHeader); // Set style
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START)
			->getFont()->setSize(18);
		
		$rowBaseTable	= IDX_ROW_START+4;
		
		// Baris judul
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable-1,
				IDX_COL_HOME+TABLE_COLS-1, $rowBaseTable-1)
				->setCellValueByColumnAndRow(IDX_COL_HOME, $rowBaseTable-1,
						"Total: ".$jmlHasil);
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable,
				IDX_COL_HOME+TABLE_COLS-1, $rowBaseTable)
				->setCellValueByColumnAndRow(IDX_COL_HOME, $rowBaseTable,
						date("d m Y, H:i"));
		
		// Baris header tabel
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable+1,
				IDX_COL_HOME, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME,$rowBaseTable+1,'ID User');
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+1, $rowBaseTable+1,
				IDX_COL_HOME+1, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+1,$rowBaseTable+1,'Nama');
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+2, $rowBaseTable+1,
				IDX_COL_HOME+2, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+2,$rowBaseTable+1,'Nomor NIK');
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+3, $rowBaseTable+1,
				IDX_COL_HOME+3, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+3,$rowBaseTable+1,'Alamat');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+4, $rowBaseTable+1,
				IDX_COL_HOME+4, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+4,$rowBaseTable+1,'Umur');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+5, $rowBaseTable+1,
				IDX_COL_HOME+5, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+5,$rowBaseTable+1,'Jenis Kelamin');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+6, $rowBaseTable+1,
				IDX_COL_HOME+6, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+6,$rowBaseTable+1,'Instansi');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+7, $rowBaseTable+1,
				IDX_COL_HOME+7, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+7,$rowBaseTable+1,'Keperluan Kunjungan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+8, $rowBaseTable+1,
				IDX_COL_HOME+8, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+8,$rowBaseTable+1,'Nomor Pol');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+9, $rowBaseTable+1,
				IDX_COL_HOME+9, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+9,$rowBaseTable+1,'Nomor Antrian');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+10, $rowBaseTable+1,
				IDX_COL_HOME+10, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+10,$rowBaseTable+1,'Waktu Kunjungan');		
				
		
		
		// Set border header
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$rowBaseTable+1,
				IDX_COL_HOME+TABLE_COLS-1,$rowBaseTable+2)
				->applyFromArray($styleHeader)
				->applyFromArray($styleBorderAll)
				->applyFromArray($styleGrayBg);
		
		// Isi body tabel
		$counterItem	= 0;
		$currentRow		= $rowBaseTable + 3;
		foreach ($listRespon as $itemResult) {
			$counterItem++;
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME, $currentRow, $itemResult['id_user']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+1, $currentRow, $itemResult['nama']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+2, $currentRow, $itemResult['nik']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+3, $currentRow, $itemResult['alamat']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+4, $currentRow, $itemResult['umur']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+5, $currentRow, $itemResult['jenkel']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+6, $currentRow, $itemResult['instansi']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+7, $currentRow, $itemResult['keperluan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+8, $currentRow, $itemResult['no_pol']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+9, $currentRow, $itemResult['antrian']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+10, $currentRow, $itemResult['date_created']);
			
			$currentRow++;
		}
		
		// Set border untuk seluruh cell
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$rowBaseTable+1,
				IDX_COL_HOME+TABLE_COLS-1,$currentRow-1)
				->applyFromArray($styleBorderAll);
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$exportFileName.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	} catch (Exception $e) {
		die('[PHPExcel error] '.$e->getMessage()."<br> Trace:<br>".$e->getTraceAsString());
	}
}