<?php
/**
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
*/


require_once Configuration::Instance()->GetValue('application', 'docroot').'module/Kendaraan/business/mysqlt/Kendaraan.class.php';

class ViewUpdateKendaraan extends HtmlResponse {
	function TemplateModule() {
		$this->SetTemplateBasedir(Configuration::Instance()->GetValue('application', 'docroot').'module/Kendaraan/template');
		$this->SetTemplateFile('view_update_kendaraan.html');
	}
	
	function ProcessRequest() {
		$ObjKendaraan = new Kendaraan();
		$kodeAset = Dispatcher::Instance()->Encrypt($_GET['kodeAset']->Raw());
		if(!empty($kodeAset)) {
			$return['dataKendaraan'] = $ObjKendaraan->GetKendaraanById($kodeAset);
		}
		
			$return['KODE_ASET'] = $kodeAset;
			//echo "<pre>";print_r($return);echo "</pre>";
			return $return;
	}
	
	function ParseTemplate ($data = NULL) {
	
		if(!empty($data['KODE_ASET'])) {
			$this->mrTemplate->AddVar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Kendaraan', 'UpdateKendaraan', 'do', 'json'));
			$this->mrTemplate->AddVar('content', 'NAMA_ASET', $data['dataKendaraan'][0]['NAMA_ASET']);
			$this->mrTemplate->AddVar('content', 'PIC', $data['dataKendaraan'][0]['PIC']);
			$this->mrTemplate->AddVar('content', 'DESKRIPSI_ASET', $data['dataKendaraan'][0]['DESKRIPSI_ASET']);
			$this->mrTemplate->AddVar('content', 'NAMA_STATUS_ASET', $data['dataKendaraan'][0]['NAMA_STATUS_ASET']);
			$this->mrTemplate->AddVar('content', 'NAMA_KATEGORI_ASET', $data['dataKendaraan'][0]['DESKRIPSI_ASET']);
			$this->mrTemplate->AddVar('content', 'KODE_ASET', $data['KODE_ASET']);
			$this->mrTemplate->addVar('content', 'URL_CANCEL', Dispatcher::Instance()->GetUrl(Dispatcher::Instance()->mModule, 'ListKendaraan', 'view', 'html'));
		} else {
			$this->mrTemplate->AddVar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Software', 'ListKendaraan', 'do', 'json'));
		}
		
	}
}
?>