<?php 
namespace classes\Objects;
use classes\Objects\parents\abstractObjectFactory;
include 'parents/abstractObjectFactory.php';
	
	class lecturer extends abstractObjectFactory{
	
		public function __construct(array $f){
			parent::__construct($f['id'],$f['name']);
		}
		
		public function toString(){
			printf("SuperVisor Id: %s <br/> Supervisor Name: %s <br/>",$this->_Id,$this->_Name);			
		}
	}
	
?>