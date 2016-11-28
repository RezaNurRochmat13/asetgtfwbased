<?php
/**
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
*/

class LatihanDua extends Database{
	protected $mSqlFile;
	function __construct($connectionNumber=0){
		$this->mSqlFile='module/latihan_dua/bussiness/mysqlt/latihandua.sql.php';
		parent::__construct($connectionNumber);
	}

	function GetListAgama(){
		$result=$this->Open($this->mSqlQueries['GetListAgama'], array());
		return $result	
	}
}

?>