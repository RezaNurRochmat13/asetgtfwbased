<?php

require_once GTFWConfiguration::GetValue('application', 'docroot'). 'module/Software/business/mysqlt/Software.class.php';

class ProcessSoftware {
var $_POST;
var $Obj;
var $pageInput;
var $pageView;
var $cssDone = "alert-success";
var $cssFail = "alert-danger";

	function __construct(){
		$this->Obj = new Hardware();
		$this->_POST = $_POST->AsArray();
		$this->pageView = Dispatcher::Instance()->GetUrl('Software', 'ListSoftware', 'View', 'html');
	}
	
	function Add(){
		if(isset($this->_POST['btnsimpan'])){	
			$add = $this->Obj->DoAddSoftware($this->_POST['kode_aset'],$this->_POST['nama_aset'], $this->_POST['pic'], $this->_POST['deskripsi_aset'],$this->_POST['kode_status_aset'],$this->_POST['kode_kategori_aset']);
			if($add == true) {
				Messenger::Instance()->Send('Software', 'ListSoftware', 'view', 'html', array($this->_POST,'Penambahan data berhasil dilakukan', $this->cssDone), Messenger::NextRequest);
			} else {
				Messenger::Instance()->Send('Software', 'ListSoftware', 'view', 'html', array($this->_POST,'Penambahan data gagal dilakukan', $this->cssFail), Messenger::NextRequest);
				}
				return $this->pageView;
			}
		}
		
		function Update(){
		//echo "<pre>";print_r($this->_POST);echo "</pre>";
		if(isset($this->_POST['btnsimpan'])){
		//echo 'sini';exit;
			$kodeAset = $this->_POST['kode_aset'];
			$update = $this->Obj->DoUpdateSoftware($this->_POST['nama_aset'], $this->_POST['pic'], $this->_POST['deskripsi_aset'],$this->_POST['kode_status_aset'],$this->_POST['kode_kategori_aset'], $kodeAset);
			if($update == true) {
				Messenger::Instance()->Send('Software', 'ListSoftware', 'view', 'html', array($this->_POST,'Update data berhasil dilakukan', $this->cssDone), Messenger::NextRequest);
			} else {
				Messenger::Instance()->Send('Software', 'ListSoftware', 'view', 'html', array($this->_POST,'Update data gagal dilakukan', $this->cssFail), Messenger::NextRequest);
				}
			return $this->pageView;
		}
	}
	
	function Delete() {
		$kode_aset = $this->_POST['idDelete'];
		if(isset($kode_aset)) {
			$delete = $this->Obj->DoDeleteSoftware($kode_aset);
			
			if($delete == true) {
			Messenger::Instance()->Send('Software', 'ListSoftware', 'view', 'html', array($this->_POST,'Delete Data Berhasil Dilakukan', $this->cssDone), Messenger::NextRequest);
			} else {
			Messenger::Instance()->Send('Software', 'ListSoftware', 'view', 'html', array($this->_POST,'Delete Data Gagal Dilakukan', $this->cssFail), Messenger::NextRequest);
			}
		}
		return $this->pageView;
	}
}
?>