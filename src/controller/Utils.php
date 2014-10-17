<?php

namespace src\controller;

use src\config\Config;
/**
 * Classe di utilita'.
 * Da utilizzare con il metodo getInstance anziche' usare il costruttore (pattern Singleton).
 *
 * @author matteo
 *
 */
class Utils {
	/** Istanza della classe Utils. SINGLETON */
	private static $instance;
	
	private static $fileLogName="ws_errors.log";
	private static $fileDebugName="ws_debug.log";
	private $wsConfig;
	/** Connessione adl DB */
	private $dbConnection;
	private $PDO_CONNECTION_DSN="";
	private $PDO_CONNECTION_USER="";
	private $PDO_CONNECTION_PASSWORD="";
	
	
	/** Costruttore privato per SINGLETON */
	private function __construct() {
		/* Non richiamare dall'esterno. Usare Utils::getInstance() */
		$this->PDO_CONNECTION_DSN = Config::$PDO_CONNECTION_DSN;
		$this->PDO_CONNECTION_USER = Config::$PDO_CONNECTION_USER;
		$this->PDO_CONNECTION_PASSWORD = Config::$PDO_CONNECTION_PASSWORD;
	}

	/**
	 * Metodo per ottenre l'istanza. No costruttore (SINGLETON)
	 * @return Utils
	 * */
	public static function getInstance() {
		if(Utils::$instance==null) {
			Utils::$instance=new Utils();
		}
		return Utils::$instance;
	}

	/****************************** Funzioni DB generali ******************************/

	/**
	 * Connessione al database. Utilizza i parametri di WsConfig.
	 * @throws MdpException
	 */
	public function connect() {
		if($this->dbConnection==null){
			try {
				$this->dbConnection=new \PDO($this->PDO_CONNECTION_DSN,$this->PDO_CONNECTION_USER,$this->PDO_CONNECTION_PASSWORD,array(\PDO::ATTR_PERSISTENT=>true));
				$this->dbConnection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $pe) {
				// log
				throw $pe;
			}
		}
	}

	/**
	 * Esegue la query con i parametri passati (formato:  :nome_parametro).
	 * Se $return_affected_rows=true allora restituisce il numero di righe impattate dalla query.
	 *
	 * @param string $sql
	 * @param array $params
	 * @param boolean $return_affected_rows
	 * @throws MdpException
	 * @return number|multitype:
	 */
	public function execQuery($sql,array $params=array(),$return_affected_rows=false){
		if($this->dbConnection==null) {
			$this->connect();
		}
		try {
			$q=$this->dbConnection->prepare($sql);
			$retVal=$q->execute($params);
		} catch(Exception $e){
			// log
			throw $e;
		}
		if($return_affected_rows) {
			return $q->rowCount();
		}
		$q->setFetchMode(\PDO::FETCH_ASSOC);
		
		
		return $q->fetchAll();
	}

	/**
	 * Restituisce il nextVal della sequence passata.
	 * @param int $sequence
	 */
	public function nextSequenceId($sequence){
		$sql="SELECT nextval(:seq) as next";
		$ret=$this->ExecQuery($sql,array('seq'=>$sequence));
		return $ret[0]['next'];
	}

}