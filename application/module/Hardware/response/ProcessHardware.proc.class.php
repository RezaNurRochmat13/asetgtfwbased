<?php

require_once GTFWConfiguration::GetValue('application', 'docroot'). 'module/Hardware/business/mysqlt/Hardware.class.php';

class ProcessHardware {
var $_POST;
var $Obj;
var $pageInput;
var $pageView;
var $cssDone = "alert-success";
var $cssFail = "alert-danger";

	function __construct(){
		$this->Obj = new Hardware();
		$this->_POST = $_POST->AsArray();
		$this->pageView = Dispatcher::Instance()->GetUrl('Hardware', 'ListHardware', 'View', 'html');
	}
	
	function Add(){
		if(isset($this->_POST['btnsimpan'])){	
			$add = $this->Obj->DoAddHardware($this->_POST['kode_aset'],$this->_POST['nama_aset'], $this->_POST['pic'], $this->_POST['deskripsi_aset']);
			if($add == true) {
				Messenger::Instance()->Send('Hardware', 'ListHardware', 'view', 'html', array($this->_POST,'Penambahan data berhasil dilakukan', $this->cssDone), Messenger::NextRequest);
			} else {
				Messenger::Instance()->Send('Hardware', 'ListHardware', 'view', 'html', array($this->_POST,'Penambahan data gagal dilakukan', $this->cssFail), Messenger::NextRequest);
				}
				return $this->pageView;
			}
		}
		
		function Update(){
		//echo "<pre>";print_r($this->_POST);echo "</pre>";
		if(isset($this->_POST['btnsimpan'])){
		//echo 'sini';exit;
			$kodeAset = $this->_POST['kode_aset'];
			$update = $this->Obj->DoUpdateHardware($this->_POST['nama_aset'], $this->_POST['pic'], $this->_POST['deskripsi_aset'],$kodeAset);
			if($update == true) {
				Messenger::Instance()->Send('Hardware', 'ListHardware', 'view', 'html', array($this->_POST,'Update data berhasil dilakukan', $this->cssDone), Messenger::NextRequest);
			} else {
				Messenger::Instance()->Send('Hardware', 'ListHardware', 'view', 'html', array($this->_POST,'Update data gagal dilakukan', $this->cssFail), Messenger::NextRequest);
				}
			return $this->pageView;
		}
	}
	
	function Delete() {
		$kode_aset = $this->_POST['idDelete'];
		if(isset($kode_aset)) {
			$delete = $this->Obj->DoDeleteHardware($kode_aset);
			
			if($delete == true) {
			Messenger::Instance()->Send('Hardware', 'ListHardware', 'view', 'html', array($this->_POST,'Delete Data Berhasil Dilakukan', $this->cssDone), Messenger::NextRequest);
			} else {
			Messenger::Instance()->Send('Hardware', 'ListHardware', 'view', 'html', array($this->_POST,'Delete Data Gagal Dilakukan', $this->cssFail), Messenger::NextRequest);
			}
		}
		return $this->pageView;
	}
}
?>