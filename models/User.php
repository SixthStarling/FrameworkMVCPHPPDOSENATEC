<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class User
{
	
	private $id_usuario_PK;
	private $id_estado_FK;
	private $id_rol_FK;
	private $nombre_usuario;
	private $correo;
	private $clave;
	private $pdo;


	public function __construct()
	{
    	try {
    		$this->pdo = new Database;
    	} catch (PDOException $e) {
    		die($e->getMessage());
    	}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM usuario";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
    // peticion request
	public function newUser($data)
	{
		try {			
			// PARA EL ESTADO
			$data['id_estado_FK'] = 1;
			// metodo generico 
			$this->pdo->insert('usuario',$data);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}



}

 ?>