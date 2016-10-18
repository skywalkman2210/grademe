<?php

class Database {
	private $dbhost = "localhost";
	private $dbname = "grademe";
	private $dbuser = "root";
	private $dbpass = "";
	private $database;
	
	//private $dsn = ;
	
	public function __construct($dbname) {
		$this->dbname = $dbname;
		$this->database = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
	}
	
	public function query($sql) {
		return $this->database->query($sql);
	}
	
	public function getCourseName($code) {
		$res = $this->database->query("SELECT course.name
									   FROM course
									   WHERE course.code = 'CP111';");
									   
		foreach ($res as $course) {
			return $course['name'];
		}
	}
	
	public function addStudLogin($username, $password, $isTeach) {
		$hashPass = password_hash($password, PASSWORD_DEFAULT);
		
		$stmt = $this->database->prepare("INSERT INTO login (username,password,isTeacher) VALUES (:user, :pass, :isTeach);");
		$stmt->bindParam(":user", $username);
		$stmt->bindParam(":pass", $hashPass);
		$stmt->bindParam(":isTeach", $isTeach);
		$stmt->execute();
	}
	
	public function addStudentRecord($username, $firstName, $lastName, $email, $gender) {
		$result = $this->database->query("SELECT id FROM login WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
		$id = $result[0]['id'];
		
		$stmt = $this->database->prepare("INSERT INTO student (first_name,last_name,email,gender,login_id) VALUES (:first, :last, :email, :gen, :id);");
		$stmt->bindParam(":first", $firstName);
		$stmt->bindParam(":last", $lastName);
		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":gen", $gender);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
	}
	
	public function addTeachLogin($username, $password, $isTeach) {
		$hashPass = password_hash($password, PASSWORD_DEFAULT);
		
		$stmt = $this->database->prepare("INSERT INTO login (username,password,isTeacher) VALUES (:user, :pass, :isTeach);");
		$stmt->bindParam(":user", $username);
		$stmt->bindParam(":pass", $hashPass);
		$stmt->bindParam(":isTeach", $isTeach);
		$stmt->execute();
	}
	
	public function addTeachRecord($username, $firstName, $lastName, $email, $gender) {
		$result = $this->database->query("SELECT id FROM login WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
		$id = $result[0]['id'];
		
		$stmt = $this->database->prepare("INSERT INTO teacher (firstName,lastName,email,gender,login_id) VALUES (:first, :last, :email, :gen, :id);");
		$stmt->bindParam(":first", $firstName);
		$stmt->bindParam(":last", $lastName);
		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":gen", $gender);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
	}
	
	
	public function selectAll($tableName) {
		return $this->database->query("SELECT * FROM $tableName")->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getDatabasePass($username) {
		$result = $this->database->query("SELECT password FROM login WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
		return $result[0]['password'];
	}
	
	public function getTeach($username) {
		echo $username;
		$result = $this->database->query("SELECT isTeacher FROM login WHERE username='$username';")->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($result as $row) {
			if ($row['isTeacher'] == 1) {
				return true;
			}
		}
		
		return false;
	}
	
	public function getFirst($username, $isTeach) {
		if ($isTeach == 1) {
			$id = $this->getUserId($username, $isTeach);
			
			$result = $this->database->query("SELECT teacher.firstName FROM teacher WHERE teacher.id=$id;")->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($result as $name) {
				return $name['firstName'];
			}
		}
		else {
			$id = $this->getUserId($username, $isTeach);
			
			$result = $this->database->query("SELECT student.first_name FROM student WHERE student.id=$id;")->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($result as $name) {
				return $name['first_name'];
			}
		}
	}
	
	public function getLast($username, $isTeach) {
		if ($isTeach == 1) {
			$id = $this->getUserId($username, $isTeach);
			
			$result = $this->database->query("SELECT teacher.lastName FROM teacher WHERE teacher.id=$id;")->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($result as $name) {
				return $name['lastName'];
			}
		}
		else {
			$id = $this->getUserId($username, $isTeach);
			
			$result = $this->database->query("SELECT student.last_name FROM student WHERE student.id=$id;")->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($result as $name) {
				return $name['last_name'];
			}
		}
	}
	
	public function checkUserExists($username) {
		$result = $this->database->query("SELECT username FROM login WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($result as $row)
		{
			if($row['username'] == $username) {
				return true;
			}
		}
		
		return false;
	}
	
	public function getUserId($username, $isTeach) {
		
		if ($isTeach == 1) {
			$result = $this->database->query("SELECT teacher.id FROM teacher
											  JOIN login
											  ON teacher.login_id = login.id
											  WHERE login.username = '$username'
											  GROUP BY login.username;")->fetchALL(PDO::FETCH_ASSOC);
		}
		else {
			$result = $this->database->query("SELECT student.id FROM student
											  JOIN login
											  ON student.login_id = login.id
											  WHERE login.username = '$username'
											  GROUP BY login.username;")->fetchALL(PDO::FETCH_ASSOC);
		}
		
		foreach ($result as $row) {
			return $row['id'];
		}
	}
	
	public function createCourse($data) {
		$exists = false;
		
		$code = $data[0];
		$result = $this->database->query("SELECT course.code FROM course WHERE course.code='$code';");
		
		foreach ($result as $res) {
			print_r($res);
			
			if (count($res) > 0) {
				$exists = true;
			}
			else {
				$exists = false;
			}
		}
		
		if ($exists) {
			return false;
		}
		else {
			$stmt = $this->database->prepare("INSERT INTO course (code, name, term, teacher_id) VALUES (?, ?, ?, ?)");
			$stmt->execute($data);
			return true;
		}
	}
	
	public function getCourses($username) {
		$id = $this->getUserId($username, 1);
		
		return $this->database->query("SELECT * FROM course WHERE teacher_id=$id;");
	}
	
	public function getStudentCourses($username) {
		$id = $this->getUserId($username, 0);
		
		return $this->database->query("SELECT CONCAT(teacher.firstName, ' ', teacher.lastName) AS 'instructor', course.name FROM teacher, student, student_takes_course JOIN course 
										  ON course.code = student_takes_course.course_code WHERE student.id = $id;");
	}
	
	public function getCourseCount($courseCode) {
		$res = $this->database->query("SELECT course.name, COUNT(*) AS 'amtStudents'  FROM student, student_takes_course
								       JOIN course ON course.code = student_takes_course.course_code 
									   WHERE course.code='$courseCode';");
		
		foreach ($res as $re) {
			return $re['amtStudents'];
		}
		
		//return $res[0]['amtStudents'];
	}
	
	public function getStudentNames() {
		return $this->database->query("SELECT CONCAT(first_name, ' ', last_name) AS 'Student', COUNT(course.code) as 'Course'
									   FROM student, student_takes_course
									   JOIN course
									   ON course.code = student_takes_course.course_code
									   WHERE student.id = student_takes_course.student_id
									   GROUP BY student.id;");
	}
	
	public function changePassword($user, $old, $new) {
		//$check = password_verify($old, /*DbPass*/);
		
		
		$data = array($new, $user);
		$result = $this->database->prepare("UPDATE login SET password=? WHERE username=? ;");
		return $result->execute($data);
	}
}