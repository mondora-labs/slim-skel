<?php 

namespace src\controller;

use src\config\Config;

class MenuController {
	
	public function getAllMenu() {
		$restClient = new \src\controller\RestClient();
		$response = $restClient->callRestService(Config::$ENDPOINT1);
		return $response;
	}
	
}
?>