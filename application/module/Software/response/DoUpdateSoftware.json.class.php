<?php
require_once GTFWConfiguration::GetValue('application', 'docroot').'module/Software/response/ProcessSoftware.proc.class.php';

class DoUpdateSoftware extends JsonResponse {
	function TemplateModule() {
	}
	
	function ProcessRequest() {
		$Obj = new ProcessSoftware();
		$urlRedirect = $Obj->Update();
		return array('exec'=> 'GtfwAjax.replaceContentWithUrl("subcontent-element","'.$urlRedirect.'&ascomponent=1")');
	}
	
	function ParseTemplate($data = NULL) {
	}
}
?>