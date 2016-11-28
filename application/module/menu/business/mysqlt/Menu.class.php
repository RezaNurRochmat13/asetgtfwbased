<?php
/** 
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
**/ 

class Menu extends Database {
   public function __construct($connectionnumber=0){
      parent::__construct($connectionnumber);
      $this->LoadSql('module/menu/business/mysqlt/menu.sql.php');
      $this->SetDebugOn();
   }
   
   function ListAvailableMenu($groupId, $flagShow="") {
      
      if ($flagShow != "") {
         $result = $this->GetAllDataAsArray($this->mSqlQueries['nav'], array($groupId, $flagShow));
      } else {
         $result = $this->GetAllDataAsArray($this->mSqlQueries['list_available_menu'], array($groupId));

      }
      // echo $this->getlasterror();
      return $result;
   }
   
   function ListAvailableSubMenu($parentId, $flagShow="") {
      if ($flagShow != "") {
         $result = $this->GetAllDataAsArray($this->mSqlQueries['list_available_submenu_with_flag_show'], array($parentId, $flagShow));
      } else {
         $result = $this->GetAllDataAsArray($this->mSqlQueries['list_available_submenu'], array($parentId));
      }
      
      return $result;
   }
   
   function ListAllAvailableSubMenuForGroup($userId,$menuId) {
   	//die('tet');
		#printf($this->mSqlQueries['list_all_available_submenu_for_group'], $userId,$menuId);
      $result = $this->Open($this->mSqlQueries['list_all_available_submenu_for_group'], array($userId,$menuId));
      return $result;
   }

   #gtfwMethodOpen
   public function GetDhtmlxMenu(){
   	$username = Security::Instance()->mAuthentication->GetCurrentUser()->GetUserName();
   	$result = $this->Open($this->mSqlQueries['dhtmlx_menu'], array($username));
   	return $result;
   }
}
?>
