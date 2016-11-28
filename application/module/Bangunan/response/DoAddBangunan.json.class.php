<?php
/** 
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
**/

require_once GTFWConfiguration::GetValue('application', 'docroot').'module/Bangunan/response/ProcessBangunan.proc.class.php';

class DoAddBangunan extends JsonResponse {

	function TemplateModule() {
	}

	function ProcessRequest() {
		$Obj = new ProcessBangunan();
		$urlRedirect = $Obj->Add();
		return array('exec' => 'GtfwAjax.replaceContentWithUrl("subcontent-element","'.$urlRedirect.'&ascomponent=1")');
	}

	function ParseTemplate($data = NULL) {
	}
}
?>