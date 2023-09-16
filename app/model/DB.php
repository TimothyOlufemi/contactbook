<?php
	
	class Dbh {
		
		private $servername;
		private $username;
		private $password;
		private $dbname;

		public function connect(){
			$this->servername = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "phonebook";

			$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

			return $conn;

		}

		public function select($table, $arg){
			$sql = "SELECT * FROM `$table` $arg";
			$result = $this->connect()->query($sql);
			$numRows = $result->num_rows;
			if ($numRows > 0) {
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}else{}
		}

		public function insert($table, $columns, $values){
			$new = "INSERT INTO `$table`($columns) VALUES ($values)";
			$result = $this->connect()->query($new);
			return $result;
		}
		

		public function update($table, $values, $arg = null){
			$sql = "UPDATE `$table` SET $values";
			if (!empty($arg)) {
				$sql = $sql.' WHERE '. $arg;
			}
			$result = $this->connect()->query($sql);
			return $result;
		}

		public function delete($table, $arg){
			$sql = "DELETE FROM `$table` $arg";
			return $this->connect()->query($sql);
		}

		public function count($table, $arg = null){
			$sql = "SELECT * FROM `$table`";
			if (!empty($arg)) {
				$sql = $sql . ' WHERE '. $arg;
			}
			$result = $this->connect()->query($sql);
			$NumRows = $result->num_rows;
			return $NumRows;

		}

		public function newgroup($group_name){
			$sql1 = "INSERT INTO `stored_groups`(`group_name`) VALUES ('$group_name')";
			$sql2 = "CREATE TABLE `phonebook`.`grp_$group_name` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `cnt_id` VARCHAR(100) NOT NULL , `cnt_fullname` VARCHAR(100) NOT NULL , `cnt_email` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
			$query1 = $this->connect()->query($sql1);
			$query2 = $this->connect()->query($sql2);
			return $query1;
			return $query2;
		}

		public function fetchgroup(){
			$fetchsql = "SELECT * FROM `stored_groups`";
			$result = $this->connect()->query($fetchsql);
			$numRows = $result->num_rows;
			if ($numRows > 0) {
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}
		}

		public function searchContact($arg){
			$sql = "SELECT * FROM `stored_contacts` WHERE $arg";
			$query = $this->connect()->query($sql);
			return $query;
		}

		public function deletegroup($groupName){
			$sql = "DROP TABLE `$groupName`";
			$query = $this->connect()->query($sql);
			$groupName = str_replace("grp_", "", $groupName);
			$sql2 = "DELETE FROM `stored_groups` WHERE `stored_groups`.`group_name` = '$groupName'";
			$query2 = $this->connect()->query($sql2);
			return $query;
			return $query2;
		}
		
		public function updategroup($groupName, $newGroupName){
			$sql = "RENAME TABLE `phonebook`.`$groupName` TO `phonebook`.`$newGroupName`";
			$query = $this->connect()->query($sql);
			$groupName = str_replace("grp_", "", $groupName);
			$newGroupName = str_replace("grp_", "", $newGroupName);
			$sql2 = "UPDATE `stored_groups` SET `group_name` = '$newGroupName' WHERE `stored_groups`.`group_name` = '$groupName'";
			$query2 = $this->connecT()->query($sql2);
			return $query;
		}


// END OF Dbh
}



?>