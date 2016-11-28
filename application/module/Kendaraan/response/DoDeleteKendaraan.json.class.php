<?php
/** 
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
**/

require_once Configuration::Instance()->GetValue( 'application', 'docroot') . 'module/Kendaraan/response/ProcessKendaraan.proc.class.php';

class DoDeleteSoftware extends JsonResponse {

   function TemplateModule() {
   }
   
   function ProcessRequest() {

      $Obj = new ProcessKendaraan();
      
      $urlRedirect = $Obj->Delete();
      
      return array( 'exec' => 'GtfwAjax.replaceContentWithUrl("subcontent-element","'.$urlRedirect.'&ascomponent=1")');       
    }

   function ParseTemplate($data = NULL) {
   }
}
?>
