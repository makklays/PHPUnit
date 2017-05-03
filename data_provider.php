<?php
/**
 * (c) Kuziv A.V. <makklays@gmail.com>
 */

// Для тестирования ф-ции с разными наборами данных используем data-provider из PHPUnit
// Использования dataProvider позволяет избежать дублирования кода при тестиорвании одной и той же ф-ции 
// с разными наборами данных

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

/*
* Пример модульного тестрования
*/
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
	
	// должен быть public
	public function aplusbDataProvider() {
		return array(
			array(1,1,2),
			array(2,1,3),
			array(0,0,0),
			array(-1,-1,-2),
		);
	}

	// метод для тестрования метода aplusb()
	// используем аннотацию @dataProvider для указания, что в качестве dataProvider 
	// используется метод aplusbDataProvider 
	/**
	 * @dataProvider aplusbDataProvider
	 */
	public function testAplusb($a, $b, $exp){
		$result = $this->obj->aplusb($a, $b);	
		$this->assertEquals($exp,$result);
	}
}

?>
