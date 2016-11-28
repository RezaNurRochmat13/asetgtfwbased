<?php

require_once Configuration::Instance()->GetValue('application', 'docroot').'module/Software/business/mysqlt/Software.class.php';

class ViewUpdateHardware extends HtmlResponse {
	function TemplateModule() {
		$this->SetTemplateBasedir(Configuration::Instance()->GetValue('application', 'docroot').'module/Software/template');
		$this->SetTemplateFile('view_update_software.html');
	}
	
	function ProcessRequest() {
		$ObjSoftware = new Software();
		$kodeAset = Dispatcher::Instance()->Encrypt($_GET['kodeAset']->Raw());
		if(!empty($kodeAset)) {
			$return['dataSoftware'] = $ObjSoftware->GetSoftwareById($kodeAset);
		}
		
			$return['KODE_ASET'] = $kodeAset;
			//echo "<pre>";print_r($return);echo "</pre>";
			return $return;
	}
	
	function ParseTemplate ($data = NULL) {
	
		if(!empty($data['KODE_ASET'])) {
			$this->mrTemplate->AddVar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Software', 'UpdateSoftware', 'do', 'json'));
			$this->mrTemplate->AddVar('content', 'NAMA_ASET', $data['dataSoftware'][0]['NAMA_ASET']);
			$this->mrTemplate->AddVar('content', 'PIC', $data['dataSoftware'][0]['PIC']);
			$this->mrTemplate->AddVar('content', 'DESKRIPSI_ASET', $data['dataSoftware'][0]['DESKRIPSI_ASET']);
			$this->mrTemplate->AddVar('content', 'NAMA_STATUS_ASET', $data['dataSoftware'][0]['NAMA_STATUS_ASET']);
			$this->mrTemplate->AddVar('content', 'NAMA_KATEGORI_ASET', $data['dataSoftware'][0]['DESKRIPSI_ASET']);
			$this->mrTemplate->AddVar('content', 'KODE_ASET', $data['KODE_ASET']);
			$this->mrTemplate->addVar('content', 'URL_CANCEL', Dispatcher::Instance()->GetUrl(Dispatcher::Instance()->mModule, 'ListSoftware', 'view', 'html'));
		} else {
			$this->mrTemplate->AddVar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Software', 'ListSoftware', 'do', 'json'));
		}
		
	}
}
?>