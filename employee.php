<?php
class Employee {
	private $id;
	private $Nombre;
	private $Apellido;
	private $Correo;

	function __get($property) {
		return $this->$property;
	}

	function __set($property, $value) {
		return $this->$property = $value;
	}
}
?>