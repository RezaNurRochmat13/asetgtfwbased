<?php

class ViewAddSoftware extends HtmlResponse{

	function TemplateModule(){
		$this->SetTemplateBasedir(Configuration::Instance()->GetValue('application', 'docroot').'module/Software/template');
		$this->SetTemplateFile('view_add_software.html');
	}

	function ProcessRequest(){

	}

	function ParseTemplate($data = NULL) {
	$this->mrTemplate->Addvar('content', 'URL_ACTION', Dispatcher::Instance()->GetUrl('Software', 'AddSoftware', 'Do', 'json'));
	$this->mrTemplate->addVar('content', 'URL_CANCEL', Dispatcher::Instance()->GetUrl(Dispatcher::Instance()->mModule, 'ListSoftware', 'view', 'html'));
	}
}
?>