<?php
/** 
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
**/

require_once GTFWConfiguration::GetValue('application', 'docroot').'module/Kendaraan/response/ProcessKendaraan.proc.class.php';

class DoUpdateKendaraan extends JsonResponse {
	function TemplateModule() {
	}
	
	function ProcessRequest() {
		$Obj = new ProcessKendaraan();
		$urlRedirect = $Obj->Update();
		return array('exec'=> 'GtfwAjax.replaceContentWithUrl("subcontent-element","'.$urlRedirect.'&ascomponent=1")');
	}
	
	function ParseTemplate($data = NULL) {
	}
}
?>