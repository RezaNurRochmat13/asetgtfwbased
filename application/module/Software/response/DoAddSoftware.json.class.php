<?php

require_once GTFWConfiguration::GetValue('application', 'docroot').'module/Software/response/ProcessSoftware.proc.class.php';

class DoAddSoftware extends JsonResponse {

	function TemplateModule() {
	}

	function ProcessRequest() {
		$Obj = new ProcessSoftware();
		$urlRedirect = $Obj->Add();
		return array('exec' => 'GtfwAjax.replaceContentWithUrl("subcontent-element","'.$urlRedirect.'&ascomponent=1")');
	}

	function ParseTemplate($data = NULL) {
	}
}
?>