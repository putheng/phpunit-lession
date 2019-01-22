<?php

class SampleTest extends \PHPUnit\Framework\TestCase
{
	public function test_true_asserts_to_true()
	{
		$this->assertTrue(true);
	}

	public function test_true_asserts_to_false()
	{
		$this->assertFalse(false);
	}
}