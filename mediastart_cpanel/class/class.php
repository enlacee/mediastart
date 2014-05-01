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
           die ("Error");
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
	private $_accesoUsuario;
	private $_getInfoEditarUser;
	private $_hasSendResetearClave;


	
	/**
	* Initializes all attributes
	* 
	* @access public
	*/
	public function __construct()
	{
		$this->_db						= parent::connectDataBase();
		$this->_accesoUsuario 			= array();
		$this->_getInfoEditarUser 		= array();
		$this->_hasSendResetearClave 	= array();
		
	}

	
	
	/**
	* Corrige errores de los acentos
	* 
	* @access private
	*/
	private function acentos($str)
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
		$procesa = strtr( $str , $procesa );
		 return $procesa;
		 
	}
	
	
	/**
	* Modo de ocnsulta
	*/
	private function acentosQuery()
    {
        return $this->dbh->query("SET NAMES 'utf8'");    
    }
	
	
	/**
	* Acceso de usuario
	*/
	public function accesoUsuario($username,$pass)
	{
		self::acentosQuery();
		$sql = "SELECT username FROM user WHERE username= ? ;";
	
		$sqlQuery = $this->_db->prepare($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		if($sqlQuery->execute( array( $username ) )){
	
			while($row = $sqlQuery->fetch()){
	
				$resultadoUser = $this->_accesoUsuario[] = $row;
			}
			
			if (count($resultadoUser) > 0) {
				
				$sql = "SELECT pass FROM user WHERE pass= ? ";
				$sqlQuery = $this->_db->prepare($sql);
				$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
			

				if($sqlQuery->execute( array( $pass ) )){
			
					while($row = $sqlQuery->fetch()){
			
						$resultadoPass = $this->_accesoUsuario[] = $row;
					}
					
					if (count($resultadoPass) > 0) {
						
						$sql = "SELECT username,pass FROM user WHERE username= ? AND pass= ? ;";
						$sqlQuery = $this->_db->prepare($sql);
						$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
					
						if($sqlQuery->execute( array( $username, $pass ) )){
					
							while($row = $sqlQuery->fetch()){
					
								$resultadoAll = $this->_accesoUsuario[] = $row;
							}
							
							if (count($resultadoAll) > 0) {
								
								$_SESSION["usuario"] = $username;
								return header("Location: admin.php"); 
								
							} else{
								return header("Location: index.php?info=3");
							}
						}						
					}else{
						return header("Location: index.php?pass=1");	
					}
				}
			} else{
				
				return header("Location: index.php?user=0");	
			}
		}
	}
	
	
	
	
	
	
	/**
	* Muestra informacion de usuario para editar
	*/
	public function getInfoEditarUser($session)
	{
		$sql = "SELECT * FROM user WHERE username =? ;";
	
		$sqlQuery = $this->_db->prepare($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		if($sqlQuery->execute( array( $session ) )){
	
			while($row = $sqlQuery->fetch()){
	
				$this->_getInfoEditarUser[] = $row;
			}
			return $this->_getInfoEditarUser;
		}
	}
	
	
	/**
	* Edita informacion de usuario
	*/
	public function setInfoEditarUser($session,$nombre,$username,$pass,$email){
		
		if(empty($_POST["clave"])){
			
			$sql = "UPDATE 
						user 
					SET 
						nombre=:nombre, username=:username, email=:email 
					WHERE 
						username =:userSession";
						
			$sqlQuery = $this->_db->prepare($sql);
			
			$sqlQuery->bindValue(":userSession",$session,	PDO::PARAM_STR);
			$sqlQuery->bindValue(":nombre",		$nombre,	PDO::PARAM_STR);
			$sqlQuery->bindValue(":username",	$username,	PDO::PARAM_STR);
			$sqlQuery->bindValue(":email",		$email,		PDO::PARAM_STR);
			$sqlQuery->execute();
			
			unset($_SESSION["usuario"]);
			$_SESSION["usuario"] = $username;
			header("Location: mi-cuenta.php");
			
		} else{
			
			$sql = "UPDATE 
						user 
					SET 
						nombre=:nombre, username=:username, pass=:pass, email=:email  
					WHERE 
						username =:userSession";
			$sqlQuery = $this->_db->prepare($sql);
			
			$sqlQuery->bindValue(":userSession",$session,	PDO::PARAM_STR);
			$sqlQuery->bindValue(":nombre",		$nombre,	PDO::PARAM_STR);
			$sqlQuery->bindValue(":username",	$username,	PDO::PARAM_STR);
			$sqlQuery->bindValue(":pass",		$pass,		PDO::PARAM_STR);
			$sqlQuery->bindValue(":email",		$email,		PDO::PARAM_STR);
			$sqlQuery->execute();
			
			unset($_SESSION["usuario"]);
			$_SESSION["usuario"] = $username;
			header("Location: mi-cuenta.php");
			
		}
	}
	
	
	
	




	
	
	/**
	* Obtiene informacion para resetear contraseña
	*/
	public function hasSendResetearClave($email)
	{
		$sql = "SELECT email FROM user WHERE email =? ;";
		$sqlQuery = $this->_db->prepare($sql);
		$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
	
		if($sqlQuery->execute( array( $email ) )){
	
			while($row = $sqlQuery->fetch()){
	
				$verificaEmail = $this->_hasSendResetearClave[] = $row;
			}
			
				if(count($verificaEmail) > 0){
					
					$sql = "SELECT * FROM user WHERE email =? ;";
					$sqlQuery = $this->_db->prepare($sql);
					$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
				
					if($sqlQuery->execute( array( $email ) )){
				
						while($row = $sqlQuery->fetch()){
				
							$this->_getRecords[] = $row;
						}
						
						$nombre		= $this->_getRecords[0]["nombre"];
						$clave 		= $this->_getRecords[0]["pass"];
						$emailConf 	= $this->_getRecords[0]["email"];
						
							//Correo a donde llegara este email
							$to = $nombre.'<'.$emailConf.'>';
							//Asunto: Se muestra en la bandeja de entrada
							$subject = 'Solicitud para resetear su clave de acceso';
							//Contenido del email
							$body = '
							<p>Estimado '.$nombre.',</p>
							<p>Hemos recibido su solicitud para resetear su clave. Si usted no realizo esta peticion por favor omita este mensaje y comuniquelo a contacto@tb.com.ve</p>
							<p>Haga <a href="'.$_SERVER["SERVER_NAME"].'/mypanel/index.php?reset='.$clave.'&emailclavegenerada='.$emailConf.'">Clic Aqui</a> para resetear su clave de acceso.</p>
							<p><strong>IP: </strong>'.$_SERVER['REMOTE_ADDR'].'</p>
							<p><strong>Navegador: </strong>'.$_SERVER['HTTP_USER_AGENT'].'</p>
							<p><strong>Fecha: </strong>'.date("d/m/Y").'</p>
							';
							//Desde donde se envia este email
							$headers = 'From: '.$emailConf;
							//Responder a est correo
							$headers .= " <noresponder@noresponder.com>" . "\r\n";
							//El tipo de documento
							$headers  .= 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							//Funcion para adjuntar todo y enviarlo
							$success = mail($to, $subject, $body, $headers);
							
							return header("Location: index.php?email=5");
					}
					
				}else{
					return header("Location: index.php?email=4");	 
				}
		}
	}
	
	
	
	/*
	*	Edita informacion de la solicitud para resetear contraseña
	*/
	public function updateUserResetPass($email){
	
		$key 			= rand("0000000",9999999);
		$keyEncriptada 	= md5($key);
	
		$sql = "UPDATE 
					user 
				SET 
					pass=:pass
				WHERE 
					email =:email";
		$sqlQuery = $this->_db->prepare($sql);

		$sqlQuery->bindValue(":pass",	$keyEncriptada,	PDO::PARAM_STR);
		$sqlQuery->bindValue(":email",	$email,			PDO::PARAM_STR);
		$sqlQuery->execute();
		
			//Envia el email con la informacion
			$sql = "SELECT * FROM user WHERE email =? ;";
			$sqlQuery = $this->_db->prepare($sql);
			$sqlQuery->setFetchMode(PDO::FETCH_ASSOC);
			
				if($sqlQuery->execute( array( $email ) )){
				
					while($row = $sqlQuery->fetch()){
				
						$this->_getRecords[] = $row;
					}
					
					$nombre		= $this->_getRecords[0]["nombre"];
					$emailConf 	= $this->_getRecords[0]["email"];
					
						//Correo a donde llegara este email
						$to = $nombre.'<'.$emailConf.'>';
						//Asunto: Se muestra en la bandeja de entrada
						$subject = 'Su nueva clave se genero correctamente.';
						//Contenido del email
						$body = '
						<p>Estimado '.$nombre.',</p>
						<p>Su clave se genero correctamente, ahora puede ingresar a su cuenta y cambiarla.</p>
						<p><strong>Su nueva clave es:</strong> '.$key.'</p>
						<p><i>Muchas Gracias.</i></p>
						';
						//Desde donde se envia este email
						$headers = 'From: '.$emailConf;
						//Responder a est correo
						$headers .= " <noresponder@noresponder.com>" . "\r\n";
						//El tipo de documento
						$headers  .= 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						//Funcion para adjuntar todo y enviarlo
						$success = mail($to, $subject, $body, $headers);
						
						return header("Location: index.php?nuevaClave=6");
				}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}

$instancia = new Apps();



































?>