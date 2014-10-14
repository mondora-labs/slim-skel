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
	
	public function saveAntenna($antenna) {
		$query="INSERT INTO antenna(name, zone, latitude, longitude)
    				VALUES (:name, :zone, :latitude, :longitude)	";
		$params=array();
		$params[':name']=$antenna->name;
		$params[':zone']=$antenna->zone;
		$params[':latitude']=$antenna->latitude;
		$params[':longitude']=$antenna->longitude;
		
		return $this->utils->execQuery($query,$params);
	}
}

?>