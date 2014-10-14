<?php 

namespace src\controller;

use GuzzleHttp\Client;

class RestClient {
	
	private $client;
	
	public function __construct() {
		$this->client = new Client();
	}
	
	public function callRestService($endpoint) {
		$response = $this->client->get($endpoint);
		$json = $response->json();
		return $json;
	}
	
}
?>