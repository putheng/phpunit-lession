<?php

namespace App\Support;

class Collection implements \IteratorAggregate
{
	public $items = [];

	public function __construct(array $items = [])
	{
		$this->items = $items;
	}

	public function get()
	{
		return $this->items;
	}

	public function count()
	{
		return count($this->items);
	}

	public function getIterator()
	{
		return new \ArrayIterator($this->items);
	}
}