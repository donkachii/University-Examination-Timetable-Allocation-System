<?php 
namespace classes\Objects;
use classes\Objects\parents\abstractObjectFactory;
include 'parents/abstractObjectFactory.php';
	
	class students extends abstractObjectFactory{
	
		private $_size;
		
		public function __construct(array $f){
			parent::__construct($f['id'],$f['name']);
			$this->_size = $f['size'];
		}
		
		public function getStudentGroupSize(){
			return $this->_size;
		}
		
		public function toString(){
			printf("Student Group Id: %s <br/> Student Group Name: %s <br/>Student Group Size: %s <br/>",$this->_Id,$this->_Name,$this->_size);			
		}
	}
	
?>