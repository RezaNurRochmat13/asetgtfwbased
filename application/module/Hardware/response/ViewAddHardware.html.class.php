<?php

class ViewAddHardware extends HtmlResponse{

	function TemplateModule(){
		$this->SetTemplateBasedir(Configuration::Instance()->GetValue('application', 'docroot').'module/Hardware/template');
		$this->SetTemplateFile('view_add_hardware.html');
	}

	function ProcessRequest(){

	}

	function ParseTemplate($data = NULL) {
	$this->mrTemplate->Addvar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Hardware', 'AddHardware', 'Do', 'json'));
	$this->mrTemplate->addVar('content', 'URL_CANCEL', Dispatcher::Instance()->GetUrl(Dispatcher::Instance()->mModule, 'ListHardware', 'view', 'html'));
	}
}
?>