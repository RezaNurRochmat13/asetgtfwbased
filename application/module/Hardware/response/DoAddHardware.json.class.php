<?php

require_once GTFWConfiguration::GetValue('application', 'docroot').'module/Hardware/response/ProcessHardware.proc.class.php';

class DoAddHardware extends JsonResponse {

	function TemplateModule() {
	}

	function ProcessRequest() {
		$Obj = new ProcessHardware();
		$urlRedirect = $Obj->Add();
		return array('exec' => 'GtfwAjax.replaceContentWithUrl("subcontent-element","'.$urlRedirect.'&ascomponent=1")');
	}

	function ParseTemplate($data = NULL) {
	}
}
?>