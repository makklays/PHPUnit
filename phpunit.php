<?php
/**
 * (c) Kuziv A.V. <makklays@gmail.com>
 **/

require_once '../vendor/autoload.php';
use \PHPUnit\Framework\TestCase;

class Sum
{
	function aplusb($a, $b){
		return ( $a + $b );
	}
}

$sum = new Sum();
$ab = $sum->aplusb(1,1);
//echo $a;

/**
 * Пример модульного тестрования
 **/
class SumTest extends PHPUnit_Framework_TestCase
{
	private $obj;
	// это метод, который вызывается перед каждым тестом
	protected function setUp(){
		$this->obj = new Sum();
	}
	// это метод, который вызывается после каждого теста
	protected function tearDown(){
		$this->obj = NULL;
	}
	// метод для тестрования метода aplusb()
	public function testAplusb(){
		$result = $this->obj->aplusb(1,1);	
		$this->assertEquals(2,$result);
	}
}

?>
