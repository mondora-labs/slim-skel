<?php

namespace src\dao;

use src\controller\Utils;

class AntennaDao {
	
	private $utils;
	
	public function __construct() {
		$this->utils=Utils::getInstance();
	}
	
	public function getAllAntenna() {
		$query="SELECT * FROM antenna";
		$returnValue=$this->utils->execQuery($query);
		return $returnValue;
	}
	
	public function getAntennaById($id) {
		$query="SELECT * FROM antenna WHERE id=?";
		$params=array();
		$params[]=$id;
		$returnValue=$this->utils->execQuery($query,$params);
		return $returnValue[0];
	}
}

?>