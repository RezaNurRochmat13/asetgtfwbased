<?php
/** 
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
**/

class ViewAddKendaraan extends HtmlResponse{

	function TemplateModule(){
		$this->SetTemplateBasedir(Configuration::Instance()->GetValue('application', 'docroot').'module/Kendaraan/template');
		$this->SetTemplateFile('view_add_kendaraan.html');
	}

	function ProcessRequest(){

	}

	function ParseTemplate($data = NULL) {
	$this->mrTemplate->Addvar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Kendaraan', 'AddKendaraan', 'Do', 'json'));
	$this->mrTemplate->addVar('content', 'URL_CANCEL', Dispatcher::Instance()->GetUrl(Dispatcher::Instance()->mModule, 'ListKendaraan', 'view', 'html'));
	}
}
?>