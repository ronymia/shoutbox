<?php
	include_once "/../lib/Database.php";

	/**
	 * shout box
	 */
	class Shout{
		private $db;
		public function __construct(){
			$this->db = new Database();
		}

		public function getAllData(){
			$query = "SELECT * FROM tbl_box ORDER BY id ASC";
			$result = $this->db->select($query);
			return $result;
		}
		public function inserData($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$body = mysqli_real_escape_string($this->db->link, $data['body']);

			$time1 = date('h:i:s ', time() - date('Asia/Dhaka')); // 12:50:29
			

			$query = "INSERT INTO tbl_box(name, body, tim) VALUES('$name', '$body', '$time1')";

			$this->db->insert($query);
			header("Location:index.php");
		}
		
	}
?>