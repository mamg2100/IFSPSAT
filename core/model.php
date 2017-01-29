<?php 
class model{
	protected $db;
	public function __construct(){
		$this->db = new PDO("mysql:host=localhost;dbname=tcc","root","");
	}
}