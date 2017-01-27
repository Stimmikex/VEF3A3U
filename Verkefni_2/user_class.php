<?php
	/**
	 * USER
	 * Styrmir Óli Þorsteinsson
	 */
	 class User
	 {
	 	private $email;
	 	private $password;

	 	public function setEmail($email) {
	 		$this->email = $email;
	 	}
	 	public function getEmail() {
	 		return $this->email;
	 	}

	 	public function setPassword($password) {
 			$this->password = $password;
 		}
 		public function getPassword() {
 			return $this->password;
 		}

	 	function __construct(array($password, $email)) {
	 		#pretty
	 	}
	 } 
?>