<?php

namespace src\controller;

class AntennaController {
	
	private $antennaDao;
	
	public function __construct() {
		$this->antennaDao=new \src\dao\AntennaDao();
	}

	public function getAllAntenna() {
		$antennas=$this->antennaDao->getAllAntenna();
		return $antennas;
	}
	
	public function getAntennaById($id) {
		$antennas=$this->antennaDao->getAntennaById($id);
		return $antennas;
	}
	
	public function saveAntenna($antenna) {
		$this->antennaDao->saveAntenna($antenna);
	}
	
}

?>