<?php

namespace classes\Objects\parents;

abstract class abstractObjectFactory{

	protected $_Id; // object Id.
	protected $_Name; //onject name.

	public function __construct($id, $name){
		$this->_Id = $id;
		$this->_Name = $name;
	}

	public function getId()
	{
		return $this->_Id;

	}
	public function getName()
	{
		return $this->_Name;
		
	}
}


?>