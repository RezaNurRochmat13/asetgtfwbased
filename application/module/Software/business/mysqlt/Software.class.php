<?php

class Software extends Database
{
	protected $mSqlFile;
	
	function __construct ($connectionNumber=0) {
		$this->mSqlFile = 'module/Software/business/mysqlt/Software.sql.php';
			parent::__construct($connectionNumber);
	}
	
	function GetListSoftware() {
		$result = $this->Open($this->mSqlQueries['get_list_software'], array());
		return $result;
	}

	function GetStatusAset(){
		$result = $this->Open($this->mSqlQueries['get_status_aset'],array());
		return $result;
	}

	function GetKategoriAset(){
		$result = $this->Open($this->mSqlQueries['get_kategori_aset'], array());
		return $result;
	}
	
	function DoAddSoftware($kodeAset,$namaAset,$pic,$deskripsiAset) {
		$result = $this->Execute($this->mSqlQueries['do_add_software'], array($kodeAset,$namaAset,$pic,$deskripsiAset));
		return $result;
	}
	
	function GetSoftwareById($kodeAset) {
	echo $kodeAset;
		$result = $this->Open($this->mSqlQueries['get_software_by_id'], array($kodeAset));
		return $result;
	}
	
	function DoUpdateSoftware($nama_aset,$pic,$deskripsi_aset, $kodeAset) {
		$result = $this->Execute($this->mSqlQueries['do_update_software'], array($nama_aset,$pic,$deskripsi_aset, $kodeAset));
		return $result;
	}
	
	function DoDeleteSoftware($kodeAset) {
		$result = $this->Execute($this->mSqlQueries['do_delete_software'], array($kodeAset));
		return $result;
	}
	function countData()
    {
        $query = $this->mSqlQueries['count_data'];
        $result = $this->Open($query, array());
        return $result[0]['total'];
    }

    function getData($params)
    {
		//echo "<pre>";print_r($params);echo "</pre>";
        if (is_array($params))
            extract($params);
        $filter     = '';
        //$input      = array(Configuration::Instance()->GetValue('application', 'application_id'));
        if (!empty($name)) {
            $filter .= " WHERE m.nama_aset LIKE '%$name%'";
            //$input[] = "%$name%";
        }
        $limit = '';
        if (!empty($display)){
        	$limit = "LIMIT $start, $display";
        }
        $query = $this->mSqlQueries['get_data'];
        $query = str_replace('--filter--', $filter, $query);
        $query = str_replace('--limit--', $limit, $query);
		//echo "<pre>";print_r($query);echo "</pre>";
        $result = $this->Open($query,array());
		//echo "<pre>";print_r($result);echo "</pre>";
        return $result;
    }
}
?>