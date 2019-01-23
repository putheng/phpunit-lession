<?php

use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandsException;

class AdditionTest extends \PHPUnit\Framework\TestCase
{
	public function test_adds_up_given_operands()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10]);

		$this->assertEquals(15, $addition->calculate());
	}

	public function test_no_operands_give_throw_exception_when_calculating()
	{
		$this->expectException(NoOperandsException::class);

		$addition = new Addition;
		$addition->calculate();
	}
}