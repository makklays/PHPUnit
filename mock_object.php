<?php
/**
 * (с) Kuziv A. <makklays@gmail.com>
 */

require_once '../vendor/autoload.php';
use \PHPUnit\Framework\TestCase;

class Sum
{
	function aplusb($a, $b){
		return (int)( $a + $b );
	}
}

$sum = new Sum();
$ab = $sum->aplusb(1,1);

/**
 * Пример тестрования c mock_object
 */
class SumTest extends PHPUnit_Framework_TestCase
{
	// getMockBuilder() метод создает заглушку, похожую на объект нашего класса Sum.
  // getMock() возвращает объект этой заглушки (Mock Object).
  // expects() говорит, что mock object будет вызываться любое число раз.
  // method() определяет, какой метод будет вызван.
  // will() настраивает возвращаемое значение в mock object.

	public function testWithMock()
	{
    	// Создание Mock Object-а для класа Sum.
    	$sum = $this->getMockBuilder('Sum')
                 	->getMock();

    	// Настройка mock object-а.
    	$sum->expects($this->any())
          ->method('aplusb')
          ->will($this->returnValue(6));

    	$this->assertEquals(6, $sum->aplusb(100,100));
	}
}

// для проверки запускаем из cmd (windows)
// (полный_путь)\vendor\bin\phpunit (полный_путь)\phpunit_mock.php

?>
