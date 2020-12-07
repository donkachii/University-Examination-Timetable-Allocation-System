<?php
namespace classes\Objects;
use classes\Objects\parents\abstractObjectFactory;
include 'parents/abstractObjectFactory.php';
/**
 * Venue class contains the venue type as lab or lecture room. it also contains attribute size for the capacity of the venue.
 */
class venue extends abstractObjectFactory
{
	private $_type;
	private $_size;
	
	public function __construct(array $v){
		parent::__construct($v['id'], $v['name']);
		$this->_type = $v['type'];
		$this->_size = $v['size'];
	}
	public function getSize(){
		//return the size of the venue
		return $this->_size;
	}
	public function getType()
	{
		// return the room type
		return $this->_type;
	}

	public function toDisplay()
	{
		//Display venue details
		printf('<table style="border: 1px solid black;" ><th><tr><td style="border: 1px solid black;"> Venue Id: %s </td><td style="border: 1px solid black;"> Venue Name: %s </td><td style="border: 1px solid black;"> Venue type : %s </td><td style="border: 1px solid black;"> Venue size : %s </td><tr></th></table>', $this->_Id, $this->_Name,$this->_type,$this->_size, );
	}
}

$ven1 = [
'id'=>1,
'name'=>'EOO6',
'type'=>'Lecture Room',
'size'=> 45 ];
$ven = new venue($ven1);
$ven->toDisplay();

?> 