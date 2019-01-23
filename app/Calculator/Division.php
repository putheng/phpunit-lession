<?php

namespace App\Calculator;

use App\Calculator\OperationAbstract;
use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{
	public function calculate()
	{
		if($this->operands === null){
			throw new NoOperandsException;
		}

		return array_reduce(array_filter($this->operands), function($a, $b){
			if($a !== null && $b !== null){
				return $a / $b;
			}

			return $b;
		}, null);
	}
}