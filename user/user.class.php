<?php

class User {
		public $first_name;
		public $last_name;
		public $name;
		private $pass;
		
		public function createNewUser($username, $firstName, $lastName) {
			$this->name = $username;
			$this->first_name = $firstName;
			$this->last_name = $lastName;
		}
		
		public function login($username, $password) {
			$this->name = $username;
			$this->pass = $password;
		}
		
		public function getPass() {
			$passConn = new Database("grademe");
			return $passConn->getDatabasePass($this->name);
		}
		
		
		public function getFirstName() {
			$passConn = new Database("grademe");
			return $passConn->getFirst($this->name, $_SESSION['isTeach']); 
		}
		
		public function getLastName() {
			$passConn = new Database("grademe");
			return $passConn->getLast($this->name, $_SESSION['isTeach']); 
		}
		
		public function getTeachStatus() {
			$passConn = new Database("grademe");
			$isTeach = $passConn->getTeach($this->name); 
			return $isTeach;
		}
		
		public function verifyLogin() {
			$username = $this->name;
			$password = $this->pass;
			
			$isUser = true;
			$isPassCorrect = false;
			
			$dbConn = new Database("grademe");
			//$isUser = $dbConn->checkUserExists($username);
			
			if ($isUser) {
				//VERIFY PASSWORD
				$isPassCorrect = password_verify($password, $this->getPass());
				
				if ($isPassCorrect) {
					$_SESSION['username'] = $username;
					$_SESSION['isTeach'] = $this->getTeachStatus();
					$_SESSION['first_name'] = $this->getFirstName();
					$_SESSION['last_name']= $this->getLastName();
					
					echo print_r($_SESSION);
					
					header("Location: ../");
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		
		public function logout() {
			SESSION_UNSET();
			SESSION_DESTROY();
		}
	}
