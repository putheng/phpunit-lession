<?php

use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandsException;

class DivisionTest extends \PHPUnit\Framework\TestCase
{
	public function test_divides_given_operands()
	{
		$division = new Division;
		$division->setOperands([100, 2]);

		$this->assertEquals(50, $division->calculate());
	}

	public function test_no_operands_give_throw_exception_when_calculating()
	{
		$this->expectException(NoOperandsException::class);

		$addition = new Division;
		$addition->calculate();
	}

	public function test_removes_division_by_zero_operands()
	{
		$division = new Division;
		$division->setOperands([10, 0, 0, 5, 0]);

		$this->assertEquals(2, $division->calculate());
	}
}