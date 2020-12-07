<?php
namespace classes\Objects;
use classes\Objects\parents\abstractObjectFactory;
include 'parents/abstractObjectFactory.php';
class course {		
	
	private $_super;
	private $_duration;
	private $_student_group;		
	private $_course_code;
	private $_type;
	private $_venue;
	
	public function __construct(array $c){
		parent::__construct($c['id'],$c['name']);			
		$this->_super = $c['super'];
		$this->_course_code = $c['code'];
		$this->_duration = $c['duration'];
		$this->_student_group = $c['group'];			
		$this->_type = $c['type'];			
	}
	
	public function getSuper(){
		return $this->_super;
	}
	
	public function setSuper($p){
		$this->_super = $p;
	}

	public function getCourseCode(){
		return $this->_course_code;
	}
	
	public function getDuration(){
		return (int)$this->_duration;
	}
	
	public function getStudentGroup(){
		return $this->_student_group;
	}
	
	public function getType(){
		return $this->_type;
	}	
	
	public function setVenue($r){
		$this->_venue = $r;
	}
	
	public function getVenue(){
		return $this->_venue;
	}
	
	public function toDisplay(){
		printf("Super: %s <br/> Course Name: %s <br/> Class Duration: %s Hours <br/>  Student Group: %s",
										$this->_super,$this->_course_code,$this->_duration,$this->_student_group);			
	}
}
?>



?>