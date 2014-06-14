<?php
if (!isset($_SESSION)) {
  session_start();
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . DS);
error_reporting(1);
include APP_PATH."/config.php";

abstract class Config
{

	//Attribute is defined as Array, returns system settings
	protected $dbh; //DB System
	/**
	* Connect to the database
	* Returns valid data Connection
	* 
	* @access protected
	*/
	protected function connectDataBase()
	{
		$IncArray = $this->configArray = ConfigSQL::configDB();
				
        try {
        	$dbConnect =  $this->dbh = new PDO('mysql:host='.$IncArray["servidor"].';
											dbname='.$IncArray["basedato"].'', 
											$IncArray["usuario"], 
											$IncArray["clave"]);
			$dbConnect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnect;
        } 
		catch (PDOException $e){	
           //die ("Error");
        }
	}
	
	
	
	/**
	* Get IP
	* Return IP Browser
	* 
	* @access protected
	*/
	protected function getIP()
	{
		
		if (isset($_SERVER)) {
			if (isset($_SERVER["HTTP_CLIENT_IP"])) {
					
				return $_SERVER["HTTP_CLIENT_IP"];	
			} 
			elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {			
				return $_SERVER["HTTP_X_FORWARDED_FOR"];		
			} 
			elseif(isset($_SERVER["HTTP_X_FORWARDED"])) {		
				return $_SERVER["HTTP_X_FORWARDED"];		
			} 
			elseif(isset($_SERVER["HTTP_FORWARDED_FOR"])) {		
				return $_SERVER["HTTP_FORWARDED_FOR"];	
			} 
			elseif(isset($_SERVER["HTTP_FORWARDED"])) {						
				return $_SERVER["HTTP_FORWARDED"];	
			} else {		
				return $_SERVER["REMOTE_ADDR"];
			}
		} else {	
			return $_SERVER["REMOTE_ADDR"];	
		}
	}

}


class Apps extends Config
{
	private $_db;
	private $email;
	private $emailRapido;
	private $_getInicio;
	private $_getViolinista;
	private $_videos;
	private $_videoDelDia;

	
	/**
	* Initializes all attributes
	* 
	* @access public
	*/
	public function __construct()
	{
		$this->_db				= parent::connectDataBase();
		$this->email;
		$this->emailRapido;
		$this->_getInicio 		= array();
		$this->_getViolinista 	= array();
		$this->_videos 			= array();
		$this->_videoDelDia 	= array();
	}
	
	
	/**
	* Control de sesion para los correos
	*/
	public function controlSession(){
		
		$tiempo 	= time();
		$temporal 	= "20";
		
		return $tiempo + $temporal;
	}	
	
	
	/**
	* Envia correo completo Formulario
	*/
	public function emailCompleto()
	{
		//Correo a donde llegara este email
		$to = 'Gilberto Reyes <info@violinistagilbertoreyes.com>';
		
		//Asunto: Se muestra en la bandeja de entrada
		$subject = 'Mensaje desde www.violinistagilbertoreyes.com';
		
		//Contenido del email
			  $body = '
					<div style="margin:0 auto; padding:10px; border:6px solid #EEE; width:600px; background:#FBFBFB; font-family:Tahoma, Geneva, sans-serif; font-size:12px;">
						<div style="">
							<h2>Mensaje de: '.$_POST["nombres"].'</h2>
							<p><strong>Enviado el: </strong>'.date("d/m/Y").'</p>
							<p><strong>Email:</strong> '.$_POST["email"].'</p>
							<p><strong>Telefono:</strong> '.$_POST["telefono"].'</p>
							<p><strong>Celular:</strong> '.$_POST["celular"].'</p>
							<p><strong>Fecha:</strong> '.$_POST["fecha"].'</p>
							<p><strong>Hora de Inicio:</strong> '.$_POST["horastart"].'</p>
							<p><strong>Hora de finalizacion:</strong> '.$_POST["horaend"].'</p>
							<p><strong>Ciudad:</strong> '.$_POST["ciudad"].'</p>
							<p><strong>Mensaje:</strong> '.nl2br($_POST["direccion"]).'</p>
							<p><strong>IP: </strong>'.$_SERVER['REMOTE_ADDR'].'</p>
							<p><strong>Navegador: </strong>'.$_SERVER['HTTP_USER_AGENT'].'</p>
					  </div>
					</div>
			  ';
		
		
		//Desde donde se envia este email
		$headers = "From: ".$_POST["email"]."\r\n";
		
		//Enviar a otros de forma oculta CCO
		$headers .= 'Cc: violinistagilbertoreyes@gmail.com' . "\r\n"; //Se muestra en el correo del usuario
		//$headers .= 'Bcc:  maurox1987@gmail.com' . "\r\n"; //No se muestra en el correo del usuario
		
		//Responder a est correo
		$headers .= "Reply-To: ".$_POST["nombres"]." <".$_POST["email"].">" . "\r\n";
		
		//El tipo de documento
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		

		//Funcion para adjuntar todo y enviarlo
		$success = mail($to, $subject, $body, $headers);
		$_SESSION["enviado"] = self::controlSession();
		//header("Location: index.php?");
	}
	
	
	
	
	/**
	* Envia correo Formulario Rápido
	*/
	public function emailRapido()
	{
		//Correo a donde llegara este email
		$to = 'Gilberto Reyes <info@violinistagilbertoreyes.com>';
		
		//Asunto: Se muestra en la bandeja de entrada
		$subject = 'Mensaje desde www.violinistagilbertoreyes.com';
		
		//Contenido del email
			  $body = '
					<div style="margin:0 auto; padding:10px; border:6px solid #EEE; width:600px; background:#FBFBFB; font-family:Tahoma, Geneva, sans-serif; font-size:12px;">
						<div style="">
							<h2>Mensaje de: '.$_POST["nombres"].'</h2>
							<p><strong>Enviado el: </strong>'.date("d/m/Y").'</p>
							<p><strong>Email:</strong> '.$_POST["email"].'</p>
							<p><strong>Telefono:</strong> '.$_POST["telefono"].'</p>
							<p><strong>Mensaje:</strong> '.nl2br($_POST["direccion"]).'</p>
							<p><strong>IP: </strong>'.$_SERVER['REMOTE_ADDR'].'</p>
							<p><strong>Navegador: </strong>'.$_SERVER['HTTP_USER_AGENT'].'</p>
					  </div>
					</div>
			  ';
		
		
		//Desde donde se envia este email
		$headers = "From: ".$_POST["email"]."\r\n";
		
		//Enviar a otros de forma oculta CCO
		$headers .= 'Cc: violinistagilbertoreyes@gmail.com' . "\r\n"; //Se muestra en el correo del usuario
		//$headers .= 'Bcc:  maurox1987@gmail.com' . "\r\n"; //No se muestra en el correo del usuario
		
		//Responder a est correo
		$headers .= "Reply-To: ".$_POST["nombres"]." <".$_POST["email"].">" . "\r\n";
		
		//El tipo de documento
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		

		//Funcion para adjuntar todo y enviarlo
		$success = mail($to, $subject, $body, $headers);
		$_SESSION["enviado"] = self::controlSession();
		//header("Location: index.php?");
	}

	
	
	/**
	* Corrige errores de los acentos
	* 
	* @access private
	*/
	static public function acentos($str)
	{
		$procesa = array(
						'�' => '&aacute;',
						'�' => '&eacute;',
						'�' => '&iacute;',
						'�' => '&oacute;',
						'�' => '&uacute;',
						'�' => '&ntilde;',
						'�' => '&Ntilde;',
						'�' => '&auml;',
						'�' => '&euml;',
						'�' => '&iuml;',
						'�' => '&ouml;',
						'�' => '&uuml;',
						'á' => '&aacute;', 
						'é' => '&eacute;', 
						'í' => '&iacute;', 
						'ó' => '&oacute;', 
						'ú' => '&uacute;',
						'Á' => '&aacute;', 
						'É' => '&eacute;', 
						'Í' => '&iacute;', 
						'Ó' => '&oacute;', 
						'Ú' => '&uacute;', 
						'ñ' => '&ntilde;',
						'Ñ' => '&Ntilde;', 
						'ä' => '&auml;', 
						'ë' => '&euml;',
						'ï' => '&iuml;', 
						'ö' => '&ouml;', 
						'ü' => '&uuml;'); 
		return strtr( $str , $procesa );
		 
		 
	}
	
	
	/**
	* Modo de ocnsulta
	* 
	* @access public 
	*/
	private function acentosQuery()
    {
        return $this->dbh->query("SET NAMES 'utf8'");    
    }
	
	

	/**
	* Muestra informacion del inicio
	*/
	public function getInicio($id)
	{
		Apps::acentosQuery();
		$sql = "SELECT * FROM inicio WHERE id =? ;";
		$sqlQuery = $this->_db->prepare($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		if($sqlQuery->execute( array( $id ) )){
	
			while($row = $sqlQuery->fetch()){
	
				$this->_getInicio[] = $row;
			}
		}
		return $this->_getInicio;
	}



	/**
	* Muestra informacion del Violinista
	*/
	public function getViolinista($id)
	{
		Apps::acentosQuery();
		$sql = "SELECT * FROM violinista WHERE id =? ;";
		$sqlQuery = $this->_db->prepare($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		if($sqlQuery->execute( array( $id ) )){
	
			while($row = $sqlQuery->fetch()){
	
				$this->_getViolinista[] = $row;
			}
		}
		return $this->_getViolinista;
	}
	
	
	
	
	/*
	* Muestra todos los videos
	*/
	public function getVideos()
	{
		Apps::acentosQuery();
		$sql = "SELECT * FROM videos ORDER BY id DESC";
		$sqlQuery = $this->_db->query($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		foreach($sqlQuery as $row){
			$this->_videos[]=$row;	
		}
		return $this->_videos;
	}
	
	
	
	/*
	* Muestra el video del dia
	*/
	public function getVideoDelDia()
	{
		Apps::acentosQuery();
		$sql = "SELECT * FROM videos ORDER BY id DESC LIMIT 0,1";
		$sqlQuery = $this->_db->query($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		foreach($sqlQuery as $row){
			$this->_videoDelDia[]=$row;	
		}
		return $this->_videoDelDia;
	}







}

$instancia = new Apps();



































?>