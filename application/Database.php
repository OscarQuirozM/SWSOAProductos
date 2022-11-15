<?php

/*
 * -------------------------------------
 * Database.php
 * -------------------------------------
 */

class Database
{
    private static $conexion;
	
	public function __construct() {
		//parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		include_once BASE_ROOT.'application/config.php';
		include_once BASE_ROOT.'libs/adodb5/adodb.inc.php';
		
		
		//self::$conexion = ADONewConnection('oci8');
		self::$conexion = ADONewConnection('mysqli');
		
		self::$conexion -> Connect(DB_HOST1,DB_USER1,DB_PASS1,DB_NAME1);				 
	}
	
	public static function abrir_conexion(){
		if(!isset(self::$conexion)){
			try{
	
				include_once BASE_ROOT.'application/config.php';
				include_once BASE_ROOT.'libs/adodb5/adodb.inc.php';
	
				//self::$conexion = ADONewConnection('oci8');
				self::$conexion = ADONewConnection('mysqli');

				self::$conexion -> Connect(DB_HOST1,DB_USER1,DB_PASS1,DB_NAME1);
		
			} catch (Exception $ex) {
				print "ERROR: ".$ex -> getMessage(). "<br>";
				die();
			}
		}
	
	}

	public static function cerrar_conexion() {
		if(isset(self::$conexion)){
			self::$conexion = null;
			 
			//print "CONEXION CERRADA"."<br>";
		}
	}
	
	public static function obtener_conexion() {
		return self::$conexion;
	}

	/*
	 * $query:  query de la consulta
	 * $pagina:  # de pagina a  mostrar
	 * $limite:  # de registros por pagina
	 */

	
}

?>
