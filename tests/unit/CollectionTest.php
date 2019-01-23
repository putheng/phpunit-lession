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

		$collection1->merge($collection2);

		$this->assertCount(5, $collection1->get());
		$this->assertEquals(5, $collection1->count());
	}

	public function can_add_to_existing_collection()
	{
		$collection = new Collection(['one', 'two']);
		$collection->add(['three']);

		$this->assertEquals(3, $collection->count());
		$this->assertCount(3, $collection->get());
	}

	public function test_returned_json_encoed_item()
	{
		$collection = new Collection([
			['username' => 'putheng'],
			['username' => 'heng']
		]);

		$this->assertInternalType('string', $collection->toJson());
		$this->assertEquals('[{"username":"putheng"},{"username":"heng"}]',
			$collection->toJson());
	}

	public function test_json_encode_a_collection_object_returned_json()
	{
		$collection = new Collection([
			['username' => 'putheng'],
			['username' => 'heng'],
		]);

		$encode = json_encode($collection);

		$this->assertInternalType('string', $encode);
		$this->assertEquals('[{"username":"putheng"},{"username":"heng"}]', $encode);
	}
}