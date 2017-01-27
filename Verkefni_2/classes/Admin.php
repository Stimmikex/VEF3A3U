<?php
	/*
	 * Admin
	 */
	 class Admin
	 {
	 	protected $admin = [];
	 	
	 	function __construct($admin = [])
	 	{
	 		$this->admin = $admin;
	 	}

	 	public function add(User $user){
	 		$this->admin[] = $user;
	 	}
	 	public function admin(){
	 		return $this->admin;
	 	}
	 } 
?>