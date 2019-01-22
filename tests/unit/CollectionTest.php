<?php

use App\Support\Collection;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
	public function test_empty_instantiated_collection_returns_no_items()
	{
		$collection = new Collection;

		$this->assertEmpty($collection->get());
	}

	public function test_count_is_correct_for_item_passed_in()
	{
		$collection = new Collection([
			'one', 'two', 'three'
		]);

		$this->assertEquals(3, $collection->count());
	}

	public function test_items_returned_match_items_passed_in()
	{
		$collection = new Collection([
			'one', 'two'
		]);

		$this->assertCount(2, $collection->get());
		$this->assertEquals($collection->get()[0], 'one');
		$this->assertEquals($collection->get()[1], 'two');
	}

	public function test_collection_is_instance_of_iterator_aggretate()
	{
		$collection = new Collection;

		$this->assertInstanceOf(IteratorAggregate::class, $collection);
	}

	public function test_collection_can_be_iterated()
	{
		$collection = new Collection([
			'one', 'two', 'three'
		]);

		$items = [];

		foreach($collection as $item){
			$items[] = $item;
		}

		$this->assertCount(3, $items);
		$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
	}

	public function test_collection_can_be_merged_with_another_collection()
	{
		$collection1 = new COllection(['one', 'two']);
		$collection2 = new COllection(['three', 'four', 'five']);
	}
}
// 7,3:21