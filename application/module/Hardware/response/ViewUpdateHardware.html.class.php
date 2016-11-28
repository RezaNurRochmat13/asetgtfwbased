<?php

require_once Configuration::Instance()->GetValue('application', 'docroot').'module/Hardware/business/mysqlt/Hardware.class.php';

class ViewUpdateHardware extends HtmlResponse {
	function TemplateModule() {
		$this->SetTemplateBasedir(Configuration::Instance()->GetValue('application', 'docroot').'module/Hardware/template');
		$this->SetTemplateFile('view_update_hardware.html');
	}
	
	function ProcessRequest() {
		$ObjHardware = new Hardware();
		$kodeAset = Dispatcher::Instance()->Encrypt($_GET['kodeAset']->Raw());
		if(!empty($kodeAset)) {
			$return['dataHardware'] = $ObjHardware->GetHardwareById($kodeAset);
		}
		
			$return['KODE_ASET'] = $kodeAset;
			//echo "<pre>";print_r($return);echo "</pre>";
			return $return;
	}
	
	function ParseTemplate ($data = NULL) {
	
		if(!empty($data['KODE_ASET'])) {
			$this->mrTemplate->AddVar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Hardware', 'UpdateHardware', 'do', 'json'));
			$this->mrTemplate->AddVar('content', 'NAMA_ASET', $data['dataHardware'][0]['NAMA_ASET']);
			$this->mrTemplate->AddVar('content', 'PIC', $data['dataHardware'][0]['PIC']);
			$this->mrTemplate->AddVar('content', 'DESKRIPSI_ASET', $data['dataHardware'][0]['DESKRIPSI_ASET']);
			$this->mrTemplate->AddVar('content', 'KODE_ASET', $data['KODE_ASET']);
			$this->mrTemplate->addVar('content', 'URL_CANCEL', Dispatcher::Instance()->GetUrl(Dispatcher::Instance()->mModule, 'ListHardware', 'view', 'html'));
		} else {
			$this->mrTemplate->AddVar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Hardware', 'ListHardware', 'do', 'json'));
		}
		
	}
}
?>