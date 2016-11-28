<?php

class Kelompok extends Database
{
	#internal variable
	protected $mSqlFile;
	public $_POST;
	public $_GET;

	#constructor
	function __construct($connectionNumber=0){
		$db_drive = Configuration::Instance()->GetValue('application','db_conn',0,'db_type');
		$this->mSqlFile = 'module/'.Dispatcher::Instance()->mModule.'/bussiness/'.$db_drive.'/kelompok.sql.php';
		$this->_POST = is_object($_POST) ? $_POST->AsArray() : $_POST;
		$this->_GET = is_object($_GET) ? $_GET->AsArray() : $_GET;
		parent::__construct($connectionNumber);
			
	}

	public function Count()
	{
		$return = $this->Open($this->mSqlQueries['count'], array());

		if($return){
			return (int)$return[0]['count'];
		}else{
			return 0;
		}
	} 

	public function getDataKelompok($offset,$limit,$param = array())
	{
		$return = $this->Open($this->mSqlQueries['get_data_kelompok'], array(
			'%'.$param['nama'].'%',
			$offset,
			$limit

			));

		return $return;
	}

}
?>