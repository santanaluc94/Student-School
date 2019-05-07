<?php

class Database {

	private $server;
	private $user;
	private $passw;
	private $database;

	public function __construct(){
  		$server = $this->setServer("localhost");
  		$user = $this->setUser("root");
  		$passw = $this->setPassw("");
  		$database = $this->setDatabase("student_school");

	}

	public function getServer(){
		return $this->server;
	}

	public function setServer($server) {
    	$this->server = $server;
  	}

  	public function getUser(){
		return $this->user;
	}

	public function setUser($user) {
    	$this->user = $user;
  	}

  	public function getPassw(){
		return $this->passw;
	}

	public function setPassw($passw) {
    	$this->passw = $passw;
  	}
  	public function getDatabase(){
		return $this->database;
	}

	public function setDatabase($database) {
    	$this->database = $database;
  	}

  	public function connection(){
  		$server = $this->getServer();
		$user = $this->getUser();
		$passw = $this->getPassw(); 
		$database = $this->getDatabase();


		$connect = mysqli_connect($server, $user, $passw, $database);
		
		if (mysqli_connect_errno()){
			echo "Error to connect:" . mysqli_connect_error();
		}
		
		return $connect;
	}
}