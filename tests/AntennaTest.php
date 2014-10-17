<?php

namespace tests;

use src\controller\AntennaController;
class AntennaTest extends \PHPUnit_Framework_TestCase {
	
	public function testAntenna() {
		$controller=new AntennaController();
		$antennas=$controller->getAllAntenna();
		$this->assertTrue($antennas>=2);
	}
	
}
?>