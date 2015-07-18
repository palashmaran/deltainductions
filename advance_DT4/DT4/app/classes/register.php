<?php

class Database{
 
 private $db;

 public function __construct($database){
  
   $this->db=$database;

}

 
public function check_db_connection($name) {
 
	
	

 
	$query 	= $this->db->prepare("INSERT INTO `test` (`success`) VALUES (?) ");
 
	$query->bindValue(1, $name);
	$success="Successful";


	try{
		$query->execute();
              return $success;
       
	
	}catch(PDOException $e){
		die($e->getMessage());
	}	

 
}
         public function getrowCount($sql)
		  {
		     $query = $this->db->prepare($sql);
			try{
				$query->execute();
				 return $query->rowCount(); 	  
			   
			
			}catch(PDOException $e){
				die($e->getMessage());
			}	
              
		  }
		  public function fetch_records($sql)
		  {
		     $query = $this->db->prepare($sql);
			try{
				$query->execute();
				 return $query; 	  
			   
			
			}catch(PDOException $e){
				die($e->getMessage());
			}	
              
		  }

    	 
		 public function insert_record($uid,$rollno,$name,$dept,$yos,$email,$password,$profile_pic)
		 {     
		    	$sql="insert into register(uid,rollno,name,department,year_of_study,email,password,profile_pic_path) values(?,?,?,?,?,?,?,?)";
		        
				$query 	= $this->db->prepare($sql);
				$query->bindValue(1,$uid);
				$query->bindValue(2,$rollno);
				$query->bindValue(3,$name);
				$query->bindValue(4,$dept);
				$query->bindValue(5,$yos);
				$query->bindValue(6,$email);
				$query->bindValue(7,$password);
				$query->bindValue(8,$profile_pic);
                
             
			try{
				$query->execute();
					  
			   
			
			}catch(PDOException $e){
				die($e->getMessage());
			}	

		}

};
?>
